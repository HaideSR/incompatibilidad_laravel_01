<aside id="sidebar" class="sidebar break-point-lg has-bg-image">
   <div class="sidebar-layout">
      <div class="sidebar-header">
         <div class="logo-sidebar">
            <img src="../img/logo.webp" alt="">
         </div>
         <p class="text-name-system">Sistema Incompatibilidades</p>
      </div>
      
      <div class="sidebar-content">
         <nav class="menu open-current-submenu">
            <ul>
               <li class="menu-item">
                  <a href="/">
                     <span class="menu-icon">
                        <i class="icon-home"></i>
                     </span>
                     <span class="menu-title">Inicio</span>
                  </a>
               </li>
               <li class="menu-item">
                  <a href="/funcionario">
                     <span class="menu-icon">
                        <i class="icon-group"></i>
                     </span>
                     <span class="menu-title">Funcionario</span>
                  </a>
               </li>
               
               @if(Session::get('isAdmin'))
               <li class="menu-item">
                  <a href="/fiscalias">
                     <span class="menu-icon">
                        <i class="icon-account_balance"></i>
                     </span>
                     <span class="menu-title">Fiscalias</span>
                  </a>
               </li>

               <li class="menu-item">
                  <a href="/unidad_cargo">
                     <span class="menu-icon">
                        <i class="icon-assignment_ind"></i>
                     </span>
                     <span class="menu-title">Unidad Cargo</span>
                  </a>
               </li>

               <li class="menu-item sub-menu">
                  <a href="#" class="item-submenu">
                     <span class="menu-icon">
                        <i class="icon-settings"></i>
                     </span>
                     <span class="menu-title">Configuración</span>
                  </a>
                  <div class="sub-menu-list">
                     <ul> 
                        <li class="menu-item">
                           <a href="/usuarios">
                              <span class="menu-title">Usuarios</span>
                           </a>
                        </li>
                        <li class="menu-item">
                           <a href="/parentesco">
                              <span class="menu-title">Parentescos</span>
                           </a>
                        </li>
                        <li class="menu-item">
                           <a href="/grado_parentesco">
                              <span class="menu-title">Grado/Parentesco</span>
                           </a>
                        </li>
                        <li class="menu-item">
                           <a href="/tipo_parentesco">
                              <span class="menu-title">Tipo/Parentesco</span>
                           </a>
                        </li>
                        <li class="menu-item">
                           <a href="/tipos_causal_incompatibilidad">
                              <span class="menu-title">Tipos Causales</span>
                           </a>
                        </li>
                        <li class="menu-item">
                           <a href="/motivo_declaracion">
                              <span class="menu-title">Motivo Declaracion</span>
                           </a>
                        </li>
                     </ul>
                  </div>
               </li>
               @endif
            </ul>
         </nav>
      </div>
      <!-- <div class="sidebar-footer">
         <span>Sidebar footer</span>
      </div> -->
   </div>
</aside>
<script>
   const itemsSub = document.querySelectorAll('.item-submenu')
   if(itemsSub.length){
      for (let i = 0; i < itemsSub.length; i++) {
         itemsSub[i].addEventListener('click', e => {
            itemsSub[i].classList.toggle('open-submenu')
         })
      }
   }
</script>