<!-------------------- Ejercicio 7 ------------------------------------>
<!doctype html>
<html lang="es">
<head>
    <title>Tipo de Vivienda</title>
    <meta charset="utf-8" />
</head>
<body>
 <?php
    if (isset($_REQUEST['enviar'])) {
        
?>        
<!--<H1>Resultados del formulario</H1>

<H2>Resultado de la inserción de la vivienda</H2> -->
             
 <?php
 //Obtener datos
    $tipoVivienda = $_REQUEST['tipoVivienda'];
    $zona = $_REQUEST['zona'];
    $direccion = $_REQUEST['direccion'];
    $numDorm = $_REQUEST['numDorm'];
    $precio = $_REQUEST['precio'];
    $tamanyo = $_REQUEST['tamanyo'];
    $extras = $_REQUEST['extras'];
    //$foto = $_REQUEST['foto'];
    $foto = "-";
    $observaciones = $_REQUEST['observaciones'];
    
  //errores
    $errores = "";
    $error = [];
    if (trim($tipoVivienda) == "") { $errores = $errores."Falta tipo vivienda\n";}
    if (trim($zona) == "") { $errores = $errores."Falta zona\n";}
    if (trim($direccion) == "") { $errores = $errores."Falta direccion\n";}
    if (trim($numDorm) == "") { $errores = $errores."Falta num de Dormitorio\n";}
    if (trim($precio) == "") { $errores = $errores."Falta precio\n";}
    if (trim($tamanyo) == "") { $errores = $errores."Falta tamaño\n";}
    if (trim($extras) == "") { $errores = $errores."Falta extras\n";}
   // if (trim($foto) == "") { $errores = $errores."Falta foto\n";}
    if (trim($observaciones) == "") { $errores = $errores."Falta observaciones\n";}
    
    if (trim($tipoVivienda) == "") { $error[0] = "Falta tipo vivienda\n";}
    if (trim($zona) == "") { $error[1]= "Falta zona\n";}
    if (trim($direccion) == "") { $error[2] = "Falta direccion\n";}
    if (trim($numDorm) == "") { $error[3] = "Falta num de Dormitorio\n";}
    if (trim($precio) == "") { $error[4] = "Falta precio\n";}
    if (trim($tamanyo) == "") { $errores[5] = "Falta tamaño\n";}
    if (trim($extras) == "") { $errores[6] = "Falta extras\n";}
    if (trim($observaciones) == "") { $error[7] = "Falta observaciones\n";}
    
    //Subir fichero
    $copiarFichero = false;
    
   // Copiar fichero en directorio de ficheros subidos
   // Se renombra para evitar que sobreescriba un fichero existente
   // Para garantizar la unicidad del nombre se añade una marca de tiempo
      if (is_uploaded_file ($_FILES['foto']['tmp_name']))
      {
         $nombreDirectorio = "img/";
         $nombreFichero = $_FILES['foto']['name'];
         $copiarFichero = true;

      // Si ya existe un fichero con el mismo nombre, renombrarlo
         $nombreCompleto = $nombreDirectorio . $nombreFichero;
         if (is_file($nombreCompleto)){
            $idUnico = time();
            $nombreFichero = $idUnico . "-" . $nombreFichero;
         }
      }
   // El fichero introducido supera el límite de tamaño permitido
      else if ($_FILES['foto']['error'] == UPLOAD_ERR_FORM_SIZE){
      	//$maxsize = $_REQUEST['MAX_FILE_SIZE'];
         $errores = $errores . "   <LI>El tamaño del fichero supera el límite permitido ($maxsize bytes)\n";
      }
   // No se ha introducido ningún fichero
      else if ($_FILES['foto']['name'] == "") {
          $nombreFichero = '';
   // El fichero introducido no se ha podido subir
    }else{ 
        $errores = $errores . "   <LI>No se ha podido subir el fichero\n";
        
    }
      
   // Mostrar errores encontrados
      /*if ($errores != "")
      {
         print ("<P>No se ha podido realizar la inserción debido a los siguientes errores:</P>\n");
         print ("<UL>\n");
         print ($errores);
         print ("</UL>\n");
         print ("<P>[ <A HREF='javascript:history.back()'>Volver</A> ]</P>\n");
      }
      else
      {
      // Aquí vendrá la inserción de la noticia en la Base de Datos
          print("<p>La vivienda ha sido correctamente introducida</p>");
          print("<li>$tipoVivienda</li>");
          print("<li>$zona</li>");
          print("<li>$direccion</li>");
          print("<li>$numDorm</li>");
          print("<li>$precio</li>");
          print("<li>$tamanyo</li>");
          print("<li>$extras</li>");
          print("<li>$observaciones</li>");
           
      // Mover fichero de imagen a su ubicación definitiva
         if ($copiarFichero) {
            move_uploaded_file ($_FILES['foto']['tmp_name'], $nombreDirectorio . $nombreFichero); 
         }
      // Mostrar datos introducidos
         
         if ($copiarFichero){
            print ("   <LI>Foto: <A TARGET='_blank' HREF='" . $nombreDirectorio . $nombreFichero . "'>" . $nombreFichero . "</A>\n");
         }else{
            print ("   <LI>Foto: (no hay)\n");
         }
         print ("<P>[ <A HREF='formularioVivienda2.php'>Insertar otra vivienda</A> ]</P>\n");
      }*/
    
    //} else {
?>
     
    <h1>Inserción de vivienda</h1>
    <hr />
    
 <form method="post" name="formulario" action="formularioVivienda2.php" enctype="multipart/form-data">
     <table>
         <tr><td>Tipo de vivienda:</td>
             <td><select name="tipoVivienda">
                     <option selected>Piso</option>
                     <option>Casa</option></select>
             </td></tr>
         <tr><td>Zona:</td><td><select name="zona">
                     <option selected>Residencial</option>
                     <option>Centro</option>
                 </select></td></tr>
         <tr><td>Dirección:</td><td><input type="text" name="direccion" /></td></tr>
         <?php if (isset($_REQUEST['enviar'])&&($error[2]!=="")) { echo "<tr><td colspan='2'>$error[2]</td></tr>"; } ?>
         <tr><td>Número de dormitorios </td>
             <td><input type="radio" name="numDorm" value="1" />1
             <input type="radio" name="numDorm" value="2" />2
             <input type="radio" name="numDorm" value="3" />3
             <input type="radio" name="numDorm" value="4" />4
             <input type="radio" name="numDorm" value="5" />5</td></tr>
         <tr><td>Precio</td><td><input type="text" name="precio" /> €</td></tr>
         <tr><td>Tamaño</td><td><input type="text" name="tamanyo" />metro cuadrados</td></tr>
         <tr><td>Extras</td>
             <td><input type="checkbox" name="extras" value="piscina" />Piscina
             <input type="checkbox" name="extras" value="jardin" />Jardín
             <input type="checkbox" name="extras" value="garage" />Garage</td></tr>
         <tr><td>Foto</td><td><input type="file" name="foto" /></td></tr>
         <tr><td>Observaciones</td>
             <td><textarea name="observaciones">Indicar observaciones...</textarea></td></tr>
         <tr><td><input type="submit" name="enviar" value="Enviar formulario" /></td><td></td></tr>     
     </table>
</form>
        
       
<?php
    }
?>        
</body>
</html>


