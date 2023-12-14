<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/styles/style.css'); ?>">
    <title>Booking Information</title>
</head>
<body>
    <header class="status">
        <h1>Nang Ayan</h1>
        <h2>Hotels</h2>
    </header>
    <main>
        <div class="content">
            <h1>Booking Information</h1>
            <div class="bonus">
            Please fill up the blank fields below           
            </div>
            <article class="BS">
                <div class="info">
                    <img src="<?php echo base_url('assets/styles/hotel_bg.png'); ?>" alt="NangAyan Hotels">
                    <div class="information">
                    <div class="left-info">
                        <h2>Lorem ipsum dolor</h2>
                        <h4>Bali, Indonesia</h4>
                    </div>
                    <div class="right-info">
                        <h3>Rp.99999999 per 2 night</h3>
                        <h3>Date 20-22 jan</h3>
                    </div>
                    </div>
                </div>
                <form action="" class="content-form">            
                    <div class="form-wrapper-info">
                        <label for="">Name</label>
                        <input type="text" name="" id="" disabled>
                    </div>
                    <div class="form-wrapper-info">
                        <label for="">Email</label>
                        <input type="Email" name="" id="" disabled>
                    </div>
                    <div class="form-wrapper-info">
                        <label for="">Nomor Telepon</label>
                        <input type="Email" name="" id="" disabled>
                    </div>
                    <div class="form-wrapper-info">
                        <label for="">Layanan Tambahan</label> 
                        <select>
                            <option value="">Pilih Layanan Tambahan</option>
                            <option value="Extra Bed">Extra Bed</option>
                            <option value="Lunch">Lunch</option>
                            <option value="Dinner">Dinner</option>
                        </select>
                    </div>
                </form>
            </article>
            <div class="content-btn">
                <button style="background-color: #3252DF;"><a href="<?php echo base_url('cawal/tampilroombooking2') ?>">Continue to Book</a></button>
                <button style="background-color: #b5b5b5;"><a href="<?php echo base_url('cawal/tampilroomdetails') ?>">Cancel</a></button>
            </div>
        </div>
    </main>
    <?php include('footer.php'); ?>
</body> 
</html>