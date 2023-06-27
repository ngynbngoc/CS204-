<?php 
    include "views/includes/header.php";
?>

<div class="jumbotron jumbotron-fluid mt-5">
    <div class="container login-banner mt-5"></div>
</div>

<div class="container login-form">
    <div class="row">
        <div class="col-md-6">
        <h3>Already got an account?</h3>
            <form action="<?php echo ROOT; ?>login" method="post">
                <label for="username">Username</label>
                <input type="text" class='form-control' id="username" name="username" placeholder="Enter your username...">
                <br>
                <label for="password">Password</label>
                <input type="password" class='form-control' id="password" name="password" placeholder="Enter your password...">

                <button type="submit" class="btn Btn mt-3" >Submit</button>
            </form>
        </div>

        <div class="col-md-6">
        <h3>New user?</h3>
            <form action="<?php echo ROOT; ?>create/user" method="post">
                <label for="username">Username</label>
                <input type="text" class='form-control' id="username" name="username" placeholder="Enter your username...">
                <br>
                <label for="email">Email</label>
                <input type="email" class='form-control' id="email" name="email" placeholder="Enter your email...">
                <br>
                <label for="password">Password</label>
                <input type="password" class='form-control' id="password" name="password" placeholder="Enter your password...">
                <br>
                <label for="password-confirm">Password Confirm</label>
                <input type="password" class='form-control' id="password-confirm" name="password-confirm" placeholder="Confirm your password...">

                <button type="submit" class="btn Btn mt-3" >Submit</button>
            </form>
        </div>
    </div>
</div>

<?php
    include "views/includes/footer.php";
?>