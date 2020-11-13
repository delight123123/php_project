<?php

    $link=mysqli_connect("localhost","root","111111","reboard");

    function tblregister($quer){
        return mysqli_fetch_array($quer);
    }

    


?>