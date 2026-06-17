<?php
class Produto {
    private string $nome;
    private int $quantidadeEstoque;
    private float $valorUnitario;

    public function __construct($nome, $quantidadeEstoque, $valorUnitario) {
        $this->nome = $nome;
        $this->quantidadeEstoque = $quantidadeEstoque;
        $this->valorUnitario = $valorUnitario;
    }

    public function entrada(int $quantidade) {
        $this->quantidadeEstoque += $quantidade;
        return $this->quantidadeEstoque;
    }

    public function saida(int $quantidade) {
        if ($quantidade > $this->quantidadeEstoque) {
            return false; // estoque insuficiente
        }
        $this->quantidadeEstoque -= $quantidade;
        return $this->quantidadeEstoque;
    }

    public function consultarValorTotal() {
        return $this->quantidadeEstoque * $this->valorUnitario;
    }

    public function getQuantidadeEstoque() {
        return $this->quantidadeEstoque;
    }

    public function exibirDetalhes(string $operacao, int $quantidadeMovimentada) {
        $mensagemOperacao = "";

        if ($operacao === 'entrada') {
            $this->entrada($quantidadeMovimentada);
            $mensagemOperacao = "Entrada de {$quantidadeMovimentada} unidades registrada.";
        } elseif ($operacao === 'saida') {
            $resultado = $this->saida($quantidadeMovimentada);
            $mensagemOperacao = $resultado === false
                ? "Erro: estoque insuficiente para saída de {$quantidadeMovimentada} unidades."
                : "Saída de {$quantidadeMovimentada} unidades registrada.";
        } else {
            $mensagemOperacao = "Nenhuma movimentação realizada (apenas consulta).";
        }

        return "
        <ul>
            <li>Produto: {$this->nome}</li>
            <li>Operação: {$mensagemOperacao}</li>
            <li>Quantidade em estoque (atual): {$this->quantidadeEstoque}</li>
            <li>Valor unitário: R$ " . number_format($this->valorUnitario, 2, ',', '.') . "</li>
            <li><strong>Valor total em estoque: R$ " . number_format($this->consultarValorTotal(), 2, ',', '.') . "</strong></li>
        </ul>
        ";
    }
}
