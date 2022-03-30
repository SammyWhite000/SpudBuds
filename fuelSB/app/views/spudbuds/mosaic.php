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
    $color;
    //Wokrong on the first table
    if(isset($_GET['color'])){
        $color = $_GET['color'];
        echo "<br>testing color should be blahhhh given: ", $color;

    }
    
    echo "<table style=\"width:100%\"border =\"1px\" >";

    $flag = false;
    for($x=0; $x <= $color; $x++){
        echo "<tr>";
        echo "<td style=\"width:20%\">; 
        <select name=\"flagcolors\">
            <option value=\"red\">Red</option>
            <option value=\"orange\">Orange</option>
            <option value=\"yellow\">Yellow</option>
            <option value=\"green\">Green</option>
            <option value=\"blue\">Blue</option>
            <option value=\"purple\">Purple</option>
            <option value=\"grey\">Grey</option>
            <option value=\"teal\">Teal</option>
        </select>
        </td>";
        echo "<td style=\"width:80%\"> Bitch </td>";
        echo"</tr>";
    }
    echo"</table>";

    $colors = array("red", "orange", "yellow", "green", "blue", "purple", "grey", "brown", "black", "teal");
    if(isset($_GET['number'])){
        $number = $_GET['number'];
        if($number >= 1 && $number <=26){
            echo "testing number should be whatever I give and submit: " , $number, "<br>";
        }
        else{
            echo "you fucked up";
        }

        
    }

?>