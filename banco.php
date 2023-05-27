<?php
    session_start();
    //classe.php
    class Banco
    {
        public $conta = "437900-1";
        public $saldo;

        public function depositar($valor)
        {
            //$saldo = $saldo + 50;
            $this->saldo += $valor;
        }

        public function sacar($valor)
        {
            $this->saldo -= $valor;
        }
       
    }

?>