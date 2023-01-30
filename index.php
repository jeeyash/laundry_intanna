<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Signin Template · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">

    

    <!-- Bootstrap core CSS -->
<link href="assets/bootstrap.min.css" rel="stylesheet">

    <style>

html,
body {
  height: 100%;
}

body {
  display: flex;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #ADD8E6;
}

.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}

.form-signin .checkbox {
  font-weight: 400;
}

.form-signin .form-floating:focus-within {
  z-index: 2;
}

.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}

.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}

      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

  </head>
  <body class="text-center">
    
<main class="form-signin">
  <form action="aksi.php" method="post">
    <img class="mb-4" src="assets/laundry.png" alt="" width="150" height="150">
    
    <?php
        if(isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $data = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username='$username' and password='$password'");
            $cek = mysqli_num_rows($data);
            if($cek > 0){
                session_start();

                $query = mysqli_fetch_array($data);
                $_SESSION['username'] = $query['username'];
                $_SESSION['level'] = "admin";
            }
            else{
                header("location:home.php");
            }
        }
        ?>
        <div class="form-signin w-100 m-auto">
            <form method="POST">
                <h3 class="text-center mb-3">Laundry</h3>
                <?php
                if(isset($_GET['pesan'])) :?>
                <div class="alert-danger" role="alert">
                    Silahkan masukan Username atau Password dengan benar!
                </div>
                <?php else:?>
                    <?php endif;?>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="username"id="floatingusername" placeholder="username">
                        <label for="floatingusername">username</label>
            </div>
            <div class="form-floating">
      <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>
          
            <button type="submit" name="submit" class="btn btn-primary signin mt-4">Masuk</button>
        </form>
    </div>


    
  </body>
</html>
