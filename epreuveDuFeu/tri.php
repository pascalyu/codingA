<?php
if ($argc < 2 ) {
	exit();
}
$values=$argv;

unset($values[0]);
$values=array_values($values);
//rsort($values);

$values=bubblesort($values);
showarray($values);

function bubblesort($array){
   $result=[];
   
   
    $inserted=false;
    for($index=0;$index < count($array);$index++){
        $result[]=null;
        $value=$array[$index];
      
        $counterResult=count($result);
        $jndex = 0 ;
       
       
        for($jndex; $jndex < $counterResult ; $jndex++){
          
            if($value>=$result[$jndex])
            {   
                if(isset($result[$jndex+1] ) && $result[$jndex+1] != null){
                    $tmp=$result[$jndex];
                    for($decal= $jndex; $decal < $counterResult ; $decal++){
                        $toinsert=$tmp;
                        if(isset($result[$decal+1]) && $result[$decal+1] !=null){
                             $tmp= $result[$decal+1];
                        }
                        else $tmp = null;
                        $result[$decal+1]=$toinsert;
                    }
                }
                else{
                     $result[$jndex+1]=$result[$jndex];
                }
                
                $result[$jndex]=$value;
                
                $inserted=true;
                break;
                
            }
            
    
        }
        if(!$inserted){
            $result[$jndex]=$value;  
        }
        
          $inserted=false; 
    }
    return $result;
    
}

function makeArrayOfZero($count){
    $result=[];
    for($index =0; $index < $count ; $index++){
        $result[$index]=0;        
        
        
    }
    
}

function showarray($values){
    foreach($values as $key =>$value){
        if($value==null) exit();
        echo '['.$key.']=> '.$value.' - ';
    }
    echo "\n";
}
?>
