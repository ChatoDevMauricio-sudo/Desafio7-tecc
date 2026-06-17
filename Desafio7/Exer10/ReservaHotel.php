<?php
class ReservaHotel {
    private string $nomeHospede;
    private int $numeroNoites;
    private string $tipoQuarto; // "simples", "luxo" ou "suite"

    private const PRECOS = [
        'simples' => 120.0,
        'luxo'    => 200.0,
        'suite'   => 350.0,
    ];

    private const DESCONTO_ESTADIA_LONGA = 0.15; // 15% acima de 5 noites
    private const NOITES_PARA_DESCONTO = 5;

    public function __construct($nomeHospede, $numeroNoites, $tipoQuarto) {
        $this->nomeHospede = $nomeHospede;
        $this->numeroNoites = $numeroNoites;
        $this->tipoQuarto = strtolower($tipoQuarto);
    }

    public function getPrecoDiaria() {
        return self::PRECOS[$this->tipoQuarto] ?? 0;
    }

    public function calcularTotalSemDesconto() {
        return $this->getPrecoDiaria() * $this->numeroNoites;
    }

    public function temDesconto() {
        return $this->numeroNoites > self::NOITES_PARA_DESCONTO;
    }

    public function calcularDesconto() {
        if ($this->temDesconto()) {
            return $this->calcularTotalSemDesconto() * self::DESCONTO_ESTADIA_LONGA;
        }
        return 0;
    }

    public function calcularValorFinal() {
        return $this->calcularTotalSemDesconto() - $this->calcularDesconto();
    }

    public function exibirDetalhes() {
        $valorFinal = $this->calcularValorFinal();
        $mensagemDesconto = $this->temDesconto()
            ? "Desconto de 15% aplicado por estadia superior a 5 noites!"
            : "Sem desconto (estadia de até 5 noites).";

        return "
        <p>Seja bem-vindo(a), <strong>{$this->nomeHospede}</strong>! Sua reserva foi processada com sucesso.</p>
        <ul>
            <li>Tipo de quarto: " . ucfirst($this->tipoQuarto) . " (diária: R$ " . number_format($this->getPrecoDiaria(), 2, ',', '.') . ")</li>
            <li>Número de noites: {$this->numeroNoites}</li>
            <li>Total sem desconto: R$ " . number_format($this->calcularTotalSemDesconto(), 2, ',', '.') . "</li>
            <li>{$mensagemDesconto}</li>
            <li>Desconto aplicado: R$ " . number_format($this->calcularDesconto(), 2, ',', '.') . "</li>
            <li><strong>Valor final: R$ " . number_format($valorFinal, 2, ',', '.') . "</strong></li>
        </ul>
        ";
    }
}
