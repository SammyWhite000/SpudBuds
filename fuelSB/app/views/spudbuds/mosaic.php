<main>

    <p> This page is a page where it behaves differently if it receives URL parameters.  In GET mode, it asks the user for a number of rows/columns 
        (one value) and a number of colors.  These two parameters take integers of at least one.  Rows/columns should be no more than 26vand color 
        should be no more than 10.  Validate this user input and return the user to the form with meaningful error messages on failed validation.
    </p>

    <p>
    On success, the two parameters should be passed as controller parameters to the same controller/action and it should validate the parameters and 
    render the form with error messages on error.  If the values pass validation, the color coordinate generation page is returned instead with two tables.
    </p>

    <p>
    The first (upper) table is a 2 column by x row table, where x is the number of colors indicated by the parameter.  
    The left column is 20% of the table width and the right column is 80%.  The table spans most of the width of the page.  There is no header row on this table.
    </p>

    <p>
    Below that table is a table that is n+1 x n+1 where n is the indicated row/column size.  This table is always square.
    </p>

    <p>
    The upper-leftmost cell is empty.  The remaining cells across the top are lettered with capital letters in 
    alphabetical order starting with "A" and going to "Z" (using "Z" for the max size of 26).  The cells in the 
    leftmost column are numbered starting in the second row with "1" and numbering each row consecutively.
    </p>

    <p>
    Now, in the top table, each of the left column cells has a drop-down with 10 color names (red, orange, yellow, 
    green, blue, purple, grey, brown, black, teal).  Order these in an intuitive way for the user.  
    Initially, a different color is selected in each drop down.  No two drop downs can select the same color at the same time (if this happens, 
    revert the most recently changed drop down to the previous value that was selected.  Inform the user of this in a non-intrusive way (i.e. not an alert() ).
    </p>

    <p>
    At the bottom of the page, there is a button.  Pressing this button will take the user to a "printable view" of the resulting tables.  
    This should have all of the same dimensions as selected and should easily print on one page of 8.5" x 11" paper in portrait mode.  
    It should render in greyscale and include a greyscale logo and company name as a header.  
    The selected color names will appear in the cells where the drop downs were, 
    but as plain text.  This page does not use the common view layout as the rest of the site.
    </p>
    
</main>