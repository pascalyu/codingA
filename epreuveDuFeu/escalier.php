<?php
if ($argc < 2 || !is_numeric($argv[1])) {
	exit();
}

$stairsLength=$argv[1];
for($stairLevel = 0; $stairLevel<$stairsLength;$stairLevel++){
    for($spaceNumber = 0 ; $spaceNumber < $stairsLength-$stairLevel; $spaceNumber++){
        echo " ";
    }
    for($starsNumber = 0 ; $starsNumber <= $stairLevel; $starsNumber++){
        echo "*";
    }
    echo "\n";
}
?>