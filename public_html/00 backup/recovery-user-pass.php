<?php $idRecovery = $_GET['idRecovery'];?>
<h2>Recuperar senha</h2>
<form method="post" action="../private/api/update-recovery-user.php">
    Digite o Login (Email):<br>
    <input type="text" name="Login" required><br>
    Digite a nova senha:<br>
    <input type="text" name="passwordNew" required>
    Confirme a senha:
    <input type="text" name="ConfPasswordNew" required>

    <input type="hidden" name="idRecovery" value="<?=$idRecovery?>">
    <input type="submit" value="Resetar senha">
    
</form>
<p>
    [<a href="login.html">Voltar</a>]
 
</p>