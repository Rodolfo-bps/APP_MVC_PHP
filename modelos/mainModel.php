<?php

if ($peticionAjax) {
    require_once "../config/SERVER.php";
} else {
    require_once "./config/SERVER.php";
}

class mainModel
{
    protected static function conectar()
    {
        $conexion = new PDO(SGBD, USER, PASS);
        $conexion->exec("SET CHARACTER SET utf8");
        return $conexion;
    }

    /*Ejecutar funciones simples */
    protected static function ejecutar_consulta_simple($consulta)
    {
        $sql = self::conectar()->prepare($consulta);
        $sql->execute();
        return $sql;
    }

    /*Encriptar cadenas*/
    public function encryption($string)
    {
        $output = FALSE;
        $key = hash('sha256', SECRET_KEY);
        $iv = substr(hash('sha256', SECRET_IV), 0, 16);
        $output = openssl_encrypt($string, METHOD, $key, 0, $iv);
        $output = base64_encode($output);
        return $output;
    }

    /*desencriptar cadenas*/
    protected static function decryption($string)
    {
        $key = hash('sha256', SECRET_KEY);
        $iv = substr(hash('sha256', SECRET_IV), 0, 16);
        $output = openssl_decrypt(base64_decode($string), METHOD, $key, 0, $iv);
        return $output;
    }

    /*funcion para generar codigos aleatorios */
    protected static function generar_codigo_aleatorio($letra, $longitud, $numero)
    {
        for ($i = 1; $i <= $longitud; $i++) {
            $aleatorio = rand(0, 9);
            $letra .= $aleatorio;
        }
        return $letra . "-" . $numero;
    }

    //evitar inyeciones sql
    protected static function limpiar_cadena($cadena)
    {
        $cadena = trim($cadena); //elimina los espacios en blanco al principio y al final
        $cadena = stripslashes($cadena); // elimina las barras invertijas "/\"
        $cadena = str_ireplace("<script>", "", $cadena);
        $cadena = str_ireplace("</script>", "", $cadena);
        $cadena = str_ireplace("<script src", "", $cadena);
        $cadena = str_ireplace("<script type=", "", $cadena);
        $cadena = str_ireplace("SELECT * FROM", "", $cadena);
        $cadena = str_ireplace("DELETE FROM", "", $cadena);
        $cadena = str_ireplace("INSERT INTO", "", $cadena);
        $cadena = str_ireplace("DROP TABLE", "", $cadena);
        $cadena = str_ireplace("DROP DATABASE", "", $cadena);
        $cadena = str_ireplace("TRUNCATE TABLE", "", $cadena);
        $cadena = str_ireplace("SHOW TABLES", "", $cadena);
        $cadena = str_ireplace("SHOW DATABASES", "", $cadena);
        $cadena = str_ireplace("<?php", "", $cadena);
        $cadena = str_ireplace("?>", "", $cadena);
        $cadena = str_ireplace("--", "", $cadena);
        $cadena = str_ireplace(">", "", $cadena);
        $cadena = str_ireplace("<", "", $cadena);
        $cadena = str_ireplace("[", "", $cadena);
        $cadena = str_ireplace("]", "", $cadena);
        $cadena = str_ireplace("^", "", $cadena);
        $cadena = str_ireplace("==", "", $cadena);
        $cadena = str_ireplace(";", "", $cadena);
        $cadena = str_ireplace("::", "", $cadena);
        $cadena = stripslashes($cadena);
        $cadena = trim($cadena);
        return $cadena;
    }

    //FUNCION PARA VERIFICAR DATOS DE ENTRADA
    protected static function verificar_datos($filtro, $cadena)
    {
        if (preg_match("/^" . $filtro . "$/", $cadena)) {
            return false;
        } else {
            return true;
        }
    }

    //funcion para verificar fechas
    protected static function verificar_fecha($fecha)
    {
        $valores = explode('-', $fecha);
        if (count($valores) == 3 && checkdate($valores[1], $valores[2], $valores[0])) {
            return false;
        } else {
            return true;
        }
    }

    /*funcion para paginar tablas */

    protected static function paginador_tablas($pagina, $Npaginas, $url, $botones)
    {
        $tabla = '<nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">';

        if ($pagina == 1) {
            $tabla .=
                '<li class="page-item disabled">
               <a class="page-link"><i class="fa-solid fa-angles-left"></i></a>
            </li>';
        } else {
            $tabla .=
                '<li class="page-item">
                <a class="page-link" href="' . $url . '1/"><i class="fa-solid fa-angles-left"></i></a>
            </li>
            <li class="page-item">
                <a class="page-link" href="' . $url . ($pagina - 1) . '/">Anterior</a>
            </li>
            
            ';
        }

        //saber el numero de iteraciones 
        $ci = 0;
        for ($i = $pagina; $i <= $Npaginas; $i++) {
            if ($ci >= $botones) {
                break;
            }
            if ($pagina == $i) {
                $tabla .= '<li class="page-item active"><a class="page-link" href="' . $url . $i . '/">'.$i.'</a></li>';
            } else {
                $tabla .= '<li class="page-item"><a class="page-link" href="' . $url . $i . '/">'.$i.'</a></li>';
            }
            $ci++;
        }

        if ($pagina == $Npaginas) {
            $tabla .=
                '<li class="page-item disabled">
               <a class="page-link"><i class="fa-solid fa-angles-right"></i></a>
            </li>';
        } else {
            $tabla .=
                '
                <li class="page-item">
                <a class="page-link" href="' . $url . ($pagina + 1) . '/">Anterior</a>
                </li>
                <li class="page-item">
                <a class="page-link" href="' . $url . $Npaginas . '1/"><i class="fa-solid fa-angles-right"></i></a>
            </li>
            ';
        }
        $tabla .= '</ul>
        </nav>';
        return $tabla;
    }
}
