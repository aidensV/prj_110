<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="{{route('admin.home')}}" class="brand-link">
    <center><span class="brand-text font-weight-light"><b>SIPADI</b></span></center>
      </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route("admin.home") }}" class="nav-link {{ request()->is('admin') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt">

                        </i>
                        <p>
                            <span>{{ trans('global.dashboard') }}</span>
                        </p>
                    </a>
                </li>

                
                
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is('admin/permissions*') ? 'menu-open' : '' }} {{ request()->is('admin/roles*') ? 'menu-open' : '' }} {{ request()->is('admin/users*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle">
                            <i class="nav-icon fas fa-users">

                            </i>
                            <p>
                                <span>{{ trans('global.userManagement.title') }}</span>
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            <span>{{ trans('global.permission.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            <span>{{ trans('global.role.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-user">

                                        </i>
                                        <p>
                                            <span>{{ trans('global.user.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('elemenled_access')

                {{-- <li class="nav-item has-treeview {{ request()->is('admin/r_elemen_led*') ? 'menu-open' : '' }}">
                    <a class="nav-link nav-dropdown-toggle">
                        <i class="nav-icon fas fa-users">

                        </i>
                        <p>
                            <span>Elemen LED</span>
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        
                            <li class="nav-item">
                                
                                

                                <a href="{{ url("admin/r_elemen_led?s=s3&prodi_id=") }}" class="nav-link {{   request()->is('admin/r_elemen_led') && request()->query()['s'] == 's3' ? 'active' : '' }}">
                                    
                                    <i class="nav-icon fas fa-angle-double-right">

                                    </i>
                                    <p>
                                        <span>S3</span>
                                    </p>
                                </a>
                            </li>
                        
                        
                            <li class="nav-item">
                                <a href="{{ url("admin/r_elemen_led?s=s2&prodi_id=") }}" class="nav-link {{  request()->is('admin/r_elemen_led') && request()->query()['s'] == 's2' ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-angle-double-right">

                                    </i>
                                    <p>
                                        <span>S2</span>
                                    </p>
                                </a>
                            </li>
                      
                            <li class="nav-item">
                                <a href="{{ url("admin/r_elemen_led?s=s1&prodi_id=") }}" class="nav-link {{ request()->is('admin/r_elemen_led') && request()->query()['s'] == 's1' ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-angle-double-right">

                                    </i>
                                    <p>
                                        <span>S1</span>
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ url("admin/r_elemen_led?s=d3&prodi_id=") }}" class="nav-link {{ request()->is('admin/r_elemen_led') && request()->query()['s'] == 'd3' ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-angle-double-right">

                                    </i>
                                    <p>
                                        <span>D3</span>
                                    </p>
                                </a>
                            </li>
                        
                    </ul>
                </li> --}}

                <li class="nav-item">
                    <a href="{{ url("admin/r_elemen_led") }}" class="nav-link {{ request()->is('admin/r_elemen_led') || request()->is('admin/r_elemen_led/*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cogs">

                        </i>
                        <p>
                            <span>Elemen LED</span>
                        </p>
                    </a>
                </li>
                @endcan
                @can('led_access')
                @if(isset(Auth::user()->roles) && Auth::user()->roles[0]->title == 'Staff')
                <li class="nav-item">
                    <a href="{{ url("admin/r_led?prodi_id=").Auth::user()->id }}" class="nav-link {{ request()->is('admin/r_led') || request()->is('admin/r_led/*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cogs">

                        </i>
                        <p>
                            <span>LED</span>
                        </p>
                    </a>
                </li>
                @else
                <li class="nav-item">
                    <a href="{{ url("admin/r_led?prodi_id=") }}" class="nav-link {{ request()->is('admin/r_led') || request()->is('admin/r_led/*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cogs">

                        </i>
                        <p>
                            <span>LED</span>
                        </p>
                    </a>
                </li>
                {{-- <li class="nav-item has-treeview {{ request()->is('admin/r_led*') ? 'menu-open' : '' }}">
                    <a class="nav-link nav-dropdown-toggle">
                        <i class="nav-icon fas fa-users">

                        </i>
                        <p>
                            <span>LED</span>
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        
                            <li class="nav-item">
                                
                                

                                <a href="{{ url("admin/r_led?s=s3&prodi_id=") }}" class="nav-link {{   request()->is('admin/r_led') && request()->query()['s'] == 's3' ? 'active' : '' }}">
                                    
                                    <i class="nav-icon fas fa-angle-double-right">

                                    </i>
                                    <p>
                                        <span>S3</span>
                                    </p>
                                </a>
                            </li>
                        
                        
                            <li class="nav-item">
                                <a href="{{ url("admin/r_led?s=s2&prodi_id=") }}" class="nav-link {{  request()->is('admin/r_led') && request()->query()['s'] == 's2' ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-angle-double-right">

                                    </i>
                                    <p>
                                        <span>S2</span>
                                    </p>
                                </a>
                            </li>
                      
                            <li class="nav-item">
                                <a href="{{ url("admin/r_led?s=s1&prodi_id=") }}" class="nav-link {{ request()->is('admin/r_led') && request()->query()['s'] == 's1' ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-angle-double-right">

                                    </i>
                                    <p>
                                        <span>S1</span>
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ url("admin/r_led?s=d3&prodi_id=") }}" class="nav-link {{ request()->is('admin/r_led') && request()->query()['s'] == 'd3' ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-angle-double-right">

                                    </i>
                                    <p>
                                        <span>D3</span>
                                    </p>
                                </a>
                            </li>
                        
                    </ul>
                </li> --}}
                @endif
                {{-- 
                    <li class="nav-item">
                        <a href="{{ url("admin/r_led?prodi_id=").Auth::user()->id }}" class="nav-link {{ request()->is('admin/r_led') || request()->is('admin/r_led/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-cogs">

                            </i>
                            <p>
                                <span>LED</span>
                            </p>
                        </a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a href="{{ route("admin.r_led.store") }}" class="nav-link {{ request()->is('admin/r_led') || request()->is('admin/r_led/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-cogs">

                            </i>
                            <p>
                                <span>LED</span>
                            </p>
                        </a>
                    </li>
                    @endif --}}
                @endcan
                @can('lkps_access')
                @if(isset(Auth::user()->roles) && Auth::user()->roles[0]->title == 'Staff')
                    <li class="nav-item">
                        <a href="{{ url("admin/r_lkps_penilaian/daftar_lkps?prodi_id=").Auth::user()->id }}" class="nav-link {{ request()->is('admin/r_lkps_penilaian') || request()->is('admin/r_lkps_penilaian/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-cogs">

                            </i>
                            <p>
                                <span>LKPS</span>
                            </p>
                        </a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a href="{{ route("admin.r_lkps_penilaian.daftar_lkps") }}" class="nav-link {{ request()->is('admin/r_lkps_penilaian') || request()->is('admin/r_lkps_penilaian/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-cogs">

                            </i>
                            <p>
                                <span>LKPS</span>
                            </p>
                        </a>
                    </li>
                    @endif
                @endcan
                @can('iku_access')
                @if(isset(Auth::user()->roles) && Auth::user()->roles[0]->title == 'Staff')
                <li class="nav-item">
                    <a href="{{ url("admin/r_iku?prodi_id=").Auth::user()->id }}" class="nav-link {{ request()->is('admin/r_iku') || request()->is('admin/r_iku/*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cogs">

                        </i>
                        <p>
                            <span>IKU</span>
                        </p>
                    </a>
                </li>
                @else
                <li class="nav-item">
                    <a href="{{ url("admin/r_iku?prodi_id=") }}" class="nav-link {{ request()->is('admin/r_iku') || request()->is('admin/r_iku/*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cogs">

                        </i>
                        <p>
                            <span>IKU</span>
                        </p>
                    </a>
                </li>
                {{-- <li class="nav-item has-treeview {{ request()->is('admin/r_iku*') ? 'menu-open' : '' }}">
                    <a class="nav-link nav-dropdown-toggle">
                        <i class="nav-icon fas fa-users">

                        </i>
                        <p>
                            <span>IKU</span>
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        
                            <li class="nav-item">
                                
                                

                                <a href="{{ url("admin/r_iku?s=s3&prodi_id=") }}" class="nav-link {{   request()->is('admin/r_iku') && request()->query()['s'] == 's3' ? 'active' : '' }}">
                                    
                                    <i class="nav-icon fas fa-angle-double-right">

                                    </i>
                                    <p>
                                        <span>S3</span>
                                    </p>
                                </a>
                            </li>
                        
                        
                            <li class="nav-item">
                                <a href="{{ url("admin/r_iku?s=s2&prodi_id=") }}" class="nav-link {{  request()->is('admin/r_iku') && request()->query()['s'] == 's2' ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-angle-double-right">

                                    </i>
                                    <p>
                                        <span>S2</span>
                                    </p>
                                </a>
                            </li>
                      
                            <li class="nav-item">
                                <a href="{{ url("admin/r_iku?s=s1&prodi_id=") }}" class="nav-link {{ request()->is('admin/r_iku') && request()->query()['s'] == 's1' ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-angle-double-right">

                                    </i>
                                    <p>
                                        <span>S1</span>
                                    </p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ url("admin/r_iku?s=d3&prodi_id=") }}" class="nav-link {{ request()->is('admin/r_iku') && request()->query()['s'] == 'd3' ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-angle-double-right">

                                    </i>
                                    <p>
                                        <span>D3</span>
                                    </p>
                                </a>
                            </li>
                        
                    </ul>
                </li> --}}
                @endif
                {{-- @if(isset(Auth::user()->roles) && Auth::user()->roles[0]->title == 'Staff')
                    <li class="nav-item">
                        <a href="{{ url("admin/r_iku?prodi_id=").Auth::user()->id }}" class="nav-link {{ request()->is('admin/r_iku') || request()->is('admin/r_iku/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-cogs">

                            </i>
                            <p>
                                <span>IKU</span>
                            </p>
                        </a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a href="{{ route("admin.r_iku.store") }}" class="nav-link {{ request()->is('admin/r_iku') || request()->is('admin/r_iku/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-cogs">

                            </i>
                            <p>
                                <span>IKU</span>
                            </p>
                        </a>
                    </li>
                    @endif --}}
                @endcan
                
                @can('borang_access')
                @if(isset(Auth::user()->roles) && Auth::user()->roles[0]->title == 'Staff')
                
                    <li class="nav-item">
                        <a href="{{ url("admin/r_borang?prodi_id=").Auth::user()->id }}" class="nav-link {{ request()->is('admin/r_borang') || request()->is('admin/r_borang/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-cogs">

                            </i>
                            <p>
                                <span>Borang Penilaian</span>
                            </p>
                        </a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a href="{{ route("admin.r_borang.store") }}" class="nav-link {{ request()->is('admin/r_borang') || request()->is('admin/r_borang/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-cogs">

                            </i>
                            <p>
                                <span>Borang Penilaian</span>
                            </p>
                        </a>
                    </li>
                    @endif
                @endcan

                @can('berita_acara_access')
                @if(isset(Auth::user()->roles) && Auth::user()->roles[0]->title == 'Staff')
                <li class="nav-item">
                    <a href="{{ url("admin/berita-acara/create?prodi_id=".Auth::user()->id) }}" class="nav-link {{ request()->is('admin/berita-acara') || request()->is('admin/berita-acara/*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cogs">

                        </i>
                        <p>
                            <span>Berita Acara</span>
                        </p>
                    </a>
                </li>
                @else
                    <li class="nav-item">
                        <a href="{{ url("admin/berita-acara/create") }}" class="nav-link {{ request()->is('admin/berita-acara') || request()->is('admin/berita-acara/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-cogs">

                            </i>
                            <p>
                                <span>Berita Acara</span>
                            </p>
                        </a>
                    </li>
                    @endif
                @endcan
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>


