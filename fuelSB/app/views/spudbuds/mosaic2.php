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
        After the tables are generated, you will have the ability to print your table in grayscale but will not be able to change the colors afterwards. <br>
        </p>
    </div>

    <!-- Setup for text boxes and submit button -->
    <form method="get" action="mosaic2.php">

    <label for="number">Number of Rows/Cols (one number)</label>

    <div class="error">
    <input class="text_box"  type="text" name = 'number' id="number" required><br>
    <!--<div class="num_of_cells"> Invalid number parameters. Must be in range 1-26</div> -->
    </div>

    <label for="color">Number of Unique Colors</label>

    <div class="error">
    <input class="text_box" type="text" name = 'color' id = 'color' required><br>
    <!--<div class="unique_colors"> Invalid rows/color parameters. Must be in range 1-10 </div> -->
    </div>
    
    <input id="submit" type="submit" value="Submit">

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
            //echo "Invalid number parameters. Must be in range 1-26<br>";
            echo "<div class=\"num_of_cells\"> Invalid number parameters. Must be in range 1-26</div>";
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
        //echo "Invalid rows/color parameters. Must be in range 1-10<br>";
        echo "<div class=\"unique_colors\"> Invalid number of unique color parameters. Must be in range 1-10 </div>";

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
            echo "<td id=\"table1Cell $x\", style=\"width:80%\"></td>";
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
            $alphabet = array("A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M"
            , "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");
            for($x=0; $x <= $number -1; $x++){
                echo "<tr>";
                for($y=0; $y<=$number; $y++){
                    if($y == 0){
                        echo "<td>", $counter, "</td>";
                        $counter++;
                    }
                    else{
                        echo "<td id=cell", $alphabet[$y-1] ,",",$x+1 , ">&nbsp</td>";
                    }
                }
                echo"</tr>";
            }
            
            echo"</table>";
            echo"</div>"; // End of "<div id=\"table2\">";
    }
    echo"<button id=\"printButton\">Print this page</button>";
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
        return currIndexofMenu = temp[1];
        //Return the current color 
        //return document.getElementById("dropMenu " + currIndexofMenu).style.backgroundColor;
    }

    function orderHTML(currString){
        array = [];
        unsortedArray = currString.innerText.split(' ');
        unsortedArray.sort();
        console.log(unsortedArray);
        let returnString = "";
        for(let x = 0; x < unsortedArray.length; x++){
            returnString += (unsortedArray[x] + " ");
        }
        console.log("Return String " + returnString);
        return returnString;
    }

    //Add or remove cells for the inner html file
    function addOrRemoveHTML(currID, radioButtonID, currentCell, addOSub){
        var dropMenuColor = document.getElementById("dropMenu " + radioButtonID).style.backgroundColor;
        //1 == add; 0 == Remove
        if(addOSub == 1){
            document.getElementById(currID).style.backgroundColor = dropMenuColor;
            //Append current cell to end of html string
            document.getElementById("table1Cell " + radioButtonID).innerHTML += currentCell + " "; 
            document.getElementById("table1Cell " + radioButtonID).innerHTML = orderHTML(document.getElementById("table1Cell " + radioButtonID));
        }
        else{
            //Remove from list; Save current html inside table in a string
            orderHTML(document.getElementById("table1Cell " + radioButtonID));
            let htmlStr = document.getElementById("table1Cell " + radioButtonID).innerHTML;
            //Replace the current cell that is selected with a space so it goes away in string
            var ret = htmlStr.replace(currentCell,'');
            document.getElementById("table1Cell " + radioButtonID).innerHTML = ret;
        }
        //Now need to sort inner html, should be easy
    }

    function changeInnerHTML(currID, radioButtonID, currentCell){
        //Get how many drop down menu's there are
        var numColors = parseInt("<?php echo $color; ?>");  
        //Get color before we change it
        var previousColor = document.getElementById(currID).style.backgroundColor; 
        //For loop to get the current Drop down menu with previous color; once found, remove currID from inner HTML
        for(let x = 0; x < numColors; x++){
            currentDropMenuColor = document.getElementById("dropMenu " + x).style.backgroundColor; 
            if(currentDropMenuColor == undefined ||  currentDropMenuColor == ""){
                continue;
            }
            else if(document.getElementById("dropMenu " + x).style.backgroundColor == previousColor){
                //Need this to remove cell form Previous color
                addOrRemoveHTML(currID, x, currentCell, 0);
            }
            
        }
        addOrRemoveHTML(currID, radioButtonID, currentCell, 0);
    
    }
    
    // change background color of cell in table2
    $("#tableTwo td").click(function(){
        let currID = $(this).attr('id');
        let radioButtonID = getCurrSelectedColor();
        var dropMenuColor = document.getElementById("dropMenu " + radioButtonID).style.backgroundColor;
        let xAndYCell = currID.substr(4).split(",");
        let currentCell = String(xAndYCell[0]) + String(xAndYCell[1]);

        //If element already has background color -> remove the background color
        if(document.getElementById(currID).style.backgroundColor == dropMenuColor){
            //If background is alread set, remove styling so it goes away
            document.getElementById(currID).removeAttribute("style");
            //Remove the inner html 
            changeInnerHTML(currID, radioButtonID, currentCell);
        }
        //Otherwise add background color
        else{
            console.log($(this).attr('backgroundColor'));
            if($(this).attr('backgroundColor') == undefined){
                changeInnerHTML(currID, radioButtonID, currentCell);
            }
            //
            addOrRemoveHTML(currID, radioButtonID, currentCell, 1);

        }
    });    
    //Change first radioButton to have be selected by default
    var firstButton = document.getElementById("radioButton 0");
    firstButton.setAttribute("checked", "checked");

        //print
    $("#printButton").click(function(){
        // $("#table1").removeAttribute("style");
        // $("#table2").removeAttribute("style");
        
        $("#table1").toggleClass("grayScale");
        $("#table2").toggleClass("grayScale");
        openWin();
    });
    function openWin(){
        src="https://code.jquery.com/jquery-3.5.1.min.js";
        //document.getElementById('#table1').style.filter = grayscale(1);

        var num = <?php echo "$color"; ?>;
        console.log(num);

        //Remove radio buttons
        for(var i = 0; i < num; i ++){
            var elem = document.getElementById("radioButton " + i);
            elem.parentNode.removeChild(elem);
        }

        var myWindow = window.open();

        var table1 = $("#table1").html();
        var table2 = $("#table2").html();

        var t1 = document.querySelector("#table1");
        var t2 = document.querySelector("#table2");

        //t1.toggleClass("grayScale");

        myWindow.document.write(table1);
        myWindow.document.write(table2);
        
        myWindow.print();
    }

</script>
</html>
