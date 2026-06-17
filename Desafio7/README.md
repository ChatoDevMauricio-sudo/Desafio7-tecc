# Desafio 7 — PHP Básico (POO)

Coleção de 11 exercícios práticos de PHP com Programação Orientada a Objetos,
cada um com formulário HTML + classe + lógica de cálculo.

## Estrutura

```
Desafio7/
├── Exer1/   → Classe Funcionario (resumo, hora extra, bônus)
├── Exer2/   → Classe Aluno (média e status: aprovado/recuperação/reprovado)
├── Exer3/   → Classe Pedido (total, desconto premium, imposto)
├── Exer4/   → Classe Carro (autonomia, custo por km, revisão)
├── Exer5/   → Classe Produto (entrada/saída de estoque, valor total)
├── Exer6/   → Classe ConversorMoeda (Real x USD/EUR)
├── Exer7/   → Classe Viagem (velocidade média, consumo, custo)
├── Exer8/   → Classe CalculadoraFinanceira (parcelamento com juros compostos)
├── Exer9/   → Classe Pessoa (IMC e classificação)
├── Exer10/  → Classe ReservaHotel (diária, desconto por estadia longa)
└── Exer11/  → Classe CalculadoraGeometrica (área de quadrado/retângulo/círculo)
```

Cada pasta `ExerXX/` contém:
- `index.php` — formulário HTML + lógica de uso da classe
- `Classe.php` — classe PHP com encapsulamento e métodos de cálculo
- `README.md` — enunciado e instruções específicas do exercício

## Como executar qualquer exercício

Dentro da pasta do exercício desejado:

```bash
php -S localhost:8000
```

Depois acesse `http://localhost:8000` no navegador.

## Requisitos
- PHP 8.0 ou superior (testado com PHP 8.3)
- Nenhuma dependência externa

## Observações
- Todas as classes usam tipagem de propriedades e encapsulamento (`private`).
- Os valores monetários são formatados com `number_format` no padrão brasileiro (R$ 1.234,56).
- Todos os arquivos foram validados com `php -l` (sem erros de sintaxe) e testados com dados de exemplo.
