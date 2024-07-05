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
                    <?php if (!empty($first_photo)) : ?>
                        <img src="<?php echo base_url('berkas/' . $first_photo->foto); ?>" alt="NangAyan Hotels">
                    <?php endif; ?>
                    <div class="information">
                        <div class="left-info">
                            <h2><?php echo $kamar->jenis_kamar; ?></h2>
                            <h4>Bali, Indonesia</h4>
                        </div>
                        <div class="right-info">
                            <h2>Rp. <?php
                                    $total = $kamar->harga;
                                    $total_formatted = number_format($total, 0, ',', '.');
                                    echo $total_formatted ?> Per Night
                            </h2>
                            <h3><?php echo date('j', strtotime($waktu_masuk)) . ' - ' . date('j F', strtotime($waktu_keluar)); ?></h3>
                        </div>
                    </div>
                </div>
                <form action="<?php echo base_url('cpemesanan/simpandata'); ?>" method="post" class="content-form" id="bookingForm">
                    <div class="form-wrapper-info">
                        <label for="">Name</label>
                        <input type="text" name="nama_lengkap" disabled value="<?php echo $this->session->userdata('nama_lengkap') ?>">
                    </div>
                    <div class="form-wrapper-info">
                        <label for="">Email</label>
                        <input type="Email" name="username" disabled value="<?php echo $this->session->userdata('username') ?>">
                    </div>
                    <div class="form-wrapper-info">
                        <label for="">Nomor Telepon</label>
                        <input type="text" name="nomor_hp" disabled value="<?php echo $this->session->userdata('nomor_hp') ?>">
                    </div>
                    <div class="form-wrapper-info">
                        <label for="">Jumlah Kamar</label>
                        <input type="number" name="jumlah_pesanan" id="jumlah_pesanan" min="1" value="<?php echo isset($_POST['jumlah_pesanan']) ? $_POST['jumlah_pesanan'] : 1; ?>">
                    </div>
                    <input type="hidden" name="id_pengguna" value="<?php echo $this->session->userdata('id_pengguna') ?>">
                    <input type="hidden" name="waktu_masuk" value="<?php echo $waktu_masuk ?>">
                    <input type="hidden" name="waktu_keluar" value="<?php echo $waktu_keluar ?>">
                    <input type="hidden" name="id_kamar" value="<?php echo $kamar->id_kamar ?>">
                    <div id="layananTambahanWrapper">
                        <div class="form-wrapper-info">
                            <label for="id_layanan_1">Layanan Tambahan</label>
                            <select name="id_layanan" id="id_layanan_1">
                                <option value="">Pilih Layanan Tambahan</option>
                                <?php foreach ($layananList as $layanan) : ?>
                                    <option value="<?php echo $layanan->id_layanan; ?>"><?php echo $layanan->nama_layanan; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </form>
            </article>
            <div class="content-btn">
                <button style="background-color: #3252DF;" onclick="submitForm()">Continue to Book</button>
                <a href="<?php echo base_url('crooms/tampilroomslogin') ?>"><button style="background-color: #b5b5b5;">Cancel</button></a>
            </div>
        </div>
    </main>
    <?php include('footer.php'); ?>
    <script>
        function submitForm() {
            document.getElementById("bookingForm").submit();
        }

        // document.getElementById('jumlah_pesanan').addEventListener('input', function() {
        //     var jumlahPesanan = parseInt(this.value);
        //     var layananTambahanWrapper = document.getElementById('layananTambahanWrapper');

        //     // Clear existing additional dropdowns
        //     while (layananTambahanWrapper.children.length > 1) {
        //         layananTambahanWrapper.removeChild(layananTambahanWrapper.lastChild);
        //     }

        //     // Add new dropdowns based on jumlah_pesanan
        //     for (var i = 2; i <= jumlahPesanan; i++) {
        //         var newDropdown = document.createElement('div');
        //         newDropdown.className = 'form-wrapper-info';
        //         newDropdown.innerHTML = `
        //         <label for="id_layanan_${i}">Layanan Tambahan ${i}</label>
        //         <select name="id_layanan[]" id="id_layanan_${i}">
        //             <option value="">Pilih Layanan Tambahan</option>
        //             <?php foreach ($layananList as $layanan) : ?>
        //                 <option value="<?php echo $layanan->id_layanan; ?>"><?php echo $layanan->nama_layanan; ?></option>
        //             <?php endforeach; ?>
        //         </select>
        //     `;
        //         layananTambahanWrapper.appendChild(newDropdown);
        //     }
        // });
    </script>
</body>

</html>