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
                <div class="btn">
                    <button id="myBtn-add">+ Tambah Kamar</button>
                </div>
            </div>
            <div class="table">
                <table>
                    <thead>
                        <tr>
                            <th>Jenis Kamar</th>
                            <th>Deskripsi</th>
                            <th>Harga</th>
                            <th>Nomor Kamar</th>
                            <th>Foto</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>hadhad</td>
                            <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis iste aliquid iure doloribus nam eos nisi debitis asperiores molestias exercitationem. Recusandae earum sequi, vel distinctio, dolor consequuntur, iusto placeat ad porro enim harum odit culpa quae quisquam commodi repellat soluta. Aliquam debitis ut sequi facere illum, necessitatibus minima est eveniet!</td>
                            <td>hadhad</td>
                            <td>jdabjdb</td>
                            <td>hadhad</td>
                            <th>
                                <button id="myBtn"><img src="<?php echo base_url('assets/styles/image/edit2.png'); ?>" alt="edit"></button>
                                <button id="myBtn-dlt"><img src="<?php echo base_url('assets/styles/image/delete3.png'); ?>" alt="delete"></button>
                            </th>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- Pop Up Tambah -->
            <div id="myModal-add" class="modaladd">
                <!-- Modal content -->
                <div class="modal-content-add">
                    <div class="title">
                        <h1>Tambah Kamar</h1>
                        <span class="closeadd">&times;</span>
                    </div>
                    <form action="">
                            <div class="form-wrapper-rooms">
                                <label for="">Jenis Kamar</label>
                                <input type="text" name="" id="">
                                <label for="">Deskripsi</label>
                                <input type="text" name="" id="">
                                <label for="">Harga</label>
                                <input type="text" name="" id="">
                                <label for="">Nomor Kamar</label>
                                <input type="date" name="" id="">
                                <label for="">Foto</label>
                                <input type="file" name="" id="">  
                            </div>
                        <div class="btn">
                            <button type="submit" style="background-color: #5973D0;">Submit</button>
                            <button type="reset" style="background-color: #626262;">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Pop Up Edit -->
            <div id="myModal" class="modal">
                <!-- Modal content -->
                <div class="modal-content">
                    <div class="title">
                        <h1>Edit Kamar</h1>
                        <span class="close">&times;</span>
                    </div>
                    <form action="">
                            <div class="form-wrapper-rooms">
                                <label for="">Jenis Kamar</label>
                                <input type="text" name="" id="">
                                <label for="">Deskripsi</label>
                                <input type="text" name="" id="">
                                <label for="">Harga</label>
                                <input type="text" name="" id="">
                                <label for="">Nomor Kamar</label>
                                <input type="date" name="" id="">
                                <label for="">Foto</label>
                                <input type="file" name="" id="">  
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
                        <h1>Hapus Kamar</h1>
                        <span class="closedlt">&times;</span>
                    </div>
                    <form action="">
                            <div class="form-wrapper-rooms">
                                <label for="">Jenis Kamar</label>
                                <input type="text" name="" id="">
                                <label for="">Deskripsi</label>
                                <input type="text" name="" id="">
                                <label for="">Harga</label>
                                <input type="text" name="" id="">
                                <label for="">Nomor Kamar</label>
                                <input type="date" name="" id="">
                                <label for="">Foto</label>
                                <input type="file" name="" id="">  
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

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modaldlt) {
    modaldlt.style.display = "none";
  }
}
</script>