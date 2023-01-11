<header class="header">
   <div>
      <ul class="menu-head">
         <li class="menu-head-item">
            <a href="#">
               <i class="icon-import_contacts"></i>
               <span>Reglamento</span>
            </a>
         </li>
         <li class="menu-head-item">
            <a href="#">
               <i class="icon-list_alt"></i>
               <span>Instructivo</span>
            </a>
         </li>
         <li class="menu-head-item">
            <a href="#">
               <i class="icon-help_outline"></i>
               <span>Ayuda</span>
            </a>
         </li>
         <li class="menu-head-item">
            <a href="#" class="menu-head-item-ac">
               <span>Acceso con ciudadania digital</span>
               <i class="icon-arrow_right_alt"></i>
            </a>
         </li>
      </ul>
   </div>
   <div>
      <div class="dropdown">
         <button class="btn-h-user dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="icon-account_circle"></i>
            @if(Session::get('nombre'))
               <span>{{ Session::get('nombre') }}</span>
            @else
               <span>{{ Auth::user()->email }}</span>
            @endif
         </button>
         <ul class="dropdown-menu">
            <li>
               <a class="dropdown-item" href="/inicio">
                  <i class="icon-home"></i>
                  <span>Inicio</span>
               </a>
            </li>
            <li>
               <a class="dropdown-item btn-danger" href="/logout">
                  <i class="icon-logout"></i>
                  <span>Cerrar sesión</span>
               </a>
            </li>
         </ul>
      </div>
   </div>
</header>
