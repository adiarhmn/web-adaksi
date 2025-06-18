<?php

namespace App\Http\Controllers;

use App\Mail\AnggotaValidateMail;
use App\Models\AnggotaModel;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AnggotaController extends Controller
{
    protected $defaultPassword;
    public function __construct()
    {
        $this->defaultPassword = 'adaksi#2025'; // Set a default password
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_anggota' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'nip_nipppk' => 'required|string|max:50',
            'no_hp' => 'required|string|max:20',
            'status_dosen' => 'required|string',
            'homebase_pt' => 'required|string|max:100',
            'provinsi' => 'required|string|max:100',
            'bukti_transfer' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'status_anggota' => 'nullable|in:pending,aktif,nonaktif',
            'foto' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        try {
            $user = User::create([
                'email' => $request->email,
                'password' => bcrypt($this->defaultPassword),
                'role' => 'anggota',
            ]);
            AnggotaModel::create([
                'id_user' => $user->id_user,
                'nama_anggota' => $request->nama_anggota,
                'nip_nipppk' => $request->nip_nipppk,
                'no_hp' => $request->no_hp,
                'status_dosen' => $request->status_dosen,
                'homebase_pt' => $request->homebase_pt,
                'provinsi' => $request->provinsi,
                'status_anggota' => 'pending',
                'bukti_tf_pendaftaran' => $this->uploadFile($request->file('bukti_transfer'), 'uploads/bukti_tf_pendaftaran'),
            ]);
            // PendaftaranAnggotaModel::create([
            //     'id_anggota' => $anggota->id_anggota,
            //     'bukti_transaksi' => $this->uploadFile($request->file('bukti_transfer'), 'uploads/bukti_tf_pendaftaran'),
            //     'status_pendaftaran' => 'pending',
            // ]);

            notify()->success('Pendaftaran anggota berhasil. Silakan tunggu konfirmasi dari admin.');
            return redirect('/login');
        } catch (\Exception $e) {
            notify()->error('Terjadi kesalahan saat pendaftaran anggota: ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }


    public function showAll(Request $request)
    {
        $user = Auth::user();
        $anggota = AnggotaModel::with('user')
            ->when($request->search, function ($query) use ($request) {
                $query->where('nama_anggota', 'like', '%' . $request->search . '%')
                    ->orWhere('nip_nipppk', 'like', '%' . $request->search . '%');
            })
            ->when($request->status_anggota, function ($query) use ($request) {
                $query->where('status_anggota', $request->status_anggota);
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view($user->role . '_page.anggota.index', compact('anggota'));
    }

    public function validasi(Request $request, $id)
    {
        $anggota = AnggotaModel::findOrFail($id);
        $anggota->status_anggota = $request->status_anggota;
        $anggota->save();

        // Kirim Email Pemberitahuan
        Mail::to($anggota->user->email)->send(new AnggotaValidateMail($anggota));

        notify()->success('Anggota berhasil divalidasi.');
        return redirect()->back();
    }

    public function downloadKTA_1()
    {
        $data = [
            'foto' => 'foto.jpg' // ganti sesuai nama file foto
        ];

        $pdf = Pdf::loadView('components.kartu_tanda_anggota', $data);
        return $pdf->stream('kta-anggota.pdf');
    }

    public function downloadKTA()
    {
        $anggota = Auth::user()->anggota;
        if ($anggota->status_anggota !== 'aktif') {
            return redirect()->back()->with('error', 'Kartu Tanda Anggota hanya dapat diunduh oleh anggota yang sudah aktif.');
        }

        $data = [
            'foto' => $anggota->foto ?? 'foto.jpg', // ganti sesuai nama file foto
            'nama_anggota' => $anggota->nama_anggota,
            'nip_nipppk' => $anggota->nip_nipppk,
            'created_at' => $anggota->created_at->format('d-m-Y'),
        ];

        $pdf = Pdf::loadView('components.kartu_tanda_anggota', $data)->setPaper('a4', 'portrait');
        return $pdf->stream('kta-anggota.pdf');
    }

    public function editProfile()
    {
        $user = Auth::user()->load('anggota');
        return view('anggota_page.profile.form', compact('user'));
    }

    public function profile()
    {
        $user = Auth::user()->load('anggota');
        return view('anggota_page.profile.index', compact('user'));
    }

    public function updateProfile(Request $request)
    {

        $user = User::findOrFail($request->id_user);
        $anggota = AnggotaModel::findOrFail($request->id_anggota);

        $request->validate([
            'id_user' => 'required|integer|exists:users,id_user',
            'id_anggota' => 'required|integer|exists:anggota,id_anggota',
            'nama_anggota' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id_user . ',id_user',
            'nip_nipppk' => 'required|string|max:50|unique:anggota,nip_nipppk,' . $anggota->id_anggota . ',id_anggota',
            'no_hp' => 'required|string|max:20|unique:anggota,no_hp,' . $anggota->id_anggota . ',id_anggota',
            'status_dosen' => 'required|string',
            'homebase_pt' => 'required|string|max:100',
            'provinsi' => 'required|string|max:100',
            'foto' => 'nullable|file|mimes:jpg,jpeg,png|max:2048',
        ]);

        try {
            $user->update(['email' => $request->email]);
            $anggota->update([
                'nama_anggota' => $request->nama_anggota,
                'nip_nipppk' => $request->nip_nipppk,
                'no_hp' => $request->no_hp,
                'status_dosen' => $request->status_dosen,
                'homebase_pt' => $request->homebase_pt,
                'provinsi' => $request->provinsi,
                'foto' => $request->hasFile('foto') ? $this->uploadFile($request->file('foto'), 'uploads/foto_anggota', $anggota->foto) : $anggota->foto,
            ]);

            return redirect()->route('anggota.profile')->with('success', 'Profile updated successfully.');
        } catch (\Exception $e) {
            dd($e);
            return redirect()->back()->withInput()->with('error', 'Failed to update profile: ' . $e->getMessage());
        }
    }
}
