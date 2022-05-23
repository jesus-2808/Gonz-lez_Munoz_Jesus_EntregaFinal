<?php
$servidor = "localhost";
$baseDatos = "proyecto_integrado";
$usuario = "root";
$passw = "root";

function insertaPeticion($nombre, $email, $pass, $mensaje)

{
    global $servidor, $baseDatos, $usuario, $passw;
    try {
        $con = new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $passw);
        $sql = $con->prepare("INSERT into peticiones values(null,:nombre,:email,:password,:mensaje)");

        $sql->bindParam(":nombre", $nombre);
        $sql->bindParam(":email", $email);
        $sql->bindParam(":password", $pass);
        $sql->bindParam(":mensaje", $mensaje);

        $sql->execute();
        $id_peticion = $con->lastInsertId();
    } catch (PDOException $e) {
        echo $e;
    }
    $con = null;
    return $id_peticion;
}

function obtenerIncidencias()
{
    global $servidor, $baseDatos, $usuario, $passw;
    try {
        $con = new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $passw);
        $sql = $con->prepare("SELECT * from incidencias;");
        $sql->execute();
        $miArray = [];
        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
            $miArray[] = $row;
        }
    } catch (PDOException $e) {
        echo $e;
    }
    $con = null;
    return $miArray;
}

function getUser($nombre)
{
    global $servidor, $baseDatos, $usuario, $passw;
    try {
        $conexion = new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $passw);

        $sql = $conexion->prepare("SELECT * from usuarios where nombre=?");
        $sql->bindParam(1, $nombre);
        $sql->execute();
        $fila = $sql->fetch(PDO::FETCH_ASSOC);
        var_dump($fila);
        $conexion = null;
        return $fila;
    } catch (PDOException $e) {
        echo $e;
        echo "ha fallao";
    }
}



function updatePassword($nombre, $password)
{
    $retorno = false;
    global $servidor, $baseDatos, $usuario, $passw;
    try {

        $con = new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $passw);
        $sql = $con->prepare("UPDATE usuarios SET password=:password WHERE nombre=:nombre");
        $sql->bindParam(":password", $password);
        $sql->bindParam(":nombre", $nombre);
        $e = $sql->execute();
        echo $e;
        if ($sql->rowCount() > 0) {
            $retorno = true;
        }
    } catch (PDOException $e) {
        echo $e;
    }
    $conexion = null;
    return $retorno;
}

function obtenerPeticiones()
{
    global $servidor, $baseDatos, $usuario, $passw;
    try {
        $con = new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $passw);
        $sql = $con->prepare("SELECT * from peticiones;");
        $sql->execute();
        $miArray = [];
        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
            $miArray[] = $row;
        }
    } catch (PDOException $e) {
        echo $e;
    }
    $con = null;
    return $miArray;
}

function obtenerPeticion($id)
{
    global $servidor, $baseDatos, $usuario, $passw;
    try {
        $conexion = new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $passw);
        $sql = $conexion->prepare("SELECT * from peticiones where id=:id");

        $sql->bindParam(":id", $id);
        $sql->execute();

        return $sql->fetch();
    } catch (PDOException $e) {
        echo "Connection fallida: " . $e->getMessage();
        echo "<br>";
    }
    $conexion = null;
}

function eliminarPeticion($id)
{
    global $servidor, $baseDatos, $usuario, $passw;
    $retorno = false;
    try {
        $con = new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $passw);
        $sql = $con->prepare("DELETE from peticiones where id=:id");
        $sql->bindParam(":id", $id);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $retorno = true;
        }
    } catch (\Throwable $th) {
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $retorno = true;
        }
    }
    $con = null;
    return $retorno;
}

function insertarUsuarioRegistrado($nombre, $password, $rol, $mail, $validacionEmail, $notificacionEmail)
{
    global $servidor, $baseDatos, $usuario, $passw;
    try {
        $con = new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $passw);
        $sql = $con->prepare("INSERT into usuarios values(null,:nombre,:password,:rol,:mail,:validacionEmail,:notificacionEmail)");
        $sql->bindParam(":nombre", $nombre);
        $sql->bindParam(":password", $password);
        $sql->bindParam(":rol", $rol);
        $sql->bindParam(":mail", $mail);
        $sql->bindParam(":validacionEmail", $validacionEmail);
        $sql->bindParam(":notificacionEmail", $notificacionEmail);
        $sql->execute();
        $id = $con->lastInsertId();
    } catch (PDOException $e) {
        echo $e;
    }
    $con = null;
    return $id;
}

function insertaIncidencia($id_usuario, $titulo, $id_aula, $fecha_creacion, $fecha_modificacion, $fecha_cierre, $estado, $propuestaCierre)

{
    global $servidor, $baseDatos, $usuario, $passw;
    try {
        $con = new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $passw);
        $sql = $con->prepare("INSERT into incidencias values(null,:id_usuario, :titulo,:id_aula,:fecha_creacion,:fecha_modificacion,:fecha_cierre,:estado, :propuestaCierre)");

        $sql->bindParam(":id_usuario", $id_usuario);
        $sql->bindParam(":titulo", $titulo);
        $sql->bindParam(":id_aula", $id_aula);
        $sql->bindParam(":fecha_creacion", $fecha_creacion);
        $sql->bindParam(":fecha_modificacion", $fecha_modificacion);
        $sql->bindParam(":fecha_cierre", $fecha_cierre);
        $sql->bindParam(":estado", $estado);
        $sql->bindParam(":propuestaCierre", $propuestaCierre);

        $sql->execute();
        $id_incidencia = $con->lastInsertId();
    } catch (PDOException $e) {
        echo $e;
    }
    $con = null;
    return $id_incidencia;
}

function obtenerAula($id)
{
    global $servidor, $baseDatos, $usuario, $passw;
    try {
        $conexion = new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $passw);
        $sql = $conexion->prepare("SELECT numeroAula from aula where id_aula=:id_aula");

        $sql->bindParam(":id_aula", $id);
        $sql->execute();

        return $sql->fetch();
    } catch (PDOException $e) {
        echo $e;
    }
    $conexion = null;
}


function obtenerIncidencia($id)
{
    global $servidor, $baseDatos, $usuario, $passw;
    try {
        $conexion = new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $passw);
        $sql = $conexion->prepare("SELECT * from incidencias where id=:id");

        $sql->bindParam(":id", $id);
        $sql->execute();

        return $sql->fetch();
    } catch (PDOException $e) {
        echo "Connection fallida: " . $e->getMessage();
        echo "<br>";
    }
    $conexion = null;
}

function obtenerAulas()
{
    global $servidor, $baseDatos, $usuario, $passw;
    try {
        $con = new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $passw);
        $sql = $con->prepare("SELECT * from aula;");
        $sql->execute();
        $miArray = [];
        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
            $miArray[] = $row;
        }
    } catch (PDOException $e) {
        echo $e;
    }
    $con = null;
    return $miArray;
}

function insertaComentario($contenido, $id_incidencia, $fecha_modificacion, $id_usuario){

      global $servidor, $baseDatos, $usuario, $passw;
      try {
        $con = new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $passw);
        $sql = $con->prepare("INSERT into comentarios values (null, :contenido, :id_incidencia, :fecha_modificacion, :id_usuario)");
        $sql->bindParam(":contenido", $contenido);
        $sql->bindParam(":id_incidencia", $id_incidencia);
        $sql->bindParam(":fecha_modificacion", $fecha_modificacion);
        $sql->bindParam(":id_usuario", $id_usuario);
        $sql->execute();
        $id_comentario = $con->lastInsertId();
    } catch (PDOException $e) {
        echo $e;
    }
    $con = null;
    return $id_comentario;

}

function obtenerIncidenciaxUsuario($id_usuario)
{
    global $servidor, $baseDatos, $usuario, $passw;
    try {
       
        $con = new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $passw);
        $sql = $con->prepare("SELECT * from incidencias where id_usuario=:id_usuario");

        $sql->bindParam(":id_usuario", $id_usuario);
        $sql->execute();
        $miArray = [];
        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
            $miArray[] = $row;
        }
    } catch (PDOException $e) {
        echo $e;
    }
    $con = null;
    return $miArray;
}

function editarComentario($id, $contenido, $id_incidencia, $fecha_modificacion, $id_usuario)
{
    $retorno = false;
    try {
        $con = new PDO("mysql:host=" . $GLOBALS['servidor'] . ";dbname=" . $GLOBALS['baseDatos'], $GLOBALS['usuario'], $GLOBALS['passw']);
        $sql = $con->prepare("UPDATE comentarios  set contenido=:contenido , id_incidencia=:id_incidencia, fecha_modificacion=:fecha_modificacion, id_usuario=:id_usuario where id=:id;");
        $sql->bindParam(":id", $id);
        $sql->bindParam(":contenido", $contenido);
        $sql->bindParam(":id_incidencia", $id_incidencia);
        $sql->bindParam(":fecha_modificacion", $fecha_modificacion);
        $sql->bindParam(":id_usuario", $id_usuario);
       
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $retorno = true;
        }
    } catch (PDOException $e) {
        echo $e;
    }
    $con = null;
    return $retorno;
}

function obtenerComentarioxIncidencia($id_incidencia){
    global $servidor, $baseDatos, $usuario, $passw;
    try {
        $conexion = new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $passw);
        $sql = $conexion->prepare("SELECT * from comentarios where id_incidencia=:id_incidencia");

        $sql->bindParam(":id_incidencia", $id_incidencia);
        $sql->execute();

        $miArray = [];
        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
            $miArray[] = $row;
        }
    } catch (PDOException $e) {
        echo "Connection fallida: " . $e->getMessage();
        echo "<br>";
    }
    $conexion = null;
    return $miArray;
}


function obtenerFecha($id_usuario)
{
    global $servidor, $baseDatos, $usuario, $passw;
    try {
        $conexion = new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $passw);
        $sql = $conexion->prepare("SELECT distinct fecha_creacion from incidencias where id_usuario=:id_usuario");
        $sql->bindParam(":id_usuario", $id_usuario);
        $sql->execute();
        $arrayPos = [];
        while ($fila = $sql->fetch(PDO::FETCH_ASSOC)) {
            $arrayPos[] = $fila;
        }
     
    } catch (PDOException $e) {
        echo "Connection fallida: " . $e->getMessage();
        echo "<br>";
    }
    $conexion = null;
    return $arrayPos;
}

function obtenerIncidenciaxFecha($fecha_creacion, $id_usuario){
    global $servidor, $baseDatos, $usuario, $passw;

    try {
        $conexion = new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $passw);
        $sql = $conexion->prepare("SELECT * from incidencias where fecha_creacion=:fecha_creacion AND id_usuario=:id_usuario");

        $sql->bindParam(":fecha_creacion", $fecha_creacion);
        $sql->bindParam(":id_usuario", $id_usuario);
        $sql->execute();

        $miArray = [];
        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
            $miArray[] = $row;
        }
    } catch (PDOException $e) {
        echo "conexion fallida: " . $e->getMessage();
    }
    $conexion = null;
    return $miArray;
}

function solicitudCierre($propuestaCierre,$id){
    global $servidor, $baseDatos, $usuario, $passw;
    $retorno=false;
    try {
        $conexion = new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $passw);
        $sql = $conexion->prepare("UPDATE incidencias SET propuestaCierre =:propuestaCierre WHERE id=:id;");
        $sql->bindParam(":propuestaCierre", $propuestaCierre);
        $sql->bindParam(":id", $id);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $retorno = true;
        }

    } catch (PDOException $e) {
        echo "conexion fallida: " . $e->getMessage();
    }
    $conexion = null;
    return $retorno;
}

function obtenerIncidenciaPdteCierre(){
    global $servidor, $baseDatos, $usuario, $passw;

    try {
        $conexion = new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $passw);
        $sql = $conexion->prepare("SELECT * from incidencias  WHERE propuestaCierre=1 and estado NOT LIKE '%resuelto%'");

        
        $sql->execute();

        $miArray = [];
        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
            $miArray[] = $row;
        }
    } catch (PDOException $e) {
        echo "conexion fallida: " . $e->getMessage();
    }
    $conexion = null;
    return $miArray;
}

function cambiarEstado($fecha_cierre,$estado,$id){

    global $servidor, $baseDatos, $usuario, $passw;
    $retorno=false;
    try {
        $conexion = new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $passw);
        $sql = $conexion->prepare("UPDATE incidencias SET fecha_cierre=:fecha_cierre, estado =:estado  WHERE id=:id;");
        $sql->bindParam(":fecha_cierre", $fecha_cierre);
        $sql->bindParam(":estado", $estado);
        $sql->bindParam(":id", $id);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $retorno = true;
        }

    } catch (PDOException $e) {
        echo "conexion fallida: " . $e->getMessage();
    }
    $conexion = null;
    return $retorno;

}

function obtenerUsuarios()
{
    global $servidor, $baseDatos, $usuario, $passw;
    try {
        $con = new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $passw);
        $sql = $con->prepare("SELECT * from usuarios where rol NOT LIKE '%administrador%';");
        $sql->execute();
        $miArray = [];
        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
            $miArray[] = $row;
        }
    } catch (PDOException $e) {
        echo $e;
    }
    $con = null;
    return $miArray;
}

function eliminarUsuario($id){
    global $servidor, $baseDatos, $usuario, $passw;
    $retorno = false;
    try {
        $con = new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $passw);
        $sql = $con->prepare("DELETE from usuarios where id=:id");
        $sql->bindParam(":id", $id);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $retorno = true;
        }
    } catch (\Throwable $th) {
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $retorno = true;
        }
    }
    $con = null;
    return $retorno;
}

function obtenerUsuarioxId($id){
    global $servidor, $baseDatos, $usuario, $passw;

    try {
        $conexion = new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $passw);
        $sql = $conexion->prepare("SELECT * from usuarios where id=:id");

       
        $sql->bindParam(":id", $id);
        $sql->execute();

        $miArray = [];
        while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
            $miArray[] = $row;
        }
    } catch (PDOException $e) {
        echo "conexion fallida: " . $e->getMessage();
    }
    $conexion = null;
    return $miArray;
}

function modificarUsuario($id, $nombre,$rol, $mail, $validacionEmail){
    $retorno = false;
    
    global $servidor, $baseDatos, $usuario, $passw;
    try {
        $con=new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $passw);
        $sql = $con->prepare("UPDATE usuarios  set nombre=:nombre , rol=:rol, mail=:mail, validacionEmail=:validacionEmail where id=:id;");
        $sql->bindParam(":id", $id);
        $sql->bindParam(":nombre", $nombre);
        $sql->bindParam(":rol", $rol);
        $sql->bindParam(":mail", $mail);
        $sql->bindParam(":validacionEmail", $validacionEmail);
       
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $retorno = true;
        }
    } catch (PDOException $e) {
        echo $e;
    }
    $con = null;
    return $retorno;
}



function getUserxId($id)
{
    global $servidor, $baseDatos, $usuario, $passw;
    try {
        $conexion = new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $passw);

        $sql = $conexion->prepare("SELECT * from usuarios where id=:id");
        $sql->bindParam(":id", $id);
        $sql->execute();
        $fila = $sql->fetch(PDO::FETCH_ASSOC);
        $conexion = null;
        return $fila;
    } catch (PDOException $e) {
        echo $e;
        echo "ha fallao";
    }

}

function modificarIncidencia($id, $id_usuario, $titulo, $id_aula, $fecha_modificacion, $estado){
    $retorno = false;
    
    global $servidor, $baseDatos, $usuario, $passw;
    try {
        $con=new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $passw);
        $sql = $con->prepare("UPDATE incidencias  set id_usuario=:id_usuario , titulo=:titulo, id_aula=:id_aula, fecha_modificacion=:fecha_modificacion, estado=:estado where id=:id;");
        $sql->bindParam(":id", $id);
        $sql->bindParam(":id_usuario", $id_usuario);
        $sql->bindParam(":titulo", $titulo);
        $sql->bindParam(":id_aula", $id_aula);
        $sql->bindParam(":fecha_modificacion", $fecha_modificacion);
        $sql->bindParam(":estado", $estado);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $retorno = true;
        }
    } catch (PDOException $e) {
        echo $e;
    }
    $con = null;
    return $retorno;
}


    /*
   ;
    
       $contraseña= password_hash("12345", PASSWORD_DEFAULT);
        updatePassword("ramon_299", $contraseña);

    */
