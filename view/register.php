<?php 
    ob_start() ;
?>

<h1>Register</h1>

    <form action="index.php?action=treatRegister" method="post">
        <div class="form-group">
            <label for="pseudo">Pseudo</label>
            <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Enter a pseudo">
        </div>
        
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter an email">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password2" name="password2" placeholder="Password confirmation">
        </div>

        <input type="submit" name="submit" value="Register">
    </form>


<?php
$title = "Register";
$content = ob_get_clean();

require_once "template.php";