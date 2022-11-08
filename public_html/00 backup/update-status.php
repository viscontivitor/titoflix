<?php
include_once("../private/conf/connect.php");

$idStatus = $_POST['idstatus'];
$desc = $_POST['descricao'];

$query = "UPDATE tbStatus SET Descricao= '$desc'
WHERE idtbStatus = '$idStatus'
";

if($conn->query($query)===TRUE){
    $resp = "Dado alterado!!";
}else {
    $resp = "Erro ao alterar dado!";
}
$conn -> close();

header("Location: consulta-teste.php");
?>
<?=$resp?>