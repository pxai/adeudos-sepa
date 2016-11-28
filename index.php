<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="content-language" content="es-es" />
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Adeudos SEPA - ISO20022</title>
</head>
<body>
<form enctype="multipart/form-data"  method="post"  action="index.php">
<input type="hidden" name="MAX_FILE_SIZE" value="4445000" />
<input type="file" name="ficheroeduca" value="" />
<input type="submit" name="cargar" value="Carga Fichero" />
</form>

<?php

    if ($_POST["cargar"] == "Carga Fichero") {

        $alum = array();

        $fileid = "ficheroeduca";

        echo "Informacion del fichero <br />";
        echo "<table><tr><td>Nombre</td><td>" . $_FILES[$fileid]['name'] . "</td></tr>";
        echo "<tr><td>Tipo</td><td>" . $_FILES[$fileid]['type'] . "</td></tr>";
        echo "<tr><td>Tama&ntilde;o</td><td>" . $_FILES[$fileid]['size'] . " bytes</td></tr>";
        echo "<tr><td>(Nombre temporal: </td><td>" . $_FILES[$fileid]['tmp_name'] . ")</td></tr>";
        echo "</table>";

        // Comprobamos la validez del nombre del fichero
        if (!preg_match("/csv$/", strtolower($_FILES[$fileid]['name']))) {
            echo "<span style='color:red'>Fichero incorrecto!</span> <br />";
            echo "<a href='cuentasdominio.php'>Volver</a>";
            exit;
        }
        //echo "OK <a href='/?".$cifrador->encrypt('ap_actualizar_alumnos&ac=salvareduca')."' > APLICAR CAMBIOS </a>";
        echo "<hr />Salida del programa <br /><br /><span style='font-size: smaller'>";
        echo "Formato de CSV esperado: nombre;cuenta;concepto;cantidad";

        $newfile = $_FILES[$fileid]['tmp_name'];

        $lines = file($newfile);

        include_once 'Parser.php';
        $parser = new Parser();
        print_r($lines);

        echo $parser->process($lines);


    }



?>
</body>
</html>
