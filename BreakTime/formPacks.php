   <html>
    <head>
    <title>Packs</title>
    <link rel="stylesheet"  type="text/css" media="screen" href="estilo.css" />
    </head>
    <body>
    <div class="container">
    <div class="main">
    <h2>Packs</h2>
    
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
		
		$sql = "CREATE TABLE packs(".
		"id INT AUTO_INCREMENT,".
      "descripcion VARCHAR(35) NOT NULL,".
      "PRIMARY KEY(id)); ";

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
					
						$descripcion = mysql_real_escape_string($_POST["packs"], $conn);
					   	
	
		$sqlInsert = "INSERT INTO packs ".
		"(descripcion)".
		"VALUES ".
      "('$descripcion')";
  			

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