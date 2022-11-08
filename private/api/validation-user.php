<?php
include_once("../conf/connect.php");

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


$loginBD ="";

$sqlQuery = "SELECT * FROM tbLogin
WHERE Login = '$login'";

if($result = mysqli_query($conn, $sqlQuery)){
    while($row = mysqli_fetch_row($result)){
        $idLoginBD = $row[0];
        $loginBD = $row[1];
        $senhaBD = $row[2];
        $hashBD = $row[3];
        $statusBD = $row[4];
    }
    mysqli_free_result($result);
};

if(($login === $loginBD) && ($statusBD <> 0) && ($senha === $senhaBD) ){
    $resp = "usuario valido.";
} else {
    
    $resp = "usuario ou senha invalido.";
    
   
};

?>
<p><?=$resp?></p>