<html>

    <!-- Setup for text boxes and submit button -->
    <form method="get" action="mosaic2.php">
    <label for="number">Number Rows/Cols</label>
    <input type="text" name = 'number' id="number" required><br>
    <label for="color">Color</label>
    <input type="text" name = 'color' id = 'color' required><br>
    <input type="submit" value="Submit">
    </form>

<?php
//Table two

    $colorU = array("red", "orange", "yellow", "green", "blue", "purple", "grey", "brown", "black", "teal");
    $colors = array("Red", "Orange", "Yellow", "Green", "Blue", "Purple", "Grey", "Brown", "Black", "Teal");
    //Boolean values to check if both values are updated/have a value
    $boolNum = FALSE;
    $boolColor = FALSE;

    //Initialize variabels for number of rows and columns and number of colors
    $number = 0;
    $color = 0;

    //GET Event for number of rows and columns and set boolean == true
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

    //GET event to get number of colors we will be using and set boolean to true 
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

    //Only if both variables have values, start generating tables
    if($boolColor == TRUE && $boolNum==TRUE){
        //Start of div "<div id=\"table1\">"
        echo "<div id=\"table1\">";
        //Sammy's nice code for first table
        echo "<table style=\"width:100%\"border =\"1px\" >";
        $flag = false;
        for($x=0; $x < $color; $x++){
            //Start of table
            echo "<tr>";
            //Start of Drop Down menu: First Item is blank 
            echo "<td style=\"width:20%\"> 
            <select id=\"flag\" value=\"$x\" onchange=\"updateFunc($x)\">
                <option class=\"blank\"></option>";
                //Loop through Colors arrays and make option in menu
                foreach($colors as $colorVals){
                   echo "<option style=\"background-color:$colorVals\" id=\"$colorVals\" value=\"$colorVals\">$colorVals</option>";
                }
            //End of drop down menu 
            echo "</select>
            </td>";
            echo "<td style=\"width:80%\"> na </td>";
            echo"</tr>";
        }
        echo"</table>";
        echo"</div>"; //End of div id="table1
//Javascript that will look for event change  
?>
<script>
    console.log("REE");
    let colorOption1 = document.querySelectorAll("#flag");
    function updateFunc(x){
        console.log("Test");
        console.log(x);
        console.log(colorOption1[x].id);
    }
</script>
<?php
        echo "<div id=\"table2\">";
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
                    echo "<td>na</td>";
                    }
                }
                echo"</tr>";
            }
            
            echo"</table>";
            echo"</div>"; // End of "<div id=\"table2\">";
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

        echo"<button onClick=\"window.print()\">Print this page</button>";
?>
<html>
