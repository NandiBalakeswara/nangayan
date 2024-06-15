<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/styles/admin.css'); ?>">
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
                <h1>Layanan</h1>

                <div class="btn">
                    <button id="myBtn-add">+ Tambah Layanan</button>
                </div>
            </div>
            <div class="table">
                <table>
                    <thead>

                        <tr>
                            <th>No</th>
                            <th>Jenis Layanan</th>
                            <th>Deskripsi Layanan</th>
                            <th>Harga Layanan</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (empty($hasil)) {
                            echo "Data Kosong";
                        } else {
                            $no = 1;
                            foreach ($hasil as $data) :
                        ?>

                                <tr id='baris'>
                                    <td><?php echo $no ?></td>
                                    <td><?php echo $data->nama_layanan; ?></td>
                                    <td><?php echo $data->deskripsi_layanan; ?></td>
                                    <td><?php echo $data->harga_layanan; ?></td>
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
            <!-- Pop Up Tambah -->
            <div id="myModal-add" class="modaladd">
                <!-- Modal content -->
                <div class="modal-content-add">
                    <div class="title">
                        <h1>Tambah Layanan</h1>
                        <span class="closeadd">&times;</span>
                    </div>
                    <form action="<?= base_url('Clayanan/addlayanan') ?>" method="POST"> <!-- form -->
                        <div class="form-wrapper-rooms">
                            <label for="nama_layanan">Jenis Layanan</label>
                            <input type="text" name="nama_layanan">
                            <label for="deskripsi-layanan">Deskripsi</label>
                            <input type="text" name="deskripsi_layanan" id="deskripsi_layanan">
                            <label for="harga">Harga</label>
                            <input type="text" name="harga_layanan" id="harga_layanan">
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
                <div id="myModal_<?php echo $no; ?>" class="modal">
                    <!-- Modal content -->
                    <div class="modal-content">
                        <div class="title">
                            <h1>Edit Layanan</h1>
                            <span class="close" onclick="closeModal(<?php echo $no; ?>)">&times;</span>
                        </div>
                        <form method='POST' action="<?= base_url('Clayanan/editlayanan') ?>"> <!-- form -->
                            <input type="hidden" name="id_layanan" value="<?php echo $data->id_layanan; ?>">
                            <div class="form-wrapper-rooms">
                                <label for="nama_layanan">Jenis Layanan</label>
                                <input type="text" name="nama_layanan" value="<?php echo $data->nama_layanan; ?>">
                                <label for="deskripsi_layanan">Deskripsi</label>
                                <input type="text" name="deskripsi_layanan" id="deskripsi_layanan" value="<?php echo $data->deskripsi_layanan; ?>">
                                <label for="harga">Harga</label>
                                <input type="text" name="harga_layanan" id="harga_layanan" value="<?php echo $data->harga_layanan; ?>">
                            </div>
                            <div class="btn">
                                <!-- <button type="submit" style="background-color: #E0B973;">Edit</button>
                            <button type="reset" style="background-color: #626262;">Reset</button> -->
                                <button type="submit" style="background-color: #E0B973;" id="myBtn_<?php echo $no; ?>" onclick="openModalEdit(<?php echo $no; ?>)" alt="edit">
                                    Edit
                                </button>
                                <button type="reset" style="background-color: #626262;">
                                    Reset
                                </button>
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
                        <form method='POST' action="<?= base_url('Clayanan/deletelayanan') ?>"> <!-- form -->
                            <div class="form-wrapper-rooms">
                                <input type="hidden" name="id_layanan" disable value="<?php echo $data->id_layanan; ?>">
                                <label for="tambah-nama_layanan">Jenis Layanan</label>
                                <input type="text" name="nama_layanan" disabled value="<?php echo $data->nama_layanan; ?>">
                                <label for="tambah-deskripsi-layanan">Deskripsi</label>
                                <input type="text" name="deskripsi_layanan" id="tambah-deskripsi_layanan" disabled value="<?php echo $data->deskripsi_layanan; ?>">
                                <label for="tambah-harga">Harga</label>
                                <input type="text" name="harga_layanan" id="tambah-harga_layanan" disabled value="<?php echo $data->harga_layanan; ?>">
                                <div class="btn">
                                    <button type="submit" style="background-color: #D85050;">Hapus</button>
                                    <button type="reset" style="background-color: #626262;" disabled>Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
        <?php $no++; ?>
    <?php } ?>
    </div>
    </main>
</body>

</html>

<script>
    //Pop Up Add
    // Get the modal
    var modaladd = document.getElementById("myModal-add");

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn-add");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("closeadd")[0];

    // When the user clicks the button, open the modal 
    btn.onclick = function() {
        modaladd.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modaladd.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modaladd) {
            modaladd.style.display = "none";
        }
    }
</script>

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