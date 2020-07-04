<?php 

// Initialize the session
session_start();
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
/////conection
require_once "config.php";

// Define variables and initialize with empty values
$name = $lastname = $username = $password = $confirm_password = $email = $dni = $pago = $cons1 = $tel = $art = $art_anch = $cant = $n_pedido = $uploadfile = "";
$name_err = $lastname_err = $username_err = $password_err = $confirm_password_err = $email_err = $dni_err = $pago_err = $tel_err = $art_err = $art_anch_err = $pic_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){


}

// Prepare an insert statement
       // $sql = "SELECT * FROM pedido";

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
   <!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css"> -->

   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>

	<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="#" class="card-link">Card link</a>
    <a href="#" class="card-link">Another link</a>
  </div>
</div>

<?php

$sql = "SELECT * FROM pedido";
$result = $link->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

?>
<div class="card" style="width: 18rem;">
<div class="card-body"> 
<?php
?>
<h5 class="card-title"> <?php  echo "<br> id: ". $row["id"]. " - Name: ". $row["name"]. " " . $row["lastname"]; ?> </h5>
<h6 class="card-subtitle mb-2 text-muted"><?php echo " N Pedido:  " . $row["n_pedido"];?></h6>
<p class="card-text"><?php 

	echo " email: " . $row["email"]."<br>";
	echo " dni:" . $row["dni"]."<br>";
	echo "Tel: " . $row["tel"]."<br>";
	echo " Tipo de pago: " . $row["pago"]."<br>";
	echo " Articulo: " .$row["art"]."<br>";
	echo "Ancho articulo: " .$row["art_anch"]."<br>";
	echo " Cantidad: " . $row["cant"]."<br>";
	echo "Numero de pedido: ".$row["n_pedido"]."<br>";
	echo " Estado:" . $row["status"]. "<br>";
?></p>

<?php 
switch ($row["status"]) {
	case '0':
			$st0 = "btn btn-";
			$st1 = "btn btn-outline-";
			$st2 = "btn btn-outline-";
			$st3 = "btn btn-outline-";
		break;
	case '1':
			$st0 = "btn btn-outline-";
			$st1 = "btn btn-";
			$st2 = "btn btn-outline-";
			$st3 = "btn btn-outline-";	
		break;
	case '2':
			$st0 = "btn btn-outline-";
			$st1 = "btn btn-outline-";
			$st2 = "btn btn-";
			$st3 = "btn btn-outline-";
			break;
	case '3':
			$st0 = "btn btn-outline-";
			$st1 = "btn btn-outline-";
			$st2 = "btn btn-outline-";
			$st3 = "btn btn-";
		break;
}
?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
<button type="submit" class="<?php echo $st0; ?>danger" name="f_status" value="0"><?php echo $row["status"]; ?></button>
<button type="submit" class="<?php echo $st1; ?>warning" name="f_status" value="1">En Preparacion</button>
<button type="submit" class="<?php echo $st2; ?>success"  name="f_status" value="2">Entregar</button>
<button type="submit" class="<?php echo $st3; ?>primary"   name="f_status"   value="3">Entregado</button>
</form>
</div>
</div>
<?php

}
} else {
  echo "0 results";
}

$link->close();
?>

<?php 

if($_SERVER["REQUEST_METHOD"] == "POST"){

 $sql = "UPDATE pedido SET cantidad = '3' WHERE id = '74'";
 if ($link->query($sql) === TRUE) {
  echo "OK";      
 }else {
  echo "ERROR";
}
}

?>

<button type="button" class="btn btn-primary">Primary</button>
<button type="button" class="btn btn-secondary">Secondary</button>
<button type="button" class="btn btn-success">Success</button>
<button type="button" class="btn btn-danger">Danger</button>
<button type="button" class="btn btn-warning">Warning</button>
<button type="button" class="btn btn-info">Info</button>
<button type="button" class="btn btn-light">Light</button>
<button type="button" class="btn btn-dark">Dark</button>

</body>
</html>