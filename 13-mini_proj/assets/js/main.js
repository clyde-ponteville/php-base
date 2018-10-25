

$(document).ready(function(){

    $supp = $('.supp');
    $supp.css("display", 'none');

    $total = $('.total');
    $total.css("display", 'none');
    
    suppForSize();
});

function suppForSize(){
    $("#size").change(function(){
        var i =  $(this).val();        

        // Affiche et cache en fonction de la taille choisi
        switch (i) {
            case 's':
                $supp.css("display", 'none');
                $total.css("display", 'none');

                $('#0').css("display", "block");
                $('#10').css("display", "block");  

                break;
            case 'm':
                $supp.css("display", 'none');
                $total.css("display", 'none');

                $('#1').css("display", "block");
                $('#11').css("display", "block");  

                break;
            case 'l':
                $supp.css("display", 'none');
                $total.css("display", 'none');

                $('#2').css("display", "block");
                $('#12').css("display", "block");  

                break;
            case 'xl':
                $supp.css("display", 'none');
                $total.css("display", 'none');

                $('#3').css("display", "block");
                $('#13').css("display", "block");  

                break;    
        
            default:
                $supp.css("display", 'none');
                $total.css("display", 'none');
                break;
        }

    });
}