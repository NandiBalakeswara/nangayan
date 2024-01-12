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
            <?php
            if(empty($data))
                        {
                            echo "Data Kosong";	
                        }
                        else
                        {?>
            <article class="BS">
                <div>
                    <img src="<?php echo base_url('berkas/'.$data->foto); ?>" alt="NangAyan Hotels">
                    <h2><?php echo $data->jenis_kamar; ?></h2>
                    <h4>Bali, Indonesia</h4>
                </div>
                    <form action="" class="content-form">
                        <div class="form-group">
                            <div class="form-wrapper">
                                <label for="">Name</label>
                                <input type="text" name="nama_lengkap" id="" disabled value="<?php echo $this->session->userdata('nama_lengkap'); ?>" >
                            </div>
                            <div class="form-wrapper">
                                <label for="">Email</label>
                                <input type="Email" name="username" id="" disabled value="<?php echo $this->session->userdata('username'); ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-wrapper">
                                <label for="">Nomor Hp</label>
                                <input type="text" name="nomor_hp" id="" disabled value="<?php echo $data->nomor_hp; ?>" >
                            </div>
                            <div class="form-wrapper">
                                <label for="">Layanan Tambahan</label>
                                <input type="text" name="nama_layanan" id="" disabled value="<?php echo $data->nama_layanan; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-wrapper">
                                <label for="">Tanggal Masuk</label>
                                <input type="text" name="waktu_masuk" id="" disabled value="<?php echo $data->waktu_masuk; ?>">
                            </div>
                            <div class="form-wrapper">
                                <label for="">Tanggal Keluar</label>
                                <input type="text" name="waktu_keluar" id="" disabled value="<?php echo $data->waktu_keluar; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-wrapper">
                                <label for="">Harga</label>
                                <input type="text" name="harga" id="" disabled value="
                                    <?php
                                        // echo $data->harga; 
                                        $a=($data->harga)+($data->harga_layanan);
                                        echo $a
                                    ?>">
                            </div>
                            <div class="form-wrapper">
                                <label for="">Nomor Kamar</label>
                                <input type="text" name="nomor_kamar" id="" disabled value="<?php echo $data->nomor_kamar; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-wrapper">
                                <label for="">Status Pemesanan</label>
                                <input type="text" name="status_pemesanan" id="" disabled value="<?php echo $data->status_pemesanan; ?>">
                            </div>
                            <div class="form-wrapper">
                                <label for="">Status Pembayaran</label>
                                <input type="text" name="status_pembayaran" id="" disabled value="<?php echo $data->status_pembayaran; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <button style="background-color: #E0B973;"><a href="<?php echo base_url('cawal/tampilhomelogin') ?>">Home</a></button>
                            <button style="background-color: #3252DF;"><a href="<?php echo base_url('cawal/tampilroombooking2') ?>">Payment Code</a></button>
                        </div>
                    </form>
            </article>     
                       <?php }
                        ?>
        </div>
    </main>
    <?php include('footer.php'); ?>
</body> 
</html>