<?php
    if(isset($_COOKIE['to-do'])){
        $cookies_decode = base64_decode($_COOKIE['to-do']);
        $un_array = unserialize($cookies_decode);
        $taskindex = $_GET['task'];

        array_splice($un_array,$taskindex,1);
        
        $s_array = serialize($un_array);
        $cookies_encode = base64_encode($s_array);
        
        setcookie('to-do',$cookies_encode,time()+3600,'/');
        header("Location: index.php");
    }
    ?>