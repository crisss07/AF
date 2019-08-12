<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.5
Version: 4.5
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="es">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>MPD | Activos Fijos </title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="{{ asset('global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('global/plugins/uniform/css/uniform.default.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="{{ asset('global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="{{ asset('global/css/components.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{ asset('global/css/plugins.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="{{ asset('layouts/layout/css/layout.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('layouts/layout/css/themes/darkblue.min.css')}}" rel="stylesheet" type="text/css" id="style_color" />
        <link href="{{ asset('layouts/layout/css/custom.min.css')}}" rel="stylesheet" type="text/css" />
        

        @yield('css')
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a href="http://www.planificacion.gob.bo">
                        <img src="{{ asset('layouts/layout/img/logohome.png')}}" alt="logo" class="logo-default" /> </a>
                    <div class="menu-toggler sidebar-toggler"> </div>
                </div>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN TOP NAVIGATION MENU -->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                        <!-- BEGIN NOTIFICATION DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        
                        <!-- END NOTIFICATION DROPDOWN -->
                        <!-- BEGIN INBOX DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        
                        <!-- END INBOX DROPDOWN -->
                        <!-- BEGIN TODO DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        
                        <!-- END TODO DROPDOWN -->
                        <!-- BEGIN USER LOGIN DROPDOWN -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        <li class="dropdown dropdown-user">
                             @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                            @else

                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                
                                <span class="username username-hide-on-mobile">{{ Auth::user()->name }} <?php echo 'Salinas'; ?></span>
                                <i class="fa fa-angle-down"></i>
                            </a>

                            <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Cerrar Sesion
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>

                           
                           
                            @endguest
                        </li>
                        <!-- END USER LOGIN DROPDOWN -->
                        <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                        <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                        
                        <!-- END QUICK SIDEBAR TOGGLER -->
                    </ul>
                </div>
                <!-- END TOP NAVIGATION MENU -->
            </div>
            <!-- END HEADER INNER -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <!-- BEGIN SIDEBAR -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <div class="page-sidebar navbar-collapse collapse">
                    <!-- BEGIN SIDEBAR MENU -->
                    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                        <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                        <li class="sidebar-toggler-wrapper hide">
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                            <div class="sidebar-toggler"> </div>
                            <!-- END SIDEBAR TOGGLER BUTTON -->
                        </li>
                        <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
                        <li class="sidebar-search-wrapper">
                            <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
                            <!-- DOC: Apply "sidebar-search-bordered" class the below search form to have bordered search box -->
                            <!-- DOC: Apply "sidebar-search-bordered sidebar-search-solid" class the below search form to have bordered & solid search box -->
                           
                            <!-- END RESPONSIVE QUICK SEARCH FORM -->
                        </li>
                        <li class="nav-item start active open">
                            <a href="/home" class="nav-link nav-toggle">
                                <i class="icon-home"></i>
                                <span class="title">Principal</span>
                                <span class="selected"></span>
                                <span class="arrow open"></span>
                            </a>
                           
                        </li>
                        <li class="heading">
                            <h3 class="uppercase">Acciones</h3>
                        </li>
                        <li class="nav-item start">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="glyphicon glyphicon-qrcode"></i>
                                <span class="title">ACTIVOS</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item start">
                                    <a href="/formulario" class="nav-link ">
                                        <span class="title">Crear Activo</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/vista" class="nav-link ">
                                        <span class="title">Activos PreAprobados</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/listaractapro" class="nav-link ">
                                        <span class="title">Activos Aprobados</span>
                                    </a>
                                </li>
                                   
                            </ul>
                        </li>
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-hand-o-right"></i>
                                <span class="title">ASIGNACI&Oacute;N</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="/asignar" class="nav-link ">
                                        <span class="title">Asignaci&oacute;n</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="/asignados" class="nav-link ">
                                        <span class="title">Formularios</span>
                                    </a>
                                </li>                                
                            </ul>
                        </li>
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-hand-o-left"></i>
                                <span class="title">DEVOLUCI&Oacute;N</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="components_date_time_pickers.html" class="nav-link ">
                                        <span class="title">Devoluci&oacute;n</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_color_pickers.html" class="nav-link ">
                                        <span class="title">Formularios</span>
                                    </a>
                                </li> 
                                
                            </ul>
                        </li>
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-university"></i>
                                <span class="title">DEPOSITO</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="components_date_time_pickers.html" class="nav-link ">
                                        <span class="title">Forno</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_color_pickers.html" class="nav-link ">
                                        <span class="title">MPD Sotano</span>
                                    </a>
                                </li>                                
                            </ul>
                        </li>

                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-cog"></i>
                                <span class="title">ADMINISTRACI&Oacute;N</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="components_date_time_pickers.html" class="nav-link ">
                                        <span class="title">Tipos</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_color_pickers.html" class="nav-link ">
                                        <span class="title">Fuentes de Financiamiento</span>
                                    </a>
                                </li> 
                                <li class="nav-item  ">
                                    <a href="components_date_time_pickers.html" class="nav-link ">
                                        <span class="title">Grupo Contable</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_color_pickers.html" class="nav-link ">
                                        <span class="title">Proveedores</span>
                                    </a>
                                </li> 
                                <li class="nav-item  ">
                                    <a href="components_date_time_pickers.html" class="nav-link ">
                                        <span class="title">Seguro</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_color_pickers.html" class="nav-link ">
                                        <span class="title">Pisos</span>
                                    </a>
                                </li> 
                            </ul>
                        </li>

                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="fa fa-university"></i>
                                <span class="title">REPORTES</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="components_date_time_pickers.html" class="nav-link ">
                                        <span class="title">Depreciacion de Activos</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_color_pickers.html" class="nav-link ">
                                        <span class="title">Inventario Ordenado por Codigo de Activos</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_date_time_pickers.html" class="nav-link ">
                                        <span class="title">Inventario Ordenado por Grupo Contable</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_color_pickers.html" class="nav-link ">
                                        <span class="title">Inventario Ordenado por Por Auxiliar Contable</span>
                                    </a>
                                </li>  
                                <li class="nav-item  ">
                                    <a href="components_date_time_pickers.html" class="nav-link ">
                                        <span class="title">Inventario Ordenado por Oficina</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_color_pickers.html" class="nav-link ">
                                        <span class="title">Inventario Ordenado por Oficina y Responsable</span>
                                    </a>
                                </li>  
                                <li class="nav-item  ">
                                    <a href="components_date_time_pickers.html" class="nav-link ">
                                        <span class="title">Resumen de ACtivos Fijos por Grupo</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_color_pickers.html" class="nav-link ">
                                        <span class="title">Detalle de REoinsabke por Oficina</span>
                                    </a>
                                </li>  
                                <li class="nav-item  ">
                                    <a href="components_date_time_pickers.html" class="nav-link ">
                                        <span class="title">Reporte Histórico de Activos Dados de Baja</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_color_pickers.html" class="nav-link ">
                                        <span class="title">Reporte de Indices UFV</span>
                                    </a>
                                </li>  
                                <li class="nav-item  ">
                                    <a href="components_date_time_pickers.html" class="nav-link ">
                                        <span class="title">Asignacion Individuales de Bienes</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="components_color_pickers.html" class="nav-link ">
                                        <span class="title">Acta de Devolucion de Bienes</span>
                                    </a>
                                </li>                                  
                            </ul>
                        </li>
                        
                    </ul>
                    <!-- END SIDEBAR MENU -->
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <!-- BEGIN THEME PANEL -->
                    
                    <!-- END THEME PANEL -->
                    <!-- BEGIN PAGE BAR -->
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <a href="/home">Pagina Principal</a>
                                <i class="fa fa-circle"></i>
                            </li>
                            <li>
                                
                            </li>
                        </ul>
                        <div class="page-toolbar">
                            <div id="dashboard-report-range" class="pull-right tooltips btn btn-sm" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
                                <i class="icon-calendar"></i>&nbsp;
                                <span class="thin uppercase hidden-xs"></span>&nbsp;
                                <i class="fa fa-angle-down"></i>
                            </div>
                        </div>
                    </div>
                    <!-- END PAGE BAR -->
                    <!-- BEGIN PAGE TITLE-->
                                        <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->
                    <!-- BEGIN DASHBOARD STATS 1-->
                    <div class="row">
                        
                         @yield('contenido')
                    </div>
                    <div class="clearfix"></div>
                    <!-- END DASHBOARD STATS 1-->
                   
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            <!-- BEGIN QUICK SIDEBAR -->
            
            
            <!-- END QUICK SIDEBAR -->
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
        <div class="page-footer">
            <div class="page-footer-inner" align="center"> 2019 &copy; Ministerio de Planificaci&oacute;n del Desarrollo</div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
        </div>
        <!-- END FOOTER -->
        <!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="{{ asset('global/plugins/jquery.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('global/plugins/uniform/jquery.uniform.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="{{ asset('global/plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="{{ asset('global/scripts/app.min.js')}}" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="{{ asset('pages/scripts/components-select2.min.js')}}" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="{{ asset('layouts/layout/scripts/layout.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('layouts/layout/scripts/demo.min.js')}}" type="text/javascript"></script>
        <script src="{{ asset('layouts/global/scripts/quick-sidebar.min.js')}}" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
@yield('js')


        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>