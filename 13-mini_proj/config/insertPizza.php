<?php
// Retourne l'emplacement du fichier
$file = $_FILES['img']['tmp_name'];
var_dump($file);

// Récupère le nom du fichier
$originalName = $_FILES['img']['name'];
var_dump($originalName);

// Récupère l'extension du fichier
$extension = pathinfo($originalName)['extension'];
var_dump($extension);

// Renomme le fichier
$md5 = md5($originalName.uniqid());
$filename = $md5.'.'.$extension;

var_dump($filename);

// Déplace le fichier vers un répertoire
move_uploaded_file($file, __DIR__.'/../assets/img/pizzas/'.$filename);

require_once(__DIR__.'/database.php');

var_dump($_POST);
$namePizza = $_POST['name'];
$pricePizza = $_POST['price'];

//protege les chaines
$namePizza = $db->quote($namePizza); 

if (isset($namePizza) && is_numeric($pricePizza) && isset($filename)) {

    $addPizza = $db->prepare("INSERT INTO pizza (name, price, image) VALUES (".$namePizza.",".$pricePizza.",'img/pizzas/".$filename."')"); 
    var_dump($addPizza);   
    $addPizza->execute();    
    $pizza_id = $db->lastInsertId();


    for ($i=1; $i <= 4; $i++) { 
        if(isset($_POST[$i]) && $_POST[$i] == 'on'){
            $size_id = $i;
            $addSize = $db->prepare("INSERT INTO pizza_has_size (pizza_id, size_id) VALUES (".$pizza_id.", ".$size_id.")");
            $addSize->execute();
        }
    }

    header('Location: ../addpizza.php?done=1');
    
}else{
    header('Location: ../addpizza.php?done=0');
}







?>