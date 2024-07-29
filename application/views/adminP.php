<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/styles/css/admin.css'); ?>">
    <title>Admin-Pengguna</title>
</head>

<body>
    <main>
        <?php include('sidebar.php') ?>
        <div class="content">
            <div class="user">
                <h2>admin</h2>
            </div>
            <div class="title">
                <h1>Pengguna</h1>
                <div class="btn-room">
                    <form action="<?php echo base_url('cpengguna/search'); ?>" method="post">
                        <input type="search" name="cari" placeholder="Cari Nama Penguna">
                    </form>
                    <button style="background-color: #626262;" onclick="window.location.href='<?php echo base_url('cpengguna/tampiladminp'); ?>'">Reset</button>
                </div>
            </div>
            <div class="table">
                <table>
                    <thead>

                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Jenis Kelamin</th>
                            <th>No HP</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (empty($hasil)) {
                        ?><td>Data Kosong</td>
                            <?php
                        } else {
                            $no = 1;
                            foreach ($hasil as $data) :
                            ?>

                                <tr id='baris'>
                                    <td><?php echo $no ?></td>
                                    <td><?php echo $data->nama_lengkap; ?></td>
                                    <td><?php echo $data->username; ?></td>
                                    <td><?php echo $data->password; ?></td>
                                    <td><?php echo $data->jenis_kelamin;  ?></td>
                                    <td><?php echo $data->nomor_hp;  ?></td>
                                    <th>
                                        <button id="myBtn_<?php echo $no; ?>" onclick="openModalEdit(<?php echo $no; ?>)"><img src="<?php echo base_url('assets/styles/image/edit2.png'); ?>" alt="edit"></button>
                                        <button id="myBtn-dlt_<?php echo $no; ?>" onclick="openModalDelete(<?php echo $no; ?>)"><img src="<?php echo base_url('assets/styles/image/delete3.png'); ?>" alt="delete"></button>
                                    </th>
                                </tr>
                        <?php
                                $no++;
                            endforeach;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- Pop Up Edit -->
            <?php $no = 1;
            foreach ($hasil as $data) { ?>
                <div id="myModal_<?php echo $no; ?>" class="modal">
                    <!-- Modal content -->
                    <div class="modal-content">
                        <div class="title">
                            <h1>Edit Pengguna</h1>
                            <span class="close" onclick="closeModal(<?php echo $no; ?>)">&times;</span>
                        </div>
                        <form action="<?php echo base_url('cpengguna/editdatapengguna'); ?>" method="POST">
                            <div class="form-group">
                                <div class="form-wrapper">
                                    <input type="hidden" name="id_pengguna" value="<?php echo $data->id_pengguna ?>">
                                    <label for="">Nama</label>
                                    <input type="text" name="nama_lengkap" id="" value="<?php echo $data->nama_lengkap ?>">
                                </div>
                                <div class="form-wrapper">
                                    <label for="">Email</label>
                                    <input type="text" name="username" id="" value="<?php echo $data->username ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-wrapper">
                                    <label for="">Password</label>
                                    <input type="text" name="password" id="" value="<?php echo $data->password ?>">
                                </div>
                                <div class="form-wrapper">
                                    <label for="">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" id="">
                                        <option value="">Jenis Kelamin</option>
                                        <option value="Laki-laki" <?= ($data->jenis_kelamin == 'Laki-laki') ? 'selected' : '' ?>>Laki-laki</option>
                                        <option value="Perempuan" <?= ($data->jenis_kelamin == 'Perempuan') ? 'selected' : '' ?>>Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-wrapper">
                                    <label for="">Nomor HP</label>
                                    <input type="text" name="nomor_hp" id="" value="<?php echo $data->nomor_hp ?>">
                                </div>
                            </div>

                            <div class="btn">
                                <button type="submit" style="background-color: #E0B973;">Edit</button>
                                <button type="reset" style="background-color: #626262;">Reset</button>
                            </div>
                    </div>
                    </form>
                </div>
        </div>
        <!-- Pup Up Hapus -->
        <div id="myModal-delete_<?php echo $no; ?>" class="modaldlt">
            <!-- Modal content -->
            <div class="modal-content-delete">
                <div class="title">
                    <h1>Hapus Pengguna</h1>
                    <span class="closedlt" onclick="closeModalDelete(<?php echo $no; ?>)">&times;</span>
                </div>
                <form action="<?php echo base_url('cpengguna/hapusdatapengguna'); ?>" method="POST">
                    <div class="form-group">
                        <div class="form-wrapper">
                            <input type="hidden" name="id_pengguna" value="<?php echo $data->id_pengguna ?>">
                            <label for="">Nama</label>
                            <input type="text" name="" id="" disabled value="<?php echo $data->nama_lengkap ?>">
                        </div>
                        <div class="form-wrapper">
                            <label for="">Email</label>
                            <input type="text" name="" id="" disabled value="<?php echo $data->username ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-wrapper">
                            <label for="">Password</label>
                            <input type="text" name="" id="" disabled value="<?php echo $data->password ?>">
                        </div>
                        <div class="form-wrapper">
                            <label for="">Jenis Kelamin</label>
                            <select name="" id="">
                                <option value="">Jenis Kelamin</option>
                                <option disabled value="Laki-laki" <?= ($data->jenis_kelamin == 'Laki-laki') ? 'selected' : '' ?>>Laki-laki</option>
                                <option disabled value="Perempuan" <?= ($data->jenis_kelamin == 'Perempuan') ? 'selected' : '' ?>>Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-wrapper">
                            <label for="">Nomor HP</label>
                            <input type="text" name="" id="" disabled value="<?php echo $data->nomor_hp ?>">
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
    </div>
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