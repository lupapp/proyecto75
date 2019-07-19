<?php 

class EntidadBase{

	private $table, $db, $conectar, $cerrarS;



	public function __construct($table){

		$this->table=(string) $table;



		require_once "Conectar.php";

		$this->conectar= new Conectar();

		$this->db=$this->conectar->conexion();

	}



	public function getConectar(){

		return $this->conectar;

	}



	public function db(){

		return $this->db;

	}	

        public function cerrar(){

            $con= new Conectar();

            $con->close($this->db);

           return $con;

        }

        

	public function getAll(){

		$query=$this->db->query("SELECT * FROM $this->table ORDER BY id DESC");

		while($row=$query->fetch_object()){

			$resultSet[]=$row;

		}

		return $resultSet;

    }
    public function getPorcentajes($id_plan){
        $resultSet='';
        $query=$this->db->query("SELECT * FROM porcentajes WHERE id_plan='$id_plan'");
        print_r($query);
        while($row=$query->fetch_object()){
                $resultSet[]=$row;
        }
        return $resultSet;
    }

    public function saveUser($user, $name, $pass, $email, $tipodoc, $cc, $fecha, $rol ){
        $query="INSERT INTO users (id, user, name, email, password, tipoDocumento, cc, nacimiento, fechaInscripcion, telefono, celular,"
                ."direccion, ciudad, provincia, pais, rol, avatar, remember_token, created_at, updated_at, tipoUsuario) "
                ."VALUES (NULL, '".$user."', '".$name."', '".$email."', '".$pass."', '".$tipodoc."',"
                ."'".$cc."', '', '".$fecha."', '', '','', '', '', '', '$rol','','','','','')";
        $save=$this->db->query($query);
        return $save;
    }

	public function getPedidos(){

	    $resultSet=array();

        $query=$this->db->query("SELECT * FROM pedidos");

        while($row=$query->fetch_object()){

            $query2=$this->db->query("SELECT * FROM cartillas WHERE id=$row->id_cartilla");

            if($row2=$query2->fetch_object()){

                $cartilla=$row2;

            }else{

                $cartilla='';

            }

            $query2=$this->db->query("SELECT * FROM users WHERE id=$row->id_user");

            if($row2=$query2->fetch_object()){

                $user=$row2;

            }

            $query2=$this->db->query("SELECT * FROM planes WHERE id=$row->id_prod");

            if($row2=$query2->fetch_object()){

                $plan=$row2;

            }



            $resultSet[]=array("pedido"=>$row, "cartilla"=>$cartilla, 'plan'=>$plan, 'user'=>$user);

        }

        return $resultSet;

    }



    public function getPagoByid($id){
        $query=$this->db->query("SELECT * FROM pagos WHERE id=$id");
        while($row=$query->fetch_object()){
            $query2=$this->db->query("SELECT * FROM cartillas WHERE id_user=$row->id_cartilla_paga");
            if($row2=$query2->fetch_object()){
                $cartilla=$row2;
            }else{
                $cartilla=0;
            }
            $query2=$this->db->query("SELECT * FROM users WHERE id=$row->id_user");
            if($row2=$query2->fetch_object()){
                $user=$row2;
            }
            $query2=$this->db->query("SELECT * FROM planes WHERE id=$row->id_plan");
            if($row2=$query2->fetch_object()){
                $plan=$row2;
            }
            $resultSet=array("pago"=>$row, "cartilla"=>$cartilla, 'plan'=>$plan, 'user'=>$user, 'cantidad'=>$cantidad);
        }
        return $resultSet;
    }

    public function getPedidoByid($id){
        $query=$this->db->query("SELECT * FROM pedidos WHERE id=$id");
        while($row=$query->fetch_object()){
            $query2=$this->db->query("SELECT * FROM lineas_pedido WHERE pedido=$row->id");
            while($row2=$query2->fetch_object()){
                $lineas[]=$row2;
            }
            $query2=$this->db->query("SELECT * FROM users WHERE id=$row->id_user");
            if($row2=$query2->fetch_object()){
                $user=$row2;
            }
            
            $resultSet=array("pedido"=>$row, "lineas"=>$lineas, 'user'=>$user);
        }
        return $resultSet;
    }

    public function getAllMembresia(){

        $resultSet=[];

        $query=$this->db->query("SELECT * FROM $this->table WHERE tipo='1' ORDER BY id DESC");

        while($row=$query->fetch_object()){

            $resultSet[]=$row;

        }

        return $resultSet;

    }
    
    public function getAllProductos(){

	    $resultSet=[];

        $query=$this->db->query("SELECT * FROM $this->table WHERE tipo='0' ORDER BY id DESC");

        while($row=$query->fetch_object()){

                $resultSet[]=$row;

        }

        return $resultSet;

    }

        public function getAllByTable($table){
            $resultSet=[];
            $query=$this->db->query("SELECT * FROM $table ORDER BY id DESC");

            while($row=$query->fetch_object()){

                    $resultSet[]=$row;

            }

            return $resultSet;

	}
    public function getAllCategoriasByTable($table){
        $resultSet=[];
        $query=$this->db->query("SELECT * FROM $table ORDER BY posicion DESC");

        while($row=$query->fetch_object()){

                $resultSet[]=$row;

        }

        return $resultSet;

    }
        public function getAllByTableExclu($table, $exclu){

            $query=$this->db->query("SELECT * FROM $table WHERE id NOT IN($exclu) ORDER BY id DESC");

            /*while($row=$query->fetch_object()){

                    $resultSet[]=$row;

            }*/

            return $query;

	}

        public function crearPadres($id_cartilla, $id_padre, $num_padre){

            $query="INSERT INTO padres (id, id_cartilla, id_cartilla_padre, numero_padre) VALUE (NULL, $id_cartilla, $id_padre, $num_padre)";

            $save=$this->db()->query($query);

            return $save;

        }

        public function padres($id_cartilla, $id_padre, $num_padre){

            $this->crearPadres($id_cartilla, $id_padre, $num_padre);

            if($num_padre<5){

                $row= $this->getIdPadreById($id_padre);

                $num_padre++;

                if($row){

                    $this->padres($id_cartilla, $row->id_padre, $num_padre);

                }else{

                    $resp="no hay registros de padre";

                    return $resp;

                }

            }else{

                $resp="llego al limite de 5 padres";

                return $resp;

            }

        }

        public function hijos(){

            $query="INSERT INTO red_hijos (id, id_cartilla, id_user, id_cartilla_hija, posicion, nivel) "

                    ."VALUES (NULL, '".$this->id_cartilla."', '".$this->id_user."', '".$this->id_cartilla_hija."', '".$this->posicion."', '".$this->nivel."')";

            $save=$this->db()->query($query);

            return $this->db();

        }

        public function recursiva($num){

            echo $num;

            if($num<5){

                $num++;

                $this->recursiva($num);

            }else{

                return;

            }

        }

        public function getUsers(){

            $query=$this->db->query("SELECT * FROM users");

            while($row=$query->fetch_object()){

              

                $query2=$this->db->query("SELECT * FROM cartillas WHERE id_user=$row->id");

                if($row2=$query2->fetch_object()){

                    $resultSet[]=array("users"=>$row, "idsCar"=>$row2);

                }else{

                    $resultSet[]=array("users"=>$row);

                }

                    

                

            }

            

            return $resultSet;

        }

        public function getCartilla(){

            $query=$this->db->query("SELECT * FROM cartillas JOIN users ON cartillas.id_user = users.id JOIN planes ON cartillas.id_plan = planes.id ");

            while($row=$query->fetch_object()){

                $query2=$this->db->query("SELECT * FROM cartillas RIGHT JOIN users ON cartillas.id_user = users.id WHERE cartillas.id=$row->id_padre");

                if($row2=$query2->fetch_object()){

                    $padre=$row2;

                }

                $resultSet[]=array("cartilla"=>$row, "padre"=>$padre);

            }

            

            return $resultSet;

        }

        function getValorComision($id_cartilla){

                $total_comisiones=0;

                if($id_cartilla==''){

                    $total_comisiones=0;

                }else{

                    foreach($id_cartilla as $id){

                        $query=$this->db->query("SELECT sum(valor) AS suma FROM comisiones WHERE id_cartilla_R=$id AND estado=1");

                        if($row=$query->fetch_object()){

                            $total_comisiones=$total_comisiones+$row->suma;

                        }

                    }

                }

                return $total_comisiones;

        }

         public function getIdcartillaXIduser($id_user){

            $resul=[];

            $query=$this->db()->query("SELECT * FROM cartillas WHERE id_user=$id_user");

            while($row=$query->fetch_object()){

                $resul[]=$row->id;

            }

            return $resul;

        }



        public function getComisiones($id_user){

            $resultSet[]='';

            $query=$this->db->query("SELECT * FROM cartillas WHERE id_user=$id_user ");

            while($row=$query->fetch_object()){

                $query2=$this->db->query("SELECT sum(valor) AS suma FROM comisiones WHERE id_cartilla_R=$row->id AND estado=1");

                if($row2=$query2->fetch_object()){

                    $total_comisiones=$row2;

                }

                $query2=$this->db->query("SELECT *  FROM planes WHERE id=$row->id_plan");

                if($row2=$query2->fetch_object()){

                    $plan=$row2;

                }

                $query2=$this->db->query("SELECT * FROM cartillas WHERE id=$row->id_padre");

                if($row2=$query2->fetch_object()){

                    $query3=$this->db->query("SELECT * FROM users WHERE id=$row2->id_user");

                    if($row3=$query3->fetch_object()){

                        $patrocinador=$row3;

                    }else{

                        $patrocinador='';

                    }

                }else{

                    $patrocinador='';

                }

                $resultSet[]=array("cartilla"=>$row, "total"=>$total_comisiones, 'plan'=>$plan, 'patrocinador'=>$patrocinador);

            }

            return $resultSet;

        }

        public function getComisionesByidCartilla($id_plan){

            $resultSet[]='';

            $query=$this->db->query("SELECT * FROM comisiones WHERE id_cartilla_R=$id_plan ");

            while($row=$query->fetch_object()){

                $query2=$this->db->query("SELECT * FROM cartillas JOIN users ON cartillas.id_user = users.id JOIN planes ON cartillas.id_plan=planes.id WHERE cartillas.id=$row->id_cartilla_G");

                if($row2=$query2->fetch_object()){

                    $userDatos=$row2;

                }

                

                $resultSet[]=array("comision"=>$row, "userDatos"=>$userDatos);

            }

            return $resultSet;

        }

        public function comisionesTotales($id){

            $query=$this->db->query("SELECT sum(valor) AS suma FROM comisiones WHERE id_cartilla_R=$id AND estado=1 ");

            if($row=$query->fetch_object()){

                $disponible=(float)$row->suma;

            }

            $query=$this->db->query("SELECT sum(valor) AS suma FROM comisiones WHERE id_cartilla_R=$id AND estado=0 ");

            if($row=$query->fetch_object()){

                $cobradas=$row->suma;

            }

            $total=$disponible+$cobradas;

            $totales=array('disponible'=>$disponible, 'cobradas'=>$cobradas, 'total'=>$total);

            return $totales;

        }

        /*public function red($id_user, $nivel){

            $red[]='';

            if($nivel<3){

                $nivel++;

                $i=0;

                $query3=$this->db->query("SELECT *, cartillas.id AS idC FROM cartillas JOIN planes ON cartillas.id_plan=planes.id JOIN users ON cartillas.id_user = users.id WHERE id_padre=$id_user");

                while($row3=$query3->fetch_object()){

                    $red[$i]= [$row3, [$this->red($row3->idC, $nivel)]]; 

                    $i++;

                }

                return $red;

            }

        }*/

        public function red($id_user, $nivel){

            $nivel++;

            if($nivel<6){

                $red=[];

                $query3=$this->db->query("SELECT *, cartillas.id AS idC FROM cartillas JOIN planes ON cartillas.id_plan=planes.id JOIN users ON cartillas.id_user = users.id WHERE id_padre=$id_user ORDER BY posicion ASC");

                $i=0;

                while($row3=$query3->fetch_object()){
                    $red[$i]= 

                        array(

                            'nivel' => $nivel,

                            'avatar_user'=>$row3->avatar_user,

                            'posicion' => $row3->posicion,

                            'id_user' => $row3->id_user,

                            'user'=> $row3->user,

                            'name' => $row3->name,

                            'email' => $row3->email,

                            'cc' => $row3->cc,

                            'nacimiento' => $row3->nacimiento,

                            'direccion' => $row3->direccion,

                            'telefono' => $row3->telefono,

                            'celular' => $row3->celular,

                            'ciudad' => $row3->ciudad,

                            'pais' => $row3->pais,

                            'id_padre' => $row3->id_padre,

                            'posicion1' => $row3->posicion1,

                            'posicion2' => $row3->posicion2,

                            'fecha_creacion' => $row3->fecha_creacion,

                            'nombre_plan' => $row3->nombre_plan,

                            'valor_plan' => $row3->valor_plan,

                            'cant_hijos'=> $row3->cant_hijos,

                            'idC'=>$row3->idC,

                            'hijo'=> ($this->red($row3->idC, $nivel))

                        );

                    $i++;

                }

                

                return $red;

            }

        }

        

        public function getComisionesAndRed($id_user){

            $resultSet[]='';

            $query=$this->db->query("SELECT * FROM cartillas WHERE id_user=$id_user ");

            while($row=$query->fetch_object()){

                $query2=$this->db->query("SELECT sum(valor) AS suma FROM comisiones WHERE id_cartilla_R=$row->id AND estado=1");

                if($row2=$query2->fetch_object()){

                    $total_comisiones=$row2;

                }

                $query2=$this->db->query("SELECT * FROM planes WHERE id=$row->id_plan");

                if($row2=$query2->fetch_object()){

                    $plan=$row2;

                }

                $query2=$this->db->query("SELECT * FROM cartillas WHERE id=$row->id_padre");

                if($row2=$query2->fetch_object()){

                    $query3=$this->db->query("SELECT * FROM users WHERE id=$row2->id_user");

                    if($row3=$query3->fetch_object()){

                        $patrocinador=$row3;

                    }else{

                        $patrocinador='';

                    }

                }else{

                    $patrocinador='';

                }

                $red=$this->red($row->id,0);

                $vigencia=$this->verificarFechaVen($row->fecha_vencimiento);

                $resultSet[]=array("vigencia"=>$vigencia, "cartilla"=>$row, "total"=>$total_comisiones, 'plan'=>$plan, 'red'=>$red, 'patrocinador'=>$patrocinador);

            }

            return $resultSet;

        }

        public function getCartillaExclu($id){

            $resultSet[]='';

            $query=$this->db->query("SELECT *, cartillas.id FROM cartillas JOIN users ON cartillas.id_user = users.id JOIN planes ON cartillas.id_plan = planes.id WHERE id_user NOT IN($id)");

            while($row=$query->fetch_object()){

                $query2=$this->db->query("SELECT * FROM cartillas RIGHT JOIN users ON cartillas.id_user = users.id WHERE cartillas.id=$row->id_padre");

                if($row2=$query2->fetch_object()){

                    $padre=$row2;

                }else{

                    $padre='No tiene padre';

                }

                $membresias=[];

                $query2=$this->db->query("SELECT * FROM planes WHERE valor_plan >= $row->valor_plan AND tipo=1 ORDER BY valor_plan");

                while($row2=$query2->fetch_object()){

                    $membresias[]=$row2;

                }

                

                $resultSet[]=array("cartilla"=>$row, "padre"=>$padre, "selectMembre"=>$membresias);

            }

            return $resultSet;

        }

        public function getPlanesMayorQue($valor){

            $query2=$this->db->query("SELECT * FROM planes WHERE valor_plan > $valor ORDER BY valor_plan");

            while($row2=$query2->fetch_object()){

                $membresias[]=$row2;

            }

            if(isset($membresias)){

                

            }else{

                $membresias=false;

            }

            return $membresias;

        }

        public function getPlanes(){

            $query2=$this->db->query("SELECT * FROM planes WHERE tipo=1 ORDER BY valor_plan ");

            while($row2=$query2->fetch_object()){

                $planes[]=$row2;

            }

            return $planes;

        }



        public function getIdcartillaByIduser($id_user){

            $query=$this->db->query("SELECT id FROM cartillas WHERE id_user=$id_user");

            if($row=$query->fetch_object()){

                $resul=$row;

            }else{

                $resul='';

            }

            return $resul;

        }

        //sacar el id de la cartilla padre con el id de la cartilla

        public function getIdPadreById($id_padre){

            $query=$this->db->query("SELECT id_padre FROM cartillas WHERE id=$id_padre");

            if($row=$query->fetch_object()){

                $resul=$row;

            }else{

               $resul='';

            }

           

            return $resul;

        }

        public function getPlanByidCat($id, $table){

            $query=$this->db->query("SELECT * FROM $table WHERE id=$id");

            if($row=$query->fetch_object()){

                $resul=$row;

            }else{

                $resul=false;

            }

            return $resul;

        }

        public function getIdcartillaById($id_padre){

            $query=$this->db->query("SELECT id FROM cartillas WHERE id=$id_padre");

            if($row=$query->fetch_object()){

                $resul=$row;

            }else{

                $resul=false;

            }

            return $resul;

        }

        public function getUserByCartilla2($id){

            $query=$this->db->query("SELECT * FROM cartillas WHERE id=$id");

            while($row=$query->fetch_object()){

                $query2=$this->db->query("SELECT * FROM users WHERE id=$row->id_user");

                if($row2=$query2->fetch_object()){

                    $result=$row2;

                }

            }

            return $result;

        }

        public function getUserByCartilla($id){

            $query=$this->db->query("SELECT * FROM cartillas WHERE id=$id");

            while($row=$query->fetch_object()){

                $query2=$this->db->query("SELECT * FROM planes WHERE id=$row->id_plan AND tipo=1");

                if($row2=$query2->fetch_object()){

                    $result=$row2;

                }

            }

            $planes=$this->db->query("SELECT * FROM planes WHERE valor_plan>=$result->valor_plan  AND tipo=1 ORDER BY valor_plan");

            while($row3=$planes->fetch_object()){

               $select[]=$row3; 

            }

            return $select;

        }

        public function getPadres($id_cartilla){

            $query=$this->db->query("SELECT * FROM padres WHERE id_cartilla=$id_cartilla");

            while($row=$query->fetch_object()){

                $resultset[]=$row;

            }

            return $resultset;

        }

        public function fromDelete($id_cartilla){

            $solicitudes=0;

            $query=$this->db->query("SELECT * FROM padres WHERE id_cartilla=$id_cartilla");

            while($row=$query->fetch_object()){

                $query2=$this->db->query("SELECT * FROM solicitudes WHERE id_cartilla=$row->id_cartilla_padre");

                while($row2=$query->fetch_object()){

                    $solicitudes++;

                }

            }

            $padres=0;

            $query=$this->db->query("SELECT * FROM cartillas WHERE id_padre=$id_cartilla");

            while($row=$query->fetch_object()){

                $padres++;

            }

            $respuesta=array('solicitudes'=>$solicitudes,'padres'=>$padres);

            return $respuesta;

        }



        public function generarComisiones5($valor, $id_cartilla){
            $fecha=date('Y')."-".date('m')."-".date('j');
            $fecha_creacion=$fecha;
            $padres=$this->getPadres($id_cartilla);
            for($i=0;$i<count($padres);$i++) {
                $query=$this->db->query("SELECT * FROM cartillas WHERE id=".$padres[$i]->id_cartilla_padre);
                if($row=$query->fetch_object()){
                    $vigencia=$this->verificarFechaVen($row->fecha_vencimiento);
                    $query2=$this->db->query("SELECT * FROM planes WHERE id=$row->id_plan");
                    if($row2=$query2->fetch_object()){
                        if($padres[$i]->numero_padre==1){
                            /*if($valor<=$row2->valor_plan){
                                $comision=($valor*(float)$row2->porcentaje_comision)/100;
                            }else{*/
                                $comision=((int)$valor*(float)$row2->porcentaje_comision)/100;
                            //}
                        }else{
                            /*if($valor<=$row2->valor_plan){
                                $comision=($valor*(float)$row2->porcentaje_comision2)/100;
                            }else{*/
                                $comision=((int)$valor*(float)$row2->porcentaje_comision2)/100;
                            //}
                        }
                        //estado_cartilla 1 es la cartilla que esta activa y al dia con el pago, 0 es inactiva.
                        if($vigencia==1){
                            //estado 1 es para las comisiones que son contabilizadas y suman en el total del usuario
                            $estado=1;
                        }else{
                            //estado 2 es para las comisiones que no son contabilizadas
                            $estado=2;
                        }
                        $crearComision=$this->db->query("INSERT INTO comisiones (id, id_cartilla_R, id_cartilla_G, nivel_cartilla_G, fecha, valor, estado, fecha_cobro) VALUE (NULL, $row->id, $id_cartilla, ".$padres[$i]->numero_padre.", '$fecha', $comision, $estado, '')");
                    }
                }
            }
            return;
        }
        public function generarComisiones($valor, $id_cartilla){
            $fecha=date('Y')."-".date('m')."-".date('j');
            $fecha_creacion=$fecha;
            $padres=$this->getPadres($id_cartilla);
            for($i=0;$i<count($padres);$i++) {
                $query=$this->db->query("SELECT * FROM cartillas WHERE id=".$padres[$i]->id_cartilla_padre);
                if($row=$query->fetch_object()){
                    $vigencia=$this->verificarFechaVen($row->fecha_vencimiento);
                    $query2=$this->db->query("SELECT * FROM planes WHERE id=$row->id_plan");
                    if($row2=$query2->fetch_object()){
                        switch($padres[$i]->numero_padre){
                            case 1: $comision=((int)$valor*(float)$row2->porcentaje1)/100;
                            break;
                            case 2: $comision=((int)$valor*(float)$row2->porcentaje2)/100;
                            break;
                            case 3: $comision=((int)$valor*(float)$row2->porcentaje3)/100;
                            break;
                            case 4: $comision=((int)$valor*(float)$row2->porcentaje4)/100;
                            break;
                            case 5: $comision=((int)$valor*(float)$row2->porcentaje5)/100;
                            break;
                        }
                        if($vigencia==1){
                            $estado=1;
                        }else{
                            $estado=2;
                        }
                        $crearComision=$this->db->query("INSERT INTO comisiones (id, id_cartilla_R, id_cartilla_G, nivel_cartilla_G, fecha, valor, estado, fecha_cobro) VALUE (NULL, $row->id, $id_cartilla, ".$padres[$i]->numero_padre.", '$fecha', $comision, $estado, '')");
                    }
                }
            }
            return;
        }
        public function generarComisionesProducto($valor, $id_cartilla, $id_plan){
            $fecha=date('Y')."-".date('m')."-".date('j');
            $fecha_creacion=$fecha;
            $padres=$this->getPadres($id_cartilla);
            $query=$this->db->query("SELECT * FROM planes WHERE id=$id_plan");
            $plan=$query->fetch_object();
            for($i=0;$i<count($padres);$i++) {
                $query=$this->db->query("SELECT * FROM cartillas WHERE id=".$padres[$i]->id_cartilla_padre);
                if($row=$query->fetch_object()){
                    $vigencia=$this->verificarFechaVen($row->fecha_vencimiento);
                    switch($padres[$i]->numero_padre){
                        case 1: $comision=((int)$valor*(float)$plan->porcentaje1)/100;
                        break;
                        case 2: $comision=((int)$valor*(float)$plan->porcentaje2)/100;
                        break;
                        case 3: $comision=((int)$valor*(float)$plan->porcentaje3)/100;
                        break;
                        case 4: $comision=((int)$valor*(float)$plan->porcentaje4)/100;
                        break;
                        case 5: $comision=((int)$valor*(float)$plan->porcentaje5)/100;
                        break;
                    }
                    //estado_cartilla 1 es la cartilla que esta activa y al dia con el pago, 0 es inactiva.
                    if($vigencia==1){
                        //estado 1 es para las comisiones que son contabilizadas y suman en el total del usuario
                        $estado=1;
                    }else{
                        //estado 2 es para las comisiones que no son contabilizadas
                        $estado=2;
                    }
                    $crearComision=$this->db->query("INSERT INTO comisiones (id, id_cartilla_R, id_cartilla_G, nivel_cartilla_G, fecha, valor, estado, fecha_cobro) VALUE (NULL, $row->id, $id_cartilla, ".$padres[$i]->numero_padre.", '$fecha', $comision, $estado, '')");
                }
            }
            return;
        }
        public function getProdByCat($id_cat){
            $resultSet=[];
            $query=$this->db->query("SELECT * FROM planes WHERE categoria=$id_cat AND tipo=0 ORDER BY id DESC");
            while($row=$query->fetch_object()){
                    $resultSet[]=$row;
            }
            return $resultSet;
        }
        public function generarComisionesReferido($valor, $id_cartilla, $referido){

            $fecha=date('Y')."-".date('m')."-".date('j');

            $fecha_creacion=$fecha;

            $padres=$this->getPadres($id_cartilla);

            for($i=0;$i<count($padres);$i++) {

                $query=$this->db->query("SELECT * FROM cartillas WHERE id=".$padres[$i]->id_cartilla_padre."");

                if($row=$query->fetch_object()){

                    $query2=$this->db->query("SELECT * FROM planes WHERE id=$row->id_plan");

                    if($row2=$query2->fetch_object()){

                        if($row->estado_cartilla==1){

                            //estado 1 es para las comisiones que son contabilizadas y suman en el total del usuario

                            $estado=1;

                        }else{

                            //estado 2 es para las comisiones que no son contabilizadas

                            $estado=2;

                        }

                        if($padres[$i]->numero_padre==1){

                            if($valor<=$row2->valor_plan){

                                $comision=($valor*(float)$row2->porcentaje_comision)/100;

                            }else{

                                $comision=((int)$row->valor_plan*(float)$row2->porcentaje_comision)/100;

                            }

                            $crearComision=$this->db->query("INSERT INTO comisiones (id, id_cartilla_R, id_cartilla_G, nivel_cartilla_G, fecha, valor, estado, fecha_cobro) VALUE (NULL, $referido, $id_cartilla, ".$padres[$i]->numero_padre.", '$fecha', $comision, $estado, '')");

                        }else{

                            if($valor<=$row2->valor_plan){

                                $comision=($valor*(float)$row2->porcentaje_comision2)/100;

                            }else{

                                $comision=((int)$row->valor_plan*(float)$row2->porcentaje_comision2)/100;

                            }

                            $crearComision=$this->db->query("INSERT INTO comisiones (id, id_cartilla_R, id_cartilla_G, nivel_cartilla_G, fecha, valor, estado, fecha_cobro) VALUE (NULL, $row->id, $id_cartilla, ".$padres[$i]->numero_padre.", '$fecha', $comision, $estado, '')");

                        }

                        //estado_cartilla 1 es la cartilla que esta activa y al dia con el pago, 0 es inactiva.

                    }

                }

            }

            

            return;

        }



        public function getMinValor($table){
            $resultset='';
            $query=$this->db->query("SELECT * FROM $table WHERE valor_plan=(SELECT min(valor_plan) FROM $table) AND tipo=1");

            if($row=$query->fetch_object()){

                $resultset=$row;

            }

            return $resultset;

        }

        public function getUltimoRegistro($table){

            $query=$this->db->query("SELECT * FROM $table ORDER BY id DESC LIMIT 1");

            if($row=$query->fetch_object()){

                $resultset=$row;

            }

            return $resultset;

        }

        public function getById($id){

            $resultset=[];

            $query=$this->db->query("SELECT * FROM $this->table WHERE id='$id'");

            if($row=$query->fetch_object()){

                        $resultset=$row;

            }

            return $resultset;

	    }



        public function getByIdTable($id, $table){
            $resultset=[];
            $query=$this->db->query("SELECT * FROM $table WHERE id=$id");

            if($row=$query->fetch_object()){

                $resultset[]=$row;

            }

            return $resultset;

	}

        

        public function getCartillaByIduser($id){

            $resultSet[]=array();

            $query=$this->db->query("SELECT * FROM users WHERE id=$id");

            if($row=$query->fetch_object()){

                $resultSet=array('user'=>$row);

            }

            $query=$this->db->query("SELECT *, cartillas.id AS idC FROM cartillas JOIN users ON cartillas.id_user = users.id JOIN planes ON cartillas.id_plan = planes.id WHERE cartillas.id_user=$id");

            while($row=$query->fetch_object()){

                $query2=$this->db->query("SELECT * FROM cartillas RIGHT JOIN users ON cartillas.id_user = users.id WHERE cartillas.id=$row->id_padre");

                if($row2=$query2->fetch_object()){

                    $padre=$row2;

                }else{

                    $padre='No tiene padre';

                }

                $vigencia=$this->verificarFechaVen($row->fecha_vencimiento);

                $resultSet[]=array("cartilla"=>$row, "padre"=>$padre, "vigencia"=>$vigencia, "plan"=>$row);

            }

            return $resultSet;

	    }

        

        public function getAllPagos(){

            $resultSet[]='';

            $query=$this->db->query("SELECT * FROM pagos ORDER BY estado");

            while($row=$query->fetch_object()){

                $query2=$this->db->query("SELECT * FROM users WHERE id=$row->id_user ");

                if($row2=$query2->fetch_object()){

                    $usuario=$row2;

                }

                $query2 = $this->db->query("SELECT *  FROM cartillas  WHERE id=$row->id_cartilla_paga");

                if ($row2 = $query2->fetch_object()) {

                    $cartilla=$row2;

                }else{

                    $cartilla='';

                }

                $query2 = $this->db->query("SELECT *  FROM cartillas JOIN users ON users.id = cartillas.id_user WHERE cartillas.id=$row->id_cartilla_padre");

                if ($row2 = $query2->fetch_object()) {

                    $padre=$row2;

                }else{

                    $padre='';

                }

                $resultSet[] = array('pagos' => $row, 'usuario' => $usuario, 'cartilla'=>$cartilla, 'padre' => $padre);

            }

            return $resultSet;

        }

        public function getHijoPadre($row){

            while($row){

                $query2=$this->db->query("SELECT * FROM users WHERE id=$row->id_user ");

                if($row2=$query2->fetch_object()){

                    $usuario=$row2;

                }

                $query2 = $this->db->query("SELECT *  FROM cartillas  WHERE id=$row->id_cartilla_paga");

                if ($row2 = $query2->fetch_object()) {

                    $cartilla=$row2;

                }

                $query2 = $this->db->query("SELECT *  FROM cartillas JOIN users ON users.id = cartillas.id_user WHERE cartillas.id=$row->id_cartilla_padre");

                if ($row2 = $query2->fetch_object()) {

                    $padre=$row2;

                }else{

                    $padre='';

                }

                $resultSet[] = array('pagos' => $row, 'usuario' => $usuario, 'cartilla'=>$cartilla, 'padre' => $padre);

            }

        }

        public function getAllPagosPen(){

            $resultSet[]='';

            $query=$this->db->query("SELECT * FROM pagos WHERE estado=0");

            while($row=$query->fetch_object()){

                $resultSet[]=$row;

            }

            return $resultSet;

        }

        public function getAllSolicitudes($criterio){

            $resultSet[]='';

            $query=$this->db->query("SELECT * FROM solicitudes $criterio");

            while($row=$query->fetch_object()){

                $query2=$this->db->query("SELECT *  FROM cartillas JOIN users ON users.id = cartillas.id_user WHERE cartillas.id=$row->id_cartilla ");

                if($row2=$query2->fetch_object()){

                    $usuario=$row2;

                    $query3 = $this->db->query("SELECT *  FROM cartillas JOIN users ON users.id = cartillas.id_user WHERE cartillas.id=$row2->id_padre");

                    if ($row3 = $query3->fetch_object()) {

                        $padre=$row3;

                    }else{

                        $padre='';

                    }

                }

                $resultSet[] = array('solicitud' => $row, 'usuario' => $usuario,'padre' => $padre);

            }

            return $resultSet;

        }



        public function getSolicitudes($id_cartilla, $table){

            $resultSet[]='';

            foreach($id_cartilla as $id){

                $query=$this->db->query("SELECT * FROM $table WHERE id_cartilla=$id");

                if($row=$query->fetch_object()){

                    $resultSet[]=$row;

                }

            }

            return $resultSet;

	}

         public function updateComision($id, $table){

            $query=$this->db->query("UPDATE $table SET estado='0' WHERE id='$id'");

            $update=$this->db->query($query);

            return $this->db;

            //return $resultSet;

        }

        public function updateSolicitud($id, $table){

            $fecha=date('Y')."-".date('m')."-".date('d');

            $query=$this->db->query("UPDATE $table SET estado='1', fecha_pago='".$fecha."' WHERE id='$id'");

            $update=$this->db->query($query);

            return $this->db;

            //return $resultSet;

        }

        

        public function updatePago($id, $table){

            $fecha=date('Y')."-".date('m')."-".date('d');

            $query=$this->db->query("UPDATE $table SET estado='1' WHERE id='$id'");

            $update=$this->db->query($query);

            return $this->db;

            //return $resultSet;

        }

        public function updatePagoGral($table, $set, $id){

            $fecha=date('Y')."-".date('m')."-".date('d');

            $query=$this->db->query("UPDATE $table SET $set WHERE id='$id'");

            $update=$this->db->query($query);

            return $this->db;

            //return $resultSet;

        }

        

         public function getLogin($value, $pass){

            $passmd5=md5($pass);

            $query=$this->db->query("SELECT * FROM $this->table WHERE password='$passmd5' AND  (user='$value' OR email='$value')");

            if($row=$query->fetch_object()){

                    return $row;

            }

            //return $resultSet;

        }

	public function getBy($columna, $value){

		$query=$this->db->query("SELECT * FROM $this->table WHERE $columna = '$value'");

		while($row=$query->fetch_object()){

			$resultSet[]=$row;

		}

		return $resultSet;

	}

        public function getByT($columna, $value, $table){

            $resultSet[]='';

            $query=$this->db->query("SELECT * FROM $table WHERE $columna = '$value'");

            while($row=$query->fetch_object()){

                    $resultSet[]=$row;

            }

            return $resultSet;

	}

	public function deleteById($id){

            $query=$this->db->query("DELETE FROM $this->table WHERE id=$id");

            return $query;

	}

        public function deleteByIdTable($id, $table){

            $query=$this->db->query("DELETE FROM $table WHERE id=$id");

            return $query;

	}

        public function     savePago($data, $tipo){

            $query="INSERT INTO pagos (id, id_user, id_cartilla_paga, id_cartilla_padre, id_plan, metodo_pago, fecha_pago, valor, estado, tipo, documento,referido, posicion) "

                    ."VALUES (NULL, '".$data['id_user']."','".$data['id_cartilla_paga']."', '".$data['id_car_padre']."', '".$data['id_plan']."', '".$data['metodo']."',"

                    ."'".$data['inscripcion']."','".$data['valor']."','0', $tipo, '".$data['documento']."','".$data['referido']."', '".$data['cantidad']."')";

            $save=$this->db->query($query);

            return $save;

        }

        public function savePedido($data){

            $query="INSERT INTO pedidos (id, id_user, id_cartilla, id_prod, id_pago, fecha, cantidad , valor, metodo, estado) "

                ."VALUES (NULL, '".$data['id_user']."', '".$data['id_cartilla']."', '".$data['id_prod']."', '".$data['id_pago']."', '".$data['fecha']."', '".$data['cantidad']."', '".$data['total']."',"

                ."'".$data['metodo']."','0')";

            $save=$this->db()->query($query);

            return $this->db();

        }
        public function getPedidoByIdpago($id){
            $query=$this->db->query("SELECT * FROM pedidos WHERE id_pago=$id");
            while($row=$query->fetch_object()){
                $pedido=$row;    
            }
            return $pedido;
        }
        public function getLineasByPedido($id){
            $query2=$this->db->query("SELECT * FROM lineas_pedido WHERE pedido=$id");
            while($row2=$query2->fetch_object()){
                $lineas[]=$row2;
            }
            return $lineas;
        }
        public function saveLineasPedido($data){

            $query="INSERT INTO lineas_pedido (id, pedido, id_plan, id_cartilla, precio, cantidad, total) VALUES (NULL, '".$data['pedido']."', '".$data['id_prod']."', '".$data['id_cartilla']."', '".$data['precio']."', '".$data['cantidad']."', '".$data['total']."')";
            $save=$this->db()->query($query);
            return $this->db();
        }
        public function envioMail($datos){

            mail($datos['destinatario'],$datos['asunto'],$datos['cuerpo'],$datos['headers']);

            $mail=$datos['destinatario']."-".$datos['asunto']."<br>".$datos['cuerpo']."<br>".$datos['headers'];

            return $mail;

        }

        public function emailnoti(){

            $resultSet='';

            $query=$this->db->query("SELECT * FROM 'options' WHERE name='mail_noti'");

            if($row=$query->fetch_object()){

                $resultSet=$row->valor;

            }

            return $resultSet;

        }

        public function fechaVencimiento($fecha,$dias){

            date_default_timezone_set('America/Guayaquil');

            $diasmes=array(31,28,31,30,31,30,31,31,30,31,30,31);

            $biciesto=date('Y')%4;

            if($biciesto==0){

                    $diasmes[1]=29;

            } 

            $mes=date('n');

            $index=$mes-1;
            if($dias===0){
                $dias=$dias+$diasmes[$index];
            }

            $index++;

            $nuevafecha = strtotime ( '+'.$dias.'day' , strtotime ( $fecha ) ) ;

            $nuevafecha = date ( 'Y-m-j' , $nuevafecha );

            return $nuevafecha;

        }

        public function verificarFechaVen($exp_date){

            $todays_date = date("Y-m-d");

            $today = strtotime($todays_date);

            $expiration_date = strtotime($exp_date);

            if ($expiration_date >= $today) {

                    return 1;

            } else {

                    return 0;

            }



        }

        public function getCartillasVen(){

            $query=$this->db->query("SELECT * FROM cartillas");

            $expirados=array();

            $todays_date = date("Y-m-d");$today = strtotime($todays_date);

            while($row=$query->fetch_object()){

                $expiration_date = strtotime($row->fecha_vencimiento);

                if ($expiration_date < $today) {

                    array_push($expirados, $row->id);

                }

            }

            return $expirados;



        }

        public function gPass(){

            $opc_letras = TRUE; //  FALSE para quitar las letras

            $opc_numeros = TRUE; // FALSE para quitar los números

            $opc_letrasMayus = TRUE; // FALSE para quitar las letras mayúsculas

            $opc_especiales = FALSE; // FALSE para quitar los caracteres especiales

            $longitud = 12;

            $password = [];

            $letras ="abcdefghijklmnopqrstuvwxyz";

            $numeros = "1234567890";

            $letrasMayus = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";

            $especiales ="|@#~$%()=^*+[]{}-_";

            $listado = "";

            $pass="";



            if ($opc_letras == TRUE) {

                $listado .= $letras; }

            if ($opc_numeros == TRUE) {

                $listado .= $numeros; }

            if($opc_letrasMayus == TRUE) {

                $listado .= $letrasMayus; }

            if($opc_especiales == TRUE) {

                $listado .= $especiales; }



            str_shuffle($listado);

            for( $i=1; $i<=$longitud; $i++) {

            $password[$i] = $listado[rand(0,strlen($listado)-1)];

            str_shuffle($listado);

            }

            

            foreach ($password as $dato_password) {

                $pass=$pass."".$dato_password;

                //return $dato_password;

            }

            $passmd5=array("passmd5"=>md5($pass),"pass"=>$pass);

            return $passmd5;



        }

       

        public function uploaded($file){

           

            $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890"; 

            $cad = ""; 

            for($i=0;$i<4;$i++) { 

            $cad .= substr($str,rand(0,62),1); 

            } 

            $tamano = $file['size']; // Leemos el tamaño del fichero

            $tamaño_max=2097152; // Tamaño maximo permitido



            if( $tamano < $tamaño_max){ // Comprovamos el tamaño  

                $destino = 'view/img' ; // Carpeta donde se guardata 

                $sep=explode('image/',$file["type"]); // Separamos image/ 
                if(count($sep)>1){
                    $tipo=$sep[1]; // Optenemos el tipo de imagen que es
                }else{
                    return;
                }
                


                if($tipo == "jpeg" || $tipo == "jpg" || $tipo == "png"){ // Si el tipo de imagen a subir es el mismo de los permitidos, segimos. Puedes agregar mas tipos de imagen

                    move_uploaded_file ( $file[ 'tmp_name' ], $destino . '/' .$file[ 'name' ]);  // Subimos el archivo

                }else{

                   header("location:?controller=Respuestas&action=tipoFile");

                }// Si no es el tipo permitido lo desimos }

            }else {

                header("location:?controller=Respuestas&action=sizeFile");// Si supera el tamaño de permitido lo desimos

            }

             

        }

}

?>