<?php
      abstract class PaiAbstrato{
          abstract public function teste();
      }

      class FilhoImplantacao extends PaiAbstrato{
          public function teste(){
              print "Imprime o metodo abstrato teste()! <br>";
          }
      }
      $obj= new FilhoImplantacao();
?>
<p><?=$obj->teste();?></p>