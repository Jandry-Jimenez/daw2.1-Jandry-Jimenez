<?php
    if (!isset($_REQUEST["ciudad"]))
        $ciudad= false;
    else $ciudad = $_REQUEST["ciudad"];
?>

<html>
<body>

<?php
    echo "<h2>Tu ciudad favorita es $ciudad</h2>"
?>
<body>
</html>