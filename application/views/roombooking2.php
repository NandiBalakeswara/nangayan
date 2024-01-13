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
                                <h2>Rp.<?php echo ($pemesanan->harga*$pemesanan->jumlah_hari); ?></h2>
                            </div>
                            <div class="payment">
                                <h4>Layanan Tambahan :</h4>
                                <h2>Rp.<?php echo ($pemesanan->harga_layanan*$pemesanan->jumlah_hari) ?></h2>
                            </div>
                            <div class="total">
                                <h4>Total Pembayaran :</h4>
                                <h2>Rp.<?php echo (($pemesanan->harga*$pemesanan->jumlah_hari)+ ($pemesanan->harga_layanan*$pemesanan->jumlah_hari) )?></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="code">
                    <h3>Kode Pembayaran</h3>
                    <h4>Untuk melakukan pembayaran anda dapat melakukan pembayarnan dikasir dengan menyertakan kode berikut </h4>
                    <h1><?php 
                        if($pemesanan->status_pemesanan=='Tervalidasi'){
                            echo $pemesanan->kode_pembayaran; 
                        } 
                        elseif($pemesanan->status_pemesanan=='Belum Tervalidasi'){
                            echo 'Pemesanan Gagal Diproses Kamar Penuh';
                        }  
                        else{
                            echo 'Pemesanan Masih Diproses'; 
                        }
                    ?></h1>
                </div>
            </article>
            <div class="content-btn">
                <?php
                     if($pemesanan->status_pembayaran=='Tervalidasi') {?>
                        <a href="<?php echo base_url('cawal/tampilroombooking3') ?>"><button style="background-color: #3252DF;">Continue to Book</button></a>
                    <?php } 
                        else{
                            
                        }  
                ?>
                
                <a href="<?php echo base_url('cstatus/showBookingStatus') ?>"><button style="background-color: #5e5d5d;">Status</button></a>
                <a href="<?php echo base_url('cawal/tampilhomelogin') ?>"><button style="background-color: #E0B973;">Home</button></a>
                
            </div>
        </div>
    </main>
    <?php include('footer.php'); ?>
</body> 
</html>