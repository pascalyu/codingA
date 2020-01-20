<?php
if ($argc < 2 || !is_string($argv[1])) {
	exit();
}

$myString=strtolower($argv[1]);
$myStringArray=str_split($myString);
$characterIndex=0;

foreach($myStringArray as $index => $character){
    if($characterIndex %2 === 0  ){
    echo "$character";
    }
    else{
        echo strtoupper($character);
    }
    if($character!==" "){
        $characterIndex++;
        
    }
}
?>