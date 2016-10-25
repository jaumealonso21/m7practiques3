<?php
echo "<h1> Inserción de vivienda</h1>";
if(isset($_REQUEST['enviar'])){
    $nombre=$_REQUEST['nombre'];
    $vivienda=$_REQUEST['vivienda'];
    $zona=$_REQUEST['zona'];



if ($nombre==""){
    $error=true;
	$error_nombre="ha de seleccionar el nombre de vivienda";
	}
if ($vivienda==""){
    $error=true;
	$error_vivienda="ha de seleccionar el nombre de vivienda";
	}
if ($zona==""){
    $error=true;
	$error_zona="ha de seleccionar el nombre de vivienda";
	}


}
	
if(!isset($_REQUEST['enviar'])|| isset($error)){
?>
<FORM ACTION="vivienda.php" METHOD="post"
   ENCTYPE="multipart/form-data">

   <p>nombre: 
	   <?php if (isset($error) && isset($error_nombre)){  //si se ha enviado y existe el error_nombre
		 echo "  <input type='text' name='nombre' />";
		 echo "ha de seleccionar el nombre de vivienda";
	   }
	   else
	   if (isset($error)&& !isset($error_nombre))  //si se ha enviado y no existe el error nombre
               //el usuario no tiene que volver a rellenar
	    echo "  <input type='text' name='nombre' value='".$nombre."' />";
		else //otra opcion -- se carga por primera vez el formulario
		 echo "  <input type='text' name='nombre' />";
		?>
   </p> 
   
   <p>Tipo vivienda: <SELECT NAME="vivienda">
   <OPTION VALUE="" >
<OPTION VALUE="piso" >piso
<OPTION VALUE="adosado">adosado
<OPTION VALUE="atico">atico
</SELECT>
<?php if (isset($error) && isset($error_vivienda))
		echo "ha de seleccionar el tipo de vivienda";
		?>


</p>

      <p>Zona vivienda: <SELECT NAME="zona">
      <OPTION VALUE="" >
<OPTION VALUE="centro" >centro
<OPTION VALUE="sur">sur
<OPTION VALUE="norte">norte
</SELECT>
<?php if (isset($error) && isset($error_zona))
		echo "ha de seleccionar la zona de vivienda";
		
		?></p>
   
<INPUT TYPE="submit" NAME="enviar" VALUE="Enviar datos">   
   
   
   
   
</FORM>
<?php
}
else
{
echo "chachi";
echo " el nombre de la vivienda es ". $nombre."<br>";
echo "el tipo de la vivienda es ".$vivienda."<br>";
echo "la zona de la vivienda es ".$zona."<br>";
}
?>


