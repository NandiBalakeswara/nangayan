<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/styles/login.css'); ?>">
    <title>Nang Ayan Sign Up</title>
</head>

<body>
    <main>
        <div class="side">
            <section class="copy">
            </section>
        </div>
        <div class="content">
            <p class="home"><a href="<?php echo base_url('cawal/tampilawal'); ?>">X</a></p>
            <form action="<?php echo base_url('cregister/simpandata'); ?>" name="formregister" id="formregister" method="post">
                <section class="copy">
                    <h2>Sign Up</h2>
                    <input type="hidden" name="id_pengguna" id="id_pengguna">
                    <p id="error-message" class="<?php echo ($this->session->flashdata('pesan')) ? 'cant_login' : ''; ?>">
                        <?php echo $this->session->flashdata('pesan'); ?>
                    </p>
                    <div class="input-container name">
                        <label for="nama_lengkap">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" id="namalengkap" required>
                    </div>
                    <div class="form-group">
                        <div class="form-wrapper">
                            <label for="username">Email</label>
                            <input type="text" class="form-control" name="username" required>
                        </div>
                        <div class="form-wrapper">
                            <label for="password">Password</label>
                            <input type="text" class="form-control" name="password" required>
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
                            <input type="text" class="form-control" name="nomor_hp">
                        </div>
                    </div>
                    <button type="submit" class="signin-btn" onclick="">
                        Sign up
                    </button>
                    <p>Already have an account <a href="<?php echo base_url('clogin/formlogin'); ?>"><strong>Sign In</strong></a></p>
                </section>
            </form>
        </div>
    </main>
</body>

</html>