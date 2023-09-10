<!DOCTYPE html>
<html>
<head>
    <title>Calendário Anual 2024</title>
    <style>
         h1 {
            text-align: center;
        }

        h2 {
            text-align: center;
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #000;
            padding: 10px;
            text-align: center;
            vertical-align: top; /* Alinhe verticalmente o conteúdo no topo */
            height: 60px; /* Altura mínima para todas as células */
            width: 100px
            
        }

        th {
            background-color: #f2f2f2;
        }

        td {
            background-color: #fff;
        }

        td:hover {
            background-color: #f2f2f2;
        }

        .feriado {
            background-color: #FFD700; /* Cor de fundo amarela para feriados */
        }
    </style>
</head>
<body>
<h1>Calendário Anual 2024</h1>

<?php
// Define os nomes dos meses em português
$nomesMeses = [
    1 => 'Janeiro',
    2 => 'Fevereiro',
    3 => 'Março',
    4 => 'Abril',
    5 => 'Maio',
    6 => 'Junho',
    7 => 'Julho',
    8 => 'Agosto',
    9 => 'Setembro',
    10 => 'Outubro',
    11 => 'Novembro',
    12 => 'Dezembro',
];

// Feriados nacionais no Brasil em 2024 (exemplo)
$feriados = [
    '01-01' => 'Ano Novo',
    '13-02' => 'Carnaval',
    '29-03' => 'Sexta - Feira  Santa',
    '07-04' => 'Páscoa',
    '21-04' => 'Tiradentes',
    '01-05' => 'Dia do Trabalhador',
    '07-09' => 'Independência do Brasil',
    '12-10' => 'Dia de Nossa Senhora Aparecida',
    '02-11' => 'Finados',
    '15-11' => 'Proclamação da República',
    '25-12' => 'Natal',
];

// Loop pelos meses do ano
for ($mes = 1; $mes <= 12; $mes++) {
    // Obtém o primeiro dia do mês
    $primeiroDia = mktime(0, 0, 0, $mes, 1, 2024);

    // Imprime o nome do mês
    echo "<h2>" . $nomesMeses[$mes] . "</h2>";

    // Cria a tabela do calendário
    echo "<table border='1'>";
    echo "<tr><th>Domingo</th><th>Segunda</th><th>Terça</th><th>Quarta</th><th>Quinta</th><th>Sexta</th><th>Sábado</th></tr>";

    // Obtém o número de dias no mês
    $diasNoMes = date("t", $primeiroDia);

    // Obtém o dia da semana do primeiro dia do mês (0 = Domingo, 1 = Segunda, etc.)
    $diaDaSemana = date("w", $primeiroDia);

    // Preenche os dias vazios no início do mês
    echo "<tr>";
    for ($i = 0; $i < $diaDaSemana; $i++) {
        echo "<td></td>";
    }

    // Loop pelos dias do mês
    for ($dia = 1; $dia <= $diasNoMes; $dia++) {
        // Verifica se o dia é um feriado
        $data = date("d-m", mktime(0, 0, 0, $mes, $dia, 2024));
        $feriado = isset($feriados[$data]) ? $feriados[$data] : "";

        // Classe CSS para feriados
        $classeFeriado = !empty($feriado) ? 'feriado' : '';

        // Imprime o dia
        echo "<td class='$classeFeriado'>$dia<br>$feriado</td>";

        // Se for sábado (6), fecha a linha da semana e inicia uma nova
        if ($diaDaSemana == 6) {
            echo "</tr>";
            if ($dia < $diasNoMes) {
                echo "<tr>";
            }
            $diaDaSemana = 0;
        } else {
            $diaDaSemana++;
        }
    }

    // Preenche os dias vazios no final do mês
    for ($i = $diaDaSemana; $i < 7; $i++) {
        echo "<td></td>";
    }

    echo "</tr></table>";
}
?>

</body>
</html>
