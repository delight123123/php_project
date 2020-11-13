<?php
if(isset($_SESSION['authNum'])){
    session_destroy();
    session_start();
    //session_cache_limiter('private');
    ini_set("session.cookie_lifetime","240");
    ini_set("session.cache_expire","240");
    ini_set("session.gc_maxlifetime","240");
}else{
    session_start();
    //session_cache_limiter('private');
    ini_set("session.cookie_lifetime","240");
    ini_set("session.cache_expire","240");
    ini_set("session.gc_maxlifetime","240");
}

?>