
<?php
session_start();

include ("../include/connect.php");
     if(!isset($_SESSION["did"])){
       header("location:../index.php");
     }
	 else{
	
	   $check_did = $_SESSION["did"];
		if($check_did !=2){
			 header("location:../index.php");
		}
	}
	
$msg ="";
if((isset($_POST["detainId"])) && (isset($_POST["year"]))){
	$id = $_POST["detainId"];
	$year = $_POST["year"];
	
	  //checking whether student is present in the database or not according to year wise
  if($year == "I-I"){
	//CHECKING IN FIRST YEAR FIRST SEMISTER DATABASE FOR THE STUDENTS
	$sql = mysqli_query($connect, "SELECT * FROM s1 WHERE id = '$id'");
	if($sql){
		//INDICATES THAT STUDENT IS PRESENT SO DETAINING THE STUDENT
		$det = mysqli_query($connect, "UPDATE s1 SET detained = '0' WHERE id = '$id'AND detained = '1' ");
		if($det){
				$msg = "<font color=\"green\">Exitosamente sin resolver</font>";
		}
	}else{
		$msg = "<font color=\"red\">Lo siento estudiante no presente en la lista</font>";
	}
  }
// NOW CHECKING 1-2 
  else if($year == "I-II"){
	//CHECKING IN FIRST YEAR SECOND SEMISTER DATABASE FOR THE STUDENTS
	$sql = mysqli_query($connect, "SELECT * FROM s2 WHERE id = '$id'");
	if($sql){
		//INDICATES THAT STUDENT IS PRESENT SO DETAINING THE STUDENT
		$det = mysqli_query($connect, "UPDATE s2 SET detained = '0' WHERE id = '$id' AND detained = '1' ");
		if($det){
			$msg = "<font color=\"green\">Exitosamente sin resolver</font>";
		}
	}else{
		$msg = "<font color=\"red\">Lo siento estudiante no presente en la lista</font>";
	}
  }
// NOW CHECKING 2-1 
  else if($year == "II-I"){
	//CHECKING IN SECOND YEAR FIRST SEMISTER DATABASE FOR THE STUDENTS
	$sql = mysqli_query($connect, "SELECT * FROM s3 WHERE id = '$id'");
	if($sql){
		//INDICATES THAT STUDENT IS PRESENT SO DETAINING THE STUDENT
		$det = mysqli_query($connect, "UPDATE s3 SET detained = '0' WHERE id = '$id' AND detained = '1' ");
		if($det){
			$msg = "<font color=\"green\">Exitosamente sin resolver</font>";
		}
	}else{
		$msg = "<font color=\"red\">Lo siento estudiante no presente en la lista</font>";
	}
  }
 // NOW CHECKING 2-2 
  else if($year == "II-II"){
	//CHECKING IN SECOND YEAR SECOND SEMISTER DATABASE FOR THE STUDENTS
	$sql = mysqli_query($connect, "SELECT * FROM s4 WHERE id = '$id'");
	if($sql){
		//INDICATES THAT STUDENT IS PRESENT SO DETAINING THE STUDENT
		$det = mysqli_query($connect, "UPDATE s4 SET detained = '0' WHERE id = '$id' AND detained = '1' ");
		if($det){
			$msg = "<font color=\"green\">Successfully UnDetained</font>";
		}
	}else{
		$msg = "<font color=\"red\">Lo siento estudiante no presente en la lista</font>";
	}
  }
  // NOW CHECKING 3-1 
  else if($year == "III-I"){
	//CHECKING IN THIRD YEAR FIRST SEMISTER DATABASE FOR THE STUDENTS
	$sql = mysqli_query($connect, "SELECT * FROM s5 WHERE id = '$id'");
	if($sql){
		//INDICATES THAT STUDENT IS PRESENT SO DETAINING THE STUDENT
		$det = mysqli_query($connect, "UPDATE s5 SET detained = '0' WHERE id = '$id' AND detained = '1'");
		if($det){
			$msg = "<font color=\"green\">Exitosamente sin resolver</font>";
		}
	}else{
		$msg = "<font color=\"red\">Lo siento estudiante no presente en la lista</font>";
	}
  }
   // NOW CHECKING 3-2 
  else if($year == "III-II"){
	//CHECKING IN THIRD YEAR SECOND SEMISTER DATABASE FOR THE STUDENTS
	$sql = mysqli_query($connect, "SELECT * FROM s6 WHERE id = '$id'");
	if($sql){
		//INDICATES THAT STUDENT IS PRESENT SO DETAINING THE STUDENT
		$det = mysqli_query($connect, "UPDATE s6 SET detained = '0' WHERE id = '$id' AND detained = '1' ");
		if($det){
			$msg = "<font color=\"green\">Exitosamente sin resolver</font>";
		}
	}else{
		$msg = "<font color=\"red\">Lo siento estudiante no presente en la lista</font>";
	}
  }
    // NOW CHECKING 4-1 
  else if($year == "IV-I"){
	//CHECKING IN THIRD YEAR SECOND SEMISTER DATABASE FOR THE STUDENTS
	$sql = mysqli_query($connect, "SELECT * FROM s7 WHERE id = '$id'");
	if($sql){
		//INDICATES THAT STUDENT IS PRESENT SO DETAINING THE STUDENT
		$det = mysqli_query($connect, "UPDATE s7 SET detained = '0' WHERE id = '$id' AND detained = '1' ");
		if($det){
			$msg = "<font color=\"green\">Exitosamente sin resolver</font>";
		}
	}else{
		$msg = "<font color=\"red\">Lo siento estudiante no presente en la lista</font>";
	}
  }
     // NOW CHECKING 4-2 
  else if($year == "IV-II"){
	//CHECKING IN THIRD YEAR SECOND SEMISTER DATABASE FOR THE STUDENTS
	$sql = mysqli_query($connect, "SELECT * FROM s8 WHERE id = '$id'");
	if($sql){
		//INDICATES THAT STUDENT IS PRESENT SO DETAINING THE STUDENT
		$det = mysqli_query($connect, "UPDATE s8 SET detained = '0' WHERE id = '$id' AND detained = '1' ");
		if($det){
			$msg = "<font color=\"green\">Exitosamente sin resolver</font>";
		}
	}else{
		$msg = "<font color=\"red\">Lo siento estudiante no presente en la lista</font>";
	}
  }
  else{
	$msg = "<font color=\"red\">Verifique la ID de REG correctamente</font>";
  }
  
  



} 


?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="../css/style.css"/>
		<title>
			
		</title>
	</head>
	<body>
		<div class="container" align="center">
			<div class="head pull-left">
				<h2 class="pull-left">EPCC<small>&nbsp;&nbsp;Universidad Nacional de San Agustin</small></h2>
			</div>
			<hr class="horline" width="100%" /> 
			<div><?php include("../include/hodmenu.txt");?></div>
			<br/>
			<div class="promote">
			<form method="post" action="undetain.php" name="regupdate">
			<table class="table table-bordered table-hover" width="400px">
			<caption align="center"><h3>Deshacer estudiantes </h3></caption>
			<tbody>
					<th class="danger" colspan="2">Eliminar Detain				
				</th>
				<tr>
					<td class="active">	
						<input type="text" class="form-control" placeholder="REG ID" name="detainId"/>
						</select>
					</td>
					<td class="active"> 	
						<select name="year" class="form-control">
					
					<option>-- SELECCIONAR SEM --</option>
					<option value="I-I">I-I</option>
					<option value="I-II">I-II</option>
					<option value="II-I">II-I</option>
					<option value="II-II">II-II</option>
					<option value="III-I">III-I</option>
					<option value="III-II">III-II</option>
					<option value="IV-I">IV-I</option>
					<option value="IV-II">IV-II</option>
						</select>
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center" class="success">
						<input type="submit" class="btn btn-success" name="submit"	value="UnDetain">	
								<p>Nota: Para promover a los estudiantes<a href="promote.php">haga clic aquí</a></p>	
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center" class="success">
						<?php echo $msg; ?>
					</td>
				</tr>
			</tbody>			
			</table>
			</form>
		 </div>
		</div>
	</body>
</html>