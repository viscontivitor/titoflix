<?php
    //Criando a classe Pai
    class Pai{
        /*Declaração de variáveis
          Private, Protected, Public
        */
        // Privada
        private $var1 = "Ola eu sou a variavel 01. \n";
        //Protegida
        protected $var2 = "Ola eu sou a variavel 02. \n";
        //Publica
        public $var3 = "Ola eu sou a variavel 03. \n";
        
        function boaNoite(){
            print "Classe Pai:".$this->var1. "<br>";
            print "Classe Pai:".$this->var2. "<br>";
            print "Classe Pai:".$this->var3. "<br>";
        }
    }
    class Filho extends Pai{
        function boaNoite(){
            // Ira exibir todos os itens devido a heranca
            Pai::boaNoite();
             // Ira trazer um erro devido a privacidade da variavel
            print "Classe Filho: ". $this->var1. "<br>";
            // Ira exibir, por se tratar de uma variavel, protegida, porem, publica
            print "Classe Filho: ". $this->var2. "<br>";
            print "Classe Filho: ". $this->var3. "<br>";
        }
    }
    $obj = new Pai;
    $obj2 = new Filho();
?>
<h3>Classe Pai</h3>
<p><?=$obj ->boaNoite()?></p>

<h3>Classe Filho</h3>
<p><?=$obj2 ->boaNoite()?></p>