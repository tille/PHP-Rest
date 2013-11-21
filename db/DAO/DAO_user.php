<?php

class user{

    // add your DB methods here
    function greet( $name ){
        $con = connect();
        $sql = "add your sql here ...";
        $ans = mysql_query($sql) or die(mysql_error());    
        disconnect($con);
        return $ans;
    }
}

?>