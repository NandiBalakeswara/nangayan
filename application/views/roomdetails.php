<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/styles/css/style.css'); ?>">
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
                    <div class="rooms_img_left">
                        <?php if (!empty($photos[0])) : ?>
                            <img src="<?php echo base_url('berkas/' . $photos[0]->foto); ?>" alt="Hotels">
                        <?php endif; ?>
                    </div>
                    <div class="rooms_img_right">
                        <div class="rooms_img">
                            <?php if (!empty($photos[1])) : ?>
                                <img src="<?php echo base_url('berkas/' . $photos[1]->foto); ?>" alt="Hotels">
                            <?php endif; ?>
                        </div>
                        <div class="rooms_img">
                            <?php if (!empty($photos[2])) : ?>
                                <img src="<?php echo base_url('berkas/' . $photos[2]->foto); ?>" alt="Hotels">
                            <?php endif; ?>
                        </div>
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
                        <h2>Rp. <?php $total = $room->harga;
                                $total_formatted = number_format($total, 0, ',', '.');
                                echo $total_formatted ?> Per Night</h2>
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
    </script>
</body>

</html>