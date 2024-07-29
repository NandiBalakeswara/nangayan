<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/styles/css/admin.css'); ?>">
    <title>Admin-Laporan</title>
</head>

<body>
    <main>
        <?php include('sidebar.php') ?>
        <div class="content">
            <div class="user">
                <h2>admin</h2>
            </div>
            <div class="title">
                <h1>Laporan</h1>
                <div class="btn-report">
                    <button style="background-color: #5973D0;" id="myBtn-add">Cari</button>
                    <button style="background-color: #626262;" onclick="window.location.href='<?php echo base_url('creport'); ?>'">Reset</button>
                </div>
            </div>
            <div class="table">
                <?php if ($is_empty) : ?>
                    <p style="color: red; text-align: center;">Tidak ada data pada bulan dan tahun tersebut.</p>
                <?php else : ?>
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Bulan</th>
                                <th>Tahun</th>
                                <th>Jenis Kamar</th>
                                <th>Nama Layanan</th>
                                <th>Jumlah Pemesanan</th>
                                <th>Pendapatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($report_data as $row) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $row->bulan; ?></td>
                                    <td><?= $row->tahun; ?></td>
                                    <td><?= $row->jenis_kamar; ?></td>
                                    <td><?= $row->nama_layanan; ?></td>
                                    <td><?= $row->jumlah_pemesanan; ?></td>
                                    <td>Rp. <?= number_format($row->total_harga, 0, ',', '.'); ?></td>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td colspan="5" style="font-weight: bold;">Total Pendapatan</td>
                                <td style="font-weight: bold;">:</td>
                                <td colspan="">Rp. <?= number_format($total_pendapatan, 0, ',', '.'); ?></td>
                            </tr>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
            <div id="myModal-add" class="modaladd">
                <div class="modal-content-add">
                    <div class="title">
                        <h1>Pencarian Data Laporan</h1>
                        <span class="closeadd" id="close-add">&times;</span>
                    </div>
                    <form action="<?php echo base_url('creport/search'); ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="form-wrapper">
                                <label for="bulan">Bulan (1-12)</label>
                                <input type="number" id="bulan" name="bulan">
                            </div>
                            <div class="form-wrapper">
                                <label for="tahun">Tahun</label>
                                <input type="number" id="tahun" name="tahun">
                            </div>
                        </div>
                        <div class="form-wrapper-rooms">
                            <label for="jenis_kamar">Jenis Kamar</label>
                            <select name="jenis_kamar" id="jenis_kamar">
                                <option value="">Pilih Jenis Kamar</option>
                                <?php foreach ($jenis_kamar_list as $jenis_kamar) : ?>
                                    <option value="<?= $jenis_kamar->jenis_kamar; ?>"><?= $jenis_kamar->jenis_kamar; ?></option>
                                <?php endforeach; ?>
                            </select>
                            <!-- <input type="text" id="jenis_kamar" name="jenis_kamar"> -->
                        </div>
                        <!-- <div class="form-group">
                            <div class="form-wrapper">
                                <label for="jumlah_pesanan">Jumlah Pesanan</label>
                                <input type="number" id="jumlah_pesanan" name="jumlah_pesanan">
                            </div>
                            <div class="form-wrapper">
                                <label for="pendapatan">Pendapatan</label>
                                <input type="number" id="pendapatan" name="pendapatan">
                            </div>
                        </div> -->
                        <div class="btn">
                            <button type="submit" style="background-color: #5973D0;">Submit</button>
                            <button type="reset" style="background-color: #626262;">Reset</button>
                        </div>
                    </form>
                </div>
            </div>

    </main>
    <script>
        // Function to open the Add modal
        var modalAdd = document.getElementById("myModal-add");
        var btnAdd = document.getElementById("myBtn-add");
        var spanAdd = document.getElementById("close-add");

        btnAdd.onclick = function() {
            modalAdd.style.display = "block";
        }

        spanAdd.onclick = function() {
            modalAdd.style.display = "none";
        }

        // Function to open the Edit modal
        function openModalEdit(id) {
            var modal = document.getElementById("myModal" + id);
            modal.style.display = "block";
        }

        function closeModal(id) {
            var modal = document.getElementById("myModal" + id);
            modal.style.display = "none";
        }

        // Function to open the Delete modal
        function openModalDelete(id) {
            var modal = document.getElementById("myModal-delete" + id);
            modal.style.display = "block";
        }

        function closeModalDelete(id) {
            var modal = document.getElementById("myModal-delete" + id);
            modal.style.display = "none";
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            if (event.target == modalAdd) {
                modalAdd.style.display = "none";
            }
        }
    </script>
</body>

</html>