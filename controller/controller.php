<?php
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

                        /*
                        ici l'algo
                        
                        */

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
                    echo "Non c'est pas ok";
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