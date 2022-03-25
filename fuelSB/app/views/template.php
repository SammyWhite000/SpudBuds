<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"></meta>
    <meta name="author" content="SpudBuds"></meta>
    <meta name="keywords" content="HTML5, Homepage"></meta>
    <meta name="description" content="Fuel Template"></meta>
    <style type="text/css"></style>
    <title> <?php echo $title ?>  </title>
</head>
<body>
    <nav>
        <ul>
            <!-- Will need to change the links for SpudBuds -->
            <li><a href="SpudBuds/fuelSB/app/views/spudbuds/index.php">SpudBuds</a></li>
            <li><a href="SpudBuds/fuelSB/app/views/spudbuds/bios.php">About Us</a></li>
            <li><a href="SpudBuds/fuelSB/app/views/spudbuds/mosaic.php">Mosaic</a></li>
            
        </ul>
    </nav>

    <header>
       <h1> <?php echo $header; ?> </h1>
    </header>

    <main> 
        <?php echo $contents; ?> 
    </main>
    
    <footer>
         <p>CS312 Spring 2022 | SpudBuds | Group 14 </p>
    </footer>
</body>