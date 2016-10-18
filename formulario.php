<?php
  if($_REQUEST) {
  $login = $_REQUEST['login'];
  $pass = $_REQUEST['pass'];
  $user = "adaw";
  $pas = "adaw";

  if(($login!=$user)||($login==" ")) {
    $error1 = 1;
  }
  if(($login==$user)&&($pass==$pas)) {
    $alx = 1;
  }
  
  if($alx == 1) {
    echo "Envio correcto";
  }
}
?>

<!doctype html>
<html lang="es">
<head>
  <title>Validar formulario</title>
  <meta charset="utf-8" />
</head>
<body>
<form action="formulario.php" method="post">
loguin: <input type="text" name="login" />
<?php if($error==1) {echo "Rellena";} ?>
<br /><br />
pass: <input type="password" name="pass" />
<?php if($alx==1) {echo "Rellena";} ?>
<br /><br />
<input type="submit" />
</form>

</body>
</html>

