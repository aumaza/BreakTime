   <html>
    <head>
    <title>Alta Docentes</title>
    <link rel="stylesheet"  type="text/css" media="screen" href="estilo.css" />
    </head>
    <body>
    <div class="container">
    <div class="main">
    <h2>Alta Docentes</h2>
    
    <?php
    
		$dbhost = 'localhost:3036';
		$dbuser = 'root';
		$dbpass = 'slack142';    	
    	$dbase = '/var/lib/mysql/breakTime';
    	$conn = mysql_connect($dbhost, $dbuser, $dbpass, $dbase);
		
		if($conn)
		{
			echo 'Conection Succesfully...';
			
								
		}
		
		else
		{
			echo 'Connection Failure...';		
		}
		
		$sql = "CREATE TABLE docentes(".
		"id INT AUTO_INCREMENT,".
      "nombreApellido VARCHAR(35) NOT NULL,".
      "dni VARCHAR(9) NOT NULL,".
      "fechaNacimiento DATE NOT NULL,".
      "direccion VARCHAR(40) NOT NULL,".
      "localidad VARCHAR(20) NOT NULL,".
      "telefono VARCHAR(10) NOT NULL,".
      "movil VARCHAR(10) NOT NULL,".
      "email VARCHAR(50) NOT NULL,".
      "PRIMARY KEY (id)); ";

	mysql_select_db('breakTime');
	$retval = mysql_query($sql, $conn);
	
	if(!$retval)
	{
		echo 'Could not create Table: ' . mysql_error(); 	
	}
	
	else
	 {	
		echo 'Table create Succesfully\n';
	 }
					
						$nombreApellido = mysql_real_escape_string($_POST["nombreApellido"], $conn);
					   $dni = mysql_real_escape_string($_POST["dni"], $conn);
    					$fNac = mysql_real_escape_string($_POST["fNac"], $conn);
    					$direccion = mysql_real_escape_string($_POST["direccion"], $conn);
    					$localidad = mysql_real_escape_string($_POST["localidad"], $conn);
    					$telefono = mysql_real_escape_string($_POST["telefono"], $conn);
    					$movil = mysql_real_escape_string($_POST["movil"], $conn);
    					$email = mysql_real_escape_string($_POST["email"], $conn);
    			 
	
	
		$sqlInsert = "INSERT INTO docentes ".
		"(nombreApellido,dni,fechaNacimiento,direccion,localidad,telefono,movil,email)".
		"VALUES ".
      "('$nombreApellido','$dni','$fNac','$direccion','$localidad','$telefono','$movil','$email')";
  			
//mysql_select_db('breakTime');
$retval = mysql_query($sqlInsert,$conn);

if(!$retval)
{
	echo 'Could not enter data: ' . mysql_error();
}

else
{
echo "Registry Succesfully\n";
echo "<br><br><br><br>";
   echo '<hr> <a href="cargaDatos.html"><input value="Volver a Carga de Datos" type="button" ></a>';
}	
	//cerramos la conexion
	
	mysql_close($conn);

	 	
	  	
    
    ?>
    </div>
    </div>
    </body>
    </html>