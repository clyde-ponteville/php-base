<?php 
echo "<h2>le Mot</h2>";

acronym("World of Warcraft");

echo "<br>";
echo "<h2>Les conjugaison</h2>";

conjug("manger");

echo "<br>";
echo "<h2>Bonux</h2>";

$lorem = "Lorem ipsum dolor sit amet consectetur ipsum adipisicing elit. Vitae, et. ipsum Ratione consectetur ipsum adipisicing elit. Vitae consectetur";
surlign($lorem, "ipsum");


function acronym($chaine){
    $array_keywords = explode(' ', $chaine);    
    foreach ($array_keywords as $word) {
        // $letterLen = strlen($word);
        // $letter = substr($word, 0 , 1 - $letterLen );
        echo strtoupper($word[0]);
    }
}

function conjug($verbe){

    $tst = ["je ","tu ","il ","nous ","vous ","ils "];
    $allVerbe = array(
        "premier" => array("e","es","e","ons","ez","ont"),
        "deuxieme" => array("is","is","i","issons","issez","issont")
    );

    $voyelles=  array("a",'e','i','o','u','y');

    $verbeOut = substr($verbe, 0 , -2);
    $terminaison1 = substr($verbe, -2);

    $firstletterVerb = $verbe[0];

    $lastletterVerb = substr($verbeOut, -1);

    //si la premiere lettre du verbe et dans le tableau voyelles
    if(in_array($firstletterVerb, $voyelles)){
        $tst[0] = "j'";
    }

    if ($lastletterVerb == "g") {
        $allVerbe["premier"][3] = "eons";
    }
    
    echo "<h3>".$verbe."</h3>";
    foreach ($allVerbe as $key => $groupe) {    
        if ($key == "premier" && $terminaison1 == 'er') {
            foreach ($groupe as $key => $value) {            
                echo $tst[$key].$verbeOut.$value."<br>";                
            }             
        }
        
        if ($key == "deuxieme" && $terminaison1 == 'ir') {
            foreach ($groupe as $key => $value) {            
                echo $tst[$key].$verbeOut.$value."<br>";                
            }             
        }
    }
}

function surlign($lorem, $ipsum){
    $array_keywords = explode(' ', $lorem);
    
    foreach ($array_keywords as $key => $value) {
        if ($value == $ipsum) {
            echo("<span style='background-color:yellow; font-weight: bold;'>".$value."</span>");
        }else{
            echo(" ".$value." ");
        }
    }
}

?>