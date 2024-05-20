<?php

class Controlador
{

    private $lista;

    public function __construct()
    {
        $this->lista = [];
    }


// SELECT id, nombre, imagen, texto, activo FROM categoria_servicio;    
    public function getAll()
    {
        $con = new Conexion();
        $sql = "SELECT id, nombre, imagen, texto, activo FROM categoria_servicio;";
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

// INSERT INTO categoria_servicio (id, nombre, imagen, texto, activo) VALUES (0, 'NOMBRE', 'URL IMAGEN', 'TEXTO', true);
    public function postNuevo($_newObject)
    {
        $con = new Conexion();
        $id = count($this->getAll()) + 1;
        echo "insersión de datos (POST)";
        $sql = "INSERT INTO categoria_servicio (id, nombre, imagen, texto, activo) VALUES ($id,'$_newObject->nombre', '$_newObject->imagen','$_newObject->texto',true)";
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

    // UPDATE categoria_servicio SET activo = false WHERE id = 0;
    // UPDATE categoria_servicio SET activo = true WHERE id = 0;
    // encender - apagar

    public function patchEncenderApagar($_id, $_accion)
    {
        $con = new Conexion();
        $sql = "UPDATE categoria_servicio SET activo = $_accion WHERE id = $_id;";
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


    
// UPDATE categoria_servicio SET nombre = 'Nuevo nombre', imagen = 'Nueva url imagen', texto = 'Nuevo texto' WHERE id = 0;


    public function putNombreById($_nombre, $_id)
    {
        $con = new Conexion();
        $sql = "UPDATE categoria_servicio SET nombre = '$_nombre' WHERE id = $_id;";
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
        $sql = "UPDATE categoria_servicio SET imagen = '$_imagen' WHERE id = $_id;";
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
        $sql = "UPDATE categoria_servicio SET texto = '$_texto' WHERE id = $_id;";
        echo "modificación de tabla ya existente por ID y texto/ ";
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
        $sql = "DELETE FROM categoria_servicio WHERE id = $_id;";
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