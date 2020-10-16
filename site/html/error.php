<?php
include_once("./fragements/header.php");

if (isset($_SESSION["message"]) && !empty($_SESSION["message"])) {
    $message = $_SESSION["message"];
}else{
    header( "location: loginForm.php" );
}
?>

    <div class="row">
		<div class="col-md-12 d-flex flex-column justify-content-center align-items-center text-black">

            <h1>Error</h1>
			<h4> <?php echo $message ?> </h4>
			<a href="/">Back To Home</a>
		</div>
    </div>

<?php
include_once("./fragements/footer.php");
?>