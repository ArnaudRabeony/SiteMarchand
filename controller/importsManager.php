<?php

// echo realpath("../");
require_once(dirname(__FILE__) . '/../../connection.php');

require_once(dirname(__FILE__) . '/../../model/marque.php');
require_once(dirname(__FILE__) . '/../../model/categorie_produit.php');
require_once(dirname(__FILE__) . '/../../model/taille.php');
require_once(dirname(__FILE__) . '/../../model/sport.php');
require_once(dirname(__FILE__) . '/../../model/produit.php');

//  Include PHPExcel_IOFactory
include 'PHPExcel_1/Classes/PHPExcel/IOFactory.php';

if($_FILES['selectedFile']['error']>0)
  echo "upload failed";
else
{

  $added=0;
  $cptr=0;

  $path = $_FILES['selectedFile']['name'];
  $filePath = "./files/".$_FILES['selectedFile']['name'];
  $ext = pathinfo($path, PATHINFO_EXTENSION);
  print_r($_FILES);

  //Save on the server
  $to ="../files/".$_FILES['selectedFile']['name'];
  move_uploaded_file($_FILES['selectedFile']['tmp_name'], $to);
  echo "uploaded";

  if($ext==="xls")
  {  
      $inputFileName = $filePath;

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
      // deleteProductTable($db);

      //  Loop through each row of the worksheet in turn
      for ($row = 2; $row <= $sheet->getHighestRow(); $row++)
      { 
          //  Read a row of data into an array

          $productArray = array('reference'   => $objPHPExcel->getActiveSheet()->getCell("A" . $row),
                             'libelle'     => $objPHPExcel->getActiveSheet()->getCell("B" . $row),
                             'description' => $objPHPExcel->getActiveSheet()->getCell("D" . $row),
                             'prix'        => $objPHPExcel->getActiveSheet()->getCell("G" . $row),
                             'photo'       => $objPHPExcel->getActiveSheet()->getCell("H" . $row),
                             'categorie'   => getIdCategorieByName($db, $objPHPExcel->getActiveSheet()->getCell("F" . $row)),
                             'sport'       => getIdSportByName($db, $objPHPExcel->getActiveSheet()->getCell("E" . $row)),
                             'marque'      => getIdMarqueByName($db, $objPHPExcel->getActiveSheet()->getCell("C" . $row))
                             );

           if(addProduct($db, $productArray));
              $added++;

            $cptr++;
      }
  }
  else if($ext==="csv")
  {   
    $handle=fopen($filePath, "r");
    $i =0;
    $firstRow=true;
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
    {
        if($firstRow)
          $firstRow=false;
        else
        {
          $idCategory= $data[5];
          $idSport= $data[4];
          $idBrand= $data[2];
          
          $productArray=array('reference'   => "REF".$data[0],
                           'libelle'     => $data[1],
                           'description' => $data[3],
                           'prix'        => $data[6],
                           'photo'       => $data[7],
                           'categorie'   => $idCategory,
                           'sport'       => $idSport,
                           'marque'      => $idBrand
                           );

          // print_r($productArray);

          if(addProduct($db, $productArray));
            $added++;

          $cptr++;        
        }          
    }

    fclose($handle);
  }

if($added==$cptr)
  header("location:index.php?page=view/manageProducts"); 

}
?>
