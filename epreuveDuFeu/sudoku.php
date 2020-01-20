<?php
if ($argc < 2 || !is_string($argv[1])) {
	exit();
}


$file1=file_get_contents ($argv[1]);

$rows=explode("\n",$file1);

$sudoku = purgeNotNecessaryCharacters($rows);
$resolvedSudoku=resolveSudoku($sudoku);
printSudokuMatrix($resolvedSudoku);


function resolveSudoku($sudoku){
    while(hasUnknownValue($sudoku)){
     for($index=0; $index<9;$index++){
        for($jndex=0;$jndex<9;$jndex++){
            if($sudoku[$index][$jndex]==='_'){
                echo $index.' ';
                echo $jndex."\n";
                $row= getRowsFromIndex($sudoku,$index);
          
          
                $column=getColumnsFromIndex($sudoku,$jndex);
                $cut=getCutRectangle($sudoku, getStartPosition($index), getStartPosition($jndex),3,3);
                sort($row);
                sort($column);
                sort($cut);
                $value="_";
                 if(hasOneUnknownValue($row)){
                     $value=findUnknownValue($row);
                 };
                 if(hasOneUnknownValue($column)){
                     $value=findUnknownValue($column);
                 }; 
                 if(hasOneUnknownValue($cut)){
                     $value=findUnknownValue($cut);
                 };
                $sudoku[$index][$jndex]=strval($value);
              
              
            }
            
        }
    }
    }return $sudoku;
}

function hasUnknownValue($sudoku){
    foreach($sudoku as $row){
        $arrayCountValues=array_count_values($row);
        if(isset($arrayCountValues['_']) && $arrayCountValues['_'] >0) return true;
    
    }
    return false;
    
    
}

function hasOneUnknownValue($array){
    $arrayCountValues=array_count_values($array);
    if($arrayCountValues['_'] >1) return false;
    return true;
    
}

function findUnknownValue($array){
   
    for($suggestValue=0 ; $suggestValue <=9;$suggestValue++){
       if(!in_array($suggestValue,$array)){
           return $suggestValue;
       }
    }
    return "_";
    
}

function myPrint($array){
    foreach($array as $key => $value){
        echo $value." , "; 
        
    }
    echo "\n";
    
}


function getRowsFromIndex($sudoku,$index){
    return $sudoku[$index];
    
}

function getColumnsFromIndex($sudoku,$jndex){
    $result=array();
    foreach($sudoku as $key => $row){
        $result[]=$row[$jndex];
    }
    return $result;
    
    
}
function getStartPosition($index){
    if($index<3) return 0;
    if($index>5) return 6;
    return 3;
}


function purgeNotNecessaryCharacters($rows){
    $result=array();
    foreach($rows as $index => $row){
        if($row==="---+---+---"){
            unset($rows[$index]);
        }else{
            $row=str_replace ('|','',$row);
            $cases=str_split($row);
            $result[]=$cases;
        }
        
        
    }
    return $result;
}

function getCutRectangle($rectangle,$rowPos,$columnPos,$rowsNumber,$columnsNumber){
    
    $result=array();
    $columnsTotal=$columnPos+$columnsNumber;
    $rowTotal=$rowPos+$rowsNumber;
    $columnPosInitial=$columnPos;
    $row=0;
 
    for($rowPos;$rowPos<$rowTotal;$rowPos++){
        $columnPos=$columnPosInitial;
    
        for($columnPos;$columnPos<$columnsTotal;$columnPos++){
            if(!isset($rectangle[$rowPos]) || !isset($rectangle[$columnPos][$rowPos])) return array();
            $result[]=$rectangle[$rowPos][$columnPos];
          
            
            
        }
        $row++;
    }
    return $result;
    
    
}


function printSudokuMatrix($sudoku){
    for($index=0;$index<9;$index++){
        for($jndex=0;$jndex<9;$jndex++){
            if($jndex>0 &&  $jndex<9 && ($jndex)%3===0) echo '|';
            echo $sudoku[$index][$jndex];
        
        } 
        echo "\n";
        if($index>0 && $index<8 && ($index+1)%3===0) echo '---+---+---'."\n";
        
    }
}
?>