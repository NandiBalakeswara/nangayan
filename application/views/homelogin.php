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
                        <a href="<?php echo base_url('crooms/tampilroomslogin') ?>"><button type="button">Book Now</button></a>
                    </div>
                </div>
                
        </div>
    </header>
    <main>
            <div class="content">
              <div class="bonus">
                All our room types are including complementary breakfast
              </div>
              <?php foreach ($top_rooms as $room): ?>
                  <article class="card">
                      <div class="content-description">
                          <section>
                              <h2><?php echo $room->jenis_kamar; ?></h2>
                              <p><?php echo $room->deskripsi_kamar; ?></p>
                          </section>
                      </div> 
                      <div>
                        <img src=" <?php echo base_url('berkas/'.$room->foto); ?>" alt="NangAyan Hotels">
                      </div>
                  </article>
              <?php endforeach; ?>
            </div>
    </main>
    <?php include('footer.php'); ?>
</body>
</html>