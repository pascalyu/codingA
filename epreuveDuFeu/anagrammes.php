<?php
if ($argc < 2 || !is_string($argv[1])) {
	exit();
}
$wordToFound=$argv[1];
$words=wordsStringToArray(file_get_contents ($argv[2]));



foundAnagrammes($wordToFound,$words);


function wordsStringToArray($wordsString){
    return  explode("\n", $wordsString);
}

function foundAnagrammes($wordToFound,$words){
   
    $result=array();
    foreach($words as $word){
        if(isAnagramme($wordToFound,$word)){
            
            $result[]=$word;
            echo $word.' ';
        }
        
    }
    return $result;

    
}

function isAnagramme($word,$anotherWord){
    $characters=str_split($word);
    $charactersToCompare=str_split($anotherWord);
    sort($characters);
    sort($charactersToCompare);
    foreach($characters as $index => $character){
        if($charactersToCompare[$index] !== $character){
            return false;
        } 
    }
   return true;
}
?>