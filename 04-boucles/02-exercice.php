<?php

echo '<br> <h2>Etoiles</h2><br>';

for ($i=0; $i <= 10; $i++) { 
    for ($j=0; $j < $i; $j++) { 
        echo '⭐';
    }
    echo '<br>' ;   
}

echo '<br> <h2>Triangle iso</h2><br>';

$fullStar = 1;
$indexStar = 5;

for ($i=0; $i < 6; $i++) { 
    for ($j=0; $j < 11; $j++) {
        if ($j == $indexStar) {            
            for ($z=0; $z < $fullStar; $z++) { 
                echo '⭐'; 
            }   
            $j += $fullStar -1;             
        }else{
            echo '🌟';
        }
        

    }
    $indexStar--;
    $fullStar +=2;
    echo '<br>' ;   
}

?>