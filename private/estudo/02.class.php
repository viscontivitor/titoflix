<?php

class Pai{
    private function MetodoPrivado(){
        print "Pai: Metodo Privado <br>
               Chamada <br>
               Pai::MetodoPrivado();";
    }

    //Criando Metodo
    Protected function MetodoProtegido(){
        print "Pai: Metodo Protegido <br>
               Chamada <br>
               Pai::MetodoPrivado();";
        $this->MetodoPrivado();
    }
}
 //Criando a classe Filho que ira herdar o Pai
    class Filho extends Pai{
        Public function MetodoPublico(){
            print "Pai: Metodo Publico <br>
                   Chamada <br>
                   Pai::MetodoPrivado();";
            $this->MetodoProtegido();
    }}
    $obj = new Filho();
?>
<h3>Filho herda todos os três metodos desta forma ok :D</h3>
<P><?=$obj ->MetodoPublico()?></p>