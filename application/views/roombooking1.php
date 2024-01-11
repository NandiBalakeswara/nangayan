<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/styles/style.css'); ?>">
    <title>Booking Information</title>
</head>
<body>
    <header class="status">
        <h1>Nang Ayan</h1>
        <h2>Hotels</h2>
    </header>
    <main>
        <div class="content">
            <h1>Booking Information</h1>
            <div class="bonus">
            Please fill up the blank fields below           
            </div>
            <article class="BS">
                <div class="info">
                    <img src="<?php echo base_url('berkas/'.$kamar->foto); ?>" alt="NangAyan Hotels">
                    <div class="information">
                    <div class="left-info">
                        <h2><?php echo $kamar->jenis_kamar; ?></h2>
                        <h4>Bali, Indonesia</h4>
                    </div>
                    <div class="right-info">
                        <h3>Rp. <?php echo $kamar->harga; ?> Per Night</h3>
                        <h3>Date <?php echo date('j', strtotime($waktu_masuk)) . ' - ' . date('j F', strtotime($waktu_keluar)); ?></h3>
                    </div>
                    </div>
                </div>
                <form action="<?php echo base_url('cpemesanan/simpandata'); ?>" method="post"  class="content-form" id="bookingForm">            
                    <div class="form-wrapper-info">
                        <label for="">Name</label>
                        <input type="text" name="nama_lengkap" disabled value="<?php echo $this->session->userdata('nama_lengkap')?>">
                    </div>
                    <div class="form-wrapper-info">
                        <label for="">Email</label>
                        <input type="Email" name="username" disabled value="<?php echo $this->session->userdata('username')?>">
                    </div>
                    <div class="form-wrapper-info">
                        <label for="">Nomor Telepon</label>
                        <input type="text" name="nomor_hp" disabled value="<?php echo $this->session->userdata('nomor_hp')?>">
                    </div>
                    <input type="hidden" name="id_pengguna" value="<?php echo $this->session->userdata('id_pengguna')?>">
                    <input type="hidden" name="waktu_masuk" value="<?php echo $waktu_masuk?>">
                    <input type="hidden" name="waktu_keluar" value="<?php echo $waktu_keluar?>">
                    <input type="hidden" name="id_kamar" value="<?php echo $kamar->id_kamar?>">
                    <div class="form-wrapper-info">
                        <label for="" name="nama_layanan">Layanan Tambahan</label> 
                        <select>
                            <option value="">Pilih Layanan Tambahan</option>
                            <option value="Extra Bed">Extra Bed</option>
                            <option value="Lunch">Lunch</option>
                            <option value="Dinner">Dinner</option>
                        </select>
                    </div>
                </form>
            </article>
            <div class="content-btn">
                <button style="background-color: #3252DF;"onclick="submitForm()">Continue to Book</a></button>
                <button style="background-color: #b5b5b5;"><a href="<?php echo base_url('cawal/tampilroomdetails') ?>">Cancel</a></button>
            </div>
        </div>
    </main>
    <?php include('footer.php'); ?>
</body> 
</html>
<script>
    function submitForm() {
        // Melakukan submit pada formulir dengan id "bookingForm"
        document.getElementById("bookingForm").submit();
    }
</script>