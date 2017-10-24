<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SB Admin - Start Bootstrap Template</title>
  <!-- Bootstrap core CSS-->
  <link href="view/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="view/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="view/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="view/css/sb-admin.css" rel="stylesheet">
  <link href="view/css/bootstrap-datepicker.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" media="screen" href="http://tarruda.github.com/bootstrap-datetimepicker/assets/css/bootstrap-datetimepicker.min.css">
   <link href="//oss.maxcdn.com/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css" rel="stylesheet">
</head>

<body class="static-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top" id="mainNav">
    <a class="navbar-brand" href="<?php echo $helper->url("Main","index") ?>">Proyecto75</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExampleSaldo" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-usd"></i>
            <span class="nav-link-text">Saldo</span>
          </a>
            
          <div class="sidenav-second-level collapse show fondo-white" id="collapseExampleSaldo">
            <h6 class="dropdown-header">Disponible</h6>
            <a class="dropdown-item" href="?controller=Main">
                <strong><h1 class="text-primary">$ 0.00</h1></strong>
            </a>
            <a class=" dropdown-item" href="?controller=Main">
              <strong class="btn btn-success pt-1 pb-1">Retirar fondos</strong>
            </a>
          </div>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExampleVen" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-calendar"></i>
            <span class="nav-link-text">Mis fechas</span>
          </a>
            
          <div class="sidenav-second-level collapse fondo-white" id="collapseExampleVen">
            <h6 class="dropdown-header">Fecha del último pago</h6>
            <a class="dropdown-item" href="?controller=Main">
                <strong><h5 class="text-primary">8 Septiembre 2017</h5></strong>
            </a>
            <h6 class="dropdown-header">Fecha vencimiento</h6>
            <a class="dropdown-item" href="?controller=Main">
                <strong><h5 class="text-primary">2 Octubre 2017</h5></strong>
            </a>
            <a class="dropdown-item" href="?controller=Main">
              <strong class="btn btn-success pt-1 pb-1">Realizar pago</strong>
            </a>
          </div>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
            <a class="nav-link" href="<?php echo $helper->url("Main") ?>">
            <i class="fa fa-fw fa-sitemap"></i>
            <span class="nav-link-text">Red</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePerfil" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">Perfil</span>
          </a>
            
          <ul class="sidenav-second-level collapse" id="collapseExamplePerfil">
            
            <li>
                <a href="<?php echo $helper->url("Usuarios", "perfil&id=".Session::get('id')."") ?>">Editar perfil</a>
            </li>
            <li>
                <a href="<?php echo $helper->url("Usuarios", "showPass") ?>">Cambio contraseña</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">Mis Planes</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Ajustes</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="navbar.html">Metodos de pago</a>
            </li>
          </ul>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="<?php echo $helper->url("Usuarios", "perfil&id=".Session::get('id')."") ?>" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-user"></i>
           
            <span class="indicator text-primary d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
        
          
        </li>
        <li class="autenticacion">
            <div class="nombreUser">
                Usuario: <?php echo Session::get('user') ?>
            </div>
        </li>
        <li class="nav-item">
           <?php if(Session::get('autenticado')){ ?>
                <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-fw fa-sign-out"></i>Cerrar Sesión</a>
            <?php }else{ ?>
                <a class="nav-link" data-target="#exampleModal" href="?controller=Login">
                    <i class="fa fa-fw fa-sign-in"></i>Ingresar</a>
            <?php } ?>
        </li>
      </ul>
    </div>
  </nav>

