 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light">
         
          

            <!-- SEARCH FORM -->
            <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search"
                        aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

           
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{url('admin')}}" class="brand-link">
                <img src="dist/img/AdminLTELogo.png" alt="" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">Dashboard</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">Dreamploy</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        
                        
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    All Users
                                    <i class="fas fa-angle-left right"></i>
                                    <span class="badge badge-info right">6</span>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('BDUser')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>BD User</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('INDUser')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>IND User</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('PAKUser')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>PAK User</p>
                                    </a>
                                </li>
                              
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    All Travellers
                                    <i class="fas fa-angle-left right"></i>
                                    <span class="badge badge-info right">6</span>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('BDTraveller')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>BD Traveller</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('INDTraveller')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>IND Traveller</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('PAKTraveller')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>PAK Traveller</p>
                                    </a>
                                </li>
                              
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    All Agents
                                    <i class="fas fa-angle-left right"></i>
                                    <span class="badge badge-info right">6</span>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('BDAgent')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>BD Agent</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('INDAgent')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>IND Agent</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('PAKAgent')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>PAK Agent</p>
                                    </a>
                                </li>
                              
                            </ul>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-copy"></i>
                                <p>
                                    All Merchents
                                    <i class="fas fa-angle-left right"></i>
                                    <span class="badge badge-info right">6</span>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="pages/layout/top-nav.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>BD Merchent</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>IND Merchent</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>PAK Merchent</p>
                                    </a>
                                </li>
                              
                            </ul>
                        </li>
                     
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>