<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/styles/css/style.css'); ?>">
    <title>Hotel NangAyan</title>
</head>

<body>
    <header>
        <div class="navbar-rd">
            <img src="<?php echo base_url('assets/styles/image/logotrsp.png'); ?>" alt="NangAyan Hotels" class="logo">
            <ul>
                <li><a href="<?php echo base_url('cawal/tampilawal') ?>">Home</a></li>
                <li><a href="<?php echo base_url('crooms/tampilrooms') ?>">Rooms</a></li>
                <li><a href="<?php echo base_url('cregister/formregister'); ?>">Sign Up</a></li>
                <li><a href="<?php echo base_url('clogin/formlogin'); ?>">Sign In</a></li>
            </ul>
        </div>
    </header>
    <main>
        <div class="container-au">
            <h1>About Us</h1>
            <div class="content-au">
                <div class="left-au">
                    <h2>NangAyan Hotel</h2>
                    <h3>Welcome to NangAyan Hotel, a gem nestled in the heart of Ubud. Established on September 27, 2020, NangAyan Hotel is proudly owned by NangAyan Group. Our hotel stands as a testament to the passion and dedication of our team, committed to providing an unparalleled experience to every guest.
                        Located at Jl. Sumandang VI. No 10, Ubud, NangAyan Hotel offers a tranquil escape from the bustling city life. Our prime location allows guests to immerse themselves in the natural beauty and cultural richness of Ubud, while enjoying the comforts and luxuries of our meticulously designed accommodations.
                        At NangAyan Hotel, we believe that every stay should be memorable. Our team is dedicated to ensuring that your experience with us is exceptional, from the moment you arrive until your departure. We offer a range of amenities and services tailored to meet the diverse needs of our guests, whether you're here for a romantic getaway, a family vacation, or a business trip.
                        Our mission is to provide a warm and inviting atmosphere where you can relax and rejuvenate. We take pride in our attention to detail and strive to exceed your expectations with personalized service and exceptional hospitality.
                        Thank you for choosing NangAyan Hotel. We look forward to welcoming you and making your stay unforgettable.</h3>
                </div>
                <div class="right-au">
                    <img src="<?php echo base_url('assets/styles/aboutus.jpg'); ?>" alt="" srcset="">
                </div>
            </div>
        </div>
    </main>
    <?php include('footer.php'); ?>
</body>

</html>