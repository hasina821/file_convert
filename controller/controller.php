<?php
require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;


require_once("../model/Model.php");
try {
    if (isset($_FILES['input']) && $_FILES['input']['error'] == 0 AND isset($_FILES['output']) && $_FILES['output']['error'] == 0)
    {
        if (($_FILES['input']['size'] <= 4100000) AND ($_FILES['output']['size'] <= 4100000))
        {
            if(isset($_FILES['output']) && $_FILES['output']['error'] == 0){
                $fileInfo1 = pathinfo($_FILES['input']['name']);
                $fileInfo2 = pathinfo($_FILES['output']['name']);
                $extension1 = $fileInfo1['extension'];
                $extension2 = $fileInfo2['extension'];
                $allowedExtensions = ['xlsx','xls'];
                if (in_array($extension1, $allowedExtensions) AND in_array($extension2, $allowedExtensions))
                {
                    try {
                        move_uploaded_file($_FILES['input']['tmp_name'], '../uploads/' . basename($_FILES['input']['name']));
                        move_uploaded_file($_FILES['output']['tmp_name'], '../uploads/' . basename($_FILES['output']['name']));
                        //--------------------------------------------algo de comparaison---------------------------------------
                        
                        $file1 = "../uploads/".basename($_FILES['input']['name']);
                        $file2 = "../uploads/".basename($_FILES['output']['name']);

                                                
                        $reader = new Xlsx();
                        $spreadsheet = $reader->load($file1);
                        //---
                        $output = $reader->load($file2);
                            
                        $sheetData = $spreadsheet->getActiveSheet()->toArray();
                        $outData = $output->getActiveSheet()->toArray();

                        $id = array();
                        for($i = 0 ; $i < count($sheetData) ; $i++){
                            if($sheetData[$i][6] == "N/A")
                                array_push($id,$sheetData[$i][0]);
                        }


                        for($i = 0 ; $i < count($outData) ; $i++){
                            if(in_array($outData[$i][0],$id)){
                                $worksheet = $output->getActiveSheet();
                                $worksheet->getCell('B'.$i+1)->setValue('N/A');
                                $worksheet->getCell('C'.$i+1)->setValue('N/A');
                                $worksheet->getCell('D'.$i+1)->setValue('N/A');
                                $worksheet->getCell('E'.$i+1)->setValue('N/A');
                                $worksheet->getCell('F'.$i+1)->setValue('N/A');
                                $worksheet->getCell('G'.$i+1)->setValue('N/A');
                                $worksheet->getCell('H'.$i+1)->setValue('N/A');
                                $worksheet->getCell('I'.$i+1)->setValue('N/A');
                                $worksheet->getCell('J'.$i+1)->setValue('N/A');

                            }
                        }

   
                        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($output, 'Xlsx');
                        $writer->save('../result/result.xlsx'); 

                        unlink($file1);
                        unlink($file2);
                                                
                        
                    //--------------------------------                     

                    } catch (Exception $e) {
                        echo $e -> getMessage();
                    }
                    $dossier="../result";
                    if ($handle = opendir($dossier)) {
                        while (false !== ($entry = readdir($handle))) {
                            if ($entry != "." && $entry != "..") {
                                $lien= "<a href='../result/result.xlsx'>".$entry."</a>\n";
                            }
                        }
                        closedir($handle);
                    }
                    require_once('../view/result.php');
                }else{
                    echo "Verifier le type de l'un de votre fichier";
                }
            
            }else{
                echo "Veuillez choisir le fichier de output";
            }
 
        }else{
            echo "La taille de l'un de vos fichier est trop grand";
        }
        
    
    }else{
        echo "Veuillez choisir le fihier de input";
    }
    
} catch (Exception $e) {
    echo $e -> getMessage();
}



?>
