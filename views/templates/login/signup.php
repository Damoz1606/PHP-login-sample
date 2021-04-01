<div class="img-bg">
    <div class="overlay">
        <div class="wrapper">
            <div class="form-section">
                <h3>Sign up</h3>
                <form action="#" method="post" class="signin-form">
                    <div class="form-group form-input">
                        <input type="text" name="name" id="name" placeholder="Name" required autofocus>
                    </div>
                    <div class="form-group form-input">
                        <input type="email" name="email" id="email" placeholder="Email" required>
                    </div>
                    <div class="form-group form-input">
                        <input type="password" name="password" id="password" placeholder="Password" required>
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">Sign Up</button>
                    <?php
                    Form_User::create();
                    ?>
                </form>
                <hr>
                <p class="new-login">You have an account? <a href="index.php?log=login" class="new-login-link">Log in</a>
                </p>
            </div>
        </div>
    </div>
</div>