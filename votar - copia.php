<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Votación</title>


<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/estilo.css" rel="stylesheet">


</head>


<style>

body{


background-image: url(img/voto.png?a1saS);


background-size: 100%;


}
	
.contenedor{

border-color: black;
border:20px;
margin-top: 20px;
margin: 50px auto;
border-radius: 10px;
margin-right: 25%;
margin-left: 25%;
width: 50%;
height: 550px;




}

.contenedor:hover{

transition: .8s;
background-color:rgba(0,0,0 ,.2);
box-shadow:inset;
   

}



</style>

<body>

    

<?php
      require_once("conexion.php");
	error_reporting(E_ALL ^ E_NOTICE);

	 session_start();

 if (isset($_POST["alumno"])) {
    $alumno=$_POST["alumno"];
}




if (isset($_POST["boton"])) {
    $boton=$_POST["boton"];
	switch ($boton) {
		case "Ingresar":
		if (empty($alumno) ) {
			$vacio="si";
			break;
		}

		
	    $sql="SELECT * FROM alumnos WHERE cedula_alumno = '$alumno' AND voto = '0'";
	    $resultado=mysqli_query ($cx,$sql);
	    $datos=mysqli_fetch_array($resultado);
	    $alu=$datos["cedula_alumno"];
                $nombre=$datos["nombre"];
	  $voto=$datos["voto"];


		if ($alumno==$alu) {
			$_SESSION["nombre"]=$datos["nombre"];
            $_SESSION["carrera"]=$datos["carrera"];
            $_SESSION["cedula_alumno"]=$datos["cedula_alumno"];
            	$_SESSION["permiso"]="Acceso Permitido";
	
		?>
			<script>
	
			window.location="menu2.php";
			</script>

		<?php
			//header("location: principal.php"); 
		}else {
		   $acceso="denegado";
		}
		break;
        
	}
}



?>
<div class="contenedor">
<div class="container-fluid">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
     <legend><strong><h1 class="text-center"><font color="white" size="6"face='impact' >Encuesta Radical</font></h1></strong></legend>
    
    </div>
  </div>



	<center>
 <div class="center-block col-md-8 col-xs-8">
<form action="votar.php" role="form" method="post">
  <div class="form-group">
    <label for="alumno"><font color="white">NUMERO DE DNI (SIN PUNTOS)</font></label>
	
    <input type="text" name="alumno" class="form-control" id="alumno"
           placeholder="Numero de Documento">
  </div>

   <input type ="submit" class="btn btn-primary" name="boton" Value="Ingresar">
							 <input type ="submit"  class="btn btn-danger" name="boton" Value="Cancelar">
							 
</form>
<br>
<br>

<label for="alumno"><font size="4" color="white">los resultados seran publciados en 5 dias en la web</font></label>
</table>
</form>

<script src="js/jquery-1.11.3.min.js"></script>

<script src="js/bootstrap.js"></script>



</body>
</html>
<br>
<br>
<center><a href="admin.php"><button class="btn btn-warning">Administracion</button></a></center>