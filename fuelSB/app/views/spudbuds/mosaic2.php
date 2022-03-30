<html>


    <form method="get" action="mosaic2.php">


    <label for="number">Number Rows/Cols</label>
    <input type="text" name = 'number' id="number"><br>
    <label for="color">Color</label>
    <input type="text" name = 'color' id = 'color'><br>

    <input type="submit" value="Submit">
   


</form>

<div class="table2">
<?php


    $colors = array("red", "orange", "yellow", "green", "blue", "purple", "grey", "brown", "black", "teal");

    $boolNum = FALSE;
    $boolColor = FALSE;


    $number;

    if(isset($_GET['number'])){
        $number = $_GET['number'];
        if($number >= 1 && $number <=26){
            $boolNum = TRUE;
            // echo "testing number should be whatever I give and submit: " , $number, "<br>";
            
            // echo "<table border =\"1px\" >";
            // for($x=0; $x <= 5; $x++){
            //     echo "<tr>";
        
            //     for($y=0; $y< 2; $y++){
            //         echo "<td> Fuck </td>";
            //     }
            //     echo"</tr>";
            // }
            
            // echo"</table>";
         
        }
        else{
            $boolNum = FALSE;
            echo "you fucked up";
        }

        
    }
    echo "number", $number;
    

    

    if(isset($_GET['color'])){
        $color = $_GET['color'];
        if($color >= 1 && $color <=10){
            $boolColor = TRUE;

        }
        else{
        $boolColor = FALSE;
        echo "<br>testing color should be blahhhh given: ", $color;
        }
        
    }
    echo "color", $color;
    


    
            
            

            echo "<table border =\"1px\" style=\"width:100%\">";
            
            echo"<tr>";
            echo"<th>";
            $alph = 'A';
            for($i=0; $i<$number; $i++){
                echo "<th>" , $alph, "</th>";
                $alph++;
            }
            echo"</tr>";
            

            $counter = 1;

            for($x=0; $x <= $number -1; $x++){
                echo "<tr>";
                for($y=0; $y<=$number; $y++){
                    if($y == 0){
                        echo "<td>", $counter, "</td>";
                        $counter++;
                    }
                    else{
                    echo "<td><div class =\"table2\">na</td>";
                    }
                }
                echo"</tr>";
            }
            
            echo"</table>";
        







    
    
    

?>
<div>

<html>
