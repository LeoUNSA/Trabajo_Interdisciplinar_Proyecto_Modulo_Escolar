<?php
session_start();
//incluyendo el código para conectar a la base de datos respectiva
include ("include/connect.php");
$id='';
$did='';
if(isset($_SESSION["did"])){
   	$vid = $_SESSION["did"];

		 if($vid==1){
			//go to faculty page
			header("location:faculty/index.php");
		}
		else if($vid==2){
			header("location:hod/index.php");
		}
		else if($vid==3){
			header("location:principal/index.php");
		}
	

}
//declaramos las variables para recoger la información del formulario
$error='';
if(isset($_POST["lid"]) && isset($_POST["lpwd"]) && isset($_POST["design"])){
	$login_id = preg_replace('#[^A-Za-z0-9_\&\*\#\@]#i', '', $_POST["lid"]); // Filtramos todo excepto numeros y letras
	$login_pwd = preg_replace('#[^A-Za-z0-9_\&\*\#\@]#i', '', $_POST["lpwd"]); // Filtramos todo excepto numeros y letras
	$login_design = preg_replace('#[^0-9]#i', '', $_POST["design"]); // Filtramos todo menos las letras
	// echo $login_id,$login_pwd,$login_design;
	//ahora revisamos la base de datos
	 $sql = mysqli_query($connect, "SELECT * FROM user  WHERE userId='$login_id' AND password='$login_pwd' AND did='$login_design' LIMIT 1"); // query the person
      
    if ($sql) { // evaluamos el id
	     while($row = mysqli_fetch_array($sql)){ 
                        $id = $row["id"];
			 $did = $row["did"];
		 }
		 if($did==1){
			//go to faculty page
			$_SESSION["id"] = $id;
			$_SESSION["did"] = $did;
			header("location:faculty/index.php");
		}
		else if($did==2){
			//go to hod
                        $_SESSION["id"] = $id;
						$_SESSION["did"] = $did;
			header("location:hod/index.php");
		}
		else if($did==3){
			//go to principal
                        $_SESSION["id"] = $id;
						$_SESSION["did"] = $did;
			header("location:principal/index.php");
		}
		else{
		     $error="Username or Password Invalid";
	      }

       }


}
?>


<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
		<title>
				UNSA
		</title>
	</head>
	<body>
		<div class="container" align="center">
			<div class="head pull-left">

				<h2 class="pull-left"><small>&nbsp;&nbsp;Universidad Nacional de San Agustin</small></h2>
			</div>
			<hr class="horline" width="100%" />
			<br/>
			<div class="forms" align="center"><br/>
			    <h3>Login EPCC</h3><div class="login_error"><?php echo $error;?></div>
				<form method="post" name="login-form" action="index.php" class="login form-horizental" >
					<div class="form-group">
						<label for="loginId" class="control-label pull-left">CUI</label>
						<input type="text" class="form-control" name="lid" placeholder="Tusolutionweb"/>
						
					</div>
					<div class="form-group">
						<label for="loginpwd" class="control-label pull-left">Contraseña</label>
						<input type="password" class="form-control" name="lpwd" placeholder="******"/>
						
					</div>
					<div class="form-group">
						<label for="loginselect" class="control-label pull-left">Tipo de usuario</label>
						<select class="form-control" name="design">
							<option >--- Seleccionar ---</option>
							<option value="3">ALUMNO</option>
							<option value="2">ADMINISTRADOR</option>
							<option value="1">DOCENTE</option>
						</select>
						
					</div>
					<div class="form-group pull-left">
						<input type="submit" name="submit" class="btn btn-default" value="Sign In"/>
					</div>
				</form>
				<br/><br/><br/>
			</div>
		</div>    <br/><br/> <br/>
	</body>
</html>
