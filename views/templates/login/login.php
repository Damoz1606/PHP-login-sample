<div class="img-bg">
    <div class="overlay">
        <div class="wrapper">
            <div class="form-section">
                <h3>Log in</h3>
                <form action="" method="post" class="signin-form">
                    <div class="form-group form-input">
                        <input type="text" name="name" id="name" placeholder="Name" required autofocus>
                    </div>
                    <div class="form-group form-input">
                        <input type="password" name="password" id="password" placeholder="Password" required>
                    </div>
                    <button type="submit" class="btn btn-primary mt-4">LOG IN</button>
                    <?php
                    Form_User::sign_in();
                    ?>
                </form>
                <hr>
                <p class="new-signup">You don't have an account yet? <a href="index.php?log=signup" class="new-signup-link">Sign up</a>
                </p>
            </div>
        </div>
    </div>
</div>