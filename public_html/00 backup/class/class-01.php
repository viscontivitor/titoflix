<?php
class cripto{
    var $senhaOut;
    var $hashOut;

    function criptSenha($login, $senha){
        
        $senhac = (md5($senha));
        $loginc = (md5($login));
        $apiKeyc = "c4f0877a7327393e74d6b4e19c4f7a63";
        $hashPass = (md5($senhac.$loginc.$apiKeyc));
        $senhaDB = (md5($apiKeyc.$senhac.$hashPass));
 
        $passUser = md5($loginc);
        $custo = '09';
        $salt = $hashPass;
        
        $senhaCripto = crypt($passUser, '$2b$'. $custo . '$' . $senhaDB . '$');
       

        $this->senhaOut = $senhaCripto;
    }

    function criptHash($login, $senha){
        
        $senhac = (md5($senha));
        $loginc = (md5($login));
        $apiKeyc = "c4f0877a7327393e74d6b4e19c4f7a63";
        $hashPass = (md5($senhac.$loginc.$apiKeyc));
        $senhaDB = (md5($apiKeyc.$senhac.$hashPass));
 
        $passUser = md5($loginc);
        $custo = '08';
        $salt = $hashPass;
        
        $newHash = crypt($passUser, '$2b$' . $custo . '$' . $salt . '$');

        $this->hashOut = $newHash;
    }
}
$senhaCrip = new cripto;
$hashCrip = new cripto;

//$email = $_POST['email'];
//$senha = $_POST['senha'];

$email = "seila@hotmail.com";
$senha = "123456";

    $senhaCrip->criptSenha($email, $senha);
    $hashCrip->criptHash($email, $senha);

?>
<p><?=$email?></p>
hash
<p><?=$hashCrip->hashOut?></p>
Senha
<p><?=$senhaCrip->senhaOut?></p>