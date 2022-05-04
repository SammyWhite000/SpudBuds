<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"></meta>
    <meta name="author" content="SpudBuds"></meta>
    <meta name="keywords" content="HTML5, Homepage"></meta>
    <meta name="description" content="Fuel Template"></meta>
    <style type="text/css"></style>
    
    <?php echo Asset::css($css) ?>
    <title> <?php echo $title ?>  </title>
</head>
<body>
<nav>
        <ul>
            <!-- Will need to change the links for SpudBuds https://www.w3resource.com/javascript-exercises/javascript-dom-exercise-7.php -->
            <li> <div id="logo">
                <?php echo Asset::img("SpudBudsNavCropped.png"); ?>
            </div></li>
            <li><a href="index.php">Home</a></li>
            <li><a href="bios.php">About Us</a></li>
            <li><a href="mosaic2.php">Mosaic</a></li>
        </ul>
    </nav>

    <!--
    <div id="logo">
       <?php echo Asset::img("spudbudstransparent.png"); ?>
    </div>
    -->

    <header>
       <h1> <?php echo $header; ?>  </h1>
    </header>

    <?php echo $contents; ?> 
    
    <footer>
         <p>CS312 Spring 2022 | SpudBuds | Group 14 </p>
    </footer>
</body>