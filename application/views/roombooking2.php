<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/styles/css/style.css'); ?>">
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-2TObtnkDD8MVixl3"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
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
            <?php foreach ($pemesananList as $pemesanan) : ?>
                <article class="BS">
                    <div class="info">
                        <div class="information">
                            <div class="sub-total">

                                <div class="payment">
                                    <h4>Jenis Kamar :</h4>
                                    <h2><?php echo $pemesanan->jenis_kamar; ?></h2>
                                </div>

                                <div class="payment">
                                    <h4>Harga Kamar :</h4>
                                    <h2>Rp.<?php echo $harga_kamar = number_format($pemesanan->harga, 0, ',', '.') ?></h2>
                                </div>

                                <div class="payment">
                                    <h4>Jumlah Pesanan :</h4>
                                    <h2><?php echo $pemesanan->jumlah_pesanan; ?></h2>
                                </div>

                                <div class="payment">
                                    <h4>Sub Total Kamar :</h4>
                                    <h2>Rp.<?php
                                            $harga = ($pemesanan->harga  * $pemesanan->jumlah_pesanan);
                                            $harga_formatted = number_format($harga, 0, ',', '.');
                                            echo $harga_formatted;
                                            ?>
                                    </h2>
                                </div>

                                <div class="payment">
                                    <h4>Layanan Tambahan :</h4>
                                    <h2>Rp.<?php
                                            $hargal = ($pemesanan->harga_layanan * $pemesanan->jumlah_hari);
                                            $hargal_formatted = number_format($hargal, 0, ',', '.');
                                            echo $hargal_formatted;
                                            ?>
                                    </h2>
                                </div>

                                <div class="payment">
                                    <h4>Lama Menginap :</h4>
                                    <h2><?php echo $pemesanan->jumlah_hari; ?>
                                        Hari / Malam</h2>
                                </div>

                                <div class="total">
                                    <h4>Total Pembayaran :</h4>
                                    <h2>Rp.<?php
                                            $total = ($harga * $pemesanan->jumlah_hari) + $hargal;
                                            $total_formatted = number_format($total, 0, ',', '.');
                                            echo $total_formatted;
                                            ?>
                                    </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="code">
                        <h3>Kode Pembayaran</h3>
                        <h4>To make a payment, you can make a transfer to the account number below or make a cashier payment by including the following code</h4>
                        <p>No. Rek Pembayaran : 70001081338665572</p>
                        <p>No. Telp Admin : <a href="http://wa.me/62881037551260" style="color: 14274A; text-decoration: none;">+62 881-0375-51260</a></p>
                        <h1><?php
                            if ($pemesanan->status_pemesanan == 'Tervalidasi') {
                                echo $pemesanan->kode_pembayaran;
                            } elseif ($pemesanan->status_pemesanan == 'Belum Tervalidasi') {
                                echo 'Pemesanan Masih Diproses';
                            } else {
                                echo  'Pemesanan Gagal Diproses Kamar Penuh';
                            }
                            ?>
                        </h1>
                        <form id="payment-form" method="post" action="<?= site_url() ?>/cpemesanan/finish">
                            <input type="hidden" name="result_type" id="result-type" value="">
                            <input type="hidden" name="result_data" id="result-data" value="">
                            <input type="hidden" name="jenis_kamar" id="jenis_kamar" value="<?= $pemesanan->jenis_kamar; ?>">
                            <input type="hidden" name="harga_kamar" id="harga_kamar" value="<?= $harga_kamar; ?>">
                            <input type="hidden" name="sub_total_kamar" id="sub_total_kamar" value="<?= $harga; ?>">
                            <input type="hidden" name="nama_layanan" id="nama_layanan" value="<?= $pemesanan->nama_layanan; ?>">
                            <input type="hidden" name="layanan_tambahan" id="layanan_tambahan" value="<?= $hargal ?>">
                            <input type="hidden" name="jumlah_pesanan" id="jumlah_pesanan" value="<?= $pemesanan->jumlah_pesanan; ?>">
                            <input type="hidden" name="lama_menginap" id="lama_menginap" value="<?= $pemesanan->jumlah_hari; ?>">
                            <input type="hidden" name="total_pembayaran" id="total_pembayaran" value="<?= $total; ?>">

                            <input type="hidden" nama="nama_lengkap" id="nama_lengkap" value="<?php echo $pemesanan->nama_lengkap; ?>">
                            <input type="hidden" nama="username" id="username" value="<?php echo $pemesanan->username; ?>">
                            <input type="hidden" nama="nomor_hp" id="nomor_hp" value="<?php echo $pemesanan->nomor_hp; ?>">


                            <div class="btn" id="pay-button">
                                <button>Metode Pembayaran Lainnya</button>
                            </div>
                        </form>
                    </div>
                </article>
            <?php endforeach; ?>
            <div class="content-btn">
                <a href="<?php echo base_url('cstatus/showBookingStatus') ?>"><button style="background-color: #5e5d5d;">Status</button></a>
                <a href="<?php echo base_url('cawal/tampilhomelogin') ?>"><button style="background-color: #E0B973;">Home</button></a>
            </div>
        </div>
    </main>
    <?php include('footerLogin.php'); ?>
    <script>
        var jenis_kamar = $('#jenis_kamar').val();
        var harga_kamar = $('#harga_kamar').val();
        var sub_total_kamar = $('#sub_total_kamar').val();
        var nama_layanan = $('#nama_layanan').val();
        var layanan_tambahan = $('#layanan_tambahan').val();
        var jumlah_pesanan = $('#jumlah_pesanan').val();
        var lama_menginap = $('#lama_menginap').val();
        var total_pembayaran = $('#total_pembayaran').val();

        var nama_lengkap = $('#nama_lengkap').val();
        var username = $('#username').val();
        var nomor_hp = $('#nomor_hp').val();

        $('#pay-button').click(function(event) {
            event.preventDefault();
            $.ajax({
                type: 'POST',
                url: '<?= site_url() ?>/cpemesanan/token',
                data: {
                    jenis_kamar: jenis_kamar,
                    harga_kamar: harga_kamar,
                    sub_total_kamar: sub_total_kamar,
                    nama_layanan: nama_layanan,
                    layanan_tambahan: layanan_tambahan,
                    jumlah_pesanan: jumlah_pesanan,
                    lama_menginap: lama_menginap,
                    total_pembayaran: total_pembayaran,

                    nama_lengkap: nama_lengkap,
                    username: username,
                    nomor_hp: nomor_hp
                },
                cache: false,

                success: function(data) {
                    //location = data;

                    console.log('token = ' + data);

                    var resultType = document.getElementById('result-type');
                    var resultData = document.getElementById('result-data');

                    function changeResult(type, data) {
                        $("#result-type").val(type);
                        $("#result-data").val(JSON.stringify(data));
                        //resultType.innerHTML = type;
                        //resultData.innerHTML = JSON.stringify(data);
                    }

                    snap.pay(data, {

                        onSuccess: function(result) {
                            changeResult('success', result);
                            console.log(result.status_message);
                            console.log(result);
                            $("#payment-form").submit();
                        },
                        onPending: function(result) {
                            changeResult('pending', result);
                            console.log(result.status_message);
                            $("#payment-form").submit();
                        },
                        onError: function(result) {
                            changeResult('error', result);
                            console.log(result.status_message);
                            $("#payment-form").submit();
                        }
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Failed to obtain token: ', error);
                }
            });
        });
    </script>
</body>

</html>