<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Validasi Anggota</title>
</head>

<body>
    <h2>Validasi Anggota</h2>
    <p>Halo,</p>
    <p>
        Kami telah menerima permintaan pendaftaran Anda sebagai anggota. Silakan klik tombol di bawah ini untuk
        melakukan validasi akun Anda:
    </p>
    <p>
        <a href="{{ $validationUrl }}"
            style="display:inline-block;padding:10px 20px;background-color:#4CAF50;color:#fff;text-decoration:none;border-radius:5px;">Validasi
            Akun</a>
    </p>
    <p>
        Jika Anda tidak merasa melakukan pendaftaran, abaikan email ini.
    </p>
    <p>
        Terima kasih,<br>
        Tim Admin
    </p>
</body>

</html>
