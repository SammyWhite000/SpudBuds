https://www.cs.colostate.edu:4444/~EID/SpudBuds/local_html/cs312/m1/index.php/spudbuds/bios.php

# Custom Error Messages
https://www.cognitoforms.com/blog/106/css-tips-and-tricks-for-customizing-error-messages
# SpudBuds - Milestone 1
## Radio Buttons
https://stackoverflow.com/questions/17186239/jquery-click-event-on-radio-button-doesnt-get-fired
## Pages
- [ ] Home
  - [x ] Modern Design
  - [ ] Basic welcome information
  - [ x] Useful links to get to the other pages on the site
    - [x ] Home
    - [x ] About
    - [ ] Color Coordinator
- [ x] About
  - [x ] Team member names
  - [ x] Brief biography of each team member
  - [ x] Picture or avatar for each team member
- [ ] Color Coordinator
  - [ ] See Requirements below

### Color Coordinate Generation
- [ ] `GET`
  - [ ] URL parameters asking for user input:
    - [ ] rows/columns restrictions: `1 <= x <=26`
    - [ ] number of colors: `1 <= x <= 10`
  - [ ] validate user input
    - [ ] If invalid: return the user to the form with meaningful error messages
- Successful validation:
  - [ ] pass the parameters `(int rows/columns, int colors)` to the **SAME** controller/action
  - [ ] validate the parameters
    - [ ] if valid:
      - [ ] return two tables
      - [ ] have a 'print' button
    - [ ] if invalid: render the form with error messages

#### Table requirements:
- [ ] Table 1 (upper table):
  - [ ] 2 col by `x` row (`x` = numColors param)
  - [ ] no header row
  - [ ] spans most of the width of the page
  - [ ] right column: 80% table width
  - [ ] left column
     - [ ] 20% table width
     - [ ] each cell is a drop-down with 10 color names (these should be ordered in an intuitive way for the user)
        - [ ] each cell has a different default set color
           - [ ] 1. red
           - [ ] 2. orange
           - [ ] 3. yellow
           - [ ] 4. green
           - [ ] 5. blue
           - [ ] 6. purple
           - [ ] 7. grey
           - [ ] 8. brown
           - [ ] 9. black
           - [ ] 10. teal
         - [ ] No two drop-downs can select the same color at the same time. If this happens:
           - [ ] revert the most recently changed drop-down to the previous value selected
           - [ ] inform the user in a non-intrusive way (ie not an `alert()`)
- [ ] Table 2 (lower table):
  - [ ] (`n` + 1) by (`n` + 1) (`n` = row/column param)
    - **This table should always be square**
  - [ ] upper leftmost cell is empty
  - [ ] top row:
    - [ ] leftmost cell is empty
    - [ ] remaining cells accross the top are lettered with capital letters in alphabetical order from A - Z.
      - `Z` is used for the max size of 26
  - [ ] leftmost column:
    - [ ] top cell is empty
    - [ ] remaining cells going down are numbered in order from 1 - 26


### Pressing the print button
- [ ] Takes the user to a "printable view" of the resulting tables.
- [ ] Keep the same table dimensions and easily print on one page (8.5" x 11") in portrait mode.
  - [ ] Render in greyscale
  - [ ] Header: greyscale logo and company name
  - [ ] drop downs --> selected color names as plain text

**Note: This page will not use the common view layout as the rest of the site.**


## Fuel PHP Framework
- [x ] Every page, except the print view, should use the same layout and be managed in a central location (ie, if there's a typo, you only have to change it in one place).
- [ x] Each team member is responsible for hosting the complete application on the local_html server reachable at `.../~[eid]/m1/...`.
- [ x] `.../~[eid]/m1` should redirect to the home page of the site.
- [ x] One member of the group must submit a tar file of the project to Canvas. Tar file structure should be as follows:
  - [x ] Fuel
    - [x ] app
      - [x ] classes
        - [x ] controllers
           - [x ] `your controllers`
        -  model
           - [ x] `your view folders`
      - [x ] views
        - [x ] `your view folders`
  - [x ] local_html
    - [x ] m1
      - [ x] index.php
      - [x ] assets
        - [x ] `any assets used`

### Grading Breakdown
- [ ] Home Page as specified, site uses Fuel framework and templates (10 points)

3. fuelSB permissions (in root): 711
   m1 permissions (in local_html): 755 
   I don't understand why, maybe a good question for logan.

https://www.w3resource.com/javascript-exercises/javascript-dom-exercise-7.php



