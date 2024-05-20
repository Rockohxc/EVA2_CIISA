<?php

class Controlador
{

    private $lista;

    public function __construct()
    {
        $this->lista = [];
    }


    // SELECT id, nombre, texto, activo FROM mantenimiento_info;

    public function getAll()
    {
        $con = new Conexion();
        $sql = "SELECT id, texto, activo FROM equipo;";
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

// INSERT INTO mantenimiento_info (id, nombre, texto, activo) VALUES (0, 'NOMBRE', 'TEXTO', true);
    public function postNuevo($_newObject)
    {
        $con = new Conexion();
        $id = count($this->getAll()) + 1;
        echo "insersión de datos (POST)";
        $sql = "INSERT INTO mantenimiento_info (id, nombre, texto, activo) VALUES ($id,'$_newObject->nombre', '$_newObject->texto',true)";
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

// UPDATE mantenimiento_info SET activo = true WHERE id = 0;
// UPDATE mantenimiento_info SET activo = false WHERE id = 0;
// Encender - Apagar

    public function patchEncenderApagar($_id, $_accion)
    {
        $con = new Conexion();
        $sql = "UPDATE mantenimiento_info SET activo = $_accion WHERE id = $_id;";
        echo $sql;
        echo "elemento en estado true a false";
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


    // UPDATE mantenimiento_info SET nombre = 'Nuevo nombre', texto = 'Nuevo texto' WHERE id = 0;


    public function putNombreById($_nombre, $_id)
    {
        $con = new Conexion();
        $sql = "UPDATE mantenimiento_info SET nombre = '$_nombre' WHERE id = $_id;";
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

    public function putimagenById($_imagen, $_id)
    {
        $con = new Conexion();
        $sql = "UPDATE mantenimiento_info SET imagen = '$_imagen' WHERE id = $_id;";
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
        $sql = "UPDATE mantenimiento_info SET texto = '$_texto' WHERE id = $_id;";
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


// DELETE FROM mantenimiento_info WHERE id = 0;

    public function deleteById($_id)
    {
        $con = new Conexion();
        $sql = "DELETE FROM mantenimiento_info WHERE id = $_id;";
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