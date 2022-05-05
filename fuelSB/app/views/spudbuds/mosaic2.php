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
        let thing = document.getElementById("dropMenu " + x);
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
        //console.log(currentColors);\
        // console.log(thing.value);
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

    <div class="error">
    <input class="text_box"  type="text" name = 'number' id="number" required><br>
    <div class="num_of_cells"> Invalid number parameters. Must be in range 1-26</div>
    </div>

    <label for="color">Number of Unique Colors</label>

    <div class="error">
    <input class="text_box" type="text" name = 'color' id = 'color' required><br>
    <div class="unique_colors"> Invalid rows/color parameters. Must be in range 1-10 </div>
    </div>
    
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
            echo "<select id=\"dropMenu $x\" onchange=\"updateFunc($x)\">
                <option id=\"blank\"></option>";
                //Loop through Colors arrays and make option in menu
                foreach($colors as $colorVals){
                   echo "<option style=\"background-color:$colorVals\" id=\"$colorVals\">$colorVals</option>";
                }
                //Add radio button to table 
                echo"<input type=\"radio\" id=\"radioButton $x\" name=\"radioName\"";
                echo"<label for=\"radioButton\">Color selected for bottom table</label>";
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
            echo "<table id=\"tableTwo\" border =\"1px\" style=\"width:100%\">";
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
                    echo "<td id=cell", $x ,",",$y - 1, ">&nbsp</td>";
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
<script>

    //find all colored table cells in table two, change with the color parameter
    //note: this function is called everytime a radio button is selected
    function findAllColored(colorToChange){
        //makes a nodelist of all elements in tabletwo with a style assigned
        let allColored = document.querySelectorAll('#tableTwo [style]');
       
        //sorts through nodelist and changes color with colorToChange
        for(i = 0; i < allColored.length; i++){
            document.getElementById(allColored[i].id).style.backgroundColor = colorToChange;
        }
    }

    //Need to get current color of the first drop down menu
    //When clicked, get the id of the first drop down menu and make that the color
    
    function getCurrSelectedColor(){
        //Get all input values
        let currSelected;
        var ele = document.getElementsByTagName('input');
        for(i = 0; i < ele.length; i++) {
            if(ele[i].type=="radio") {
                if(ele[i].checked){
                    //Return the currently selected elements id color
                    currSelected = (ele[i].id);
                }
            }
        }
        //Get the index of the menu that is the same as the radio button 
        const temp = currSelected.split(" ");
        let currIndexofMenu = temp[1];
        //Return the current color 
        return document.getElementById("dropMenu " + currIndexofMenu).style.backgroundColor;
    }
    
    // change background color of cell in table2
    var globalColor = "red";
    $("#tableTwo td").click(function(){
        let currID = $(this).attr('id');
        document.getElementById(currID).style.backgroundColor = getCurrSelectedColor();
        globalColor = getCurrSelectedColor();
    });    

    //onclick event for radioButton
    $("input:radio").change(function (){
        var idIndex = this.id.split(' ');
        var styleColor = document.getElementById("dropMenu " + idIndex[1]).style.backgroundColor;
        // console.log(styleColor);

        //function call to make the cells change color from radio button selected 
        findAllColored(styleColor);

    });

    //Change first radioButton to have be selected by default
    var firstButton = document.getElementById("radioButton 0");
    firstButton.setAttribute("checked", "checked");
    
    



</script>
</html>
