<?php
// Traitement du formulaire
$namePizza = $pricePizza = $file = $category = $description = null;


if (!empty($_POST)) {
    // Retourne l'emplacement du fichier
    $file = $_FILES['img']['tmp_name'];    
    
    // Récupère le nom du fichier
    $originalName = $_FILES['img']['name'];    
    
    // Récupère l'extension du fichier
    $extension = pathinfo($originalName)['extension'];
    
    // Renomme le fichier
    $md5 = md5($originalName.uniqid());
    $filename = $md5.'.'.$extension;    
    
    
    
    require_once(__DIR__.'/database.php');

    $namePizza = $_POST['name'];
    $pricePizza = $_POST['price'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    
    //Definir un tableau pour les erreurs
    
    $errors = [];

    // Vérifier le name
    if (empty($namePizza)) {
        $errors['0'] = 'errName=name';
    }
    // Vérifier le price
    if (!is_numeric($pricePizza) || $pricePizza < 5 || $pricePizza > 19.99) {
        $errors['1'] = 'errPrice=price';
    }

    
    // Vérifier l'image
    $finfo = finfo_open(FILEINFO_MIME_TYPE); // Permet d'ouvrir un fichier
    $mimeType = finfo_file($finfo, $file); // ouvre le fichier et renvoie image/jpg
    $allowedExtensions = ['image/jpg','image/jpeg','image/png','image/gif'];
    if (!in_array($mimeType, $allowedExtensions)) {
        $errors['2'] = 'errImg=image';
    }
    
    // Vérifier la catégorie
    if (empty($category) || !in_array($category, ['0','1','2','3'])) {
        $errors['3'] = 'errCat=category';
        
    }
    // Vérifier la description
    if (empty($description)) {
        $errors['4'] = 'errDesc=description';
        
    }

    

    if (empty($errors)) {
        
        if (isset($namePizza) && is_numeric($pricePizza) && isset($description) && is_numeric($category) && isset($extension)) {

            // Déplace le fichier vers un répertoire
            move_uploaded_file($file, __DIR__.'/../assets/img/pizzas/'.$filename);
        
            $addPizza = $db->prepare("INSERT INTO pizza (name, price, category_id, description ,image) 
                                        VALUES (:namePizza, :pricePizza, :category, :description, :filename)"); 
            $addPizza->bindValue(':namePizza', $namePizza, PDO::PARAM_STR);
            $addPizza->bindValue(':pricePizza', $pricePizza, PDO::PARAM_STR);
            $addPizza->bindValue(':category', $category, PDO::PARAM_STR);
            $addPizza->bindValue(':description', $description, PDO::PARAM_STR);
            $addPizza->bindValue(':filename', 'img/pizzas/'.$filename, PDO::PARAM_STR);

            $addPizza->execute();     
            $pizza_id = $db->lastInsertId();
        
        
            for ($i=1; $i <= 4; $i++) { 
                if(isset($_POST[$i]) && $_POST[$i] == 'on'){
                    $size_id = $i;
                    $addSize = $db->prepare("INSERT INTO pizza_has_size (pizza_id, size_id) VALUES (:pizza_id, :size_id)");
                    $addSize->bindValue(':pizza_id', $pizza_id, PDO::PARAM_INT);
                    $addSize->bindValue(':size_id', $size_id, PDO::PARAM_INT);

                    $addSize->execute();                    
                }
            }
        
            header('Location: ../addpizza.php?done=1');
            
        }else{
            header('Location: ../addpizza.php?done=0');
        }
    }else{

        $nbrErr = 0;
        foreach ($errors as $key => $value) { 
            $nbrErr++;            
            if (count($errors) == $nbrErr) {
                $allErr = $allErr . $value;
            }else{                
                $allErr = $allErr . $value.'&';
            }
        }
        
        header("Location: ../addpizza.php?".$allErr);
    }
    
}









?>