<?php 
$eleves = [
    0 => [
        'nom' => 'Matthieu',
        'notes' => [10, 8, 16, 20, 17, 16, 15, 2]
    ],
    1 => [
        'nom' => 'Thomas',
        'notes' => [4, 18, 12, 15, 13, 7]
    ],
    2 => [
        'nom' => 'Jean',
        'notes' => [17, 14, 6, 2, 16, 18, 9]
    ],
    3 => [
        'nom' => 'Enzo',
        'notes' => [1, 14, 6, 20, 1, 8, 9]
    ]
];
echo "<h2>1/ Afficher la liste de tous les éléves avec leurs notes</h2>";
//nom et notes
foreach ($eleves as $value) {
    echo $value['nom']." ";
    foreach ($value['notes'] as $notes) {
        echo $notes.", ";
    }
    echo "<br>";
}
echo "<br>";
echo "<h2>2/ Calculer les moyennes des élèves</h2>";
//nom et moyenne des notes
foreach ($eleves as $key => $not) {
    $tblNoteLen = $eleves[$key]['notes'];
    $moyenne = 0;
    foreach ($tblNoteLen as  $moy) {
        $moyenne += $moy;   
    }
    $moyenne /= count($tblNoteLen);
    echo "La moyenne de ".$not['nom']." est : ".round($moyenne, 2)."<br>";
}
echo "<br>";
echo "<h2>3/ Combien d'élèves ont la moyenne ?</h2>";
//nom et moyenne des notes
$nbrEleve = 0;
foreach ($eleves as $key => $note) {
    $tblNoteLen = $eleves[$key]['notes'];
    $moyenne = 0;
    foreach ($tblNoteLen as  $moy) {
        $moyenne += $moy;   
    }
    $moyenne /= count($tblNoteLen);
    $moyenne = round($moyenne, 2);
    
    if ($moyenne >= 10) {
        echo $note['nom']." a la moyenne <br>";
        $nbrEleve++;
    }else{
        echo $note['nom']." n'a pas la moyenne <br>";
    }
}
echo "Nombre d'éléves avec la moyenne : ". $nbrEleve."<br>";

echo '<br>';
echo "<h2>4/ Quel(s) éléve(s) a(ont) la meilleure note ?</h2>";
//eleves avec la meilleur note
$bestNote = 0;
$noteMax = 0;
foreach ($eleves as $value) {  
    $noteMax = max($value['notes']);
    echo "La meilleur note de ".$value['nom']." est ". $noteMax;
    echo "<br>";   
}
echo '<br>';
foreach ($eleves as $eleve) {
    foreach ($eleve['notes'] as $note) {
        if($note > $bestNote){
            $bestNote = $note;
        }
    }
}
$i = 0; 
foreach ($eleves as $eleve) {
    foreach ($eleve['notes'] as $note) {
        if($note == $bestNote){
            $i++;
            if ($i == 1) {
                echo $eleve["nom"];                
                $n = " a la meilleur note "; 
            } else {
                echo " et ".$eleve["nom"];
                $n =  " ont la meilleur note "; 
            }
            
        }
    }
}
echo $n;




echo '<br><br>';
echo "<h2>5/ Qui a eu au moins un 20 ?</h2>";
//qui a eu 20
$noteMax = 0;
foreach ($eleves as $value) {  
    $noteMax = max($value['notes']);     
    if($noteMax == 20){
        echo "Quelqu'un a eu au moins 20 <br>";
        break;       
    }else{        
        echo "Personne n'a eu 20 <br>";
        break;  
    } 
}

echo '<br><br>';
echo "<h2>6/ Tri à bulles</h2>";


foreach ($eleves as $value) { 
    echo  $value["nom"]." ";
    asort($value['notes']);
    
    // for ($i=0; $i < count($value['notes']) ; $i++) { 
    //     $val1 = $value['notes'][$i];
    //     $val2 =  $value['notes'][$i+1];
    //     $valR = $val1;        

    //     if($val1 < $val2){
    //         $val1 = $val2;
    //         $val2 = $valR;

    //         var_dump("val1 ".$val1);
    //         var_dump("val2 ".$val2);
    //         var_dump("valR ".$valR);
    //         break;
    //     }else{
    //         $val1 = $valR;
    //     }
        
    // }
    foreach ($value['notes'] as $key => $notes) {
        
        $tst = $notes;
        
        echo $tst." ";
        
    }
    echo '<br>';
}



?>