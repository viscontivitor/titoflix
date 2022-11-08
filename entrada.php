<?php
    include_once("../private/conf/connect.php");

    $query = "SELECT * FROM tblogin";
?>

<table style="border: 1px solid #f00">
<tr><td style="border: 1px solid #f00">Tipo</td>
<td style="border: 1px solid #f00">Descrição</td>
<td style="border: 1px solid #f00">Alterar</td>
<td style="border: 1px solid #f00">Excluir</td></tr>

<?php

    if($result = mysqli_query($conn, $query)){
        while($row= mysqli_fetch_row($result)){
            $idStatus   = $row[0];
            $usuario   = $row[1];
            $senha   = $row[2];
?>

          <tr><td style="border: 1px solid #f00"><?=$usuario?></td>
              <td style="border: 1px solid #f00"><?=$senha?></td>
              <td style="border: 1px solid #f00"><a href="alterar-status.php?idstatus=<?=$idStatus?>">editar</a></td>
              <td style="border: 1px solid #f00"><a href="alterar-status.php?idstatus=<?=$idStatus?>">excluir</a></td>

        </tr>
            
              
<?php              

        } 
    }
    $conn->close();

    ?>
    </table>
    <p>[<a href="cadastro.html">inserir</a>]</p>