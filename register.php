<?php


$conexion = mysqli_connect("localhost", "root" , "", "sistema_central");

$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$municipio = $_POST["municipio"];
$email = $_POST["email"];
$direccion = $_POST["direccion"];
$password = $_POST["password"]; 

$sql = "INSERT INTO usuarios(nombre, apellido, municipio, direccion_residencia,  password, email) VALUES ('$nombre', '$apellido','$municipio', '$direccion', '$password', '$email')";

$resultado = mysqli_query($conexion, $sql);

if($resultado){
    echo "Usuario registrado exitosamente";
}else{
    echo "No se insertaron los datos" ;
}