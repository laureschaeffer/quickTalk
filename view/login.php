<h1 class="login__title">Login</h1>

<form action="index.php?action=treatLogin" method="post" class="login__form">
    <div class="grid">
        <div class="login__box">
            <input type="email" class="login__input" id="email" name="email" placeholder="Email" required>
            <label for="email" class="login__label">Email</label>

            <!-- login icon -->
            <i class="ri-mail-fill"></i>
        </div>

        <div class="login__box">
            <input type="password" class="login__input" id="password" name="password" placeholder="Password" required>
            <label for="password" class="login__label">Password</label>

            <!-- login icon -->
            <i class="ri-eye-off-fill login__password"></i>
        </div>

        <input type="submit" name="submit" value="Login" class="login__button">
    </div>  

</form>



<div class="create-account">
    <p>No account yet? Sign up here</p>
    <a href="index.php?action=register">Create an account</a>
</div>
