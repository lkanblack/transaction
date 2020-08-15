

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Paxful test</title>
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

  <div class="container mt-4">

    <?php 
      if($_COOKIE['wallet'] == ''):
    ?> 

    <div class="row">
      <div class="col-md-5">
        <h2>Wallet register</h2>
        <form action="check.php" method="post">
            <input type="text" class="form-control mb-2" name="login" id="login" placeholder="Login">
            <input type="text" class="form-control mb-2" name="name" id="name" placeholder="Name">
            <input type="number" class="form-control mb-2" name="amount" id="amount" placeholder="Amount">
            <input type="password" class="form-control mb-2" name="pass" id="pass" placeholder="Password">
            <button type="submit" class="btn btn-success">Register</button>
        </form>
      </div>
      <div class="offset-md-2 col-md-5">
          <h2>Login</h2>
        <form action="auth.php" method="post">
            <input type="text" class="form-control mb-2" name="login" id="login" placeholder="Login">
            <input type="password" class="form-control mb-2" name="pass" id="pass" placeholder="Password">
            <button type="submit" class="btn btn-success">Login</button>
        </form>
        </div>
    </div>
      <?php else:?>
        <p>Hello <?=$_COOKIE['wallet']?>.  <a href="exit.php">exit</a></p>
        <h4>Balance:</h4><span></span>
      <?php endif;?>
       <div class="col-md-5 mt-5">
       <h2>Registered wallets</h2>
       <div class="wallets">
          <div class="block">
            
            <b>Wallets:</b>
            <br>
              <?php
                $mysql = new mysqli('localhost', 'root', 'root', 'paxful-bd');
                $info = mysqli_query($mysql, "SELECT * FROM `wallets`");

                while ($content = mysqli_fetch_assoc($info)){
                  echo $content['login'];
                  echo "<br>";
                }

              ?>
            </div>
                
          <div class="block">
            
            <b>Name:</b>
            <br>
              <?php
                $mysql = new mysqli('localhost', 'root', 'root', 'paxful-bd');
                $info = mysqli_query($mysql, "SELECT * FROM `wallets`");

                while ($content = mysqli_fetch_assoc($info)){
                  echo $content['name'];
                  echo "<br>";
                }

              ?>
            </div>
                
          <div class="block">
            
            <b>Amount:</b>
            <br>
              <?php
                $mysql = new mysqli('localhost', 'root', 'root', 'paxful-bd');
                $info = mysqli_query($mysql, "SELECT * FROM `wallets`");

                while ($content = mysqli_fetch_assoc($info)){
                  echo $content['amount'];
                  echo "<br>";
                }

              ?>
            </div>
          
          </div>
          </div>
       </div>
  </div>
  


</body>
</html>