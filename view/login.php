<h1>Login</h1>

<form action="index.php?action=treatLogin" method="post">        
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
    </div>

    <input type="submit" name="submit" value="Login">
</form>

<div class="create-account">
    <p>No account yet? Sign up here</p>
    <a href="index.php?action=register">Create an account</a>
</div>
