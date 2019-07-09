<?php

class UsuariosController extends ControladorBase{
    
    public function __construct() {
        
        parent::__construct();
    }
    public function newUser(){
        $user=$_POST['usuario'];
        $nombre=$_POST['nombre'];
        $email=$_POST['email'];
        $tipoDocumento=$_POST['tipoDocumento'];
        $cc=$_POST['cc'];
        $nacimiento=$_POST['nacimiento'];
        $telefono=$_POST['telefono'];
        $celular=$_POST['celular'];
        $direccion=$_POST['direccion'];
        $ciudad=$_POST['ciudad'];
        $provincia=$_POST['provincia'];
        $pais=$_POST['pais'];
        $rol=$_POST['rol'];
        $fechaactual= getdate();

        $usuario= new Usuario();
        if(isset($_POST['password'])){
            $pass=array(
                'passmd5'=>md5($_POST['password']),
                'pass'=>$_POST['password']
            );
        }else{
            $pass=$usuario->gPass();
        }
        $usuario->setUser($user);
        $usuario->setName($nombre);
        $usuario->setEmail($email);
        $usuario->setPassword($pass['passmd5']);
        $usuario->setTipoDocumento($tipoDocumento);
        $usuario->setCc($cc);
        $usuario->setNacimiento($nacimiento);
        $usuario->setFechaInscripcion($fechaactual['mday']."/".$fechaactual['month']."/".$fechaactual['year']);
        $usuario->setTelefono($telefono);
        $usuario->setCelular($celular);
        $usuario->setDireccion($direccion);
        $usuario->setCiudad($ciudad);
        $usuario->setProvincia($provincia);
        $usuario->setPais($pais);
        $usuario->setRol($rol);
        $result=$usuario->save();
        $password=$pass['pass'];
        require_once 'config/headers.php';
        require_once 'config/cuerposMails.php';
        $datos= array(
            "destinatario"=>"$email",
            "asunto"=>"Credenciales registro de usuario Mastercash",
            "cuerpo"=>"$cRegistro",
            "headers"=>"$headers"
        );
        $envio=$usuario->envioMail($datos);
        $usuario=['user'=>$user, 'cc'=>$cc];
        return $usuario;
    }

    public function index(){
        if(Session::get('level')=='admin'){
            Session::tiempo();
            $usuario = new Usuario;
            $cartillas=$usuario->getCartillaByIduser(Session::get('id'));
            $allusers=$usuario->getUsers();
            $this->view("usuarios", array(
                "allusers"=>$allusers, 'cartillas'=>$cartillas
            ));
        }else{
            header("location:?controller=Main");
        }
    }
    public function buscarUser(){
        $user=new Usuario();
        $result=$user->getByUser($_POST['user']);
        if($result=='no'){
            echo 0;
        }else{
            echo "<div class='col-md-6 bg-success img-thumbnail userExistente'>"
            . "<input type='hidden' name='id_user' value='".$result->id."'>"
                ."<label class='text-white'>Usuario existente, si es la persona correcta puedes seguir adelante.</label>"
                ."<div class='col-md-5><h4 class='text-white'>Nombre: ".$result->name."</h4></div>"
                ."<div class='col-md-5><h4 class='text-white'>Cédula: ".$result->cc."</h4></div>"
            ."</div>";
        }
        
    }
    public function buscarRef(){
        $user=new Usuario();
        $result=$user->getByUser($_POST['user']);
        if($result=='no'){
            echo "<div class='alert alert-danger' role='alert'><i class='fa fa-remove'></i> Usuario no existe<input type='hidden' name='referido' value=''></div>";
        }else{
            $cartilla=$user->getByT('id_user', $result->id, 'cartillas');
            if(isset($cartilla[1]->id)){
                echo "<div class='alert alert-success' role='alert'><i class='fa fa-check'></i> Usuario existente</span><input type='hidden' name='referido' value='".$cartilla[1]->id."'></div>";
               
            }else{
                echo "<div class='alert alert-danger' role='alert'><i class='fa fa-remove'></i> El usuario no tiene membresía<input type='hidden' name='referido' value=''></div>"; 
            }
        }
        
    }
    public function verificarUser(){
        $user=new Usuario();
        $result=$user->getByUser($_POST['user']);
        if(!isset($result->id)){
            echo '<div class="row">
                    <div class="col-md-3">
                         <div class="form-group">
                            <label for="exampleInputName">*Nombre completo</label>
                            <input class="form-control" id="exampleInputName" type="text" name="nombre" aria-describedby="nombre" placeholder="Nombre completo">
                         </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="exampleInputEmail1">*Email address</label>
                            <input class="form-control" id="exampleInputEmail1" type="email" name="email" aria-describedby="emailHelp" placeholder="Correo electrónico">
                        </div>
                    </div>
                     
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="exampleInputName">*Tipo de documento</label>
                            <select class="form-control" name="tipoDocumento" id="exampleFormControlSelect1">
                                <option>CI</option>
                                <option>CE</option>
                                <option>Pasaporte</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="exampleInputEmail1">*Documento de indentidad</label>
                            <input class="form-control" id="exampleInputEmail1" type="text" name="cc" aria-describedby="emailHelp" placeholder="Documento de identidad">
                            <input class="form-control" type="hidden" name="rol"  value="standard">
                            <input type="hidden" name="nacimiento" value=\'\'>
                            <input type="hidden" name="telefono" value=\'\'>
                            <input type="hidden" name="celular" value=\'\'>
                            <input type="hidden" name="direccion" value=\'\'>
                            <input type="hidden" name="ciudad">
                            <input type="hidden" name="provincia">
                            <input type="hidden" name="pais">
                        </div>
                    </div>
                </div>
               ';
        }else{
            echo '<div class="row">
                    <div class="col-md-3">
                         <div class="form-group">
                            <label for="exampleInputName">*Nombre completo</label>
                            <div class="form-control">'.$result->name.'</div>
                         </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="exampleInputEmail1">*Email address</label>
                            <div class="form-control">'.$result->email.'</div>
                            <input type="hidden" name="email" value="'.$result->email.'">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="exampleInputEmail1">*Documento de indentidad</label>
                            <div class="form-control">'.$result->cc.'</div>
                            <input class="form-control" type="hidden" name="id_user"  value="'.$result->id.'">
                            <input type="hidden" name="nacimiento" value=\'\'>
                            <input type="hidden" name="telefono" value=\'\'>
                            <input type="hidden" name="celular" value=\'\'>
                            <input type="hidden" name="direccion" value=\'\'>
                            <input type="hidden" name="ciudad">
                            <input type="hidden" name="provincia">
                            <input type="hidden" name="pais">
                        </div>
                    </div>
                </div>
               ';
        }
        
    }
    public function buscarCartilla(){
        $user=new Usuario();
        $result=$user->getByUser($_POST['user']);
       
        if($result=='no'){
            echo '<div class="row">
                <div class="col-md-3">
                        <div class="form-group">
                        <label for="exampleInputName">*Nombre completo</label>
                        <input class="form-control" id="exampleInputName" type="text" name="nombre" aria-describedby="nombre" placeholder="Nombre completo">
                        </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="exampleInputEmail1">*Email address</label>
                        <input class="form-control" id="exampleInputEmail1" type="email" name="email" aria-describedby="emailHelp" placeholder="Correo electrónico">
                    </div>
                </div>
                    
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="exampleInputName">*Tipo de documento</label>
                        <select class="form-control" name="tipoDocumento" id="exampleFormControlSelect1">
                            <option>CI</option>
                            <option>CE</option>
                            <option>Pasaporte</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for="exampleInputEmail1">*Documento de indentidad</label>
                        <input class="form-control" id="exampleInputEmail1" type="text" name="cc" aria-describedby="emailHelp" placeholder="Documento de identidad">
                        <input class="form-control" type="hidden" name="rol"  value="standard">
                        <input type="hidden" name="nacimiento" >
                        <input type="hidden" name="telefono" >
                        <input type="hidden" name="celular" >
                        <input type="hidden" name="direccion" >
                        <input type="hidden" name="ciudad">
                        <input type="hidden" name="provincia">
                        <input type="hidden" name="pais">
                        <input type="hidden" name="comprasincomision">
                    </div>
                </div>
            </div>';
        }else{
            $cartilla=$user->getByT('id_user', $result->id, 'cartillas');
            if(isset($cartilla[1]->id)){
                echo "<div class='alert alert-success' role='alert'><i class='fa fa-check'></i> Usuario existente<input type='hidden' name='id_cartilla' value='".$cartilla[1]->id."'></div>";

            }else{
                echo '
                <div class="row">
                    <input type="hidden" name="id_user" value="'.$result->id.'">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputName">*Nombre completo</label>
                            <div class="form-control">'.$result->name.'</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">*Email address</label>
                            <div class="form-control">'.$result->email.'</div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">*Documento de indentidad</label>
                            <div class="form-control">'.$result->cc.'</div>
                            <input class="form-control" type="hidden" name="id_user"  value="'.$result->id.'">
                            <input type="hidden" name="nacimiento" value=\'\'>
                            <input type="hidden" name="telefono" value=\'\'>
                            <input type="hidden" name="celular" value=\'\'>
                            <input type="hidden" name="direccion" value=\'\'>
                            <input type="hidden" name="ciudad">
                            <input type="hidden" name="provincia">
                            <input type="hidden" name="pais">
                        </div>
                    </div>
                </div>
            ';
            }
        }

        
    }
    public function listarCartilla(){
        $user=new Usuario();
        $result=$user->getByUser($_POST['user']);
        if(isset($_POST['info'])){
            if($result!='no'){
                $cartilla = $user->getByT('id_user', $result->id, 'cartillas');
                if (isset($cartilla[1]->id)) {
                    $input="<input type='hidden' value>";
                    echo "<script>
                            $('.membresia').click(function(){
                            if($(this).is(':checked')){
                                var id=$(this).data('id_padre');
                                var input='<input type=hidden name=id_padre value='+id+'>';
                                $('.id_padre').html(input);
                                
                            }
                        });</script>";
                    $cant = count($cartilla) - 1;
                    if ($cant > 1) {
                        $car = 'Membresías';
                    } else {
                        $car = 'Membresía';
                    }

                    echo '
                    <div class="card mb-4" >
                    <input type="hidden" name="id_user" value="'.$result->id.'">
                    <div class="card-header">
                    *El usuario tiene ' . $cant . ' ' . $car . '. seleccione una
                    </div>';
                    for ($i = 1; $i < count($cartilla); $i++) {
                                
                        $plan = $user->getByIdTable($cartilla[$i]->id_plan, 'planes');
                        echo '<hr>
                        <div class="row pl-5 pr-5">
                        <div class="col-md-4 col-6">
                                <input class="membresia" type="radio" name="id_cartilla" data-id_padre="'.$cartilla[$i]->id_padre .'" value="' . $cartilla[$i]->id . '">
                                ' . $cartilla[$i]->id . '
                            </div>
                            <div class="col-md-4 col-6">
                                ' . $cartilla[$i]->fecha_creacion . '
                            </div>
                            <div class="col-md-4 col-6">
                                <h4 for="exampleInputEmail1" class="text-primary">' . $plan[0]->nombre_plan . '</h4>
                            </div>
                        </div>';

                    }
                    echo ' </div>
                </div>';
                } else {
                    echo '<input type="hidden" name="usuarioRegular" value="1">';
                }
            }else{
                "<script>
                    $('.nuevousuario').fadeIn();
                </script>";
            }
        }else{
            if($result=='no'){
            }else {
                $cartilla = $user->getByT('id_user', $result->id, 'cartillas');
                if (isset($cartilla[1]->id)) {
                    echo "<script>
                        $('.membresia').click(function(){
                        if($(this).is(':checked')){
                            var id=$(this).val();
                            $.ajax({       
                            type: 'POST',
                            url: '?controller=Planes&action=buscarPlanes',
                            data: {
                                    'id':id
                            },
                            dataType: 'html',
                            error: function(){
                              alert('error petición ajax');
                            },
                            success:function(data){
                                $('.planes').html(data);
                            }
                        });
                        }
                    });</script>";
                    $cant = count($cartilla) - 1;
                    if ($cant > 1) {
                        $car = 'Membresías';
                    } else {
                        $car = 'Membresía';
                    }
                echo '<div class="card mb-4" >
                <div class="card-header">
                  *El usuario padre tiene ' . $cant . ' ' . $car . '. seleccione una
                </div>';
                    for ($i = 1; $i < count($cartilla); $i++) {
                        $plan = $user->getByIdTable($cartilla[$i]->id_plan, 'planes');
                        echo '<hr>
                    <div class="row pl-5 pr-5">
                     <div class="col-md-4 col-6">
                            <input class="membresia" type="radio" name="id_cartilla" value="' . $cartilla[$i]->id . '">
                            ' . $cartilla[$i]->id . '
                        </div>
                        <div class="col-md-4 col-6">
                            ' . $cartilla[$i]->fecha_creacion . '
                        </div>
                        <div class="col-md-4 col-6">
                            <h4 for="exampleInputEmail1" class="text-primary">' . $plan[0]->nombre_plan . '</h4>
                        </div>
                    </div>';

                    }
                    echo ' </div>
               </div>';
                } else {
                    echo "<span class='text-danger d-block pt-4'><i class='fa fa-remove'></i> El usuario no tiene membresía </span><input type='hidden' name='id_cartilla' value=''>";
                    
                }
            }
        }

    }
    public function buscarRef2(){
        $user=new Usuario();
        $result=$user->getByUser($_POST['user']);
        if($result=='no'){
            echo 0;
        }else{
            $cartilla=$user->getByT('id_user', $result->id, 'cartillas');
            if(isset($cartilla[1]->id)){
                echo $cartilla[1]->id;
               
            }else{
                echo 0;
            }
        }
        
    }
    public function createUser(){
        if(isset($_GET['id'])){
            $id=(int)$_GET['id'];
            $usuario=new Usuario();
            $user=$usuario->getUserByCartilla2($_GET['id']);
            $plan=$usuario->getUserByCartilla($_GET['id']);
            $this->view("newUsers",array('plan'=>$plan, 'user'=>$user));
        }
    }

    
    public function crearUser(){
        $usuario=new Usuario();
        if(isset($_POST['id_plan'])){
            if (isset($_POST['id_user'])) {
                $id_user = $_POST['id_user'];
                $userUl = $usuario->getById($id_user);
                $email=$userUl->email;
                $user=$userUl->user;
                $password=$userUl->password;
            } else {
                $user = $_POST['usuario'];
                $nombre = $_POST['nombre'];
                $email = $_POST['email'];
                $tipoDocumento = $_POST['tipoDocumento'];
                $cc = $_POST['cc'];
                $nacimiento = $_POST['nacimiento'];
                $telefono = $_POST['telefono'];
                $celular = $_POST['celular'];
                $direccion = $_POST['direccion'];
                $ciudad = $_POST['ciudad'];
                $provincia = $_POST['provincia'];
                $pais = $_POST['pais'];
                $rol = $_POST['rol'];
                $fechaactual = getdate();
                $pass = $usuario->gPass();
                $usuario->setUser($user);
                $usuario->setName($nombre);
                $usuario->setEmail($email);
                $usuario->setPassword($pass['passmd5']);
                $usuario->setTipoDocumento($tipoDocumento);
                $usuario->setCc($cc);
                $usuario->setNacimiento($nacimiento);
                $usuario->setFechaInscripcion($fechaactual['mday'] . "/" . $fechaactual['month'] . "/" . $fechaactual['year']);
                $usuario->setTelefono($telefono);
                $usuario->setCelular($celular);
                $usuario->setDireccion($direccion);
                $usuario->setCiudad($ciudad);
                $usuario->setProvincia($provincia);
                $usuario->setPais($pais);
                $usuario->setRol($rol);
                $result = $usuario->save();
                $userUl = $usuario->getUltimoRegistro('users');
                $id_user = $userUl->id;
                $password = $pass['pass'];

            }

            $to = $email;
            $p = $usuario->getByIdTable($_POST['id_plan'], 'planes');
            $id_cartilla_padre = $_POST['id_cartilla'];
            $id_plan = $_POST['id_plan'];
            $plan = $usuario->getByIdTable($id_plan, 'planes');
            $valor = $plan[0]->valor_plan;
            $metodo_pago = $_POST['metodo'];
            $documento = $_POST['documento'];
            $posicion = $_POST['posicion'];
            $referido = $_POST['referido'];
            $fecha = date('Y') . "-" . date('m') . "-" . date('d');
            if (empty($_POST['insc'])) {
                $fecha_creacion = $fecha;
            } else {
                $fecha_creacion = $_POST['insc'];
            }
            $data = ['id_car_padre' => $id_cartilla_padre,
                'id_cartilla_paga' => '',
                'id_plan' => $id_plan,
                'valor' => $valor,
                'metodo' => $metodo_pago,
                'id_user' => $id_user,
                'documento' => $documento,
                'referido' => $referido,
                'posicion' => $posicion,
                'inscripcion' => $fecha_creacion];
            $p = $usuario->savePago($data, 0);
            $pago = $usuario->getUltimoRegistro('pagos');
            $plan = $usuario->getByIdTable($id_plan, 'planes');
            require_once 'config/headers.php';
            require_once 'config/cuerposMails.php';
            $datos = array(
                "destinatario" => "$to",
                "asunto" => "Registro de Membresía Mastercash",
                "cuerpo" => "$registroInRed",
                "headers" => "$headers"
            );
            $envio = $usuario->envioMail($datos);
            if ($p == 1) {
                if (isset($_POST['frontend'])) {
                    $this->view("confirmacionFrontend", array("user" => $userUl, "pago" => $pago, 'plan' => $plan));
                } else {
                    $this->view("confirmacionRegistro", array("user" => $userUl, "pago" => $pago, 'plan' => $plan));
                }

            } else {
                header("location:?controller=Respuestas&action=errorUser");
            }
        }else{
            $metodo_pago = $_POST['metodo'];
            $documento = $_POST['documento'];
            $posicion = $_POST['posicion'];
            $referido = $_POST['referido'];
            $user = $_POST['usuario'];
            $nombre = $_POST['nombre'];
            $email = $_POST['email'];
            $tipoDocumento = $_POST['tipoDocumento'];
            $cc = $_POST['cc'];
            $telefono = $_POST['telefono'];
            $datosform = [
                'metodo' => $metodo_pago,
                'documento' => $documento,
                'user'=>$user,
                'nombre'=>$nombre,
                'email'=>$email,
                'tipoDocumento'=>$tipoDocumento,
                'cc'=>$cc,
                'telefono'=>$telefono];
            $this->view("register",  array('datosform'=>$datosform));
        }
        
    }
    
    public function crearUserAdmin(){
        $usuario=new Usuario();
        if(isset($_POST['id_user'])){
            $id_user=$_POST['id_user'];
            $userUl=$usuario->getById($id_user);
            $email=$userUl->email;
            $user=$userUl->user;
            $password=$userUl->password;
        }else{
            $user=$_POST['usuario'];
            $nombre=$_POST['nombre'];
            $email=$_POST['email'];
            $tipoDocumento=$_POST['tipoDocumento'];
            $cc=$_POST['cc'];
            $nacimiento=$_POST['nacimiento'];
            $telefono=$_POST['telefono'];
            $celular=$_POST['celular'];
            $direccion=$_POST['direccion'];
            $ciudad=$_POST['ciudad'];
            $provincia=$_POST['provincia'];
            $pais=$_POST['pais'];
            $rol=$_POST['rol'];
            $fechaactual= getdate();
            $pass=$usuario->gPass();
            $usuario->setUser($user);
            $usuario->setName($nombre);
            $usuario->setEmail($email);
            $usuario->setPassword($pass['passmd5']);
            $usuario->setTipoDocumento($tipoDocumento);
            $usuario->setCc($cc);
            $usuario->setNacimiento($nacimiento);
            $usuario->setFechaInscripcion($fechaactual['mday']."/".$fechaactual['month']."/".$fechaactual['year']);
            $usuario->setTelefono($telefono);
            $usuario->setCelular($celular);
            $usuario->setDireccion($direccion);
            $usuario->setCiudad($ciudad);
            $usuario->setProvincia($provincia);
            $usuario->setPais($pais);
            $usuario->setRol($rol);
            $result=$usuario->save();
            $userUl=$usuario->getUltimoRegistro('users');

            $id_user=$userUl->id;
            $password=$pass['pass'];
        }
        $id_cartilla_padre=$_POST['id_cartilla'];
        $id_plan=$_POST['id_plan'];
        $plan=$usuario->getByIdTable($id_plan, 'planes');
        $valor=$plan[0]->valor_plan;
        $metodo_pago=$_POST['metodo'];
        $documento=$_POST['documento'];
        $posicion=$_POST['posicion'];
        $referido=$_POST['referido'];
        $fecha=date('Y')."-".date('m')."-".date('d');
        if(empty($_POST['insc'])) {
            $fecha_creacion = $fecha;
        }else{
            $fecha_creacion=$_POST['insc'];
        }
        $data=['id_car_padre'=>$id_cartilla_padre,
            'id_cartilla_paga'=>'',
            'id_plan'=>$id_plan,
            'valor'=>$valor,
            'metodo'=>$metodo_pago,
            'id_user'=>$id_user,
            'documento'=>$documento,
            'referido'=>$referido,
            'posicion'=>$posicion,
            'inscripcion'=>$fecha_creacion];
        $p=$usuario->savePago($data, 0);
        $pago=$usuario->getUltimoRegistro('pagos');
        $usuario->updatePagoGral('pagos', 'estado=1', $pago->id);
        require_once 'config/headers.php';
        require_once 'config/cuerposMails.php';

        $datos= array(
            "destinatario"=>"$email",
            "asunto"=>"Registro de Membresía Mastercash",
            "cuerpo"=>"$registroInRed",
            "headers"=>"$headers"
        );

        $envio=$usuario->envioMail($datos);
       
        header("location:?controller=Cartillas&action=aprobar&id_user=$id_user&id_cartilla_padre=$id_cartilla_padre&id_plan=$id_plan&posicion=$posicion&referido=$referido&insc=$fecha_creacion");
        
    }
    public function create(){
        if(Session::get('level')=='admin'){
           Session::tiempo();
            $this->view("formUsuarios",array());
        }else{
            header("location:?controller=Main");
        }
    }
    public function crear(){
        if(isset($_POST['nombre'])){
            $this->newUser();
            if($result->error=="Duplicate entry '".$user."' for key 'user'"){
                header("location:?controller=Respuestas&action=errorUser");
            }else{
                header("location:?controller=Respuestas&action=registroUserExito");
            }
        }
    }
    public function buscar(){
        $pag=new Usuario();
        $result=$pag->getAllPagosPen();
        $cant=count($result)-1;
        if($cant>0){
            echo $cant;
        }else{
            echo '';
        }
    }
    public function valorFondos(){
        $usuario = new Usuario();
        $ids_cartillas=$usuario->getIdcartillaXIduser($_POST['user']);
        $valor_total=$usuario->getValorComision($ids_cartillas);
            echo $valor_total;
    }

    public function show(){
        if(Session::get('level')=='admin'){
            if(isset($_GET['id'])){
                $id=(int)$_GET['id'];
                $usuario=new Usuario();
                $user=$usuario->getById($id);
                $this->view("editUsuario",array("user" =>$user));
            }
        }else{
            header("location:?controller=Main");
        }
    }
    public function showPagos(){
        if(Session::get('level')=='admin'){
            Session::tiempo();
            $pag=new Usuario();
            $pago=$pag->getAllPagos('');
            $this->view("aprobarPagos", array("pago" =>$pago));
         }else{
            header("location:?controller=Main");
        }
    }
    public function showPago(){
        $pag=new Usuario();
        $pago=$pag->getByIdTable($_GET['id_pago'], 'pagos');
        $this->view("editPago",array("pago" =>$pago));
    }
    public function perfil(){
        if(isset($_GET['id'])){
            $id=(int)$_GET['id'];
            $usuario=new Usuario();
            $user=$usuario->getById($id);
            $this->view("editPerfil",array("user" =>$user));
        }
    }
    public function update(){
        if($_POST['nombre']){
            $id=$_POST['id'];
            $user=$_POST['user'];
            $nombre=$_POST['nombre'];
            $email=$_POST['email'];
            $tipoDocumento=$_POST['tipoDocumento'];
            $cc=$_POST['cc'];
            $nacimiento=$_POST['nacimiento'];
            $telefono=$_POST['telefono'];
            $celular=$_POST['celular'];
            $direccion=$_POST['direccion'];
            $ciudad=$_POST['ciudad'];
            $provincia=$_POST['provincia'];
            $pais=$_POST['pais'];
            $rol=$_POST['rol'];
            
            $usuario= new Usuario();
            $usuario->setId($id);
            $usuario->setUser($user);
            $usuario->setName($nombre);
            $usuario->setEmail($email);
            $usuario->setTipoDocumento($tipoDocumento);
            $usuario->setCc($cc);
            $usuario->setNacimiento($nacimiento);
            $usuario->setTelefono($telefono);
            $usuario->setCelular($celular);
            $usuario->setDireccion($direccion);
            $usuario->setCiudad($ciudad);
            $usuario->setProvincia($provincia);
            $usuario->setPais($pais);
            $usuario->setRol($rol); 
            $result[]=$usuario->update();
            if($result[0]->error==""){
                header("location:?controller=Respuestas&action=editExito");
            }else{
                header("location:?controller=Respuestas&action=errorGeneral");
            }
            
        }
    }
    public function updatePago(){
        
            $id=$_POST['id'];
            $documento=$_POST['documen'];
            
            $usuario= new Usuario();
            $result=$usuario->updatePagoGral("pagos", "documento='".$documento."'", $id);
            header("location:?controller=Respuestas&action=editExito");
           
            
        
    }
    public function deletePago(){
        if(isset($_GET['id'])){
            $id=(int)$_GET['id'];
            $usuario=new Usuario();
            $result=$usuario->deleteByIdTable($id, 'pagos');
            header("location:?controller=Respuestas&action=registroDelete");
        }
    }
    public function resetPass(){
        if($_GET['email']){
            $usuario = new Usuario();
            $pass=$usuario->gPass();
            $usuario->setId($_GET['id']);
            $usuario->setPassword($pass['passmd5']);
            $change=$usuario->changePass();
            $email=$_GET['email'];
            $password=$pass['pass'];
            require_once 'config/headers.php';
            require_once 'config/cuerposMails.php';
            $datos= array(
                "destinatario"=>"$email",
                "asunto"=>"Reseteo de password",
                "cuerpo"=>"$cuerpo",
                "headers"=>"$headers"
            );
            $envio=$usuario->envioMail($datos);

            header("location:?controller=Respuestas&action=resetExito");
            
        }
    }
    
    public function  showPass(){
        $this->view("formChangePass", array());
    }

    public function cambiopass(){
        if(isset($_POST['id'])){
            $id=(int)$_POST['id'];
            $pass=$_POST['password'];
            $usuario=new Usuario();
            $usuario->setId($id);
            $usuario->setPassword(md5($pass));
            $usuario->changePass();
            header("location:?controller=Respuestas&action=resetExito");
        }
    }
    public function borrar(){
        if(isset($_GET['id'])){
            $id=(int)$_GET['id'];
            $usuario=new Usuario();
            $usuario->deleteById($id);
            header("location:?controller=Respuestas&action=registroDelete");
        }
    }
}