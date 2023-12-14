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
        <div class="jumbotron">
            <?php include('navbar.php'); ?>
                <div class="title">
                    <p class="welcome">
                        Welcome To
                    </p>
                    <h1>Nang Ayan</h1>
                    <h2>Hotels</h2>
                    <p class="description">
                        Book your stay and enjoy Luxury <br>
                        redefined at the most affordable rates
                    </p>
                    <div>
                        <button type="button"><a href="#room">Book Now</a></button>
                    </div>
                </div>
        </div>
    </header>
    <main>
        <div class="content">
        <h1>ROOMS AND RATES</h1>
            <div class="bonus">
            Each of our bright, light-flooded rooms come with everything you could possibly need for a comfortable stay. And yes, 
            comfort isn't our only objective, we also value good design, sleek contemporary furnishing complemented 
            by the rich tones of nature's palette as visible from our room's sea-view windows and terraces.             
            </div>
            <article id="room" class="room">
                <div>
                    <img src="<?php echo base_url('assets/styles/image/logo2.png'); ?>" alt="NangAyan Hotels">
                    <h2>Lorem ipsum dolor sit amet.</h2>
                </div>
                <div class="content-botton">
                    <button type="button"><a href="<?php echo base_url('clogin/formlogin'); ?>">Rp.99999999/Night</a></button>
                </div>
            </article>
            <article id="room" class="room">
                <div>
                    <img src="<?php echo base_url('assets/styles/image/logo2.png'); ?>" alt="NangAyan Hotels">
                    <h2>Lorem ipsum dolor sit amet.</h2>
                </div>
                <div class="content-botton">
                    <button type="button"><a href="">Rp.99999999/Night</a></button>
                </div>
            </article>
            </div>
    </main>
    <?php include('footer.php'); ?>
</html>