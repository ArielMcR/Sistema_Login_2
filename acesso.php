<?php
@$username = trim($_POST["usuario"]);
@$senha = trim($_POST["senha"]);

if(strlen($username) == 0 || strlen(($senha)==0)){
    header("Location: erro.php");
    exit(0);
} 

$con = new mysqli("localhost", "root","","login");
$sql = "SELECT * FROM usuarios WHERE email='$username' AND senha='$senha'";
$roda = $con->query($sql);

if($roda->num_rows == 1){
    setcookie("usuario", "$username");
    setcookie("senha", "$senha");
    header("Location: primeira.php");
    exit(0);

} else{
    header("Location: erro.php");
    exit(0);
}
?>