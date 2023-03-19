<?php
include('simplehtmldom_1_9_1 (1)/simple_html_dom.php');

// Obtener el HTML de la hoja de cálculo
$url = 'https://docs.google.com/spreadsheets/d/1_3dDzWaeNbKW7Jkk4viPtyPjsI7IX9zIFjkSmbSrOXE/edit?usp=sharing';
$html = file_get_contents($url);

// Analizar el HTML y obtener los datos de la tabla
$table = str_get_html($html)->find('table', 0);
$rows = $table->find('tr');
$data = array();
foreach ($rows as $row) {
    $rowData = array();
    foreach ($row->find('td') as $cell) {
        if ($cell->plaintext !== '') { // Omitir las celdas vacías
            $rowData[] = $cell->plaintext;
        }
    }
    if (!empty($rowData)) { // Omitir las filas vacías
        $data[] = $rowData;
    }
}

// Imprimir los datos en una tabla HTML
echo '<table border="1">';
foreach ($data as $row) {
    echo '<tr>';
    foreach ($row as $cell) {
        echo '<td>' . $cell . '</td>';
    }
    echo '</tr>';
}
echo '</table>';
