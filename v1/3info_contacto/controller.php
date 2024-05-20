<?php

class Controlador
{

    private $lista;

    public function __construct()
    {
        $this->lista = [];
    }


// SELECT id, nombre, texto, texto_adicional, activo FROM info_contacto;
    public function getAll()
    {
        $con = new Conexion();
        $sql = "SELECT id, nombre, texto, texto_adicional, activo FROM info_contacto;";
        $rs = mysqli_query($con->getConnection(), $sql);
        if ($rs) {
            while ($tupla = mysqli_fetch_assoc($rs)) {
                $tupla['activo'] = $tupla['activo'] == 1 ? true : false;
                array_push($this->lista, $tupla);
            }
            mysqli_free_result($rs);
        }
        $con->closeConnection();
        return $this->lista;
    }

// IINSERT INTO info_contacto (id, nombre, texto, texto_adicional, activo) VALUES (0, 'NOMBRE', 'TEXTO', 'TEXTO ADICIONAL', true);
    public function postNuevo($_newObject)
    {
        $con = new Conexion();
        $id = count($this->getAll()) + 1;
        echo "insersión de datos (POST)";
        $sql = "INSERT INTO info_contacto (id, nombre, texto, texto_adicional, activo) VALUES ($id,'$_newObject->nombre', '$_newObject->imagen','$_newObject->texto',true)";
        $rs = false;
        try {
            $rs = mysqli_query($con->getConnection(), $sql);
        } catch (\Throwable $th) {
            $rs = false;
        }
        echo $sql;
        // cerramos la conexion
        $con->closeConnection();
        // comprobamos la respuesta
        if ($rs) {
            return true;
        }
        return null;
    }

    // UPDATE info_contacto SET activo = false WHERE id = 0;
    // UPDATE info_contacto SET activo = true WHERE id = 0;
    //encender - apagar

    public function patchEncenderApagar($_id, $_accion)
    {
        $con = new Conexion();
        $sql = "UPDATE info_contacto SET activo = $_accion WHERE id = $_id;";
        echo $sql;
        echo "rodrigo: testing... arreglando elemento en estado true a false";
        $rs = false;
        try {
            $rs = mysqli_query($con->getConnection(), $sql);
        } catch (\Throwable $th) {
            $rs = false;
        }
        // cerramos la conexion
        $con->closeConnection();
        // comprobamos la respuesta
        if ($rs) {
            return true;
        }
        return null;
    }


    
//  UPDATE info_contacto SET nombre = 'Nuevo nombre', texto = 'Nuevo texto', texto_adicional = 'Nuevo texto adicional' WHERE id = 0;


    public function putNombreById($_nombre, $_id)
    {
        $con = new Conexion();
        $sql = "UPDATE info_contacto SET nombre = '$_nombre' WHERE id = $_id;";
        // echo $sql;
        $rs = false;
        try {
            $rs = mysqli_query($con->getConnection(), $sql);
        } catch (\Throwable $th) {
            $rs = false;
        }
        // cerramos la conexion
        $con->closeConnection();
        // comprobamos la respuesta
        if ($rs) {
            return true;
        }
        return null;
    }
 

    public function putTextoById($_texto, $_id)
    {
        $con = new Conexion();
        $sql = "UPDATE info_contacto SET texto = '$_texto' WHERE id = $_id;";
        echo "modificación de tabla ya existente por ID / ";
        echo $sql;
        $rs = false;
        try {
            $rs = mysqli_query($con->getConnection(), $sql);
        } catch (\Throwable $th) {
            $rs = false;
        }
        // cerramos la conexion
        $con->closeConnection();
        // comprobamos la respuesta
        if ($rs) {
            return true;
        }
        return null;
    }

    public function putTextoAdicionalById($_texto_adicional, $_id)
    {
        $con = new Conexion();
        $sql = "UPDATE info_contacto SET texto_adicional = '$_texto_adicional' WHERE id = $_id;";
        echo "modificación de tabla ya existente por ID / ";
        echo $sql;
        $rs = false;
        try {
            $rs = mysqli_query($con->getConnection(), $sql);
        } catch (\Throwable $th) {
            $rs = false;
        }
        // cerramos la conexion
        $con->closeConnection();
        // comprobamos la respuesta
        if ($rs) {
            return true;
        }
        return null;
    }


// DELETE FROM categoria_servicio WHERE id = 0;

    public function deleteById($_id)
    {
        $con = new Conexion();
        $sql = "DELETE FROM info_contacto WHERE id = $_id;";
        // echo $sql;
        $rs = false;
        try {
            $rs = mysqli_query($con->getConnection(), $sql);
        } catch (\Throwable $th) {
            $rs = false;
        }
        // cerramos la conexion
        $con->closeConnection();
        // comprobamos la respuesta
        if ($rs) {
            return true;
        }
        return null;
    }
}