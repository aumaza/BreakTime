   <html>
    <head>
    <title>Bienvenido</title>
    <link rel="stylesheet"  type="text/css" media="screen" href="estilo.css" />
    </head>
    <body>
    <div class="container">
    <div class="main">
    <h2>Bienvenido</h2>
    
    <?php
    
    $dbhost = 'localhost:3036';
		$dbuser = 'root';
		$dbpass = 'slack142';    	
    	$dbase = '/var/lib/mysql/breakTime';
    	$conn = mysql_connect($dbhost, $dbuser, $dbpass, $dbase);
		
		
	
						$user = mysql_real_escape_string($_POST["nickname"], $conn);
						$pass1 = mysql_real_escape_string($_POST["password1"], $conn);
						
	mysql_select_db('breakTime');			   	
	$sql = "SELECT * FROM usuarios where nickName='$user' and password='$pass1'";
	$q = mysql_query($sql,$conn);	
	
	
		if(!$q) 
		{	
			mysql_error();
			exit;			
			
			/*echo 'Bienvenido'. "<br><br>". $user;	
			echo '<a href="menuPrincipal.html"><br><br><input value="Ingresar" type="button" ></a><br>';*/	
		}

			if($user = mysql_fetch_assoc($q))
			{
				echo '<a href="menuPrincipal.html"><br><br><button type"submit"><img src="arrow-right.png" alt="10px" /> Ingresar</button></a><br>';		
			}

			else
			{
				echo "Usuario o Contraseña Incorrecta. Reintente!";
				echo '<a href="validacion.html"><br><br><button type"submit"><img src="system-reboot.png" alt="10px" /> Reintentar</button></a><br>';	
	
			}
	
	//cerramos la conexion
	
	mysql_close($conn);
    ?>
    </div>
    </div>
    
    
    
</body>
</html>