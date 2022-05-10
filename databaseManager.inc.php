<?php
    $servidor = "localhost";
    $baseDatos = "proyecto_integrado";
    $usuario = "root";
    $passw = "root";

    function insertaPeticion($nombre, $email, $mensaje)

    {
        global $servidor, $baseDatos, $usuario, $passw;
        try {
            $con = new PDO("mysql:host=$servidor;dbname=$baseDatos", $usuario, $passw);
            $sql = $con->prepare("INSERT into peticiones values(null,:nombre,:email,:mensaje)");
           
            $sql->bindParam(":nombre", $nombre);
           
            $sql->bindParam(":email", $email);
            $sql->bindParam(":mensaje", $mensaje);
       
            $sql->execute();
            $id_peticion = $con->lastInsertId();
        } catch (PDOException $e) {
            echo $e;
        }
        $con = null;
        return $id_peticion;
    }

    function obtenerIncidencias(){
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

        function obtenerPeticion(){
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

        function eliminarPeticion($id){
            global $servidor, $baseDatos, $usuario, $passw;
            $retorno=false;
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

        function insertarUsuarioRegistrado($nombre, $password, $rol, $mail, $validacionEmail, $notificacionEmail){
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
     
        

    /*
   ;
    
       $contraseña= password_hash("12345", PASSWORD_DEFAULT);
        updatePassword("ramon_299", $contraseña);

    */

?>