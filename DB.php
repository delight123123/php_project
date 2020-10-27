<?php

$lin=mysqli_connect("localhost","glddld","111111","topic");

if($lin){
    echo "연결<br>";
}

$aaaa=mysqli_query($lin,"select * from topic");

while($b=mysqli_fetch_array($aaaa)){
    echo '<h2>'.$b['title'].'</h2>';
    echo $b['description'];
}
?>