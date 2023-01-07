<?php
    $servername = gethostname();
?>

<html>
    <head>
        <title>lizardNet Dashboard</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    </head>

    <body>
        <h1>Welcome to <?php echo htmlspecialchars($servername); ?></h1>
        <hr>

        <h2>Installed Apps & Services</h2>
        <hr>

        <h2>System Information</h2>
        <hr>

        <h2>Filesystem</h2>
        <hr>

        <h2>Notes</h2>
        <hr>

        <h2>Logs</h2>
        <br>

        <footer>
            <p>Created by <a href="https://www.jacobkaiserman.com" target="_blank">Jacob Kaiserman</a></p>
        </footer>
    </body>
</html>

<style> 
    body{
        background-color: #16262E;
        color: #E9E3E6;
        font-family: 'Open Sans', sans-serif;
    }
    a{
        color: #E9E3E6;
    }
</style>