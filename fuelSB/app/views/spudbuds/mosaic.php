<html>
    <form method="get" action="mosaic.php">


    <label for="number">Number Rows/Cols</label>
    <input type="text" name = 'number' id="number"><br>
    <label for="color">Color</label>
    <input type="text" name = 'color' id = 'color'><br>

    <input type="submit" value="Submit">
   
<html>


</form>

<?php


    $colors = array("red", "orange", "yellow", "green", "blue", "purple", "grey", "brown", "black", "teal");






    if(isset($_GET['number'])){
        $number = $_GET['number'];
        if($number >= 1 && $number <=26){
            echo "testing number should be whatever I give and submit: " , $number, "<br>";
            
            echo "<table border =\"1px\" >";
            for($x=0; $x <= 5; $x++){
                echo "<tr>";
        
                for($y=0; $y< 2; $y++){
                    echo "<td> Fuck </td>";
                }
                echo"</tr>";
            }
            
            echo"</table>";
        


            
        }
        else{
            echo "you fucked up";
        }

        
    }


    

    if(isset($_GET['color'])){
        $color = $_GET['color'];
        echo "<br>testing color should be blahhhh given: ", $color;

    }
    
    

?>