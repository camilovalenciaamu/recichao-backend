<?php 

$conexion = mysqli_connect("localhost", "root" , "", "sistema_central");

$email = $_POST["email"]; 
$password = $_POST["password"]; 

$sql =  "SELECT *FROM usuarios WHERE email ='$email' AND password = '$password'";
$resultado = mysqli_query($conexion, $sql);

if($resultado->num_rows > 0){
    echo "Bienvenido";
}else{
    echo "Datos incorrectos, verifica tus datos";
}