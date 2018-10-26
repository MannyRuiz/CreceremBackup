<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">
    <link rel="icon" type="image/png" href="assets/images/favicon.png" />

    <!-- Title Page-->
    <?php $url = "/crecerem"; $capitalLetter = substr($_SESSION['name'], 0, 1); ?>
    <title>Panel de Crecerem</title>
    
     <!-- Jquery JS-->
    <script src="<?php echo $url; ?>/assets/vendor/jquery-3.2.1.min.js"></script>
    <!--<script src="<?php echo $url; ?>/assets/calendar/moment.min.js"></script>
    <script src="<?php echo $url; ?>/assets/calendar/fullcalendar.js"></script>-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />

    <!-- MOMENT Y ESTILOS DEL CALENDARIO-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <link rel="stylesheet" href="<?php echo $url; ?>/assets/calendar/calendario.manny.css">

    <!-- Fontfaces CSS-->
    <link href="<?php echo $url; ?>/assets/css/font-face.css" rel="stylesheet" media="all">
    <link href="<?php echo $url; ?>/assets/css/generador-eventos.css" rel="stylesheet" media="all">
    <link href="<?php echo $url; ?>/assets/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="<?php echo $url; ?>/assets/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="<?php echo $url; ?>/assets/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="<?php echo $url; ?>/assets/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="<?php echo $url; ?>/assets/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="<?php echo $url; ?>/assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="<?php echo $url; ?>/assets/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="<?php echo $url; ?>/assets/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="<?php echo $url; ?>/assets/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="<?php echo $url; ?>/assets/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="<?php echo $url; ?>/assets/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="<?php echo $url; ?>/assets/css/theme.css" rel="stylesheet" media="all">
    <style>
        .fc-body .fc-row { height: 150px; display:flex; flex-direction:column; }
        .CDMX:hover, .Cuautla:hover {
            /*margin-top:25%*/
            cursor:pointer;
        }
        #calendar {
            width:auto !important;
            height:auto !important;
        }
    </style>
    

</head>

<body class="">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="<?php echo $url; ?>/assets/images/logo_crecerem.png" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="<?php echo $url; ?>/assets/index.html">Dashboard 1</a>
                                </li>
                                <li>
                                    <a href="<?php echo $url; ?>/assets/index2.html">Dashboard 2</a>
                                </li>
                                <li>
                                    <a href="<?php echo $url; ?>/assets/index3.html">Dashboard 3</a>
                                </li>
                                <li>
                                    <a href="<?php echo $url; ?>/assets/index4.html">Dashboard 4</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?php echo $url; ?>/assets/chart.html">
                                <i class="fas fa-chart-bar"></i>Charts</a>
                        </li>
                        <li>
                            <a href="<?php echo $url; ?>/assets/table.html">
                                <i class="fas fa-table"></i>Tables</a>
                        </li>
                        <li>
                            <a href="<?php echo $url; ?>/assets/form.html">
                                <i class="far fa-check-square"></i>Forms</a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-calendar-alt"></i>Calendar</a>
                        </li>
                        <li>
                            <a href="<?php echo $url; ?>/assets/map.html">
                                <i class="fas fa-map-marker-alt"></i>Maps</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Pages</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="<?php echo $url; ?>/assets/login.html">Login</a>
                                </li>
                                <li>
                                    <a href="<?php echo $url; ?>/assets/register.html">Register</a>
                                </li>
                                <li>
                                    <a href="<?php echo $url; ?>/assets/forget-pass.html">Forget Password</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-desktop"></i>UI Elements</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="<?php echo $url; ?>/assets/button.html">Button</a>
                                </li>
                                <li>
                                    <a href="<?php echo $url; ?>/assets/badge.html">Badges</a>
                                </li>
                                <li>
                                    <a href="<?php echo $url; ?>/assets/tab.html">Tabs</a>
                                </li>
                                <li>
                                    <a href="<?php echo $url; ?>/assets/card.html">Cards</a>
                                </li>
                                <li>
                                    <a href="<?php echo $url; ?>/assets/alert.html">Alerts</a>
                                </li>
                                <li>
                                    <a href="<?php echo $url; ?>/assets/progress-bar.html">Progress Bars</a>
                                </li>
                                <li>
                                    <a href="<?php echo $url; ?>/assets/modal.html">Modals</a>
                                </li>
                                <li>
                                    <a href="<?php echo $url; ?>/assets/switch.html">Switchs</a>
                                </li>
                                <li>
                                    <a href="<?php echo $url; ?>/assets/grid.html">Grids</a>
                                </li>
                                <li>
                                    <a href="<?php echo $url; ?>/assets/fontawesome.html">Fontawesome Icon</a>
                                </li>
                                <li>
                                    <a href="<?php echo $url; ?>/assets/typo.html">Typography</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="<?php echo $url; ?>/assets/images/logo_crecerem.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="<?php echo $url; ?>/assets/index.html">Dashboard 1</a>
                                </li>
                                <li>
                                    <a href="<?php echo $url; ?>/assets/index2.html">Dashboard 2</a>
                                </li>
                                <li>
                                    <a href="<?php echo $url; ?>/assets/index3.html">Dashboard 3</a>
                                </li>
                                <li>
                                    <a href="<?php echo $url; ?>/assets/index4.html">Dashboard 4</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?php echo $url; ?>/assets/chart.html">
                                <i class="fas fa-chart-bar"></i>Charts</a>
                        </li>
                        <li>
                            <a href="index.php/<?php echo $url; ?>/tablas">
                                <i class="fas fa-table"></i>Tables</a>
                        </li>
                        <li>
                            <a href="<?php echo $url; ?>/index.php/eventos/generador">
                                <i class="far fa-check-square"></i>Generador de eventos</a>
                        </li>
                        <li>
                            <a href="/crecerem/index.php/calendario">
                                <i class="fas fa-calendar-alt"></i>Calendario</a>
                        </li>
                        <li>
                            <a href="<?php echo $url; ?>/assets/map.html">
                                <i class="fas fa-map-marker-alt"></i>Maps</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Pages</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="<?php echo $url; ?>/assets/login.html">Login</a>
                                </li>
                                <li>
                                    <a href="<?php echo $url; ?>/assets/register.html">Register</a>
                                </li>
                                <li>
                                    <a href="<?php echo $url; ?>/assets/forget-pass.html">Forget Password</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-desktop"></i>UI Elements</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                    <a href="<?php echo $url; ?>/assets/button.html">Button</a>
                                </li>
                                <li>
                                    <a href="<?php echo $url; ?>/assets/badge.html">Badges</a>
                                </li>
                                <li>
                                    <a href="<?php echo $url; ?>/assets/tab.html">Tabs</a>
                                </li>
                                <li>
                                    <a href="<?php echo $url; ?>/assets/card.html">Cards</a>
                                </li>
                                <li>
                                    <a href="<?php echo $url; ?>/assets/alert.html">Alerts</a>
                                </li>
                                <li>
                                    <a href="<?php echo $url; ?>/assets/progress-bar.html">Progress Bars</a>
                                </li>
                                <li>
                                    <a href="<?php echo $url; ?>/assets/modal.html">Modals</a>
                                </li>
                                <li>
                                    <a href="<?php echo $url; ?>/assets/switch.html">Switchs</a>
                                </li>
                                <li>
                                    <a href="<?php echo $url; ?>/assets/grid.html">Grids</a>
                                </li>
                                <li>
                                    <a href="<?php echo $url; ?>/assets/fontawesome.html">Fontawesome Icon</a>
                                </li>
                                <li>
                                    <a href="<?php echo $url; ?>/assets/typo.html">Typography</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-comment-more"></i>
                                        <span class="quantity">1</span>
                                        <div class="mess-dropdown js-dropdown">
                                            <div class="mess__title">
                                                <p>You have 2 news message</p>
                                            </div>
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                    <img src="<?php echo $url; ?>/assets/images/icon/avatar-06.jpg" alt="Michelle Moreno" />
                                                </div>
                                                <div class="content">
                                                    <h6>Michelle Moreno</h6>
                                                    <p>Have sent a photo</p>
                                                    <span class="time">3 min ago</span>
                                                </div>
                                            </div>
                                            <div class="mess__item">
                                                <div class="image img-cir img-40">
                                                    <img src="<?php echo $url; ?>/assets/images/icon/avatar-04.jpg" alt="Diane Myers" />
                                                </div>
                                                <div class="content">
                                                    <h6>Diane Myers</h6>
                                                    <p>You are now connected on message</p>
                                                    <span class="time">Yesterday</span>
                                                </div>
                                            </div>
                                            <div class="mess__footer">
                                                <a href="#">View all messages</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-email"></i>
                                        <span class="quantity">1</span>
                                        <div class="email-dropdown js-dropdown">
                                            <div class="email__title">
                                                <p>You have 3 New Emails</p>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="<?php echo $url; ?>/assets/images/icon/avatar-06.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, 3 min ago</span>
                                                </div>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="<?php echo $url; ?>/assets/images/icon/avatar-05.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, Yesterday</span>
                                                </div>
                                            </div>
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="<?php echo $url; ?>/assets/images/icon/avatar-04.jpg" alt="Cynthia Harvey" />
                                                </div>
                                                <div class="content">
                                                    <p>Meeting about new dashboard...</p>
                                                    <span>Cynthia Harvey, April 12,,2018</span>
                                                </div>
                                            </div>
                                            <div class="email__footer">
                                                <a href="#">See all emails</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications"></i>
                                        <span class="quantity">3</span>
                                        <div class="notifi-dropdown js-dropdown">
                                            <div class="notifi__title">
                                                <p>You have 3 Notifications</p>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c1 img-cir img-40">
                                                    <i class="zmdi zmdi-email-open"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a email notification</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c2 img-cir img-40">
                                                    <i class="zmdi zmdi-account-box"></i>
                                                </div>
                                                <div class="content">
                                                    <p>Your account has been blocked</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__item">
                                                <div class="bg-c3 img-cir img-40">
                                                    <i class="zmdi zmdi-file-text"></i>
                                                </div>
                                                <div class="content">
                                                    <p>You got a new file</p>
                                                    <span class="date">April 12, 2018 06:50</span>
                                                </div>
                                            </div>
                                            <div class="notifi__footer">
                                                <a href="#">All notifications</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div id="profile-image" class="image">
                                            <?php if($_SESSION['url'] == "") { ?>
                                                <div class="capitalLetter" style="width:100%; height:100%; background-color:lightsalmon; color:white; font-size:1.2em; text-transform:uppercase; display:flex; justify-content:center; align-items:center;">
                                                    <?php echo $capitalLetter; ?>
                                                </div>
                                            <?php } else { ?>
                                                <img class="profile-image-hover" src="<?php echo $_SESSION['url']; ?>" alt="<?php echo $_SESSION['username'];?>" />
                                            <?php } ?>
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?php echo $_SESSION['username'];  ?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a id="upload-image" class="new-image-container" style="width:100%; height:100%;" href="#">
                                                        <?php if($_SESSION['url'] == "") { ?>
                                                        <div class="new-image-hover">
                                                            <div class="new-image-message"><i class="zmdi zmdi-upload"></i></div>
                                                        </div>
                                                        <div class="capitalLetter" style="width:100%; height:100%; background-color:lightsalmon; color:white; font-size:1.7em; text-transform:uppercase; display:flex; justify-content:center; align-items:center;">
                                                            <?php echo $capitalLetter; ?>
                                                        </div>
                                                        <?php } else { ?>
                                                        <div class="new-image-hover">
                                                            <div class="new-image-message"><i class="zmdi zmdi-upload"></i></div>
                                                        </div>
                                                        <img class="profile-image-hover" src="<?php echo $_SESSION['url']; ?>" alt="<?php echo $_SESSION['username']?>" />
                                                        <?php } ?>
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"><?php echo $_SESSION['name'];?></a>
                                                    </h5>
                                                    <span class="email"><?php echo $_SESSION['email'];?></span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                            <?php if($_SESSION['rol'] == 1) { ?>
                                                <div class="account-dropdown__item">
                                                    <a id="openRegisterModal" href="#">
                                                        <i class="zmdi zmdi-account-add"></i>Agregar usuario</a>
                                                </div>
                                            <?php } ?>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-settings"></i>Setting</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-money-box"></i>Billing</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="http://localhost/crecerem/index.php/main/logout">
                                                    <i class="zmdi zmdi-power"></i>Cerrar sesión</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->


<?php if($_SESSION['rol'] == 1) { ?>
<!-- SI EL USUARIO ES SUPERADMINISTRADOR MOSTRAR EL MODAL DE REGISTRO DE USUARIO -->
<!-- ALERT - USUARIO REGISTRADO -->
<div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Usuario registrado, ya puedes iniciar sesión</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- MODAL DE REGISTRO DE USUARIO -->
<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">Formulario de registro</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                        <h4>Datos de usuario</h4>
                        <br> 
                        <form id="myform" method="post" action="http://localhost/original/index.php/registernewusers/registrar">  
                            <div class="form-group">  
                                    <label>Nombre completo</label>  
                                    <input type="text" name="rName" class="form-control" required />  
                                    <span class="text-danger"></span>                 
                            </div>
                            <div class="form-group">  
                                    <label>Nombre de usuario</label>  
                                    <input type="text" name="rUsername" id="rUsername" class="form-control" required />  
                                    <span class="text-danger"></span>                 
                            </div>
                            <div class="form-group">  
                                    <label>Correo electrónico</label>  
                                    <input type="email" name="rEmail" class="form-control" required />  
                                    <span class="text-danger"></span>                 
                            </div>
                            <div class="form-group">  
                                    <label>Rol</label>  
                                    <select name="rRol" id="rRol"></select>
                                    <span class="text-danger"></span>                 
                            </div>
                            <div class="form-group">  
                                    <label>Sede</label>  
                                    <select name="rSede" id="rSede"></select>
                                    <span class="text-danger"></span>                 
                            </div>  
                            <div class="form-group">  
                                    <label>Introduce contraseña</label>  
                                    <input type="password" name="rPassword" id="rPassword" class="form-control" required />  
                                    <span class="text-danger"></span>  
                            </div>
                            <div class="form-group">  
                                    <label>Confirma contraseña</label>  
                                    <input type="password" name="rPasswordConfirmation" id="rPasswordConfirmation" class="form-control" required />  
                                    <span class="text-danger" id="missmatchPassword"></span>  
                            </div>
                            <div class="form-group">  
                                    <input type="submit" name="insert" value="Login" class="btn btn-info" />
                            </div>  
                        </form> 
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
    </div>
</div>
<?php } ?>

<!-- ALERT - USUARIO REGISTRADO -->
<div class="modal fade" id="modal-upload-image" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Sube una nueva imagen</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="image-form" enctype="multipart/form-data">
            <input name="userfile" type="file" value="Sube una nueva imagen perro">
            <input type="submit" class="btn btn-success">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>