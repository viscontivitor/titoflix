<?php
$senha="Ee102030";
$login = "prof.nerildo@hotmail.com";
$apikey = "maçã";

$senhac = (md5($senha));
$loginc = (md5($login));
$apikeyc = (md5($apikey));

$hashpass = (md5($senhac.$loginc.$apikeyc));
$senhaDB =(md5($senhac.$apikeyc.$hashpass));


//Inicio da criptografia
$passUser = md5($loginc);
$custo = '09';
$salt = $hashpass;

//gravado no banco

$hash = crypt($passUser, '$2b$' . $custo . '$' . $salt . '$');

//Validando o usuario para acesso a o sistema
//Gera um hash para acesso ao sistema - baseado em bcrypt

$newHash = crypt($passUser, '$2b$' . $custo . '$' . $salt . '$');

if (crypt($passUser, $newHash) === $hash){
  $resp = "senha correta";
}else {
$resp = "Erro - usuario ou senha invalido";
}
?>


<p>senha: <?=$senha?></p>
<p>senha com md5: <?=$senhac?></p>
<p>login: <?=$login?></p>
<p>apikey: <?=$apikey?></p>
<p>login com md5: <?=$loginc?></p>
<p>apikey com md5: <?=$apikeyc?></p>

<p>Hash senha: <?=$hashpass?></p>
<p>senha para o banco de dados: <?=$senhaDB?></p>
<p>senha criptografada: <?=$hash?></p>
<p>hash criptograda: <?=$newHash?></p>
<p>senha: <?=$resp?>
