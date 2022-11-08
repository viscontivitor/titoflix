<?php

$idRecovery = "";
$idRecovery = $_POST['idRecovery'];
$login = $_POST['Login'];
$senha = $_POST['passwordNew'];
$senhaConf = $_POST['ConfPasswordNew'];
/*
echo $idRecovery . "<br>";
echo $login . "<br>";
echo $senha . "<br>";
echo $senhaConf . "<br>";
*/
if($idRecovery == "" || $idRecovery === ""){
 header("Location: http://localhost/streaming/public_html/recovery-user-pass.php?idRecovery=$idRecovery");
}
else if($senha !== $senhaConf){
    header("Location: http://localhost/streaming/public_html/recovery-user-pass.php?idRecovery=$idRecovery"); 
}else{
    include_once("../conf/connect.php");
    $login = $_POST['Login'];
$sqlQuery = ("SELECT * from tblogin WHERE Login= '$login'");
$loginBD = "";
$hashBD = "";
if($result = mysqli_query($conn,$sqlQuery)){
    while($row =mysqli_fetch_row($result)){
        $loginBD = $row[1];
        $hashBD = $row[3];
    }
    mysqli_free_result($result);
}else{
   $resp = "Erro ao consultar Banco de Dados";
}

if(($loginBD === $login)&& ($hashBD === $idRecovery)){
   
    $apikey = "maça";
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
    $hashPassc = crypt($passUser, '$2b$' . $cust . '$' . $salt . '$');
    
    $senhaDBc = crypt($loginUser, '$2b$' . $custo . '$' . $salto . '$');

    $queryUpdate = ("UPDATE tblogin SET 
         Password = '$senhaDB', HashPass = '$hashPass' WHERE Login = '$login'");

if($conn->query($queryUpdate) === TRUE){
         
    $resp = "ufa deu bom";
    header("Location: ../../public_html/login2.html");
}else {
    $resp = "eita deu ruim... dados nao atualizados";
    header("Location: ../../public_html/login3.html");
}
}else {
    $resp = "eita, deu ruim";
    header("Location: ../../public_html/login.html");
}
}
?>
<p><?=$resp?></p>
