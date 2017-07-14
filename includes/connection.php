<?php
    require("constants.php");

    //$connection = mysql_connect(DB_SERVER,DB_USER,DB_PASS);
    $connection = new mysqli(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
    if($connection->connect_errno > 0){
      die("database connection failed [" . $connection->connect_errno . "]");
    }

    else{
      //echo "Successfull";
    }

    /*$db_select = mysql_select_db(DB_NAME,$connection);
    if(!$db_select)
    {
        die("database selection failed" . mysql_error());
    }*/

?>
