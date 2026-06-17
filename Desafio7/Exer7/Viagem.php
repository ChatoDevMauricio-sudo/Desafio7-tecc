<?php
class Viagem {
    private string $origem;
    private string $destino;
    private float $distanciaKm;
    private float $tempoHoras;
    private string $tipoVeiculo;
    private float $consumoKmPorLitro;
    private float $precoCombustivel;

    public function __construct($origem, $destino, $distanciaKm, $tempoHoras, $tipoVeiculo, $consumoKmPorLitro, $precoCombustivel) {
        $this->origem = $origem;
        $this->destino = $destino;
        $this->distanciaKm = $distanciaKm;
        $this->tempoHoras = $tempoHoras;
        $this->tipoVeiculo = $tipoVeiculo;
        $this->consumoKmPorLitro = $consumoKmPorLitro;
        $this->precoCombustivel = $precoCombustivel;
    }

    public function calcularVelocidadeMedia() {
        if ($this->tempoHoras == 0) {
            return 0;
        }
        return $this->distanciaKm / $this->tempoHoras;
    }

    public function calcularConsumoEstimado() {
        return $this->distanciaKm / $this->consumoKmPorLitro;
    }

    public function calcularCustoViagem() {
        return $this->calcularConsumoEstimado() * $this->precoCombustivel;
    }

    public function exibirDetalhes() {
        $velocidadeMedia = $this->calcularVelocidadeMedia();
        $consumoEstimado = $this->calcularConsumoEstimado();
        $custoViagem = $this->calcularCustoViagem();

        return "
        <ul>
            <li>Viagem: {$this->origem} → {$this->destino}</li>
            <li>Veículo: {$this->tipoVeiculo} (consumo: " . number_format($this->consumoKmPorLitro, 1, ',', '.') . " km/l)</li>
            <li>Distância: " . number_format($this->distanciaKm, 1, ',', '.') . " km</li>
            <li>Tempo estimado: " . number_format($this->tempoHoras, 1, ',', '.') . " horas</li>
            <li>Velocidade média: " . number_format($velocidadeMedia, 1, ',', '.') . " km/h</li>
            <li>Consumo estimado: " . number_format($consumoEstimado, 2, ',', '.') . " litros</li>
            <li><strong>Custo da viagem: R$ " . number_format($custoViagem, 2, ',', '.') . "</strong></li>
        </ul>
        ";
    }
}
