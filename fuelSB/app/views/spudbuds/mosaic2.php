<html>


    <form method="get" action="mosaic2.php">


    <label for="number">Number Rows/Cols</label>
    <input type="text" name = 'number' id="number" required><br>
    <label for="color">Color</label>
    <input type="text" name = 'color' id = 'color' required><br>

    <input type="submit" value="Submit">
   


</form>





<div class="table2">
<?php

    $colors = array("red", "orange", "yellow", "green", "blue", "purple", "grey", "brown", "black", "teal");

    $boolNum = FALSE;
    $boolColor = FALSE;


    $number = 0;
    $color = 0;

    if(isset($_GET['number'])){
        $number = $_GET['number'];
        if($number >= 1 && $number <=26){
            $boolNum = TRUE;
        }
        else{
            $boolNum = FALSE;
            echo "Invalid number parameters. Must be in range 1-26<br>";
        }  
    }

    if(isset($_GET['color'])){
        $color = $_GET['color'];
        if($color >= 1 && $color <=10){
            $boolColor = TRUE;

        }
        else{
        $boolColor = FALSE;
        echo "Invalid color parameters. Must be in range 1-10";
        }
        
    }

    if($boolColor == TRUE && $boolNum==TRUE){
        
        echo "<div class=\"table1\">";
        //Sammy's nice code for first table
        echo "<table style=\"width:100%\"border =\"1px\" >";
        $flag = false;
        for($x=0; $x < $color; $x++){
            echo "<tr>";
            //took out extra semicolon
            echo "<td style=\"width:20%\"> 
            <select name=\"flagcolors\">
                <option value=\"blank\"></option>
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
            echo "<td style=\"width:80%\"> na </td>";
            echo"</tr>";
        }
        echo"</table>";
        echo"</div>";

        echo "<div class=\"table2\" style=\"margin-top:60px\">";
        //Thad's jank ass code for table2
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
            echo"</div>";

    }


    //This is a sample of what I was going to do for changing the colors of the td
    // the basic idea of how to store the item selected in the drop down.

        // echo "
        // <form action=\"mosaic2.php\" method=\"POST\">
        
        //     <select name=\"topic_name\">
        //         <option>Topic 1</option>
        //         <option>Topic 2</option>
        //         <option>Topic 3</option>
        //     </select>
        //     <input type=\"submit\" value=\"submit\">
        // </form>";

        // if(isset($_POST['topic_name'])){
        //     echo $_POST["topic_name"];
        //     }
            



?>




<div>




<html>
