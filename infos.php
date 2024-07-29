<?php 

class Conta {
  private string $nomeCliente = "Douglas";
  private int $saldoCliente = 1400;
  private string $numeroCliente = "0001-1";

  public function getNomeCliente() {
    return $this->nomeCliente;
  }

  public function getSaldoCliente() {
    return $this->saldoCliente;
  }

  public function getNumeroCliente() {
    return $this->numeroCliente;
  }

  public function deposito($depositar){
    $this->saldoCliente += $depositar;
  }

  public function sacar($sacar){
    if($sacar < $this->saldoCliente && $sacar > 0){
    $this->saldoCliente -= $sacar;
    }
  }
}
?>
