<?php


$res222=password_hash("rladlrwn89!",PASSWORD_DEFAULT);


$a="$2y$10$FkSow4HjiA9pIoW6eBHY7.nWgY3kgpXdpFuoat2wfjXOsAipgTsIe";



if(password_verify("rladlrwn89!",$res222)){
    echo "aaaa";
}else{
    echo "bbbb";
}

?>