<?php 
echo "<h2>le Mot</h2>";

$chaine = "World of Warcraft";
$array_keywords = explode(' ', $chaine);

foreach ($array_keywords as $word) {
    $letterLen = strlen($word);
    $letter = substr($word, 0 , 1 - $letterLen );
    echo strtoupper($letter);
}

echo "<br>";

echo "<h2>Les conjugaison</h2>";


conjug("jouer");

function conjug($verbe){

    $tst = ["je","tu","il","nous","vous","ils"];
    $allVerbe = array(
        "premier" => array("e","es","e","ons","ez","ont"),
        "deuxieme" => array("is","is","i","issons","issez","issont")
    );

    $verbeLen = strlen($verbe);
    $verbeOut = substr($verbe, 0 ,$verbeLen - 2);
    $terminaison1 = substr($verbe, $verbeLen - 2);
    
    echo "<h3>".$verbe."</h3>";
    foreach ($allVerbe as $key => $groupe) {
    
        if ($key == "premier" && $terminaison1 == 'er') {
            foreach ($groupe as $key => $value) {            
                echo $tst[$key]." ".$verbeOut.$value."<br>";                
            }             
        }
        
        if ($key == "deuxieme" && $terminaison1 == 'ir') {
            foreach ($groupe as $key => $value) {            
                echo $tst[$key]." ".$verbeOut.$value."<br>";                
            }             
        }
    }
}


?>