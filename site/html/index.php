<?php
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true){
    header("location: ./dashboard.php");
}
?>
<?php include_once ('./fragements/header.php');?>


<link rel="stylesheet" href="./css/login.css">

<!-- This snippet uses Font Awesome 5 Free as a dependency. You can download it at fontawesome.io! -->

<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Sign In</h5>
            <form class="form-signin" action="./login_action.php" method="post">
              <div class="form-label-group">
                <input type="text" id="inputUsername" name="inputUsername" class="form-control" placeholder="Username" required autofocus>
                <label for="inputUsername">username</label>
              </div>

              <div class="form-label-group">
                <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required>
                <label for="inputPassword">Password</label>
              </div>

              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

<?php include_once ('./fragements/footer.php') ?>
