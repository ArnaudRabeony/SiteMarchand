<?php
require('./model/connection.php');
require('model/marque.php');
require('model/taille.php');
require('model/categorie_produit.php');
require('model/sport.php');

//  Include PHPExcel_IOFactory
include 'PHPExcel_1/Classes/PHPExcel/IOFactory.php';

$inputFileName = 'controller/listeArticles.xls';

//  Read your Excel workbook
try 
{
    $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
    $objPHPExcel = $objReader->load($inputFileName);
} 
catch(Exception $e)
{
    die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
}

// Select the sheet
$sheet = $objPHPExcel->getSheet(0); 

//  Loop through each row of the worksheet in turn
for ($row = 2; $row <= $sheet->getHighestRow(); $row++){ 
    //  Read a row of data into an array

    $dataArray = array('reference'   => $objPHPExcel->getActiveSheet()->getCell("A" . $row),
                       'libelle'     => $objPHPExcel->getActiveSheet()->getCell("B" . $row),
                       'description' => $objPHPExcel->getActiveSheet()->getCell("D" . $row),
                       'prix'        => $objPHPExcel->getActiveSheet()->getCell("G" . $row),
                       'photo'       => '',
                       'taille'      => getIdTailleByName($db, $objPHPExcel->getActiveSheet()->getCell("H" . $row)),
                       'categorie'   => getIdCategorieByName($db, $objPHPExcel->getActiveSheet()->getCell("F" . $row)),
                       'sport'       => getIdSportByName($db, $objPHPExcel->getActiveSheet()->getCell("E" . $row)),
                       'marque'      => getIdMarqueByName($db, $objPHPExcel->getActiveSheet()->getCell("C" . $row))
                       );

    foreach($dataArray as $value)
        echo $value . "<br>";
    echo "<br><br>";
}
?>