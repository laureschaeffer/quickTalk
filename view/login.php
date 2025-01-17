<?php 
    ob_start() ;
?>

<h1>Login</h1>

    <form action="#" method="post">
        <div class="form-group">
            <label for="pseudo">Pseudo</label>
            <input type="pseudo" class="form-control" id="pseudo" name="pseudo" placeholder="Pseudo">
        </div>
        
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>

        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>

    <div class="create-account">
        <p>No account yet? Sign up here</p>
        <a href="#">Create an account</a>
    </div>


<?php
$title = "Login";
$content = ob_get_clean();

require_once "template.php";