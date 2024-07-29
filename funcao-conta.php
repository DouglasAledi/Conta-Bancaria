<?php 

  class contaBancaria{
    public function opcoes(){
    echo "Digite uma das seguintes funções \n";
    echo "1- Faça aqui a sua conta \n";
    echo "2- Depositar \n";
    echo "3- Sacar \n";
    echo "4- Consulte suas informações \n";
    echo "Saindo.. \n";
    }

    public function dados(string $nome, float $saldo, string $numeroConta){
      $array = [
        "nome" => $nome,
        "saldo" => $saldo,
        "numero Conta" => 0,
      ];

      $json = json_encode($array);

      $arquivo = 'dados.json';
      file_put_contents($arquivo, $json);

      echo "Cadastrado!";
    }

    public function informacoes($array){
      $decode = json_decode($array, true);
      

      echo "Nome: " . $decode['nome'] . "\n";
      echo "Saldo: " . $decode['saldo'] . "\n";
      echo "Numero da Conta: " . $decode['numero Conta'] . "\n";
    }

    public function deposito($valor){
      $json = file_get_contents('dados.json');
        $decode = json_decode($json, true);

        if (is_numeric($valor) && $valor > 0) {
            $decode['saldo'] += $valor;
            $json = json_encode($decode);
            file_put_contents('dados.json', $json);
            echo "Depósito realizado com sucesso.\n";
        } else {
            echo "Valor de depósito inválido.\n";
        }
    }
    public function sacar($valor){
      $json = file_get_contents('dados.json');
        $decode = json_decode($json, true);

        if (is_numeric($valor) && $valor > 0 && $valor <= $decode['saldo']) {
            $decode['saldo'] -= $valor;
            $json = json_encode($decode);
            file_put_contents('dados.json', $json);
            echo "Saque realizado com sucesso.\n";
        } else {
            echo "Valor de saque inválido.\n";
        }
    }
  }
?>