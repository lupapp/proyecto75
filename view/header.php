<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>MsterCash</title>
  <!-- Bootstrap core CSS-->
  <link href="view/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="view/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="view/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="view/css/sb-admin.css" rel="stylesheet">
  <link href="view/css/bootstrap-datepicker.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" media="screen" href="http://tarruda.github.com/bootstrap-datetimepicker/assets/css/bootstrap-datetimepicker.min.css">
   <link href="//oss.maxcdn.com/jquery.bootstrapvalidator/0.5.2/css/bootstrapValidator.min.css" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
<link href="https://fonts.googleapis.com/css?family=Patrick+Hand|Yanone+Kaffeesatz" rel="stylesheet">
  <script src="view/vendor/jquery/jquery.min.js"></script>
  <script type="text/javascript" src="view/js/funciones.js"> </script>
<?php
$constantes=new Constantes();

?>
<body class="static-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top" id="mainNav">
    <a class="navbar-brand" href="<?php echo $helper->url("Main","index") ?>">
        <img src="view/img/mastercash200.png">
    </a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePerfil" data-parent="#exampleAccordion">
              <i class="fa fa-fw fa-user text-primary"></i>
              <span class="nav-link-text"><?php echo Session::get('user'); ?></span>
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
              <a class="nav-link" href="?controller=Main&action=showCategorias ">
                  <i class="fa fa-fw fa-shopping-cart text-primary"></i>
                  <span class="nav-link-text">Tienda</span>
              </a>
          </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExampleSaldo" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-usd text-primary"></i>
            <span class="nav-link-text">Fondos</span>
          </a>
            
          <div class="sidenav-second-level collapse  fondo-white" id="collapseExampleSaldo">
            <h6 class="dropdown-header">Disponible</h6>
            <a class="dropdown-item" href="?controller=Main">
               
                <strong><h1 class="text-primary">$ <span class="valor_fondos"></span></h1></strong>
            </a>
            <a class=" dropdown-item" href="?controller=Login&action=index">
              <strong class="btn btn-success pt-1 pb-1">Retirar fondos</strong>
            </a>
          </div>
        </li> 
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
            <a class="nav-link" href="<?php echo $helper->url("Comisiones", "show&id=".Session::get('id')."") ?>">
                <i class="fa fa-fw fa-bell text-primary"></i>
                <span class="nav-link-text">Mis Solicitudes</span>
            </a>
        </li>
        <li class="list-group-item bg-success text-white" >
            <h5>Funciones admin <i class="fa fa-fw fa-angle-down"></i></h5>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
                <i class="fa fa-fw fa-user text-success"></i>
                <span class="nav-link-text">Usuarios</span>
            </a>
            <ul class="sidenav-second-level collapse" id="collapseExamplePages">
                <li>
                    <a href="<?php echo $helper->url("Usuarios") ?>">Lista de Usuarios</a>
                </li>
                <li>
                    <a href="<?php echo $helper->url("Usuarios", "create") ?>">Registrar Usuario</a>
                </li>
            </ul>
        </li>
         <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link" href="<?php echo $helper->url("Planes") ?>">
            <i class="fa fa-fw fa-area-chart text-success"></i>
            <span class="nav-link-text">Membresías</span>
          </a>
            
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link" href="<?php echo $helper->url("categorias") ?>">
            <i class="fa fa-tags text-success"></i>
            <span class="nav-link-text">Categorías</span>
          </a>
            
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="tables.html">
            <i class="fa fa-fw fa-table text-success"></i>
            <span class="nav-link-text">Solicitudes</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExampleCartillas" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-money text-success"></i>
            <span class="nav-link-text">Pagos</span>
          </a>
            
         
        </li>
          <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
              <a class="nav-link" href="<?php echo $helper->url("pedidos") ?>">
                  <i class="fa fa-fw fa-money text-success"></i>
                  <span class="nav-link-text">Pedidos</span>
              </a>


          </li>

        
       
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
        <li class="autenticacion">
            <div class="nombreUser">
                <input type="hidden" class="id_user" value="<?php echo Session::get('id');?>">
                Usuario: <strong class="userHeader text-primary"><?php echo Session::get('user')?></strong>
            </div>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
         <li class="nav-item dropdown">
          <a class=" mr-lg-2 btn btn-light" id="messagesDropdown" href="<?php echo $helper->url("Usuarios", "index") ?>"     aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-users text-success" aria-hidden="true" data-toggle="tooltip" title="Lista de usuarios" aria-hidden="true"></i>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class=" mr-lg-2 btn btn-light" id="messagesDropdown" href="<?php echo $helper->url("Planes", "create") ?>"     aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-plus text-success" aria-hidden="true" data-toggle="tooltip" title="Crear un nueva membresía" aria-hidden="true"></i>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class=" mr-lg-2 btn btn-light" id="messagesDropdown" href="<?php echo $helper->url("Usuarios", "create") ?>"     aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-user-plus text-success" data-toggle="tooltip" title="Crear un nuevo usuario" aria-hidden="true"></i>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="mr-lg-2  btn btn-light" id="messagesDropdown" href="<?php echo $helper->url("Usuarios", "showPagos") ?>"     aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-money text-success" data-toggle="tooltip" title="pago de Membresías pendientes"></i>
             <span class="badge badge-pill badge-danger papen"></span>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="mr-lg-2  btn btn-light" id="messagesDropdown" href="<?php echo $helper->url("Comisiones", "showSolicitudes") ?>"     aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bell text-success" data-toggle="tooltip" title="Solicitudes de cobro pendientes"></i>
              <span class="badge badge-pill badge-danger solpen"></span>
          </a>
      
        </li>
        <li class="nav-item dropdown">
          <a class="mr-lg-2  btn btn-light" id="messagesDropdown" href="<?php echo $helper->url("Login", "index") ?>"     aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-sitemap text-primary" data-toggle="tooltip" title="Ver mi red"></i>
          </a>
        </li>  
              
        
        <li class="nav-item dropdown">
          <a class=" mr-lg-2 btn btn-light" id="messagesDropdown" href="<?php echo $helper->url("Login", "index") ?>"     aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-usd text-primary" aria-hidden="true" data-toggle="tooltip" title="Solicitar pago de comisiones" aria-hidden="true"><strong class="ml-1 float-right"><span class="text-secondary valor_fondos"></span></strong></i>
          </a>
        </li>
         <li class="nav-item dropdown">
          <a class=" mr-lg-2 btn btn-light" id="messagesDropdown" href="<?php echo $helper->url("Comisiones", "show&id=".Session::get('id')."") ?>"     aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-bell text-primary" aria-hidden="true" data-toggle="tooltip" title="Solicitud de pago pendientes" aria-hidden="true"></i>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="mr-lg-2  btn btn-light" id="messagesDropdown" href="<?php echo $helper->url("Usuarios", "perfil&id=".Session::get('id')."") ?>"     aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-user text-primary" data-toggle="tooltip" title="Perfil de usuario"></i>
          </a>
      
        </li>
        <li class="nav-item dropdown">
           <?php if(Session::get('autenticado')){ ?>
                <a class="mr-lg-2 btn btn-light" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-fw fa-sign-out" data-toggle="tooltip" title="Cerrar sesión"></i></a>
            <?php }else{ ?>
                <a class="nav-link" data-target="#exampleModal" href="?controller=Login">
                    <i class="fa fa-fw fa-sign-in" data-toggle="tooltip" title="Iniciar sesión"></i></a>
            <?php } ?>
        </li>
      </ul>
    </div>
  </nav>

