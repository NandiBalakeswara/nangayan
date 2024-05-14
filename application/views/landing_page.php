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
            <div class="bg active">
                <img src="<?php echo base_url('assets/styles/hotel_bg4.jpg'); ?>" alt="Hotels">
            </div>
            <div class="bg">
                <img src="<?php echo base_url('assets/styles/hotel_bg5.jpg'); ?>" alt="Hotels">
            </div>
            <div class="bg">
                <img src="<?php echo base_url('assets/styles/hotel_bg2.png'); ?>" alt="Hotels">
            </div>
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
            <div class="navigation">
                <div class="btn active"></div>
                <div class="btn"></div>
                <div class="btn"></div>
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

    <script type="text/javascript">
        var slides = document.querySelectorAll('.bg');
        var btns = document.querySelectorAll('.btn');
        let currentSlide = 0; 
        var sliderAuto;

        // Manual Navigation
        var manualNav = function(manual){
            slides.forEach((slide) => {
                slide.style.opacity = 0; 
                slide.classList.remove('active');

                btns.forEach((btn)=>{
                    btn.classList.remove('active');
                });
            });

            slides[manual].style.opacity = 1; 
            slides[manual].classList.add('active');
            btns[manual].classList.add('active');

            // Reset interval untuk memulai otomatis dari awal
            clearInterval(sliderAuto);
            startSliderAuto();
        }

        btns.forEach((btn, i) => {
            btn.addEventListener("click", () => {
                manualNav(i);
                currentSlide = i;
            });
        });

        // auto image slider (jangan dipake kalo mau pake manual)
        function startSliderAuto() {
            sliderAuto = setInterval(() => {
                slides.forEach((slide) => {
                    slide.style.opacity = 0; 
                    slide.classList.remove('active');

                    btns.forEach((btn)=>{
                        btn.classList.remove('active');
                    });
                });

                currentSlide++;

                if (currentSlide >= slides.length) {
                    currentSlide = 0;
                }

                slides[currentSlide].style.opacity = 1; 
                slides[currentSlide].classList.add('active');
                btns[currentSlide].classList.add('active');
            }, 10000); // interval ganti gambar dalam ms
        }

        // Memulai proses otomatis saat halaman dimuat
        startSliderAuto();

    </script>
</body>
</html>