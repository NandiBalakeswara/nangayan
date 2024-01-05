<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/styles/admin.css'); ?>">
    <title>Admin-Layanan</title>
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
                            <th>Jenis Layanan</th>
                            <th>Deskripsi</th>
                            <th>Harga</th>
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
                            <td><?php echo $data->nama_layanan;?></td>
                            <td><?php echo $data->deskripsi_layanan;?></td>
                            <td><?php echo $data->harga_layanan;?></td>
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
            <!-- Pop Up Tambah -->
            <div id="myModal-add" class="modaladd">
                <!-- Modal content -->
                <div class="modal-content-add">
                    <div class="title">
                        <h1>Tambah Layanan</h1>
                        <span class="closeadd">&times;</span>
                    </div>
                    <form name="formtambah" id="formtambah" method="post" target="_self" enctype="multipart/form-data" role="form" data-toggle="validator" novalidate action="<?php echo base_url('clayanan/simpandata'); ?>">
                            <div class="form-wrapper-rooms">
                                <input type="hidden" name="id_layanan" id="id_layanan"/>
                                <label for="">Jenis Layanan</label>
                                <select name="nama_layanan">
                                        <option value="">Pilih</option>
                                        <option value="Ekstra Bed">Ekstra Bed</option>
                                        <option value="Breakfast">Breakfast</option>
                                        <option value="Lunch">Lunch</option>
                                        <option value="Dinner" >Dinner</option>
                                    </select>
                                <label for="">Deskripsi</label>
                                <input type="text" name="deskripsi_layanan" id="deskripsi_layanan">
                                <label for="">Harga</label>
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
            <?php $no = 1; foreach ($hasil as $data) { ?>
                <div id="myModal<?php echo $no; ?>" class="modal">
                    <!-- Modal content -->
                    <div class="modal-content">
                        <div class="title">
                            <h1>Edit Layanan</h1>
                            <span class="close" onclick="closeModal(<?php echo $no; ?>)">&times;</span>
                        </div>
                        <form name="formedit" method="post" action="<?php echo base_url('clayanan/simpandata'); ?>">
                                <div class="form-wrapper-rooms">
                                    <input type="hidden" name="id_layanan" value="<?php echo $data->id_layanan; ?>">
                                    <label for="">Jenis Layanan</label>
                                    <select name="nama_layanan">
                                        <option value="">Pilih</option>
                                        <option value="Ekstra Bed" <?php echo ($data->nama_layanan == 'Ekstra Bed') ? 'selected' : ''; ?>>Ekstra Bed</option>
                                        <option value="Breakfast" <?php echo ($data->nama_layanan == 'Breakfast') ? 'selected' : ''; ?>>Breakfast</option>
                                        <option value="Lunch" <?php echo ($data->nama_layanan == 'Lunch') ? 'selected' : ''; ?>>Lunch</option>
                                        <option value="Dinner" <?php echo ($data->nama_layanan == 'Dinner') ? 'selected' : ''; ?>>Dinner</option>
                                    </select>
                                    <label for="">Deskripsi</label>
                                    <input type="text" name="deskripsi_layanan" value="<?php echo $data->deskripsi_layanan; ?>">
                                    <label for="">Harga</label>
                                    <input type="text" name="harga_layanan" value="<?php echo $data->harga_layanan; ?>">
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
                            <h1>Hapus Layanan</h1>
                            <span class="close" onclick="closeModalDelete(<?php echo $no; ?>)">&times;</span>
                        </div>
                        <form name="formhapus" method="post" action="<?php echo base_url('clayanan/hapusdata'); ?>" >
                                <div class="form-wrapper-rooms">
                                <input type="hidden" name="id_layanan" value="<?php echo $data->id_layanan; ?>">
                                    <label for="">Jenis Layanan</label>
                                    <input type="text" name="nama_layanan" disabled value="<?php echo $data->nama_layanan; ?>">
                                    <label for="">Deskripsi</label>
                                    <input type="text" name="deskripsi_layanan" disabled value="<?php echo $data->deskripsi_layanan; ?>">
                                    <label for="">Harga</label>
                                    <input type="text" name="harga_layanan" disabled value="<?php echo $data->harga_layanan; ?>">
                                </div>
                            <div class="btn">
                                <button type="submit" style="background-color: #D85050;">Hapus</button>
                                <button type="reset" style="background-color: #626262;">Reset</button>
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
        var modal = document.getElementById("myModal" + no);
        modal.style.display = "block";
    }

    function closeModal(no) {
        var modal = document.getElementById("myModal" + no);
        modal.style.display = "none";
    }
    function openModalEdit(no) {
        var modal = document.getElementById("myModal" + no);
        modal.style.display = "block";

        // Tambahkan event listener untuk menutup pop-up saat pengguna mengklik di luar pop-up
        window.addEventListener("click", function(event) {
            if (event.target === modal) {
                modal.style.display = "none";
            }
        });
    }
</script>
<script>
    //Pop Up Delete
    function openModalDelete(no) {
        var modal = document.getElementById("myModal-delete" + no);
        modal.style.display = "block";
    }

    function closeModalDelete(no) {
        var modal = document.getElementById("myModal-delete" + no);
        modal.style.display = "none";
    }
    function openModalDelete(no) {
        var modal = document.getElementById("myModal-delete" + no);
        modal.style.display = "block";

        // Tambahkan event listener untuk menutup pop-up saat pengguna mengklik di luar pop-up
        window.addEventListener("click", function(event) {
            if (event.target === modal) {
                modal.style.display = "none";
            }
        });
    }
</script>
