<?php

class Controlador
{

    private $lista;

    public function __construct()
    {
        $this->lista = [];
    }


// SELECT id, historia_id, imagen_id FROM equipo_imagen;
    public function getAll()
    {
        $con = new Conexion();
        $sql = "SELECT id, historia_id, imagen_id FROM equipo_imagen;";
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

// INSERT INTO equipo_imagen (id, historia_id, imagen_id) VALUES (0, 0, 0);
    public function postNuevo($_newObject)
    {
        $con = new Conexion();
        $id = count($this->getAll()) + 1;
        echo "insersión de datos (POST)";
        $sql = "INSERT INTO equipo_imagen (id, equipo_id, imagen_id) VALUES ($id,'$_newObject->equipo_id', '$_newObject->imagen_id')";
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

    /* no requiere de esta función porque no tiene campo booleano activable

    // UPDATE categoria_servicio SET activo = false WHERE id = 0;
    // UPDATE categoria_servicio SET activo = true WHERE id = 0;

    public function patchEncenderApagar($_id, $_accion)
    {
        $con = new Conexion();
        $sql = "UPDATE 2categoria_servicio SET activo = $_accion WHERE id = $_id;";
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

    
// UPDATE equipo_imagen SET historia_id = 'Nuevo id', imagen_id = 'Nuevo id' WHERE id = 0;


    public function putEquipoIdById($_equipo_id, $_id)
    {
        $con = new Conexion();
        $sql = "UPDATE equipo_imagen SET equipo_id = '$_equipo_id' WHERE id = $_id;";
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
        $sql = "UPDATE equipo_imagen SET imagen_id = '$_imagen_id' WHERE id = $_id;";
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
        $sql = "DELETE FROM equipo_imagen WHERE id = $_id;";
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