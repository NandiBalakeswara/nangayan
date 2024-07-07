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
                                    <h4>Sub Total Kamar :</h4>
                                    <h2>Rp.<?php
                                            $harga = ($pemesanan->harga * $pemesanan->jumlah_hari * $pemesanan->jumlah_pesanan);
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
                                            $total = $harga + $hargal;
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
                        <div class="btn" id="pay-button"> <button>Metode Pembayaran Lainnya</button>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
            <div class="content-btn">
                <a href="<?php echo base_url('cstatus/showBookingStatus') ?>"><button style="background-color: #5e5d5d;">Status</button></a>
                <a href="<?php echo base_url('cawal/tampilhomelogin') ?>"><button style="background-color: #E0B973;">Home</button></a>
            </div>
        </div>
    </main>
    <?php include('footer.php'); ?>
    <script type="text/javascript">
        $('#pay-button').click(function(event) {
            event.preventDefault();
            $(this).attr("disabled", "disabled");

            $.ajax({
                url: '<?= site_url() ?>/snap/token',
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
                }
            });
        });
    </script>
</body>

</html>