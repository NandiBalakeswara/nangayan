<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/styles/style.css'); ?>">
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
            <div class="bonus">
            You can see your booking status below           
            </div>
            <article class="BS">
                <div>
                    <img src="<?php echo base_url('assets/styles/hotel_bg.png'); ?>" alt="NangAyan Hotels">
                    <h2>Lorem ipsum dolor sit amet.</h2>
                    <h4>Bali, Indonesia</h4>
                </div>
                    <form action="" class="content-form">
                        <div class="form-group">
                            <div class="form-wrapper">
                                <label for="">Name</label>
                                <input type="text" name="" id="" disabled>
                            </div>
                            <div class="form-wrapper">
                                <label for="">Email</label>
                                <input type="Email" name="" id="" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-wrapper">
                                <label for="">Nomor Hp</label>
                                <input type="text" name="" id="" disabled>
                            </div>
                            <div class="form-wrapper">
                                <label for="">Layanan Tambahan</label>
                                <input type="text" name="" id="" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-wrapper">
                                <label for="">Tanggal Masuk</label>
                                <input type="date" name="" id="" disabled>
                            </div>
                            <div class="form-wrapper">
                                <label for="">Tanggal Keluar</label>
                                <input type="date" name="" id="" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-wrapper">
                                <label for="">Harga</label>
                                <input type="text" name="" id="" disabled>
                            </div>
                            <div class="form-wrapper">
                                <label for="">Nomor Kamar</label>
                                <input type="text" name="" id="" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-wrapper">
                                <label for="">Status Pemesanan</label>
                                <input type="text" name="" id="" disabled>
                            </div>
                            <div class="form-wrapper">
                                <label for="">Status Pembayaran</label>
                                <input type="text" name="" id="" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <button style="background-color: #E0B973;"><a href="<?php echo base_url('cawal/tampilhomelogin') ?>">Home</a></button>
                            <button style="background-color: #3252DF;"><a href="<?php echo base_url('cawal/tampilroombooking2') ?>">Payment Code</a></button>
                        </div>
                    </form>
            </article>
        </div>
    </main>
    <?php include('footer.php'); ?>
</body> 
</html>