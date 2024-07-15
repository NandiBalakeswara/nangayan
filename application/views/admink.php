<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/styles/admin.css'); ?>">
    <title>Admin-Kamar</title>
</head>

<body>
    <main>
        <?php include('sidebar.php') ?>
        <div class="content">
            <div class="user">
                <h2>admin</h2>
            </div>
            <div class="title">
                <h1>Kamar</h1>
                <div class="search">
                    <form action="<?php echo base_url('ckamar/search'); ?>" method="post">
                        <input type="search" name="cari" placeholder="Cari Kamar">
                    </form>
                </div>
                <div class="btn">
                    <button id="myBtn-add">Tambah</button>
                </div>
            </div>
            <div class="table">
                <table>
                    <thead>
                        <tr>
                            <th>Jenis Kamar</th>
                            <th>Deskripsi</th>
                            <th>Harga</th>
                            <th>Jumlah Kamar</th>
                            <th>Foto</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (!empty($hasil)) {
                            $no = 1;
                            foreach ($hasil as $data) {
                        ?>
                                <tr>
                                    <td><?php echo $data->jenis_kamar; ?></td>
                                    <td><?php echo $data->deskripsi_kamar; ?></td>
                                    <td><?php echo $data->harga; ?></td>
                                    <td>
                                        <?php echo 'Tersedia : '.$data->jumlah_tersedia .' | '.'Tidak Tersedia : '.$data->jumlah_tidak_tersedia; ?>   
                                    </td>
                                    <td>
                                        <?php
                                        $fotos = explode(',', $data->fotos);
                                        foreach ($fotos as $foto) {
                                            echo '<img src="' . base_url('berkas/' . $foto) . '" alt="Foto Kamar" width="100">';
                                        }
                                        ?>
                                    </td>
                                    <th>
                                        <button id="myBtn_<?php echo $no; ?>" onclick="openModalEdit(<?php echo $no; ?>)"><img src="<?php echo base_url('assets/styles/image/edit2.png'); ?>" alt="edit"></button>
                                        <button id="myBtn-dlt_<?php echo $no; ?>" onclick="openModalDelete(<?php echo $no; ?>)"><img src="<?php echo base_url('assets/styles/image/delete3.png'); ?>" alt="delete"></button>
                                    </th>
                                </tr>
                            <?php
                                $no++;
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="6">Data tidak ada</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div id="myModal-add" class="modaladd">
                <div class="modal-content-add">
                    <div class="title">
                        <h1>Tambah Data Kamar</h1>
                        <span class="closeadd" id="close-add">&times;</span>
                    </div>
                    <form action="<?php echo base_url('index.php/ckamar/simpandata'); ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id_kamar" value="">
                        <div class="form-group">
                            <div class="form-wrapper">
                                <label for="jenis_kamar">Jenis Kamar</label>
                                <input type="text" id="jenis_kamar" name="jenis_kamar" required>
                            </div>
                            <div class="form-wrapper">
                                <label for="harga">Harga</label>
                                <input type="number" id="harga" name="harga" required>
                            </div>
                        </div>
                        <div class="form-wrapper-rooms">
                            <label for="deskripsi_kamar">Deskripsi</label>
                            <input type="text" id="deskripsi_kamar" name="deskripsi_kamar" required>
                        </div>
                        <div class="form-group">
                            <div class="form-wrapper">
                                <label for="nomor_kamar">Jumlah Kamar</label>
                                <input type="number" id="nomor_kamar" name="nomor_kamar">
                            </div>
                            <div class="form-wrapper">
                                <label for="foto1">Foto 1</label>
                                <input type="file" id="foto1" name="foto1" accept="image/*" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-wrapper">
                                <label for="foto2">Foto 2</label>
                                <input type="file" id="foto2" name="foto2" accept="image/*" required>
                            </div>
                            <div class="form-wrapper">
                                <label for="foto3">Foto 3</label>
                                <input type="file" id="foto3" name="foto3" accept="image/*" required>
                            </div>
                        </div>
                        <div class="btn">
                            <button type="submit" style="background-color: #5973D0;">Submit</button>
                            <button type="reset" style="background-color: #626262;">Reset</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Pop Up Edit -->
            <?php $no = 1;
            foreach ($hasil as $data) { ?>
                <div id="myModal<?php echo $no; ?>" class="modal">
                    <!-- Modal content -->
                    <div class="modal-content">
                        <div class="title">
                            <h1>Edit Kamar</h1>
                            <span class="close" onclick="closeModal(<?php echo $no; ?>)">&times;</span>
                        </div>
                        <form name="formedit" id="formedit" method="post" target="_self" enctype="multipart/form-data" role="form" data-toggle="validator" novalidate action="<?php echo base_url('ckamar/simpandata'); ?>">
                            <div class="form-group">
                                <div class="form-wrapper">
                                    <input type="hidden" name="id_kamar" value="<?php echo $data->id_kamar; ?>" />
                                    <label for="">Jenis Kamar</label>
                                    <input type="text" name="jenis_kamar" value="<?php echo $data->jenis_kamar; ?>">
                                </div>
                                <div class="form-wrapper">
                                    <label for="">Harga</label>
                                    <input type="text" name="harga" value="<?php echo $data->harga; ?>">
                                </div>
                            </div>
                            <div class="form-wrapper-rooms">
                                <label for="">Deskripsi</label>
                                <input type="text" name="deskripsi_kamar" value="<?php echo $data->deskripsi_kamar; ?>">
                            </div>
                            <div class="form-group">
                                <div class="form-wrapper">
                                    <label for="">Jumlah Kamar</label>
                                    <input type="text" name="nomor_kamar" disabled>
                                </div>
                                <div class="form-wrapper">
                                    <label for="foto1">Foto 1</label>
                                    <input type="file" name="foto" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-wrapper">
                                    <label for="foto2">Foto 2</label>
                                    <input type="file" id="foto2" name="foto2" accept="image/*" required>
                                </div>
                                <div class="form-wrapper">
                                    <label for="foto3">Foto 3</label>
                                    <input type="file" id="foto3" name="foto3" accept="image/*" required>
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
                <div id="myModal-delete<?php echo $no; ?>" class="modaldlt">
                    <!-- Modal content -->
                    <div class="modal-content-delete">
                        <div class="title">
                            <h1>Hapus Kamar</h1>
                            <span class="close" onclick="closeModalDelete(<?php echo $no; ?>)">&times;</span>
                        </div>
                        <form name="formedit" id="formedit" method="post" target="_self" enctype="multipart/form-data" role="form" data-toggle="validator" novalidate action="<?php echo base_url('ckamar/hapusdata'); ?>">
                            <input type="hidden" name="id_kamar" value="<?php echo $data->id_kamar; ?>" />
                            <div class="form-group">
                                <div class="form-wrapper">
                                    <input type="hidden" name="id_kamar" value="<?php echo $data->id_kamar; ?>" />
                                    <label for="">Jenis Kamar</label>
                                    <input type="text" name="jenis_kamar" disabled value="<?php echo $data->jenis_kamar; ?>">
                                </div>
                                <div class="form-wrapper">
                                    <label for="">Harga</label>
                                    <input type="text" name="harga" disabled value="<?php echo $data->harga; ?>">
                                </div>
                            </div>
                            <div class="form-wrapper-rooms">
                                <label for="">Deskripsi</label>
                                <input type="text" name="deskripsi_kamar" disabled value="<?php echo $data->deskripsi_kamar; ?>">
                            </div>
                            <div class="form-group">
                                <div class="form-wrapper">
                                    <label for="">Jumlah Kamar</label>
                                    <input type="text" name="nomor_kamar" disabled>
                                </div>
                                <div class="form-wrapper">
                                    <label for="foto1">Foto 1</label>
                                    <input type="file" name="foto" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-wrapper">
                                    <label for="foto2">Foto 2</label>
                                    <input type="file" id="foto2" name="foto2" accept="image/*" required>
                                </div>
                                <div class="form-wrapper">
                                    <label for="foto3">Foto 3</label>
                                    <input type="file" id="foto3" name="foto3" accept="image/*" required>
                                </div>
                            </div>
                            <div class="btn">
                                <button type="submit" style="background-color: #E0B973;">Edit</button>
                                <button type="reset" style="background-color: #626262;">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            <?php
                $no++;
            } ?>
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