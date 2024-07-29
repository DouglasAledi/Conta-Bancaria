<?php 
include __DIR__ . "/funcao-conta.php";

  $contaBancaria = new contaBancaria();

  if($argc == 1){
    echo $contaBancaria -> opcoes();
  }
  else{
    $codigo = $argv[1];
    switch($codigo){
      case 1:
        if($argc > 3){
          $nome = $argv[2];
          $saldo = $argv[3];
          $numeroConta = $argv[4];
          $contaBancaria = new contaBancaria();
          $contaBancaria->dados($nome, $saldo, $numeroConta);
        }
        else{
          echo "-- Faça aqui a sua conta -- \n";
          echo "Escreva o númeero 1 + o seu nome + 0 + 1";
        }
        break;
      case 2:
        echo "-- Depositar -- \n";
        if (isset($argv[2]) && is_numeric($argv[2]) && $argv[2] > 0) {
            $deposito = $argv[2];
            $contaBancaria->deposito($deposito);
        } else {
            echo "Valor de depósito inválido.";
        }
        break;

      case 3:
        echo "-- Sacar -- \n";
        if (isset($argv[2]) && is_numeric($argv[2]) && $argv[2] > 0) {
          $sacar = $argv[2];
          $contaBancaria->sacar($sacar);
      } else {
          echo "Valor de saque inválido.";
      }
      break;

      case 4:
        echo "-- Consultando -- \n";
            $json = file_get_contents('dados.json');
            $contaBancaria->informacoes($json);
            break;
        break;

      case 5:
        echo "Saindo.. \n";
        break;
        
        default:
          if($argc == 1){
            echo $contaBancaria -> opcoes();
          }
          break;
    }
  }
?>