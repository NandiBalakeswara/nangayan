<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/styles/style.css'); ?>">
    <title>Completed</title>
</head>
<body>
    <header class="status">
        <h1>Nang Ayan</h1>
        <h2>Hotels</h2>
    </header>
    <main>
        <div class="content">
            <h1>Yay! Completed</h1>
            <div class="bonus">
            <img src="<?php echo base_url('assets/styles/image/success.png'); ?>" alt="Success" class="success">          
            </div>
            <div class="content-btn">
                <button style="background-color: #3252DF;"><a href="<?php echo base_url('cawal/tampilhomelogin') ?>">Back to Home</a></button>
                <button style="background-color: #5e5d5d;"><a href="<?php echo base_url('cawal/tampilstatus') ?>">Status</a></button>
            </div>
        </div>
    </main>
    <?php include('footer.php'); ?>
</body> 
</html>