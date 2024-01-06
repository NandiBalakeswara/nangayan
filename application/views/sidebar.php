<aside>
    <div class="logo">
        <img src="<?php echo base_url('assets/styles/image/logotrsp.png'); ?>" alt="NangAyan Hotels" class="logo">
    </div>
    <div class="menu">
        <a href="<?php echo base_url('cpengguna/tampiladminp') ?>"><h2>Pengguna</h2></a>
        <a href="<?php echo base_url('ckamar/tampiladmink') ?>"><h2>Kamar</h2></a>
        <a href="<?php echo base_url('clayanan/tampiladminl') ?>"><h2>Layanan</h2></a>
        <a href="<?php echo base_url('cadmin/tampiladminpesan') ?>"><h2>Pemesanan</h2></a>
        <a href=""><h2>Laporan</h2></a>
        <div class="logout">
            <a href="javascript:void(0)" onclick="logout();"><h2>Logout</h2> </a>                                 
        </div>
    </div>
</aside>

<script>
        function logout() {
            if (confirm("Apakah anda yakin untuk logout?")) {
                window.open("<?php echo base_url(); ?>clogin/logout", "_self");
            }
        }
</script>