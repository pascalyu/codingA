<?php
if ($argc < 2 || !is_string($argv[1])) {
	exit();
}


$file1=file_get_contents ($argv[1]);
$file2=file_get_contents ($argv[2]);

$matrice1=rectangleStringToMatrice($file1);
$matrice2=rectangleStringToMatrice($file2);


echo foundRectanglePosition($matrice1,$matrice2);



function rectangleStringToMatrice($rectangleString){
    $rectangleArray= str_split($rectangleString);
    $result=array();
    $index=0;
    foreach($rectangleArray as $value){
        if($value!=="\n"){
            $result[$index][]=$value;
        }
        else{
            $index++;
        }
    }
    return $result;
}

function foundRectanglePosition($rectangleToFound,$rectangle){
    $posX;
    $posY;
    $rowIndex=0;
    $columnIndex=0;
    $rowsNumber1=getRowsNumberRectangle($rectangleToFound);
    $columnsNumber1=getColumnsNumberRectangle($rectangleToFound);
    
    
    $rowsNumber2=getRowsNumberRectangle($rectangle);
    $columnsNumber2=getColumnsNumberRectangle($rectangle);
    
    
    $firstValueToFound=$rectangleToFound[0][0];
    for($rowIndex;$rowIndex<$rowsNumber2;$rowIndex++){
         $columnIndex=0;
        for($columnIndex;$columnIndex<$columnsNumber2;$columnIndex++){
        
            if($firstValueToFound===$rectangle[$rowIndex][$columnIndex]){
                
                $cutRectangle=getCutRectangle($rectangle,$rowIndex,$columnIndex,$rowsNumber1,$columnsNumber1);
                if($cutRectangle===$rectangleToFound){
                    
                    return $columnIndex.','.$rowIndex;
                    
                }
                
                
            }
            
        }
        
        
    }
    
}

function getCutRectangle($rectangle,$rowPos,$columnPos,$rowsNumber,$columnsNumber){
    
    $result;
    $columnsTotal=$columnPos+$columnsNumber;
    $rowTotal=$rowPos+$rowsNumber;
    $columnPosInitial=$columnPos;
    $row=0;
 
    for($rowPos;$rowPos<$rowTotal;$rowPos++){
        $result[$row]=array();
        $columnPos=$columnPosInitial;
    
        for($columnPos;$columnPos<$columnsTotal;$columnPos++){
            if(!isset($rectangle[$rowPos]) || !isset($rectangle[$columnPos][$rowPos])) return array();
            $result[$row][]=$rectangle[$rowPos][$columnPos];
          
            
            
        }
        $row++;
    }
    return $result;
    
    
}
function getRowsNumberRectangle($rectangle){
    return count($rectangle);
}

function getColumnsNumberRectangle($rectangle){
    return count($rectangle[0]);
}
?>