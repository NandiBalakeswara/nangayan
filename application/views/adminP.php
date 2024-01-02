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
                <h1>Pengguna</h1>
            </div>
            <div class="table">
                <table>
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Jenis Kelamin</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>Agama</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>hadhad</td>
                            <td>jdabjdb</td>
                            <td>hadhad</td>
                            <td>jdabjdb</td>
                            <td>hadhad</td>
                            <td>jdabjdb</td>
                            <td>hadhad</td>
                            <td>jdabjdb</td>
                            <th>
                                <button id="myBtn"><img src="<?php echo base_url('assets/styles/image/edit2.png'); ?>" alt="edit"></button>
                                <button id="myBtn-dlt"><img src="<?php echo base_url('assets/styles/image/delete3.png'); ?>" alt="delete"></button>
                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div id="myModal" class="modal">
                <!-- Modal content -->
                <div class="modal-content">
                    <div class="title">
                        <h1>Edit Pengguna</h1>
                        <span class="close">&times;</span>
                    </div>
                    <form action="">
                        <div class="form-group">
                            <div class="form-wrapper">
                                <label for="">Nama</label>
                                <input type="text" name="" id="">
                            </div>
                            <div class="form-wrapper">
                                <label for="">Email</label>
                                <input type="text" name="" id="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-wrapper">
                                <label for="">Password</label>
                                <input type="text" name="" id="">
                            </div>
                            <div class="form-wrapper">
                                <label for="">Jenis Kelamin</label>
                                <select name="" id="">
                                    <option value="">Jenis Kelamin</option>
                                    <option value="">Laki-laki</option>
                                    <option value="">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-wrapper">
                                <label for="">Tempat Lahir</label>
                                <input type="text" name="" id="">
                            </div>
                            <div class="form-wrapper">
                                <label for="">Tanggal Lahir</label>
                                <input type="date" name="" id="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-wrapper">
                                <label for="">Agama</label>
                                <select name="" id="">
                                    <option value="">Pilih Agama</option>
                                    <option value="">Hindu</option>
                                    <option value="">Islam</option>
                                    <option value="">Katolik</option>
                                    <option value="">Protestan</option>
                                    <option value="">Buddha</option>
                                    <option value="">Konghucu</option>
                                </select>            
                            </div>
                            <div class="form-wrapper">
                                <label for="">Alamat</label>
                                <input type="text" name="" id="">  
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
            <div id="myModal-delete" class="modaldlt">
                <!-- Modal content -->
                <div class="modal-content-delete">
                    <div class="title">
                        <h1>Hapus Pengguna</h1>
                        <span class="closedlt">&times;</span>
                    </div>
                    <form action="">
                        <div class="form-group">
                            <div class="form-wrapper">
                                <label for="">Nama</label>
                                <input type="text" name="" id="">
                            </div>
                            <div class="form-wrapper">
                                <label for="">Email</label>
                                <input type="text" name="" id="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-wrapper">
                                <label for="">Password</label>
                                <input type="text" name="" id="">
                            </div>
                            <div class="form-wrapper">
                                <label for="">Jenis Kelamin</label>
                                <select name="" id="">
                                    <option value="">Jenis Kelamin</option>
                                    <option value="">Laki-laki</option>
                                    <option value="">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-wrapper">
                                <label for="">Tempat Lahir</label>
                                <input type="text" name="" id="">
                            </div>
                            <div class="form-wrapper">
                                <label for="">Tanggal Lahir</label>
                                <input type="date" name="" id="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-wrapper">
                                <label for="">Agama</label>
                                <select name="" id="">
                                    <option value="">Pilih Agama</option>
                                    <option value="">Hindu</option>
                                    <option value="">Islam</option>
                                    <option value="">Katolik</option>
                                    <option value="">Protestan</option>
                                    <option value="">Buddha</option>
                                    <option value="">Konghucu</option>
                                </select>            
                            </div>
                            <div class="form-wrapper">
                                <label for="">Alamat</label>
                                <input type="text" name="" id="">  
                            </div>
                        </div>
                        <div class="btn">
                            <button type="submit" style="background-color: #D85050;">Hapus</button>
                            <button type="reset" style="background-color: #626262;">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
</html>

<script>
//pop up edit
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

<script>
//Pop Up Delete
// Get the modal
var modaldlt = document.getElementById("myModal-delete");

// Get the button that opens the modal
var btn = document.getElementById("myBtn-dlt");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("closedlt")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modaldlt.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modaldlt.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == modaldlt) {
        modaldlt.style.display = "none";
    }
}
</script>