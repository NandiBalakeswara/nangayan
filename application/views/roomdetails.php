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
                <li><a href="<?php echo base_url('cawal/tampilhomelogin') ?>">Home</a></li>
                <li><a href="<?php echo base_url('crooms/tampilroomslogin') ?>">Rooms</a></li>
                <li><a href="<?php echo base_url('cstatus/showBookingStatus'); ?>">Status</a></li>
                <li><a href="#" style="cursor: default;"><?php echo $this->session->userdata('nama_lengkap'); ?></a></li>
                <a href="javascript:void(0)" onclick="logout();"><button>Logout</button></a>
            </ul>
        </div>
    </header>
    <main>
        <div class="content-rd">
        <h1><?php echo $room->jenis_kamar; ?></h1>
            <div class="ket">
            Bali, Indonesia
                <article class="picture">
                    <div class="bg active">
                        <img src="<?php echo base_url('assets/styles/hotel_bg4.jpg'); ?>" alt="Hotels">
                    </div>
                    <div class="bg">
                        <img src="<?php echo base_url('assets/styles/SuperiorRoom10.jpg'); ?>" alt="Hotels">
                    </div>
                    <div class="bg">
                        <img src="<?php echo base_url('assets/styles/Bathroom.jpg'); ?>" alt="Hotels">
                    </div>
                    <div class="navigation">
                        <div class="btn active"></div>
                        <div class="btn"></div>
                        <div class="btn"></div>
                    </div>
                </article>
                <article class="frame">
                    <div class="desc" style="text-align: left;">
                    <h3><?php echo $room->jenis_kamar; ?></h3>
                    <div class="detail">
                        <?php echo $room->deskripsi_kamar; ?>
                    </div>
                    </div>
                    <div class="date">
                        <h3>Start Booking</h3>
                        <h2>Rp. <?php $total=$room->harga; $total_formatted = number_format($total, 0, ',', '.'); echo $total_formatted ?> Per Night</h2>
                        <form action="<?php echo base_url('cpemesanan/tampilroombooking1'); ?>" method="post">
                            <input type="hidden" name="id_kamar" value="<?php echo $room->id_kamar; ?>">
                            <label for="">Pick a Date In</label>
                            <input type="date" name="waktu_masuk" id="waktu_masuk" required>
                            <label for="">Pick a Date Out</label>
                            <input type="date" name="waktu_keluar" id="waktu_keluar" required>
                            <button type="submit">Continue To Book</button>
                        </form>
                    </div>
                </article>
            </div>
        </main>
        <?php include('footer.php'); ?>
        
        <script>
        function logout() {
            if (confirm("Apakah anda yakin untuk logout?")) {
                window.open("<?php echo base_url(); ?>clogin/logout", "_self");
            }
        }

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