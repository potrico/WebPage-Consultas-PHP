<?php

include './conexao.php';

$query_events = "SELECT e.id, e.title, e.color, e.start, e.end, p.nome FROM events e INNER JOIN paciente p ON e.fk_idpaciente = p.id_Paciente";
$resultado_events = $conn->prepare($query_events);
$resultado_events->execute();

$eventos = [];

while($row_events = $resultado_events->fetch(PDO::FETCH_ASSOC)){
    $id = $row_events['id'];
    $title = $row_events['title'];
    $color = $row_events['color'];
    $start = $row_events['start'];
    $end = $row_events['end'];
    $nome_paciente = $row_events['nome'];
    
    $eventos[] = [
        'id' => $id, 
        'title' => $title, 
        'color' => $color, 
        'start' => $start, 
        'end' => $end,
        'fk_idpaciente' => $nome_paciente,
        ];
}

echo json_encode($eventos);