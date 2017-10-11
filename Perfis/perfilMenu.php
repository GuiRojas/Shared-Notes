<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../CSS/padraoSite.css">
	<script type="text/javascript" src="../JS/jquery-3.2.1.js"></script>
	<script type="text/javascript" src="../JS/script.js"></script>
</head>
<body>
	<?php	
		$titulo= "Procurar perfis";
		include '../Include/top.inc.php';
		include '../Include/side.inc.php';
	?>

	<div id="container">
		<div id="procuraUsuario">
			<form method="GET">
				<div>
					<input type="text" id="query" name="query">
				</div>
				<div>				
					<input type="submit" id="btnInput">	
				</div>					
			</form>			
		</div>
		
		<?php
			include("../Include/connect.inc.php");

			if(isset($_GET['query'])){

				 $query = $_GET['query'];

			    // gets value sent over search form
			     
			    //$min_length = 3;
			    // you can set minimum length of the query if you want

			    //nao usarei minLength
			     
			    //if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then
			         
		        $query = htmlspecialchars($query); 
		        // changes characters used in html to their equivalents, for example: < to &gt;
		         
		        //$query = mysql_real_escape_string($query);
		        // makes sure nobody uses SQL injection
		        //n funfando por hora, implemento dps

		        $sql=("pesquisaUsu_sp '".$query."'");
		        $status=sqlsrv_query($conexao,$sql) or die(mysql_error());		         

		        //$raw_results = mysql_query("SELECT * FROM usuario
		        //    WHERE ('username' LIKE '%".$query."%') OR ('nome' LIKE '%".$query."%')") or die(mysql_error());
		             
		        // '%$query%' is what we're looking for, % means anything, for example if $query is Hello
		        // it will match "hello", "Hello man", "gogohello", if you want exact match use `title`='$query'
		        // or if you want to match just full word so "gogohello" is out use '% $query %' ...OR ... '$query %' ... OR ... '% $query'
		        
		        if(mysqli_num_rows($status)>0){
			        while($results = mysqli_fetch_array($status)){
			            $results = mysqli_fetch_array($status); //puts data from database into array, while it's valid it does the loop
			            
			            echo "<p><h3>".$results['usuario']."</h3>".$results['nome']."</p>";
			            // posts results gotten from database(title and text) you can also show id ($results['id'])
			        }	
		        }else{
		        	echo "Sem resultados";
		        }
			    

			}
		   

			//include '../Include/usuario.inc.php';
		?>
	</div>
	
	<?php
		include '../Include/bot.inc.php';
	?>
</body>
</html>