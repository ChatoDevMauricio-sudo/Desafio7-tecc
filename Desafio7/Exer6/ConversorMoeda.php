<?php
class ConversorMoeda {
    private float $valorReais;
    private string $moedaDestino; // "USD" ou "EUR"
    private float $cotacao; // quantos reais vale 1 unidade da moeda destino

    public function __construct($valorReais, $moedaDestino, $cotacao) {
        $this->valorReais = $valorReais;
        $this->moedaDestino = strtoupper($moedaDestino);
        $this->cotacao = $cotacao;
    }

    public function converter() {
        switch ($this->moedaDestino) {
            case 'USD':
            case 'EUR':
                return $this->valorReais / $this->cotacao;
            default:
                return null;
        }
    }

    public function getSimbolo() {
        return match($this->moedaDestino) {
            'USD' => '$',
            'EUR' => '€',
            default => '?',
        };
    }

    public function exibirDetalhes() {
        $valorConvertido = $this->converter();

        if ($valorConvertido === null) {
            return "<p>Moeda de destino inválida.</p>";
        }

        return "
        <ul>
            <li>Valor em reais: R$ " . number_format($this->valorReais, 2, ',', '.') . "</li>
            <li>Moeda destino: {$this->moedaDestino}</li>
            <li>Cotação utilizada: R$ " . number_format($this->cotacao, 4, ',', '.') . "</li>
            <li><strong>Valor convertido: {$this->getSimbolo()} " . number_format($valorConvertido, 2, '.', ',') . "</strong></li>
        </ul>
        ";
    }
}
