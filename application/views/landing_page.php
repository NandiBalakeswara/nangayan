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
                      <a href="<?php echo base_url('crooms/tampilrooms') ?>"><button type="button">Book Now</button></a>                        
                    </div>
                </div>
                
        </div>
    </header>
    <main>
            <div class="content">
              <div class="bonus">
                All our room types are including complementary breakfast
              </div>
              <article class="card">
                <div class="content-description">
                  <section>
                    <h2>Lorem ipsum dolor sit amet.</h2>
                    <p>
                      Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vero aspernatur ad adipisci, 
                      similique repudiandae laborum ex accusamus mollitia debitis nemo odio. Atque aliquid 
                      nulla quis eveniet similique quam laborum iure?
                    </p>
                  </section>
                </div> 
                <div>
                    <img src="<?php echo base_url('assets/styles/image/logo2.png'); ?>" alt="NangAyan Hotels">
                </div>
              </article>
              <article class="card">
                <div class="content-description">
                  <section>
                    <h2>Lorem ipsum dolor sit amet.</h2>
                    <p>
                      Lorem ipsum dolor, sit amet consectetur adipisicing elit. Vero aspernatur ad adipisci, 
                      similique repudiandae laborum ex accusamus mollitia debitis nemo odio. Atque aliquid 
                      nulla quis eveniet similique quam laborum iure?
                    </p>
                  </section>
                </div> 
                <div>
                  <img src="<?php echo base_url('assets/styles/image/logo2.png'); ?>" alt="NangAyan Hotels">
                </div>
              </article>
            </div>
    </main>
    <?php include('footer.php'); ?>
</body>
</html>