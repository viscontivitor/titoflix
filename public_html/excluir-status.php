<?php

include_once("../private/conf/connect.php");
$idStatus = $_GET['idtbtatus'];

$idStatus = $_GET['idstatus'];

$query = "SELECT * FROM tbstatus WHERE idtbStatus = '$idStatus'";

if($conn ->query($query) === true){
    $resp= "Dado deletado!";

} else {
    $resp = "Erro ao deletar dado!";
}
$conn ->close();

header("Location: consulta-teste.php");
?>
<?=$resp?>
