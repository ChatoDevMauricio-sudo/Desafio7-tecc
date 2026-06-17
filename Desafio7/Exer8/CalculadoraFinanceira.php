<?php
class CalculadoraFinanceira {
    private float $valorCompra;
    private int $numeroParcelas;
    private float $taxaJurosMensal; // decimal, ex: 0.02 para 2%

    public function __construct($valorCompra, $numeroParcelas, $taxaJurosMensal) {
        $this->valorCompra = $valorCompra;
        $this->numeroParcelas = $numeroParcelas;
        $this->taxaJurosMensal = $taxaJurosMensal;
    }

    // Montante total com juros compostos: valor * (1 + juro) ^ n
    public function calcularMontanteTotal() {
        return $this->valorCompra * pow(1 + $this->taxaJurosMensal, $this->numeroParcelas);
    }

    public function calcularValorParcela() {
        return $this->calcularMontanteTotal() / $this->numeroParcelas;
    }

    public function calcularTotalAPagar() {
        return $this->calcularMontanteTotal();
    }

    public function calcularJurosPagos() {
        return $this->calcularMontanteTotal() - $this->valorCompra;
    }

    public function exibirDetalhes() {
        $valorParcela = $this->calcularValorParcela();
        $totalAPagar = $this->calcularTotalAPagar();
        $jurosPagos = $this->calcularJurosPagos();

        return "
        <ul>
            <li>Valor da compra: R$ " . number_format($this->valorCompra, 2, ',', '.') . "</li>
            <li>Número de parcelas: {$this->numeroParcelas}</li>
            <li>Taxa de juros mensal: " . number_format($this->taxaJurosMensal * 100, 2, ',', '.') . "%</li>
            <li>Valor de cada parcela: R$ " . number_format($valorParcela, 2, ',', '.') . "</li>
            <li>Total a pagar: R$ " . number_format($totalAPagar, 2, ',', '.') . "</li>
            <li><strong>Juros pagos: R$ " . number_format($jurosPagos, 2, ',', '.') . "</strong></li>
        </ul>
        ";
    }
}
