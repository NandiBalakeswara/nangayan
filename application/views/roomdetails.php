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
                <li><a href="<?php echo base_url('cawal/tampilroomslogin') ?>">Rooms</a></li>
                <li><a href="<?php echo base_url('cawal/tampilstatus'); ?>">Status</a></li>
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
                    <img src="<?php echo base_url('assets/styles/image/logo2.png'); ?>" alt="NangAyan Hotels">
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
                        <h2>Rp. <?php echo $room->harga; ?> Per Night</h2>
                        <form action="" method="post">
                            <label for="">Pick a Date In</label>
                            <input type="date" name="" id="">
                            <label for="">Pick a Date Out</label>
                            <input type="date" name="" id="">
                            <button type="submit"><a href="">Continue To Book</a></button>
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