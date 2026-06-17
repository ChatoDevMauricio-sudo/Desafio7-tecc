<?php
class Pedido {
    private string $produto;
    private int $quantidade;
    private float $precoUnitario;
    private string $tipoCliente; // "normal" ou "premium"

    private const DESCONTO_PREMIUM = 0.10; // 10%
    private const IMPOSTO = 0.08; // 8%

    public function __construct($produto, $quantidade, $precoUnitario, $tipoCliente) {
        $this->produto = $produto;
        $this->quantidade = $quantidade;
        $this->precoUnitario = $precoUnitario;
        $this->tipoCliente = strtolower($tipoCliente);
    }

    public function calcularTotalBruto() {
        return $this->quantidade * $this->precoUnitario;
    }

    public function calcularDesconto() {
        if ($this->tipoCliente === 'premium') {
            return $this->calcularTotalBruto() * self::DESCONTO_PREMIUM;
        }
        return 0;
    }

    public function calcularSubtotal() {
        return $this->calcularTotalBruto() - $this->calcularDesconto();
    }

    public function calcularImposto() {
        return $this->calcularSubtotal() * self::IMPOSTO;
    }

    public function calcularTotalFinal() {
        return $this->calcularSubtotal() + $this->calcularImposto();
    }

    public function exibirDetalhes() {
        return "
        <ul>
            <li>Produto: {$this->produto} (Cliente: " . ucfirst($this->tipoCliente) . ")</li>
            <li>Quantidade: {$this->quantidade}</li>
            <li>Preço unitário: R$ " . number_format($this->precoUnitario, 2, ',', '.') . "</li>
            <li>Total bruto: R$ " . number_format($this->calcularTotalBruto(), 2, ',', '.') . "</li>
            <li>Desconto: R$ " . number_format($this->calcularDesconto(), 2, ',', '.') . "</li>
            <li>Imposto (8%): R$ " . number_format($this->calcularImposto(), 2, ',', '.') . "</li>
            <li><strong>Total final: R$ " . number_format($this->calcularTotalFinal(), 2, ',', '.') . "</strong></li>
        </ul>
        ";
    }
}
