<?php
include_once("../private/conf/connect.php");

$login = $_POST["Login"];
$senha = $_POST["PassWord"];


$apikeyc = "f50ba1f649ca26b3791c80da19881851";
$senhac = (md5($senha));
$loginc = (md5($login));
$hashPass = (md5($senhac.$loginc.$apikeyc));
$senhaDB = (md5($apikeyc.$senhac.$hashPass));
$passUser = md5($loginc);
$loginUser = md5($senhac);
$cust = '09';
$custo = '08';
$salt = $hashPass;
$salto = $senhaDB;
$hashPassC = crypt($passUser, '$2b$' . $cust . '$' . $salt . '$');

$senhaDBc = crypt($loginUser, '$2b$' . $custo . '$' . $salto . '$');

$usuarioBD ="";

$sqlQuery = "SELECT * FROM tblogin WHERE Login= '$usuario'";


if ($result = mysqli_query($conn, $sqlQuery)){
    while($row=mysqli_fetch_row($result)){
        $usuarioBD = $row[1];
    }
    mysqli_free_result($result);
}

if($usuarioBD === $usuario){
    header("Location: cadastro2.html");
} else {

$query = "INSERT INTO tblogin (IdLogin,Login,PassWord,HashPass,IdStatus) 
VALUES (Null, '$usuario', '$senhaDBc','$hashPassC',2)";

if(mysqli_query($conn,$query)){
    $resp = "dados gravados com sucesso";

} else {
    $resp = "você errou, malandro" .mysqli_error($conn);
}
$conn -> close();
}


?>

<p><?=$resp?></p>