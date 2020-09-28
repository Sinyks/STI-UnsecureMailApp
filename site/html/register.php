<?php

include_once ('./fragements/header.php');

//phpinfo();

?>
<body class="text-center">
<form class="form-register">
    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="Password" class="form-control" placeholder="Password" required>
    <input type="password" id="PasswordCheck" class="form-control" placeholder="Password Check" required>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017-2020</p>
</form>
</body>

<?php

include_once ('./fragements/footer.php')

?>