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
            <div class="bg">
                <img src="<?php echo base_url('assets/styles/hotel_bg4.jpg'); ?>" alt="">
            </div>
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
                        <a href="#room"><button type="button">Book Now</button></a>                        
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
                    <img src=" <?php echo base_url('berkas/'.$room->foto); ?>" alt="NangAyan Hotels">
                    <h2><?php echo $room->jenis_kamar; ?></h2>
                    </div>
                    <div class="content-botton">
                        <a href="<?php echo base_url('crooms/tampilroomdetails/' . $room->id_kamar); ?>"><button type="button">Rp.<?php $harga=$room->harga; $harga_formatted = number_format($harga, 0, ',', '.'); echo $harga_formatted ?>/Night</button></a>                    
                    </div>
                </article>
            <?php } ?>
        </div>
    </main>
    <?php include('footer.php'); ?>
</html>