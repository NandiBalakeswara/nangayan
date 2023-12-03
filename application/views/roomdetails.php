<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/styles/style.css'); ?>">
    <title>Hotel NangAyan</title>
</head>
<body>
    <header>
        <div class="navbar-rd">
            <img src="<?php echo base_url('assets/styles/image/logotrsp.png'); ?>" alt="NangAyan Hotels" class="logo">
            <ul>
                <li><a href="<?php echo base_url('cawal/tampilawal') ?>">Home</a></li>
                <li><a href="<?php echo base_url('cawal/tampilrooms') ?>">Rooms</a></li>
                <li><a href="<?php echo base_url('cregister/formregister'); ?>">Sign Up</a></li>
                <li><a href="<?php echo base_url('clogin/formlogin'); ?>">Sign In</a></li>
            </ul>
        </div>
    </header>
    <main>
        <div class="content-rd">
        <h1>Nama Rooms</h1>
            <div class="ket">
            Bali, Indonesia
                <article class="picture">
                    <div class="left">
                        <img src="<?php echo base_url('assets/styles/image/logo2.png'); ?>" alt="NangAyan Hotels">
                    </div>
                    <div class="right">
                        <img src="<?php echo base_url('assets/styles/image/logo2.png'); ?>" alt="NangAyan Hotels">
                        <img src="<?php echo base_url('assets/styles/image/logo2.png'); ?>" alt="NangAyan Hotels" style="margin-top: 12px;">
                    </div>
                </article>
                <article class="frame">
                    <div class="desc" style="text-align: left;">
                    <h3>Lorem ipsum dolor sit amet.</h3>
                    <div class="detail">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Inventore odit, unde facilis molestias voluptatibus in!
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. <br><br>
                        Iste repellendus odio ea, quo vel sapiente, laboriosam 
                        exercitationem cupiditate rem minus praesentium atque? 
                        Perferendis eaque, tempora praesentium iste deserunt a? <br><br>
                        Assumenda!Iste repellendus odio ea, quo vel sapiente, 
                        laboriosam exercitationem cupiditate rem minus praesentium 
                        atque? Perferendis eaque, tempora praesentium iste deserunt a?
                    </div>
                    </div>
                    <div class="date">
                        <h3>Start Booking</h3>
                        <h2>Rp.999.999.999 Per Night</h2>
                        <form action="" method="post">
                            <label for="">Pick a Date In</label>
                            <input type="date" name="" id="">
                            <label for="">Pick a Date Out</label>
                            <input type="date" name="" id="">
                            <button type="submit"><a href="">Continue To Book</a></button>
                        </form>
                    </div>
                </article>
            </div>
    </main>
    <?php include('footer.php'); ?>
</html>