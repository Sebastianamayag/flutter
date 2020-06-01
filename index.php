<?php 
$host ="23.236.50.121";
$puerto = "3306";
$user ="root";
$pw = "matias2014se98";
$db ="movil";
function Conectarse($host,$puerto,$user,$pw,$db) {
	if (!($link = mysqli_connect($host.":".$puerto, $user, $pw))){ 
			echo "Error conectando a la base de datos.<br>"; 
		   exit(); 
		 }else{
		  echo " ";
		  }
		  if (!mysqli_select_db($link, $db)) 
		{ 
			echo "Error seleccionando la base de datos.<br>"; 
			exit(); 
		}else{
		   echo " "; 
		 }
	   return $link; 
}
//conectarse a la bd
$link = Conectarse($host,$puerto,$user,$pw,$db);
//metodo para ver los datos
if ($_SERVER['REQUEST_METHOD'] == 'GET'){
	if (isset($_GET['id'])){
     $categoria=$_POST['categoriaProductos'];	
	 $query="SELECT * FROM productos WHERE catergoriaProductos=$categoria";
 	 $result = mysqli_query($link,$query);
 	 header("HTTP/1.1 200 OK");
	 while ($row=$result->fetch_assoc()){ 
	 $array = array('url' =>$row['url']);
     $json = json_encode($array);
	 echo $json;
	}
	}else{
     $query="SELECT * FROM productos";
 	 $result = mysqli_query($link,$query);
 	 header("HTTP/1.1 200 OK");
  	 while ($row=$result->fetch_assoc()){ 
  	 	$array = array('url' =>$row['url']);
		   $json = json_encode($array);
		 echo $json."<br>";
    	}
	}
}
header("HTTP/1.1 400 Bad Request");
 ?>