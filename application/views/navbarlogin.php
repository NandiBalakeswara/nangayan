<div class="navbar">
    <img src="<?php echo base_url('assets/styles/image/logotrsp.png'); ?>" alt="NangAyan Hotels" class="logo">
    <ul>
        <li><a href="<?php echo base_url('cawal/tampilhomelogin') ?>">Home</a></li>
        <li><a href="<?php echo base_url('crooms/tampilroomslogin') ?>">Rooms</a></li>
        <li><a href="<?php echo base_url('cawal/tampilstatus'); ?>">Status</a></li>
        <li><a href="#" style="cursor: default;"><?php echo $this->session->userdata('nama_lengkap'); ?></a></li>
        <a href="javascript:void(0)" onclick="logout();"><button>Logout</button></a>
    </ul>
</div>

<script>
        function logout() {
            if (confirm("Apakah anda yakin untuk logout?")) {
                window.open("<?php echo base_url(); ?>clogin/logout", "_self");
            }
        }
</script>