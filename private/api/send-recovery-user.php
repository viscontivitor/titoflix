<?php

include_once("../conf/connect.php");

$login = $_POST['Login'];

$sqlQuery=("SELECT * FROM tblogin WHERE Login = '$login'");

if($result = mysqli_query($conn,$sqlQuery)){
    while($row = mysqli_fetch_row($result)){
        $loginBD = $row[1];
        $hashBD = $row[3];
    }
    mysqli_free_result($result);
}else{
    $resp = "ERRO ao Consultar Banco de Dados";
}
if($login === $loginBD){
    $resp = "Recuperar a senha";
    $urlRecovery = "http://localhost/streaming/public_html/recovery-user-pass.php?idRecovery=$hashBD";
} else {
     $resp= "Usuario não existe";
}
?>
<?=$resp?>
<p>
    Caro usuario, obrigado por utilizar a TITOFlix,
    segue abaixo o link para a recuperacao de sua senha!<br>
    Siga-nos em nossas redes sociais!
</p>
<p>
<a href="<?=$urlRecovery?>" target="_blank">Recuperar senha</a>
</p>