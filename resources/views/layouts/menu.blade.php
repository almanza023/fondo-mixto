<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="javascript:void(0)" class="brand-link">

    <img src="{{asset('img/logofm.png')}}"  alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="width:2em">
    <span class="brand-text font-weight-light letra">Fondo Mixto</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{asset('img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="Fondo Mixto">
      </div>
      <div class="info">
        <a href="javascript:void(0)" class="d-block">{{Auth::user()->email}}</a>
      </div>
    </div>

    @php
      function activeSubMenu($url)
      {
      return Route::is($url) ? 'active' : '';
      }
    @endphp

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        @if (auth()->user()->hasRole('recepcionista') || auth()->user()->hasRole('administrador'))
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Recepción
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">         
        
            <li class="nav-item">
              <a href="{{route('solicitante.index')}}" class="nav-link">
                <i class="fas fa-user nav-icon"></i>
                <p>Solicitantes</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{route('solicitud.index')}}" class="nav-link">
                <i class="fas fa-user nav-icon"></i>
                <p>Solicitudes</p>
              </a>
            </li>  
            <li class="nav-item">
              <a href="{{route('archivo.index')}}" class="nav-link">
                <i class="fas fa-archive"></i>
                <p>Archivo</p>
              </a>
            </li>     
            
            
          </ul>
        </li>
        @endif
        @if (auth()->user()->hasRole('gerencia') || auth()->user()->hasRole('administrador'))
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="fas fa-male nav-icon"></i>
            <p>
              Gerencia
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{route('management.index')}}" class="nav-link {{activeSubMenu('management*')}}">
                    <i class="fas fa-users-cog nav-icon"></i>
                    <p>Atención de Solicitudes</p>
                  </a>
                </li>
          </ul>
        </li>
        @endif
        @if (auth()->user()->hasRole('asistente-administrativo') || auth()->user()->hasRole('administrador'))
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="fas fa-user-friends nav-icon"></i>
              <p>
                Asistente Administrativo
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('asistente.index')}}" class="nav-link {{activeSubMenu('asistente*')}}">
                        <i class="fas fa-book-reader nav-icon"></i>
                        <p>Solicitudes</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{route('anexos.index')}}" class="nav-link {{activeSubMenu('asistente*')}}">
                        <i class="fas fa-file nav-icon"></i>
                        <p>
                           Anexos</p>
                      </a>
                    </li>
            </ul>
          </li>
          @endif
          @if (auth()->user()->hasRole('juridica') || auth()->user()->hasRole('administrador'))
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="fas fa-paste nav-icon"></i>
              <p>
                Jurídica
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
              <a href="{{route('juridica.index')}}" class="nav-link {{activeSubMenu('juridica*')}}">
                <i class="far fa-file-alt nav-icon"></i>
                  <p>Atención de las Peticiones</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          @if (auth()->user()->hasRole('proyectos') || auth()->user()->hasRole('administrador'))
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="fas fa-file-powerpoint nav-icon"></i>
                <p>Proyectos</p>
                <i class="right fas fa-angle-left"></i>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="{{route('proyectos.index')}}" class="nav-link {{activeSubMenu('proyectos*')}}">
                    <i class="fas fa-file nav-icon"></i>
                    <p>Lista de los Proyectos</p>
                  </a>
                </li>
              </ul>
          </li>
          @endif
          @if (auth()->user()->hasRole('director-administrativo') || auth()->user()->hasRole('administrador'))

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="fas fa-address-card"></i>
                <p>Director Administrativo</p>
                <i class="right fas fa-angle-left"></i>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="{{route('director.index')}}" class="nav-link {{activeSubMenu('director*')}}">
                    <i class="fas fa-file nav-icon"></i>
                    <p>Solicitudes</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('comprobantes.index')}}" class="nav-link {{activeSubMenu('comprobantes*')}}">
                      <i class="fas fa-file nav-icon"></i>
                      <p>Comprobantes</p>
                    </a>
                  </li>
              </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{ route('admin.index') }}" class="nav-link">
                <i class="fas fa-file-archive"></i>
                <p>Administración</p>
                <i class="right fas fa-angle-left"></i>
            </a>            
          </li>
          @endif
          @if ( auth()->user()->hasRole('administrador'))
          <li class="nav-item has-treeview">
            <a href="{{ route('elfinder.index') }}" class="nav-link">
                <i class="fas fa-file-archive"></i>
                <p>Gestor de Archivos</p>
                <i class="right fas fa-angle-left"></i>
            </a>            
          </li>
        <li
          class="nav-item has-treeview">
          <a href="" class="nav-link">
            <i class="nav-icon fas fa-cogs"></i>
            <p>
              Parametros
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('proponente.index')}}" class="nav-link {{activeSubMenu('proponente*')}}">
                <i class="fas fa-user-plus"></i>
                <p>Proponentes</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('indicadores.index')}}" class="nav-link {{activeSubMenu('indicadores*')}}">
                <i class="fab fa-accusoft"></i>
                <p>Indicadores</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('lineas.index')}}" class="nav-link {{activeSubMenu('lineas*')}}">
                <i class="fas fa-tasks"></i>
                <p>Líneas</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('tipopoblacion.index')}}" class="nav-link {{activeSubMenu('tipopoblacion*')}}">
                <i class="fas fa-restroom"></i>
                <p>Tipo de Población</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('poblacion.index')}}" class="nav-link {{activeSubMenu('poblacion*')}}">
                <i class="fas fa-users"></i>
                <p>Población</p>
              </a>
            </li>
           {{--  <li class="nav-item">
              <a href="{{route('documentos.index')}}" class="nav-link {{activeSubMenu('documentos*')}}">
                <i class="fas fa-file-pdf nav-icon"></i>
                <p>Documentos</p>
              </a>
            </li> --}}
            <li class="nav-item">
                <a href="{{route('ejes.index')}}" class="nav-link {{activeSubMenu('ejes*')}}">
                    <i class="fas fa-check-double"></i>
                  <p>Ejes</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('dependencia.index')}}" class="nav-link {{activeSubMenu('dependencia*')}}">
                    <i class="fas fa-user-friends nav-icon"></i>
                    <p>Dependencias</p>
                  </a>
              </li>

            <li class="nav-item">
            <a href="{{route('empleados.index')}}" class="nav-link {{activeSubMenu('empleados*')}}">
                <i class="fas fa-users nav-icon"></i>
                <p>Empleados</p>
              </a>
            </li>
            <li class="nav-item">
                <a href="{{route('fuente_verificacion.index')}}" class="nav-link {{activeSubMenu('fuente_verificacion*')}}">
                    <i class="fab fa-artstation"></i>
                    <p>Fuente de Verificación</p>
                  </a>
            </li>
          </ul>
        </li>
        
    <!--reportes--->
    
        <li
          class="nav-item has-treeview">
          <a href="" class="nav-link">
            <i class="fas fa-file-pdf"></i>
            <p>
              Reportes
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('reporte.proyectos')}}" class="nav-link {{activeSubMenu('reportesolicitud*')}}">
                <i class="fas fa-file-alt"></i>
                <p>Reporte de Proyectos</p>
              </a>
            </li>
            <li class="nav-item">
                <a href="{{route('reporteproyecto.index')}}" class="nav-link {{activeSubMenu('reporteproyecto*')}}">
                  <i class="fas fa-file-alt"></i>
                  <p>Reporte de Solicitudes</p>
                </a>
              </li>
              
          </ul>
        </li>
        @endif
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
