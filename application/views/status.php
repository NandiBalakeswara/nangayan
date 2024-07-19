<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/styles/css/style.css'); ?>">
    <title>Booking Status</title>
</head>

<body>
    <header class="status">
        <h1>Nang Ayan</h1>
        <h2>Hotels</h2>
    </header>
    <main>
        <div class="content">
            <h1>Booking Status</h1>

            <?php
            if (empty($data)) {
            ?>
                <img width="256" height="256" src="https://img.icons8.com/fluency/256/fail.png" alt="fail" />
                <h2>You haven't placed any orders so far.</h2>
                <div class="NO">
                    <div class="content-empty">
                        <div class="empty">
                            <a href="<?php echo base_url('crooms/tampilroomslogin') ?>"><button style="background-color: #E0B973;">Book Now</button></a>
                        </div>
                    </div>
                </div>
                <?php
            } else {
                foreach ($data as $booking) {
                ?>
                    <div class="bonus">
                        You can see your booking status below
                    </div>
                    <article class="BS">
                        <div>
                            <div class="bg-container">
                                <?php
                                $foto_urls = explode(',', $booking->foto);
                                foreach ($foto_urls as $index => $foto) {
                                ?>
                                    <div class="bg <?php echo $index === 0 ? 'active' : ''; ?>">
                                        <img src="<?php echo base_url('berkas/' . $foto); ?>" alt="Hotels">
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                            <!-- <div class="navigation">
                                <?php
                                for ($i = 0; $i < count($foto_urls); $i++) {
                                ?>
                                    <div class="btn <?php echo $i === 0 ? 'active' : ''; ?>"></div>
                                <?php
                                }
                                ?>
                            </div> -->
                            <div class="status-kamar">
                                <h2><?php echo $booking->jenis_kamar; ?></h2>
                            </div>
                            <h4>Bali, Indonesia</h4>
                        </div>
                        <form action="" class="content-form">
                            <div class="form-group">
                                <div class="form-wrapper">
                                    <label for="">Name</label>
                                    <input type="text" name="nama_lengkap" id="" disabled value="<?php echo $this->session->userdata('nama_lengkap'); ?>">
                                </div>
                                <div class="form-wrapper">
                                    <label for="">Email</label>
                                    <input type="Email" name="username" id="" disabled value="<?php echo $this->session->userdata('username'); ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-wrapper">
                                    <label for="">Nomor Hp</label>
                                    <input type="text" name="nomor_hp" id="" disabled value="<?php echo $booking->nomor_hp; ?>">
                                </div>
                                <div class="form-wrapper">
                                    <label for="">Layanan Tambahan</label>
                                    <input type="text" name="nama_layanan" id="" disabled value="<?php echo $booking->nama_layanan; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-wrapper">
                                    <label for="">Tanggal Masuk</label>
                                    <input type="text" name="waktu_masuk" id="" disabled value="<?php echo $booking->waktu_masuk; ?>">
                                </div>
                                <div class="form-wrapper">
                                    <label for="">Tanggal Keluar</label>
                                    <input type="text" name="waktu_keluar" id="" disabled value="<?php echo $booking->waktu_keluar; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-wrapper">
                                    <label for="">Harga</label>
                                    <input type="text" name="harga" id="" disabled value="Rp.<?php
                                                                                                $total = (($booking->harga) + ($booking->harga_layanan)) * $booking->jumlah_hari;
                                                                                                $total_formatted = number_format($total, 0, ',', '.');
                                                                                                echo $total_formatted;
                                                                                                ?>">
                                </div>
                                <div class="form-wrapper">
                                    <label for="">Nomor Kamar</label>
                                    <?php
                                    $room_numbers = array();
                                    foreach ($roomNumbers as $room) {
                                        $room_numbers[] = $room->no_kamar;
                                    }
                                    $room_numbers_string = implode(', ', $room_numbers);
                                    ?>
                                    <input type="text" name="nomor_kamar" id="" disabled value="<?php echo $room_numbers_string; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-wrapper">
                                    <label for="">Status Pemesanan</label>
                                    <input type="text" name="status_pemesanan" id="" disabled value="<?php echo $booking->status_pemesanan; ?>">
                                </div>
                                <div class="form-wrapper">
                                    <label for="">Status Pembayaran</label>
                                    <input type="text" name="status_pembayaran" id="" disabled value="<?php echo $booking->status_pembayaran; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <a href="<?php echo base_url('cawal/tampilhomelogin') ?>"><button type="button" style="background-color: #E0B973;">Home</button></a>
                                <a href="<?php echo base_url('cpemesanan/tampilroombooking2') ?>"><button type="button" style="background-color: #3252DF;">Payment Code</button></a>
                            </div>
                        </form>
                    </article>
            <?php
                }
            }
            ?>
        </div>
    </main>
    <?php include('footer.php'); ?>

    <script>
        var slides = document.querySelectorAll('.bg');
        var btns = document.querySelectorAll('.btn');
        let currentSlide = 0;
        var sliderAuto;

        var manualNav = function(manual) {
            slides.forEach((slide) => {
                slide.classList.remove('active');

                btns.forEach((btn) => {
                    btn.classList.remove('active');
                });
            });

            slides[manual].classList.add('active');
            btns[manual].classList.add('active');
            currentSlide = manual;
        }

        btns.forEach((btn, i) => {
            btn.addEventListener("click", () => {
                clearInterval(sliderAuto);
                manualNav(i);
                startAutoSlide();
            });
        });

        var startAutoSlide = function() {
            sliderAuto = setInterval(function() {
                currentSlide++;
                if (currentSlide >= slides.length) {
                    currentSlide = 0;
                }
                manualNav(currentSlide);
            }, 5000);
        }

        startAutoSlide();
    </script>
</body>

</html>