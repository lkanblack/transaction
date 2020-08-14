<?php

    $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
    $pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);

    // $pass = md5($pass."topsecret");  // if need to hash passwords in BD 

    $mysql = new mysqli('localhost', 'root', 'root', 'paxful-bd');


    $result = $mysql->query("SELECT * FROM `wallets` WHERE `login` = '$login' AND `pass` = '$pass'");
    $wallet = $result->fetch_assoc(); // converting into array
    
    if(count($wallet) == 0) {
        echo "User not found";
        exit();
    } else {
 
        setcookie('wallet', $wallet['name'], time() + 3600 * 24 * 7, "/");

        // header('Location: account.php');
    }

    $mysql->close();

    header('Location: index.php'); 

    ?>