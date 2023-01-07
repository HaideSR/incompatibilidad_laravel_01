<header class="header">
   <div></div>
   <div>
      <div class="dropdown">
         <button class="btn-h-user dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="icon-account_circle"></i>
            <span>{{ Auth::user()->email }}</span>
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
