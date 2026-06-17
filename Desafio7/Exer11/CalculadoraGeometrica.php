<?php
class CalculadoraGeometrica {
    private string $figura; // "quadrado", "retangulo" ou "circulo"
    private float $medida1; // lado, base ou raio
    private float $medida2; // altura (apenas para retângulo)

    public function __construct($figura, $medida1, $medida2 = 0) {
        $this->figura = strtolower($figura);
        $this->medida1 = $medida1;
        $this->medida2 = $medida2;
    }

    public function calcularArea() {
        switch ($this->figura) {
            case 'quadrado':
                return $this->medida1 ** 2;
            case 'retangulo':
                return $this->medida1 * $this->medida2;
            case 'circulo':
                return M_PI * ($this->medida1 ** 2);
            default:
                return null;
        }
    }

    public function getNomeFigura() {
        $nomes = [
            'quadrado'  => 'Quadrado',
            'retangulo' => 'Retângulo',
            'circulo'   => 'Círculo',
        ];
        return $nomes[$this->figura] ?? 'Figura desconhecida';
    }

    public function exibirDetalhes() {
        $area = $this->calcularArea();

        if ($area === null) {
            return "<p>Figura inválida.</p>";
        }

        $detalheMedidas = match($this->figura) {
            'quadrado'  => "Lado: " . number_format($this->medida1, 2, ',', '.'),
            'retangulo' => "Base: " . number_format($this->medida1, 2, ',', '.') . ", Altura: " . number_format($this->medida2, 2, ',', '.'),
            'circulo'   => "Raio: " . number_format($this->medida1, 2, ',', '.'),
            default     => '',
        };

        return "
        <ul>
            <li>Figura: {$this->getNomeFigura()}</li>
            <li>{$detalheMedidas}</li>
            <li><strong>Área: " . number_format($area, 2, ',', '.') . "</strong></li>
        </ul>
        ";
    }
}
