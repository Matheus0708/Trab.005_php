<?php

include("./banco.php");

class Cliente extends Banco
{
    public $nome;
    public $cpf;
    public $possui_emprestimo = false;
    public $valor_emprestimo;

    public function emprestimo($valor)
    {
        if ($this->possui_emprestimo)
        {
            echo "<br>";
            echo "Infelizmente não podemos fazer outro empréstimo";
        }
        else
        {
            $this->possui_emprestimo = true;
            $this->valor_emprestimo = $valor;
            $this->depositar($valor);
        }
    }

    public function quitar_emprestimo($valor)
    {
        if ($this->possui_emprestimo) 
        {
            if ($valor >= $this->valor_emprestimo) 
            {
                $valorQuitado = $this->valor_emprestimo;
                $this->possui_emprestimo = false;
                $this->valor_emprestimo = 0;
                $this->saldo -= $valorQuitado;

                echo "<br>";
                echo "Valor do Empréstimo quitado!";
                echo "<br>";
                echo "Saldo atual após quitar o Empréstimo: " . $this->saldo - $this->valor_emprestimo;
            } 
            else 
            {
                echo "<br>";
                echo "Valor insuficiente para quitar o Empréstimo.";
            }
        } 
        else if (!$this->possui_emprestimo)
        {
            echo "<br>";
            echo "Empréstimo inexistente para quitar.";
        }
    }

}

$pessoa = new Cliente();
$pessoa -> nome = "Matheus";
$pessoa -> cpf = "43790081820";
$pessoa -> saldo = 5000;
$pessoa -> depositar(100);

echo "O Saldo atual disponível é: R$ " . $pessoa->saldo;

echo "<br>";

$pessoa->emprestimo(4000);

echo "<br>";

echo "O Saldo atual disponível com empréstimo de R$ 4000 é: R$ " . $pessoa->saldo;

echo "<br>";

//$pessoa->emprestimo(4000);// novo emprestimo.
$pessoa->quitar_emprestimo(3000);

?>
