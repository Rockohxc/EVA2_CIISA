<?php

class Controlador
{

    private $lista;

    public function __construct()
    {
        $this->lista = [];
    }


// SELECT id, pregunta, respuesta, activo FROM pregunta_frecuente;
    public function getAll()
    {
        $con = new Conexion();
        $sql = "SELECT id, pregunta, respuesta, activo FROM pregunta_frecuente;";
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

// INSERT INTO pregunta_frecuente (id, pregunta, respuesta, activo) VALUES (0, 'PREGUNTA', 'RESPUESTA', true);
    public function postNuevo($_newObject)
    {
        $con = new Conexion();
        $id = count($this->getAll()) + 1;
        echo "insersión de datos (POST)";
        $sql = "INSERT INTO pregunta_frecuente (id, pregunta, respuesta activo) VALUES ($id,'$_newObject->pregunta', '$_newObject->respuesta',true)";
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

    public function patchEncenderApagar($_id, $_accion)
    {
        $con = new Conexion();
        $sql = "UPDATE pregunta_frecuente SET activo = $_accion WHERE id = $_id;";
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


    
// UPDATE pregunta_frecuente SET pregunta = 'Nueva pregunta', respuesta = 'Nueva respuesta' WHERE id = 0;

    public function putPreguntaById($_pregunta, $_id)
    {
        $con = new Conexion();
        $sql = "UPDATE pregunta_frecuente SET pregunta = '$_pregunta' WHERE id = $_id;";
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
 

    public function putRespuestaById($_respuesta, $_id)
    {
        $con = new Conexion();
        $sql = "UPDATE pregunta_frecuente SET respuesta = '$_respuesta' WHERE id = $_id;";
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
        $sql = "DELETE FROM pregunta_frecuente WHERE id = $_id;";
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