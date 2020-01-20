<?php
if ($argc < 2 ) {
	exit();
}
$values=$argv;

unset($values[0]);
rsort($values);
foreach($values as $value){
    echo $value.' ';
}
?>
