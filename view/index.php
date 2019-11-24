<?php
require_once '../vendor/autoload.php';

use UiferCalhas\SrcClasses\ConfigDeclarations as Conf;

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
        <meta name="keywords" content="<?php //echo $keywords    ?>"/>
        <meta name="description" content="<?php //echo $description    ?>"/>

        <title><?php //echo $title ?></title>

        <!--JQUERY-->
        <script src="<?php echo Conf::JS; ?>jquery-3.1.1.min.js" type="text/javascript"></script>

        <!--BOOTSTRAP JS-->
        <script src="<?php echo Conf::JS; ?>bootstrap.min.js" type="text/javascript"></script>

        <!--MASK PLUGIN JQUERY-->
        <script src="<?php echo Conf::JS; ?>jquery.mask.js" type="text/javascript"></script>  

        <!--FONTS AWESOME-->
        <script src="https://use.fontawesome.com/e6f15e8532.js"></script>

    </head>
    <body data-spy="scroll" data-target=".navbarNew" data-offset="50" class="<?php echo 'red' ?>">

        <?php
        include_once './googleAnalytics/analyticstracking.php';
        if(isset($_GET['pag'])){
            include_once ($_GET['pag'] === "produtos") ? 'products.php' : 'inicio.php';
        } else {
            include_once 'inicio.php';
        }
        ?>

    </body>
</html>

<!--CSS BOOTSTRAP-->
<link href="<?php echo Conf::CSS; ?>bootstrap.min.css" rel="stylesheet" type="text/css"/>

<!--CSS MAIN-->
<link href="<?php echo Conf::CSS; ?>main.css" rel="stylesheet" type="text/css"/>

<!--CSS HEADER-->
<link href="<?php echo Conf::CSS; ?>header.css" rel="stylesheet" type="text/css"/>

<!--CONTATO CSS-->
<link href="<?php echo Conf::CSS; ?>contato.css" rel="stylesheet" type="text/css"/>

<!--FOOTER CSS-->
<link href="<?php echo Conf::CSS; ?>footer.css" rel="stylesheet" type="text/css"/>

<!--Navbar JS-->
<script src="<?php echo Conf::JS; ?>navbarAutomation.js" type="text/javascript"></script>  