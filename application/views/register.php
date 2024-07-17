<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/styles/login.css'); ?>">
    <title>Nang Ayan Sign Up</title>
    <style>
        /* Modal styles */
        .modal {
            display: none; 
            position: fixed; 
            z-index: 1; 
            padding-top: 100px; 
            left: 0;
            top: 0;
            width: 100%; 
            height: 100%; 
            overflow: auto; 
            background-color: rgb(0,0,0); 
            background-color: rgba(0,0,0,0.4); 
        }
        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
    <script>
        function validateForm() {
            var namaLengkap = document.getElementById("namalengkap").value;
            var username = document.forms["formregister"]["username"].value;
            var password = document.forms["formregister"]["password"].value;
            var jenisKelamin = document.forms["formregister"]["jenis_kelamin"].value;
            var nomorHp = document.forms["formregister"]["nomor_hp"].value;
            var errorMessage = "";

            // Validasi Nama Lengkap
            var namePattern = /^[a-zA-Z\s]+$/;
            if (!namePattern.test(namaLengkap)) {
                errorMessage += "Nama Lengkap hanya boleh berisi huruf dan spasi.\n";
            }

            // Validasi Email
            var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(username)) {
                errorMessage += "Format email tidak valid.\n";
            }

            // Validasi Password
            var passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[_])[A-Za-z\d_]{8,}$/;
            if (!passwordPattern.test(password)) {
                errorMessage += "Password harus memiliki minimal 8 karakter dan terdiri dari kombinasi underscore, huruf besar, huruf kecil, dan angka.\n";
            }

            // Validasi Jenis Kelamin
            if (jenisKelamin !== "Laki-laki" && jenisKelamin !== "Perempuan") {
                errorMessage += "Jenis Kelamin harus dipilih.\n";
            }

            // Validasi Nomor HP
            var phonePattern = /^\d{10,}$/;
            if (!phonePattern.test(nomorHp)) {
                errorMessage += "Nomor HP harus terdiri dari minimal 10 angka.\n";
            }

            if (errorMessage) {
                // Tampilkan pesan kesalahan di modal
                document.getElementById("modal-message").innerText = errorMessage;
                document.getElementById("errorModal").style.display = "block";
                return false;
            }
            return true;
        }

        // Fungsi untuk menutup modal
        function closeModal() {
            document.getElementById("errorModal").style.display = "none";
        }
    </script>
</head>
<body>
    <main>
        <div class="side">
            <section class="copy">
            </section>
        </div>
        <div class="content">
            <p class="home"><a href="<?php echo base_url('cawal/tampilawal'); ?>">X</a></p>
            <form action="<?php echo base_url('cregister/simpandata'); ?>" name="formregister" id="formregister" method="post" onsubmit="return validateForm()">
                <section class="copy">
                    <h2>Sign Up</h2>
                    <input type="hidden" name="id_pengguna" id="id_pengguna">
                    <p id="error-message" class="<?php echo ($this->session->flashdata('pesan')) ? 'cant_login' : ''; ?>">
                        <?php echo $this->session->flashdata('pesan'); ?>
                    </p> 
                    <div class="input-container name">
                        <label for="nama_lengkap">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" id="namalengkap" placeholder="ex. Ariana Grande" required>
                    </div>
                    <div class="form-group">
                        <div class="form-wrapper">
                            <label for="username">Email</label>
                            <input type="text" class="form-control" name="username" placeholder="ex. arianagrande10@gmail.com" required>
                        </div>
                        <div class="form-wrapper">
                            <label for="password">Password</label>
                            <input type="text" class="form-control" name="password" placeholder="ex. Ar_10grande" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-wrapper">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select name="jenis_kelamin" id="jenis_kelamin">
                                <option>Pilih Jenis Kelamin</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-wrapper">
                            <label for="nomor_hp">Nomor HP</label>
                            <input type="text" class="form-control" name="nomor_hp"  placeholder="ex. 087327882661" required>
                        </div>
                    </div>
                    
                    <button type="submit" class="signin-btn">
                        Sign up
                    </button>
                    <p>Already have an account <a href="<?php echo base_url('clogin/formlogin'); ?>"><strong>Sign In</strong></a></p>
                </section>
            </form>
        </div>
    </main>

    <!-- Modal untuk pesan kesalahan -->
    <div id="errorModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <p id="modal-message"></p>
        </div>
    </div>
</body>
</html>
