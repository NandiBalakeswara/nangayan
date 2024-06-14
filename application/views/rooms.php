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
                <img src="<?php echo base_url('assets/styles/hotel_bg8.jpg'); ?>" alt="Hotels">
            </div>
            <div class="bg">
                <img src="<?php echo base_url('assets/styles/hotel_bg7.jpg'); ?>" alt="Hotels">
            </div>
            <div class="bg">
                <img src="<?php echo base_url('assets/styles/hotel_bg5.jpg'); ?>" alt="Hotels">
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
                    <a href="#room"><button type="button">Book Now</button></a>
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
            <h1>ROOMS AND RATES</h1>
            <div class="bonus">
                Each of our bright, light-flooded rooms come with everything you could possibly need for a comfortable stay. And yes,
                comfort isn't our only objective, we also value good design, sleek contemporary furnishing complemented
                by the rich tones of nature's palette as visible from our room's sea-view windows and terraces.
            </div>
            <?php foreach ($kamar as $room) { ?>
                <article class="room" id="room">
                    <div>
                        <img src=" <?php echo base_url('berkas/' . $room->foto); ?>" alt="NangAyan Hotels">
                        <h2><?php echo $room->jenis_kamar; ?></h2>
                    </div>
                    <div class="content-botton">
                        <a href="<?php echo base_url('clogin/formlogin'); ?>"><button type="button">Rp.<?php $harga = $room->harga;
                                                                                                        $harga_formatted = number_format($harga, 0, ',', '.');
                                                                                                        echo $harga_formatted ?>/Night</button></a>
                    </div>
                </article>
            <?php } ?>
        </div>
    </main>
    <?php include('footer.php'); ?>

    <script type="text/javascript">
        var slides = document.querySelectorAll('.bg');
        var btns = document.querySelectorAll('.btn');
        let currentSlide = 0;
        var sliderAuto;

        // Manual Navigation
        var manualNav = function(manual) {
            slides.forEach((slide) => {
                slide.style.opacity = 0;
                slide.classList.remove('active');

                btns.forEach((btn) => {
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

                    btns.forEach((btn) => {
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

</html>