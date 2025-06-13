 <ul id="side-menu">
     <li class="menu-title mt-2">Main</li>

     <li>
         <a href="{{ url('admin') }}" class="tp-link">
             <i data-feather="home"></i>
             <span> Dashboard </span>
         </a>
     </li>

     <li>
         <a href="#sidebarDashboards" data-bs-toggle="collapse">
             <i data-feather="users"></i>
             <span> Pengguna </span>
             <span class="menu-arrow"></span>
         </a>
         <div class="collapse" id="sidebarDashboards">
             <ul class="nav-second-level">
                 <li>
                     <a href="{{ url('admin/anggota') }}" class="tp-link">Anggota</a>
                 </li>
                 <li>
                     <a href="{{ url('admin/admin-data') }}" class="tp-link">
                         Admin
                     </a>
                 </li>
             </ul>
         </div>
     </li>
     <li>
         <a href="apps-calendar.html" class="tp-link">
             <i data-feather="calendar"></i>
             <span> Kalender </span>
         </a>
     </li>
 </ul>
