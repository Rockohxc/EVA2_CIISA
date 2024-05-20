<?php

class Controlador
{

    private $lista;

    public function __construct()
    {
        $this->lista = [];
    }


// SELECT id, historia_id, imagen_id FROM historia_imagen;
    public function getAll()
    {
        $con = new Conexion();
        $sql = "SELECT id, historia_id, imagen_id FROM historia_imagen;";
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

// INSERT INTO historia_imagen (id, historia_id, imagen_id) VALUES (0, 0, 0);
    public function postNuevo($_newObject)
    {
        $con = new Conexion();
        $id = count($this->getAll()) + 1;
        echo "insersión de datos (POST)";
        $sql = "INSERT INTO historia_imagen (id, historia_id, imagen_id) VALUES ($id,'$_newObject->historia_id', '$_newObject->imagen_id')";
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

    /* no requiere de esta función, ya que no tiene campo booleano activable

    // UPDATE historia_imagen SET activo = false WHERE id = 0;
    // UPDATE historia_imagen SET activo = true WHERE id = 0;
    // encender - apagar

    public function patchEncenderApagar($_id, $_accion)
    {
        $con = new Conexion();
        $sql = "UPDATE historia_imagen SET activo = $_accion WHERE id = $_id;";
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
    */

    
// UPDATE historia_imagen SET historia_id = 'Nuevo id', imagen_id = 'Nuevo id' WHERE id = 0;


    public function putHistoriaIdById($_historia_id, $_id)
    {
        $con = new Conexion();
        $sql = "UPDATE historia_imagen SET historia_id = '$_historia_id' WHERE id = $_id;";
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
 

    public function putImagenIdById($_imagen_id, $_id)
    {
        $con = new Conexion();
        $sql = "UPDATE historia_imagen SET imagen_id = '$_imagen_id' WHERE id = $_id;";
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
        $sql = "DELETE FROM historia_imagen WHERE id = $_id;";
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