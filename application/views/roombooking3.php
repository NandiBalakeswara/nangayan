<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/styles/css/style.css'); ?>">
    <title>Completed</title>
</head>

<body>
    <header class="status">
        <h1>Nang Ayan</h1>
        <h2>Hotels</h2>
    </header>
    <main>
        <div class="content">
            <div class="bonus">
                <img src="<?php echo base_url('assets/styles/image/success1.png'); ?>" alt="Success" class="success">
            </div>
            <h1>Yay! Completed</h1>
            <h2>Your payment has been received</h2>
            <h3>Enjoy your stay at our hotel</h3>
            <div class="content-btn">
                <a href="<?php echo base_url('cawal/tampilhomelogin') ?>"><button style="background-color: #3252DF;">Back to Home</button></a>
                <a href="<?php echo base_url('cstatus/showBookingStatus') ?>"><button style="background-color: #5e5d5d;">Status</button></a>

            </div>
        </div>
    </main>
    <?php include('footerLogin.php'); ?>
</body>

</html>