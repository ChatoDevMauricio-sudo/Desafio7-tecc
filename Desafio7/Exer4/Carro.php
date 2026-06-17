<?php
class Carro {
    private string $modelo;
    private string $combustivel; // "etanol" ou "gasolina"
    private float $tanqueLitros;
    private float $consumoKmPorLitro;
    private float $kmRodados;

    private const KM_REVISAO = 10000; // intervalo de revisão em km

    public function __construct($modelo, $combustivel, $tanqueLitros, $consumoKmPorLitro, $kmRodados = 0) {
        $this->modelo = $modelo;
        $this->combustivel = strtolower($combustivel);
        $this->tanqueLitros = $tanqueLitros;
        $this->consumoKmPorLitro = $consumoKmPorLitro;
        $this->kmRodados = $kmRodados;
    }

    public function calcularAutonomia() {
        return $this->tanqueLitros * $this->consumoKmPorLitro;
    }

    public function calcularCustoPorKm(float $precoCombustivel) {
        return $precoCombustivel / $this->consumoKmPorLitro;
    }

    public function precisaRevisao() {
        // verdadeiro quando o carro passou de um múltiplo do intervalo de revisão
        return ($this->kmRodados % self::KM_REVISAO) >= (self::KM_REVISAO - 500)
            || $this->kmRodados >= self::KM_REVISAO;
    }

    public function exibirDetalhes(float $precoCombustivel) {
        $autonomia = $this->calcularAutonomia();
        $custoPorKm = $this->calcularCustoPorKm($precoCombustivel);
        $revisao = $this->precisaRevisao() ? "Sim, está na hora da revisão!" : "Não, ainda não é hora da revisão.";

        return "
        <ul>
            <li>Modelo: {$this->modelo} (Combustível: " . ucfirst($this->combustivel) . ")</li>
            <li>Tanque: " . number_format($this->tanqueLitros, 1, ',', '.') . " litros</li>
            <li>Consumo: " . number_format($this->consumoKmPorLitro, 1, ',', '.') . " km/l</li>
            <li>Autonomia estimada: " . number_format($autonomia, 1, ',', '.') . " km</li>
            <li>Custo por km: R$ " . number_format($custoPorKm, 2, ',', '.') . "</li>
            <li>Km já rodados: " . number_format($this->kmRodados, 0, ',', '.') . " km</li>
            <li><strong>Revisão necessária: {$revisao}</strong></li>
        </ul>
        ";
    }
}
