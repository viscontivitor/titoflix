<?php
    //Metodo de interface
    interface MinhaInterface{
        public function teste();
    }
    class Uso implements MinhaInterface{
        public function teste(){
            print "Imprime a interface teste()!<br>";
        }
    }
    $obj = new Uso();
?>
<p><?=$obj->teste();?></p>