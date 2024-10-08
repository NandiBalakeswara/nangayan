<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/styles/css/login.css'); ?>">
    <title>Sign In</title>
</head>

<body>
    <main>
        <div class="side">
            <section class="copy">
            </section>
        </div>
        <div class="content">
            <p class="home"><a href="<?php echo base_url('cawal/tampilawal'); ?>">X</a></p>
            <form action="<?php echo base_url('clogin/proseslogin'); ?>" name="formlogin" id="formlogin" method="post">
                <section class="copy">
                    <h2>Sign In</h2>
                    <div class="login-container">
                    </div>
                    <p id="error-message" class="<?php echo ($this->session->flashdata('pesan')) ? 'cant_login' : ''; ?>">
                        <?php echo $this->session->flashdata('pesan'); ?>
                    </p>
                    <div class="input-container name">
                        <label for="username">Email</label>
                        <input type="text" name="username" id="username" required>
                    </div>
                    <div class="input-container pass">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" required>
                    </div>
                    <button type="submit" class="signin-btn" onclick="proseslogin()">
                        Sign In
                    </button>
                    <p>Doesn't have an account <a href="<?php echo base_url('cregister/formregister'); ?>"><strong>Sign Up</strong></a></p>
                </section>
            </form>
        </div>
    </main>
</body>

</html>