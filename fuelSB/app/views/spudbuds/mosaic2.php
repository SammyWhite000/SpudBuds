<script>
    //Array to hold currently selected colors
    let currentColors = [10];

    //check if color is present in array, return true if it is
    function checkColors(x){
        for(let i = 0; i < 10; i++){
            if(currentColors[i] == x){
                return true;
            }
        }
        //Return false otherwise
        return false;
    }
    // Funciton to change color of drop down menu
    function updateFunc(x){
        //Get the current dropDown element by ID
        let thing = document.getElementById(x);
        //Add a style to it once it is selected
        thing.style.backgroundColor = thing.value;
        //Check if Color is already selected, if true
        //set back to blank and display alert
        if(checkColors(thing.value)){
            thing.value = document.getElementById(".blank"); 
            thing.style.backgroundColor = "";
            alert("Cannot Select this Color: It is already Used");
        }
        //if not, add to array
        else{
            currentColors[x] = thing.value;
        }
        //Display Color for debugging purposes
        console.log(thing.value);
    }

    // Chenge backgorund color of cell in table2
    function changeTableColor(){
        console.log("Change color working")
    }
</script>
<html>
    <div id="why">
        <p>These color coordinate sheets are actively used in Vision Therapy for certain vision disorders.<br> 
        The top table will consist of colors that you would like to use for the color coordinates. The bottom table will be the colors in use
        for the vision therapy. <br>
        Start by inputing the number of columns and rows that you would like to generate. The mosaic table will always
        be have the same number of columns and rows. <br>
        Next, determine the number of unique colors that you would like to use. <br>
        After the tables are generated, you will have the ability to print your table in grayscale. <br>
        </p>
    </div>

    <!-- Setup for text boxes and submit button -->
    <form method="get" action="mosaic2.php">
    <label for="number">Number of Rows/Cols (one number)</label>
    <input type="text" name = 'number' id="number" required><br>
    <label for="color">Number of Unique Colors</label>
    <input type="text" name = 'color' id = 'color' required><br>
    <input type="submit" value="Submit">
    </form>

<?php
//Table two

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
        echo "Invalid rows/color parameters. Must be in range 1-10<br>";
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
            echo "<td style=\"width:20%\">";

            //Code for Drop down menu
            echo "<select id=\"$x\" onchange=\"updateFunc($x)\">
                <option id=\"blank\"></option>";
                //Loop through Colors arrays and make option in menu
                foreach($colors as $colorVals){
                   echo "<option style=\"background-color:$colorVals\" id=\"$colorVals\">$colorVals</option>";
                }
            //End of drop down menu 
            echo "</select>
            </td>";
            echo "<td style=\"width:80%\"></td>";
            echo"</tr>";
        }
        echo"</table>";
        echo"</div>"; //End of div id="table1
?>
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
                    echo "<td></td>";
                    }
                }
                echo"</tr>";
            }
            
            echo"</table>";
            echo"</div>"; // End of "<div id=\"table2\">";
    }
    echo"<button onClick=\"window.print()\">Print this page</button>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
    echo "<br>";
?>
</html>
