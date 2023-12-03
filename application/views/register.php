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
            <p class="home" ><a href="<?php echo $_SERVER['HTTP_REFERER']; ?>">X</a></p>
            <form action="<?php echo base_url('cregister/simpandata'); ?>" name="formregister" id="formregister" method="post">
                <section class="copy">
                    <h2>Sign Up</h2>
                    <input type="hidden" name="id_pengguna" id="id_pengguna">
                    <div class="input-container name">
                        <label for="nama_lengkap">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" id="namalengkap">
                    </div>
                    <div class="form-group">
						<div class="form-wrapper">
							<label for="username">Email</label>
							<input type="text" class="form-control" name="username">
						</div>
						<div class="form-wrapper">
							<label for="password">Password</label>
							<input type="text" class="form-control" name="password">
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
                    <div class="form-group">
						<div class="form-wrapper">
							<label for="tempat_lahir">Tempat Lahir</label>
							<input type="text" class="form-control" name="tempat_lahir">
						</div>
						<div class="form-wrapper">
							<label for="tgl_lahir">Tanggal Lahir</label>
							<input type="date" class="form-control" name="tgl_lahir">
						</div>
					</div>
                    <div class="form-group">
						<div class="form-wrapper">
							<label for="alamat">Alamat</label>
							<input type="text" class="form-control" name="alamat">
						</div>
						<div class="form-wrapper">
							<label for="agama">Agama</label>
                            <select name="agama" id="agama">
                                <option>Pilih Agama</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Islam">Islam</option>
                                <option value="Protestan">Protestan</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Buddha">Buddha</option>
                                <option value="Konghucu">Kong Hu Cu</option>
                            </select>
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

