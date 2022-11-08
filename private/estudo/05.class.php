<?php
interface Pai{
     public function Fim();
    
}

class Filho implements Pai{
    final public function Fim(){
    print "Imprime o metodo final sem mudar seus valores em Fim()!<br>";
}
}

$obj = new filho();
?>
<p><?=$obj->Fim();?></p>