<?php

function drawLine($str){
    for ($i = 0; $i < strlen($str); $i++) {
        echo "\n";
        for ($j = 0; $j < strlen($str); $j++) {
            if ($i == $j) {
                echo $str[$i];
            } else {
                echo " ";
            }
        }
    }
}

drawLine('DUMBWAYS');
echo "\n";
drawLine('DEV99');
