<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/styles/css/admin.css'); ?>">
    <title>Admin-Pemesanan</title>
</head>

<body>
    <main>
        <?php include('sidebar.php') ?>
        <div class="content">
            <div class="user">
                <h2>admin</h2>
            </div>
            <div class="title">
                <h1>Pemesanan</h1>
                <div class="btn-room">
                    <form action="<?php echo base_url('cadmin/search'); ?>" method="post">
                        <input type="search" name="cari" placeholder="Cari Nama Penguna">
                    </form>
                    <button style="background-color: #626262;" onclick="window.location.href='<?php echo base_url('cadmin/tampiladminpesan'); ?>'">Reset</button>
                </div>
            </div>
            <div class="table">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pemesanan</th>
                            <th>Jenis Kamar</th>
                            <th>Tambahan Layanan</th>
                            <th>Tanggal Masuk</th>
                            <th>Tanggal Keluar</th>
                            <th>Status Pemesanan</th>
                            <th>Status Pembayaran</th>
                            <th>Kode Pembayaran</th>
                            <th>Total Pembayaran</th>
                            <th>Jumlah Pesanan</th>
                            <th>Nomor Kamar</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!empty($pemesanan)) {
                            $no = 1;
                            foreach ($pemesanan as $pesan) {
                        ?>
                                <tr id="baris">
                                    <td scope="row"><?php echo $no; ?></td>
                                    <td><?php echo $pesan->nama_lengkap; ?></td>
                                    <td><?php echo $pesan->jenis_kamar; ?></td>
                                    <td><?php echo $pesan->nama_layanan; ?></td>
                                    <td><?php echo $pesan->waktu_masuk; ?></td>
                                    <td><?php echo $pesan->waktu_keluar; ?></td>
                                    <td><?php echo $pesan->status_pemesanan; ?></td>
                                    <td><?php echo $pesan->status_pembayaran; ?></td>
                                    <td><?php echo $pesan->kode_pembayaran; ?></td>
                                    <td>Rp. <?php echo number_format($pesan->total_pembayaran, 0, ',', '.'); ?></td>
                                    <td><?php echo $pesan->jumlah_pesanan; ?></td>
                                    <td><?php echo $pesan->no_kamar;
                                        ?></td>
                                    <th>
                                        <button id="myBtn_<?php echo $no; ?>" onclick="openModalEdit(<?php echo $no; ?>)"><img src="<?php echo base_url('assets/styles/image/edit2.png'); ?>" alt="edit"></button>
                                        <button id="myBtn-dlt_<?php echo $no; ?>" onclick="openModalDelete(<?php echo $no; ?>)"><img src="<?php echo base_url('assets/styles/image/delete3.png'); ?>" alt="delete"></button>
                                    </th>
                                </tr>
                                <?php $no++; ?>
                        <?php
                            }
                        } else {
                            // Jika tidak ada data, tampilkan pesan data kosong
                            echo '<tr><td colspan="8">Data kosong</td></tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- Edit -->
            <?php $no = 1;
            foreach ($pemesanan as $pesan) { ?>
                <div id="myModal_<?php echo $no; ?>" class="modal">
                    <!-- Modal content -->
                    <div class="modal-content">
                        <div class="title">
                            <h1>Validasi Pemesanan</h1>
                            <span class="close" onclick="closeModal(<?php echo $no; ?>)">&times;</span>
                        </div>
                        <form action="<?php echo base_url('cadmin/updatepemesanan'); ?>" method="post">
                            <!-- Tambahkan input hidden untuk menyimpan ID pemesanan -->
                            <input type="hidden" name="id_pemesanan" value="<?php echo $pesan->id_pemesanan; ?>">
                            <!-- Tambahkan input hidden untuk menyimpan ID pengguna, ID kamar, dan ID layanan -->
                            <input type="hidden" name="id_pengguna" value="<?php echo $pesan->id_pengguna; ?>">
                            <input type="hidden" name="id_kamar" value="<?php echo $pesan->id_kamar; ?>">
                            <input type="hidden" name="id_layanan" value="<?php echo $pesan->id_layanan; ?>">
                            <div class="form-group">
                                <div class="form-wrapper">
                                    <label for="">Nama Pemesan</label>
                                    <input type="text" name="nama_lengkap" id="" disabled value="<?php echo $pesan->nama_lengkap; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-wrapper">
                                    <label for="">Jenis Kamar</label>
                                    <input type="text" name="jenis_kamar" id="" disabled value="<?php echo $pesan->jenis_kamar; ?>">
                                </div>
                                <div class="form-wrapper">
                                    <label for="">Tambahan Layanan</label>
                                    <input type="text" name="nama_layanan" id="" disabled value="<?php echo $pesan->nama_layanan; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-wrapper">
                                    <label for="">Tanggal Masuk</label>
                                    <input type="text" name="" id="" disabled value="<?php echo $pesan->waktu_masuk; ?>">
                                </div>
                                <div class="form-wrapper">
                                    <label for="">Tanggal Keluar</label>
                                    <input type="text" name="" id="" disabled value="<?php echo $pesan->waktu_keluar; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-wrapper">
                                    <label for="">Status Pemesanan</label>
                                    <!-- Ganti bagian ini dengan opsi yang sesuai dari database -->
                                    <select name="status_pemesanan">
                                        <option value="Tervalidasi" <?php echo ($pesan->status_pemesanan == 'Tervalidasi') ? 'selected' : ''; ?>>Tervalidasi</option>
                                        <option value="Belum Tervalidasi" <?php echo ($pesan->status_pemesanan == 'Belum Tervalidasi') ? 'selected' : ''; ?>>Belum Tervalidasi</option>
                                    </select>
                                </div>
                                <div class="form-wrapper">
                                    <label for="">Status Pembayaran</label>
                                    <!-- Ganti bagian ini dengan opsi yang sesuai dari database -->
                                    <select name="status_pembayaran">
                                        <option value="Tervalidasi" <?php echo ($pesan->status_pembayaran == 'Tervalidasi') ? 'selected' : ''; ?>>Tervalidasi</option>
                                        <option value="Belum Tervalidasi" <?php echo ($pesan->status_pembayaran == 'Belum Tervalidasi') ? 'selected' : ''; ?>>Belum Tervalidasi</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-wrapper">
                                    <label for="">Kode Pembayaran</label>
                                    <input type="text" name="kode_pembayaran" id="kode_pembayaran" value="<?php echo $pesan->kode_pembayaran; ?>">
                                </div>
                                <div class="form-wrapper">
                                    <label for="">Nomor Kamar</label>
                                    <input type="text" name="" id="nomor_kamar" value="<?php echo $pesan->no_kamar ?>" disabled>
                                </div>
                            </div>
                            <div class="btn">
                                <button type="submit" style="background-color: #E0B973;">Edit</button>
                                <button type="reset" style="background-color: #626262;">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Pup Up Hapus -->
                <div id="myModal-delete_<?php echo $no; ?>" class="modaldlt">
                    <!-- Modal content -->
                    <div class="modal-content-delete">
                        <div class="title">
                            <h1>Hapus Pemesanan</h1>
                            <span class="closedlt" onclick="closeModalDelete(<?php echo $no; ?>)">&times;</span>
                        </div>
                        <form action="<?php echo base_url('cadmin/hapuspemesanan'); ?>" method="post">
                            <!-- Tambahkan input hidden untuk menyimpan ID pemesanan -->
                            <input type="hidden" name="id_pemesanan" value="<?php echo $pesan->id_pemesanan; ?>">
                            <div class="form-group">
                                <div class="form-wrapper">
                                    <label for="">Nama Pemesan</label>
                                    <input type="text" name="" id="" disabled value="<?php echo $pesan->nama_lengkap; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-wrapper">
                                    <label for="">Jenis Kamar</label>
                                    <input type="text" name="" id="" disabled value="<?php echo $pesan->jenis_kamar; ?>">
                                </div>
                                <div class="form-wrapper">
                                    <label for="">Tambahan Layanan</label>
                                    <input type="text" name="" id="" disabled value="<?php echo $pesan->nama_layanan; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-wrapper">
                                    <label for="">Tanggal Masuk</label>
                                    <input type="text" name="" id="" disabled value="<?php echo $pesan->waktu_masuk; ?>">
                                </div>
                                <div class="form-wrapper">
                                    <label for="">Tanggal Keluar</label>
                                    <input type="text" name="" id="" disabled value="<?php echo $pesan->waktu_keluar; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-wrapper">
                                    <label for="">Status Pemesanan</label>
                                    <input type="text" name="" id="" disabled value="<?php echo $pesan->status_pemesanan; ?>">
                                </div>
                                <div class="form-wrapper">
                                    <label for="">Status Pembayaran</label>
                                    <input type="text" name="" id="" disabled value="<?php echo $pesan->status_pembayaran; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-wrapper">
                                    <label for="">Kode Pembayaran</label>
                                    <input type="text" name="" id="" disabled value="<?php echo $pesan->waktu_masuk; ?>">
                                </div>
                                <div class="form-wrapper">
                                    <label for="">Nomor Kamar</label>
                                    <input type="text" name="" id="" disabled value="<?php echo $pesan->no_kamar; ?>">
                                </div>
                            </div>
                            <div class="btn">
                                <button type="submit" style="background-color: #D85050;">Hapus</button>
                                <button type="reset" style="background-color: #626262;" disabled>Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
                <?php $no++; ?>
            <?php } ?>
    </main>
</body>

</html>


<script>
    // Pop-up edit
    function openModal(no) {
        var modal = document.getElementById("myModal_" + no);
        modal.style.display = "block";
    }

    function closeModal(no) {
        var modal = document.getElementById("myModal_" + no);
        modal.style.display = "none";
    }

    // Pop-up delete
    function openModalDelete(no) {
        var modal = document.getElementById("myModal-delete_" + no);
        modal.style.display = "block";
    }

    function closeModalDelete(no) {
        var modal = document.getElementById("myModal-delete_" + no);
        modal.style.display = "none";
    }
</script>
<script>
    // Pop-up edit
    function openModalEdit(no) {
        var modal = document.getElementById("myModal_" + no);
        modal.style.display = "block";

        // Tambahkan event listener untuk menutup pop-up saat pengguna mengklik di luar pop-up
        window.addEventListener("click", function(event) {
            if (event.target === modal) {
                modal.style.display = "none";
            }
        });
    }

    // Pop-up delete
    function openModalDelete(no) {
        var modal = document.getElementById("myModal-delete_" + no);
        modal.style.display = "block";

        // Tambahkan event listener untuk menutup pop-up saat pengguna mengklik di luar pop-up
        window.addEventListener("click", function(event) {
            if (event.target === modal) {
                modal.style.display = "none";
            }
        });
    }
</script>