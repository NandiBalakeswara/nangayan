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
            <?php include('navbarlogin.php'); ?>
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
            <?php foreach ($kamar as $room) { ?>
                <article class="room">
                    <div>
                        <img src="<?php echo base_url('assets/styles/image/logo2.png'); ?>" alt="NangAyan Hotels">
                        <h2><?php echo $room->jenis_kamar; ?></h2>
                    </div>
                    <div class="content-botton">
                        <button type="button"><a href="<?php echo base_url('crooms/tampilroomdetails/' . $room->id_kamar); ?>">Rp. <?php echo $room->harga; ?>/Night</a></button>
                    </div>
                </article>
            <?php } ?>
        </div>
    </main>
    <?php include('footer.php'); ?>
</html>