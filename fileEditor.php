<html>

<head>
    <link href="Prism/prism.css" rel="stylesheet" />
    <script src="Prism/prism.js"></script>
</head>

<body>
    <center><h1 class="editingMsg">Editing File "<?php echo htmlspecialchars($_GET['file']) ?>"</h1></center>
    <pre><code id="code" class="language-<?php echo htmlspecialchars($_GET['lan']) ?>" contentEditable="true" spellcheck="false"></code></pre>
</body>

</html>



<script>
    var allText = "null"

    function readTextFile(file) {
        var rawFile = new XMLHttpRequest();
        rawFile.open("GET", file, false);
        rawFile.onreadystatechange = function() {
            if (rawFile.readyState === 4) {
                if (rawFile.status === 200 || rawFile.status == 0) {
                    allText = rawFile.responseText;
                }
            }
        }
        rawFile.send(null);
    }

    readTextFile("<?php echo htmlspecialchars($_GET['file']) ?>");
    var code = document.getElementById("code");
    code.textContent = allText;
</script>


<style>
    [contenteditable] {
        outline: 0px solid transparent;
    }

    body {
        background-color: #2d2d2d;
    }

    .editingMsg {
        color: #cccccc;
    }
</style>