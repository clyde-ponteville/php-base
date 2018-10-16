<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
    
</head>
<body>
    
<?php 
//Création tableaux
echo "<table>";
//Création en tete tableaux
echo "<th>x</th>";
for ($z=0; $z <= 10 ; $z++) { 
    echo "<th>".$z."</th>";
}
//Création body tableau
for ($i=0; $i <= 10; $i++) {    
    echo "<tr>";
    echo "<th>$i</th>";    
    for ($j=0; $j <= 10 ; $j++) {         
        echo  "<td>".$j * $i."</td>"; 
    }
}

echo "</tr></table>";


?>
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
<script src="js/main.js"></script>
</body>
</html>