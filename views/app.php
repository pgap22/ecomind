<?php include("./includes/db.php") ?>
<?php include("./includes/helper.php") ?>
<?php 

function autoload($clase){
    require  $_SERVER["DOCUMENT_ROOT"] . '/clases/' . $clase. ".php";
}

spl_autoload_register("autoload");

ActiveRecord::setDB($db);

?>