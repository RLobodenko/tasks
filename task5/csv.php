<?php 
header('Content-Type: text/csv;charset=utf-8');
     header('Content-Disposition: attachment; filename=data.csv');
     $csv = fopen('php://temp', 'w');
     $region = $_POST['country'];
     require_once 'generate.php';
    $errorCount = intval($_POST['errors_count']);
    $pageNumber = intval($_POST['seed']);
    $data = json_decode($_SESSION['data']);

     foreach($d_new as $r){ 
        fputcsv($csv, $r);
     }
     rewind($csv);
     fpassthru($csv);
     fclose($csv);


     ?>