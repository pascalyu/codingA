<?php
if ($argc < 2 || !is_numeric($argv[1])) {
	exit();
}
$value=$argv[1];

$result=1;
for($index = 1; $index <= $value ; $index++){
    
    $result *=$index;
}
echo factorielRecursive($value);
function factorielRecursive($value){
    
    if($value<=1) return 1;
    return $value*factorielRecursive(($value-1));
    
    
}

?>
