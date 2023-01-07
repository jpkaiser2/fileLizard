<html>
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
</head>

<center>
<img src="logo.png" width="15%">
</center>

<object class="toolBtn" data="pen-to-square-regular.svg" width="20px" height="20px" type="image/svg+xml"></object>
<object class="toolBtn" onclick="deleteFiles()" data="trash-solid.svg" width="20px" height="20px" type="image/svg+xml"></object>
<object class="toolBtn" data="download.svg" width="20px" height="20px" type="image/svg+xml"></object>





<table>
    <tr>
        <th><input type="checkbox" id="all"></th>
        <th>File</th>
        <th>Type</th>
        <th>Owner</th>
        <th>Size</th>
        <th>Last Modified</th>
    </tr>
    <?php

    // Get the current directory
    $current_dir = getcwd();

    // Get all files in the current directory
    $files = scandir($current_dir);

    $actionsToolBar = "";

    //function to label & convert file sizes from bytes to their simplist form
    //do not edit
    function format_size($size)
    {
        $sizes = array(" Bytes", " KB", " MB", " GB", " TB", " PB", " EB", " ZB", " YB");
        if ($size == 0) {
            return ('n/a');
        } else {
            return (round($size / pow(1024, ($i = floor(log($size, 1024)))), 2) . $sizes[$i]);
        }
    }

    // Loop through the array of files and print out the filenames
    foreach ($files as $file) {
        if ($file[0] != '.') {

            //important vars -- do not change
            $owner = posix_getpwuid(fileowner($file))['name'];
            $size = format_size(filesize($file));
            $modDate = date("F d Y H:i:s.", filemtime($file));
            $select = '<input type="checkbox" name="checkbox" id="' . $file . '">';
            $type = pathinfo($file, PATHINFO_EXTENSION);
            $fileIndex = array_search($file, $files);

            if ($type == null) {
                $type = "folder";
            }

            echo "<tr ondblclick='fileClicked(" . $fileIndex . ")'><td>" . $select . "</td><td>" . $file . "</td><td>" . $type . "</td><td>" . $owner . "</td><td>" . $size . "</td><td>" . $modDate . "</td></tr>";
        }
    }

    ?>
</table>

</html>
<script>
    function fileClicked(file) {
        alert(file);
    }
    function getSelected(){
        var checkboxes = document.getElementsByName("checkbox");
        var checkedcheckboxes = [];
        for (var i = 0; i < checkboxes.length; i++){
            if (checkboxes[i].checked){
                checkedcheckboxes.push(checkboxes[i]);
            }
        }
        return checkedcheckboxes.length > 0 ? checkedcheckboxes : null;
    }

    function deleteFiles(){
        alert("called");
        var checkedBoxes = getSelected();
        for (var i = 0; i < checkedBoxes.length; i++){
            alert("delete");
            unlink(checkedBoxes[i].id);
            
        }

    }
    
</script>

<style>
    table {
        border-collapse: collapse;
        width: 100%;
        box-shadow: 20px 20px 50px 15px #dcdcdc;
    }

    td,
    th {
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:nth-child(odd) {
        background-color: white;
    }


    tr:hover {
        background-color: #ddd;
    }



    th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #036561;
        color: #E9E3E6;
    }

    .toolBtn {
        padding: 8px 8px 8px 8px;
        border: 2px solid #d2d2d2;
        border-radius: 12px;
        opacity: 0.6;
        transition: 0.3s;
        background-color: white;
    }

    .toolBtn:hover {
        background-color: #d2d2d2;
    }

    body {
        background-color: #f7f7f7;
        font-family: 'Open Sans', sans-serif;
    }
</style>