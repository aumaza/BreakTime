   <html>
    <head>
    <title>Usuarios</title>
    <link rel="stylesheet"  type="text/css" media="screen" href="estilo.css" />
    </head>
    <body>
    <div class="container">
    <div class="main">
    <h2>Usuarios</h2>
    
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
		
		$sql = "CREATE TABLE usuarios(".
		"id INT AUTO_INCREMENT,".
      "nombreApellido VARCHAR(35) NOT NULL,".
      "nickName VARCHAR(15) NOT NULL,".
      "password VARCHAR(10) NOT NULL,".
      "PRIMARY KEY (id)); ";

	mysql_select_db('breakTime');
	$retval = mysql_query($sql, $conn);
	
	if(!$retval)
	{
		echo 'Could not create Table: ' . mysql_error();
		echo "<br>"; 	
	}
	
	else
	 {	
		echo 'Table create Succesfully\n';
		echo "<br>";
	 }
					
						$nombre = mysql_real_escape_string($_POST["nombreUsuario"], $conn);
						$user = mysql_real_escape_string($_POST["nickname"], $conn);
						$pass1 = mysql_real_escape_string($_POST["password1"], $conn);
						$pass2 = mysql_real_escape_string($_POST["password2"], $conn);
					   	
	$sqlInsert = "INSERT INTO usuarios ".
		"(nombreApellido,nickName,password)".
		"VALUES ".
      "('$nombre','$user','$pass1')";
		


if($conn && strcmp($pass2, $pass1) == 0) 
{
	mysql_query($sqlInsert);	
	echo "<br>";
	echo 'Usuario Creado Satisfactoriamente';
		
	
	
}

else
{
	echo "<br>";
	echo "Las Contraseñas no Coinciden. Intente Nuevamente!";		
	
}	
	//cerramos la conexion
	
	mysql_close($conn);
    ?>
    </div>
    </div>
    
    
    
</body>
</html>