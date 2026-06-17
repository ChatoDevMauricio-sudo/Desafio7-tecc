<?php
class Pessoa {
    private string $nome;
    private float $peso; // kg
    private float $altura; // metros

    public function __construct($nome, $peso, $altura) {
        $this->nome = $nome;
        $this->peso = $peso;
        $this->altura = $altura;
    }

    public function calcularIMC() {
        if ($this->altura <= 0) {
            return 0;
        }
        return $this->peso / ($this->altura ** 2);
    }

    public function getClassificacao() {
        $imc = $this->calcularIMC();

        if ($imc < 18.5) {
            return "Abaixo do peso";
        } elseif ($imc < 25) {
            return "Peso normal";
        } elseif ($imc < 30) {
            return "Sobrepeso";
        } else {
            return "Obesidade";
        }
    }

    public function exibirDetalhes() {
        $imc = $this->calcularIMC();
        $classificacao = $this->getClassificacao();

        return "
        <ul>
            <li>Nome: {$this->nome}</li>
            <li>Peso: " . number_format($this->peso, 1, ',', '.') . " kg</li>
            <li>Altura: " . number_format($this->altura, 2, ',', '.') . " m</li>
            <li>IMC: " . number_format($imc, 2, ',', '.') . "</li>
            <li><strong>Classificação: {$classificacao}</strong></li>
        </ul>
        ";
    }
}
