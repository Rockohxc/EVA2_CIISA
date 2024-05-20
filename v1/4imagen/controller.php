<?php

class Controlador
{

    private $lista;

    public function __construct()
    {
        $this->lista = [];
    }


// SELECT id, nombre, imagen, activo FROM imagen;
    public function getAll()
    {
        $con = new Conexion();
        $sql = "SELECT id, nombre, imagen,activo FROM imagen;";
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

// INSERT INTO imagen (id, nombre, imagen, activo) VALUES (0, 'NOMBRE', 'URL IMAGEN', true);
    public function postNuevo($_newObject)
    {
        $con = new Conexion();
        $id = count($this->getAll()) + 1;
        echo "insersión de datos (POST)";
        $sql = "INSERT INTO imagen (id, nombre, imagen, texto, activo) VALUES ($id,'$_newObject->nombre', '$_newObject->imagen',true)";
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

    // UPDATE imagen SET activo = false WHERE id = 0;
    // UPDATE imagen SET activo = true WHERE id = 0;
    // encender - apagar

    public function patchEncenderApagar($_id, $_accion)
    {
        $con = new Conexion();
        $sql = "UPDATE imagen SET activo = $_accion WHERE id = $_id;";
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


    
// // UPDATE imagen SET nombre = 'Nuevo nombre', imagen = 'Nueva url imagen' WHERE id = 0;


    public function putNombreById($_nombre, $_id)
    {
        $con = new Conexion();
        $sql = "UPDATE imagen SET nombre = '$_nombre' WHERE id = $_id;";
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
 

    public function putImagenById($_imagen, $_id)
    {
        $con = new Conexion();
        $sql = "UPDATE imagen SET imagen = '$_imagen' WHERE id = $_id;";
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
        $sql = "DELETE FROM imagen WHERE id = $_id;";
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