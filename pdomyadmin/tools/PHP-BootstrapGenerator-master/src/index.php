<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <?php
        //Include the class
        require_once "BootstrapGenerator.php";

        //Display the <link> and <source> tags
        echo BootstrapGenerator::setSources("bootstrap-3.3.7-dist/", "css/bootstrap.css",
            "js/jquery-3.3.1.js", "js/bootstrap.js");
    ?>
</head>
<body>

<?php
    $Thead = array(1, 2, 3);

    $Tcontent = array(array("danger", BootstrapGenerator::genGlyphIcon("home", null, null, null), "B", "C"), array("success", "D", "E", "F"));

    $table =  BootstrapGenerator::genTable($Tcontent, "table-bordered table-hover", $Thead, true, null, null, null);

    $col1Div = BootstrapGenerator::genColDiv(null, 1, null, null, null);

    $colDiv = BootstrapGenerator::genColDiv($table, 10, null, null, null);

    $rowContent = $col1Div.$colDiv.$col1Div;

    $rowDiv = BootstrapGenerator::genRow($rowContent, null, null, null);

    $container = BootstrapGenerator::genContainer($rowDiv, false, null, null, null);

    echo $container;
?>

</body>
</html>