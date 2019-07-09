<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Mastercash</title>
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

    <link rel="stylesheet" type="text/css" href="view/tienda/css/util.css">

</head>
<?php $constantes=new Constantes(); ?>
<body class="fixed-nav sticky-footer bg-white" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-blue fixed-top" id="mainNav">
    <a class="navbar-brand" href="<?php echo $helper->url("Main","index") ?>">
        <img src="view/img/mastercash200.png">
    </a>
   
    <div class="collapse navbar-collapse" id="navbarResponsive">
     
     
      <ul class="navbar-nav ml-auto">
        
      
        <li class="nav-item">
           
                <a class="nav-link" data-target="#exampleModal" href="http://www.mastercash1.com">
                    <i class="fa fa-fw fa-sign-out"></i>Sitio web
                </a>
            
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
        <?php if(Session::get('autenticado')){ ?>
            <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePerfil" data-parent="#exampleAccordion">
              <i class="fa fa-fw fa-user"></i>
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
        <?php } ?>
        </li>  
        <li class="nav-item dropdown">
           <?php if(Session::get('autenticado')){ ?>
                <a class="mr-lg-2 btn btn-light" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-fw fa-sign-out" data-toggle="tooltip" title="Cerrar sesión"></i></a>
            <?php }else{ ?>
                <a class="nav-link" data-target="#exampleModal" href="?controller=Login">
                    <i class="fa fa-fw fa-sign-in" data-toggle="tooltip" title="Iniciar sesión"></i>Iniciar Sesión</a>
            <?php } ?>
        </li>    
      </ul>
    </div>
  </nav>
  <?php include "logoutModal.php"; ?>

