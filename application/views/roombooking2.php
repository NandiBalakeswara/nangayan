<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/styles/style.css'); ?>">
    <title>Payment</title>
</head>
<body>
    <header class="status">
        <h1>Nang Ayan</h1>
        <h2>Hotels</h2>
    </header>
    <main>
        <div class="content">
            <h1>Payment</h1>
            <div class="bonus">
            Kindly follow the instructions below           
            </div>
            <article class="BS">
                <div class="info">
                    <div class="information">
                        <div class="sub-total">
                            <div class="payment">
                                <h4>Sub Total Kamar :</h4>
                                <h2>Rp.999.999.999,00</h2>
                            </div>
                            <div class="payment">
                                <h4>Layanan Tambahan :</h4>
                                <h2>Rp.999.999.999,00</h2>
                            </div>
                            <div class="total">
                                <h4>Total Pembayaran :</h4>
                                <h2>Rp.999.999.999,00</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="code">
                    <h3>Kode Pembayaran</h3>
                    <h4>Untuk melakukan pembayaran anda dapat melakukan pembayarnan dikasir dengan menyertakan kode berikut </h4>
                    <h1>101</h1>
                </div>
            </article>
            <div class="content-btn">
                <button style="background-color: #3252DF;"><a href="<?php echo base_url('cawal/tampilroombooking3') ?>">Continue to Book</a></button>
                <button style="background-color: #5e5d5d;"><a href="<?php echo base_url('cawal/tampilstatus') ?>">Status</a></button>
                <button style="background-color: #b5b5b5;"><a href="<?php echo base_url('cawal/tampilroomdetails') ?>">Cancel</a></button>
            </div>
        </div>
    </main>
    <?php include('footer.php'); ?>
</body> 
</html>