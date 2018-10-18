
<form action="" method="post">
    <input type="number" name="nombre1">
    <input type="number" name="nombre2">

    <div style="padding: 5px">
        <label style='cursor:pointer; display: inline-block; width: 100px' for="addition">Addition</label>
        <input type="radio" name="calcul" id="addition" value="add">
    </div>
    <div style="padding: 5px">
        <label style='cursor:pointer; display: inline-block; width: 100px'for="soustraction">Soustraction</label>
        <input type="radio" name="calcul" id="soustraction" value="sous">
    </div>
    <div style="padding: 5px">
        <label style='cursor:pointer; display: inline-block; width: 100px'for="division">Division</label>
        <input type="radio" name="calcul" id="division" value="divi">
    </div>
    <div style="padding: 5px">
        <label style='cursor:pointer; display: inline-block; width: 100px'for="multiplication">Multiplication</label>
        <input type="radio" name="calcul" id="multiplication" value="multi">
    </div>

    <div style="padding: 5px"><input type="submit" value='Calculer'></div>

</form>

<?php 

function calcul($nbr1, $nbr2){
    if (is_numeric($_POST['nombre1']) && is_numeric($_POST['nombre2'])) {
        if (isset($_POST['calcul'])) {       
            switch ($_POST['calcul']) {
                case 'add':        
                    $result = $nbr1 + $nbr2;
                    break;
                case 'sous':
                    $result = $nbr1 - $nbr2;
                    break;
                case 'divi':
                    $result = $nbr1 / $nbr2;
                    break;
                case 'multi':
                    $result = $nbr1 * $nbr2;
                    break;                
            }
        }else{
            $result = "Cocher un opérateur";
        }
    }else{
        $result = "Entrez un entier";
    }
    echo "<div id='result'>".$result."</div>";

}

    if (isset($_POST['nombre1']) && isset($_POST['nombre2'])) {                    
            $nbr1 = $_POST['nombre1'];
            $nbr2 = $_POST['nombre2'];
            calcul($nbr1, $nbr2);  
    }else{
        $result = "Pas de résultat";
        echo "<div id='result'>".$result."</div>";
    }
    


?>