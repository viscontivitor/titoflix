<?php

include_once("../private/conf/connect.php");
$idStatus = $_GET['idtbtatus'];

$idStatus = $_GET['idstatus'];

$query = "SELECT * FROM tbstatus WHERE idtbStatus = '$idStatus'";
?>
<form method="post" action="update-status.php">
<?php
 if($result=mysqli_query($conn, $query)){
     while($row=mysqli_fetch_row($result)){
         $tipo = $row[1];
         $desc = $row[2];
     }
 }
?>
 tipo<br>
    <input type="text" name="tipo" value="<?=$tipo?>" disabled><br>
    descricao<br>
    <input type="text" name="descricao" value="<?=$desc?>"><br>
    <input type="hidden" name="idstatus" value="<?=$idStatus?>"><br>
    <input type="submit" value="alterar status">
    
</form>