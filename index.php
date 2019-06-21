
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta charset="utf-8" />
	<link href="css/bootstrap.min.css" rel="stylesheet" />
	<link href="css/style.css" rel="stylesheet" />
	<title>CEMON</title>
</head>
<body>
	<header>
		<div class="navbar navbar-default navbar-static-top ">
<div class="navbar navbar-default navbar-static-top">
	<div class="container">
		<div class="navbar-header" style="
  
    margin-bottom: 10px;
">
			<a class="navbar-brand" href="index.php"><p>CEMON</p></a>
		</div>



	</div>
</div>

	</header>

<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="marco">
				<div class="Contenido">
		<center><?php
		  echo  date("d") ." del " . date("m") . " de " . date("Y") .".<br>";
		?></center>

		<?php 

			echo "Seleccione el mes y año que desea monitorear: <br><br>"; 
		?>
		<form action="index.php" method="POST">
		<center><select name="mes">
		        <?php
		        for ($i=1; $i<=12; $i++) {
		            if ($i == date('m'))
		                echo '<option value="'.$i.'" selected>'.$i.'</option>';
		            else
		                echo '<option value="'.$i.'">'.$i.'</option>';
		        }
	        ?>
			</select>

		<select name="ano">
	        <?php
		        for($i=date('o'); $i>=1910; $i--){
		            if ($i == date('o'))
		                echo '<option value="'.$i.'" selected>'.$i.'</option>';
		            else
		                echo '<option value="'.$i.'">'.$i.'</option>';
	        	}
	        ?>
		</select>
	</center>
		

			<p><br>Los servicios a monitorear seran los siguientes:</p>
			<p>* Hardware servidor<br>* Base de Datos<br>* Aplicación<br>* Enlace Internet <br>* Router Internet</p>

		<center><input type="submit" name="monitorear" value="Monitorear"></center><br>
		<?php
			if (isset($_POST['monitorear'])) {

   				$date=$_POST['mes'] .'-'.$_POST['ano'];

   				echo '<center><strong>Fecha consultada: '.$date.'</strong></center><br>';
				require_once('lib/nusoap.php');
				// This is your Web service server WSDL URL address
				//-------------------server1-------------------------				
				$wsdl = "https://cemon1.herokuapp.com/servidores/server1.php?wsdl";
				$name1='Hardware Servidor';
				// Create client object
				$client = new nusoap_client($wsdl, 'wsdl');
				$err = $client->getError();
				if ($err) {
				   // Display the error
				   echo '<h2>Constructor error</h2>' . $err;
				   // At this point, you know the call that follows will fail
				   exit();
				}

				// Call the Monitorear method
				$result1=$client->call('Monitorear', array('name'=>$name1,'date'=>$date));
				$Nombre1=$result1["return"];
				$Dis1=$result1["Disponibilidad"];


				//-------------------server2-------------------------				
				$wsdl = "https://cemon1.herokuapp.com/servidores/server2.php?wsdl";
				$name2='Base de Datos';
				// Create client object
				$client = new nusoap_client($wsdl, 'wsdl');
				$err = $client->getError();
				if ($err) {
				   // Display the error
				   echo '<h2>Constructor error</h2>' . $err;
				   // At this point, you know the call that follows will fail
				   exit();
				}

				// Call the Monitorear method
				$result1=$client->call('Monitorear', array('name'=>$name2,'date'=>$date));
				$Nombre2=$result1["return"];
				$Dis2=$result1["Disponibilidad"];


				//-------------------server3-------------------------				
				$wsdl = "https://cemon1.herokuapp.com/servidores/server3.php?wsdl";
				$name3='Aplicación';
				// Create client object
				$client = new nusoap_client($wsdl, 'wsdl');
				$err = $client->getError();
				if ($err) {
				   // Display the error
				   echo '<h2>Constructor error</h2>' . $err;
				   // At this point, you know the call that follows will fail
				   exit();
				}

				// Call the Monitorear method
				$result1=$client->call('Monitorear', array('name'=>$name3,'date'=>$date));
				$Nombre3=$result1["return"];
				$Dis3=$result1["Disponibilidad"];



				//-------------------server4-------------------------				
				$wsdl = "https://cemon1.herokuapp.com/servidores/server4.php?wsdl";
				$name4='Aplicación';
				// Create client object
				$client = new nusoap_client($wsdl, 'wsdl');
				$err = $client->getError();
				if ($err) {
				   // Display the error
				   echo '<h2>Constructor error</h2>' . $err;
				   // At this point, you know the call that follows will fail
				   exit();
				}

				// Call the Monitorear method
				$result1=$client->call('Monitorear', array('name'=>$name4,'date'=>$date));
				$Nombre4=$result1["return"];
				$Dis4=$result1["Disponibilidad"];

				//-------------------server5-------------------------				
				$wsdl = "https://cemon1.herokuapp.com/servidores/server5.php?wsdl";
				$name5='Router Internet';
				// Create client object
				$client = new nusoap_client($wsdl, 'wsdl');
				$err = $client->getError();
				if ($err) {
				   // Display the error
				   echo '<h2>Constructor error</h2>' . $err;
				   // At this point, you know the call that follows will fail
				   exit();
				}

				// Call the Monitorear method
				$result1=$client->call('Monitorear', array('name'=>$name5,'date'=>$date));
				$Nombre5=$result1["return"];
				$Dis5=$result1["Disponibilidad"];

				
					echo"<center><table>
					<tr>
			<th style=width:150px;padding-bottom: 10px;>Servicio  </th>
			<th style=padding-bottom:10px>Disponibilidad   </th>
		</tr>
		<tr>
			<td> ".$Nombre1." </td>
			<td>" .$Dis1."</td>
		</tr>
		<tr>
			<td> ".$Nombre2."</td>
			<td>".$Dis2."</td>
		</tr>
		<tr>
			<td>" .$Nombre3."</td>
			<td>" .$Dis3."</td>
		</tr>
		<tr>
			<td>".$Nombre4. "</td>
			<td>".$Dis4."</td>
		</tr>
		<tr>
			<td>".$Nombre5."</td>
			<td>" .$Dis5. "</td>
		</tr>
		</table></center>";
			
				$DispTotal=$Dis1*$Dis2*$Dis3*$Dis4*$Dis5;
				echo '<br><br><center><strong>Disponibilidad:'.$DispTotal.'<strong></center>';
				







				}


		?>

			
	</form>

</div>
</div>
</div>
</div>
	</div>



</body>
</html>
