<?php 
/*Usar futuramente o encode para adicionar um arquivo json para salvar e ler as informações da conta*/ 
/*Criar a opção de adicionar um novo cliente em arquivo JSON*/

require __DIR__ . '/infos.php';

echo "Bem-vindo(a)\n";
echo "Digite 1 para conferir as informações da sua conta\n";
echo "Digite 2 para depositar\n";
echo "Digite 3 para sacar\n";
echo "Digite 4 para sair\n";

if (isset($argv[1])) {
    $digito = $argv[1];
    $conta = new Conta();

    switch($digito){
        case 1:
            echo "\n" . "Nome do Cliente: " . $conta->getNomeCliente() . "\n";
            echo "Saldo do Cliente: " . $conta->getSaldoCliente() . "\n";
            echo "Número do Cliente: " . $conta->getNumeroCliente() . "\n";
            break;
        case 2:
          if (isset($argv[2]) && is_numeric($argv[2]) && $argv[2] > 0) {
            $depositar = $argv[2];
            $conta->deposito($depositar);
            echo "Depósito realizado com sucesso. \n Novo saldo: " . $conta->getSaldoCliente() . "\n";
            } else {
             echo "\nValor inválido. Por favor, insira um valor positivo para depósito.";
            }   
            break;
        case 3:
            if(isset($argv[2]) && is_numeric($argv[2]) && $argv[2] > 0){
              $sacar = $argv[2];
              $conta->sacar($sacar);
              echo "Saca realizado com sucesso. \n Novo saldo: " . $conta->getSaldoCliente() . "\n";
            }else{
              echo "\nValor inválido. Por favor, insira um valor positivo para sacar.";
            }
            break;
        case 4:
            echo "Saindo...\n";
            break;
        default:
            echo "Opção inválida.\n";
    }
}
?>
