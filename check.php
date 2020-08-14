<?php
    $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
    $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
    $pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);
    $amount = filter_var(trim($_POST['amount']), FILTER_SANITIZE_STRING);
    
    if(mb_strlen($login) < 5 || mb_strlen($login) > 15){
        echo "invalid Login length";
        exit();
    }else if(mb_strlen($name) < 2 || mb_strlen($login) > 25){
        echo "invalid Name length";
        exit();
    }
    // else if(mb_strlen($name) < 6 || mb_strlen($login) > 20){
    //     echo "invalid Password length";
    //     exit();
    // } 
    
    // $pass = md5($pass."topsecret");  // if need to hash passwords in BD 

    $mysql = new mysqli('localhost', 'root', 'root', 'paxful-bd');
    $mysql->query("INSERT INTO `wallets` (`login`, `pass`, `name`, `amount`) VALUES('$login', '$pass', '$name', '$amount')");

    $mysql->close();

    header('Location: index.php');
    exit();
?>