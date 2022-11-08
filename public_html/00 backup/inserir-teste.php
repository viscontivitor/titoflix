<?php
include_once("../private/conf/connect.php");

$tipo = $_POST ["tipo"];
$desc = $_POST ["descricao"];

$sqlQuery = "SELECT * FROM tbstatus WHERE tipo= '$tipo'";
$tipoBD = "";

if ($result = mysqli_query($conn, $sqlQuery)){
    while($row=mysqli_fetch_row($result)){
        $tipoBD = $row[1];
    }
    mysqli_free_result($result);
    /*$conn -> close();/*/
}

if($tipoBD === $tipo){
    $resp= "<h2>Este tipo já existe!</h2>
    <form method=\"post\" action=\"inserir-teste.php\">
    tipo<br>
    <input type=\"text\" name=\"tipo\"><br>
    descricao<br>
    <input type=\"text\" name=\"descricao\"><br>
    <input type=\"submit\" value=\"gravar status\">
</form>
";
} else {

/*if($tipoBD === "" || $tipoBD === empty){
    echo $tipoBD . "vazio";
} else {
    echo "cheio" . $tipoBD
}*/

$query = "INSERT INTO tbstatus (idtbStatus, Tipo, Descricao) 
VALUES (Null, $tipo, $desc)";

if(mysqli_query($conn,$query)){
    $resp = "dados gravados com sucesso";

} else {
    $resp = "você errou, malandro" .mysqli_error($conn);
}
$conn -> close();
}
?>

<?=$resp?>