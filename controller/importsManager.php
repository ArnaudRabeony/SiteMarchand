<?php

// echo realpath("../");

require_once('./model/connection.php');
include('./model/marque.php');
include('./model/taille.php');
include('./model/categorie_produit.php');
include('./model/sport.php');
include('./model/produit.php');

//  Include PHPExcel_IOFactory
include 'PHPExcel_1/Classes/PHPExcel/IOFactory.php';



if($_FILES['selectedFile']['error']>0)
{
  echo "upload failed";
}
else
{
  $path = $_FILES['selectedFile']['name'];
  $ext = pathinfo($path, PATHINFO_EXTENSION);
  print_r($_FILES);

  //Save on the server
  $to ="../files/".$_FILES['selectedFile']['name'];
  move_uploaded_file($_FILES['selectedFile']['tmp_name'], $to);
  echo "uploaded";

  if($ext==="xls")
  {  
      $inputFileName = $_FILES['selectedFile']['name'];


        // $inputFileName = 'controller/listeArticles.xls';

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

      //TODO : Delete * from table
      deleteProductTable($db);

      //  Loop through each row of the worksheet in turn
      for ($row = 2; $row <= $sheet->getHighestRow(); $row++)
      { 
          //  Read a row of data into an array

          $dataArray = array('reference'   => $objPHPExcel->getActiveSheet()->getCell("A" . $row),
                             'libelle'     => $objPHPExcel->getActiveSheet()->getCell("B" . $row),
                             'description' => $objPHPExcel->getActiveSheet()->getCell("D" . $row),
                             'prix'        => $objPHPExcel->getActiveSheet()->getCell("G" . $row),
                             'photo'       => 'photo',
                             'taille'      => getIdTailleByName($db, $objPHPExcel->getActiveSheet()->getCell("H" . $row)),
                             'categorie'   => getIdCategorieByName($db, $objPHPExcel->getActiveSheet()->getCell("F" . $row)),
                             'sport'       => getIdSportByName($db, $objPHPExcel->getActiveSheet()->getCell("E" . $row)),
                             'marque'      => getIdMarqueByName($db, $objPHPExcel->getActiveSheet()->getCell("C" . $row))
                             );
          addProduct($db, $dataArray);
      }
  }
  else if($ext==="csv")
  {
    echo "TODO : test csv";
  }

  
}
?>