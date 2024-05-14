<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/styles/admin.css'); ?>">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
    <title>Admin-Dashboard</title>
</head>
<body>
    <main>
        <?php include('sidebar.php') ?>
        <div class="content">
            <div class="user">
                <h2>admin</h2>
            </div>
            <div class="title">
                <h1>Dashboard</h1>
            </div>
            <div class="chart">
                <div class="isiChart">
                    <canvas id="bar" style="height: 500px;"></canvas>
                </div>
                <div class="isiChart">
                    <canvas id="pie"></canvas>
                </div>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
    <script>
        const baseUrl ="<?php echo base_url() ?>"
        const myChart = (chartType) =>{
            $.ajax({
                url: baseUrl + 'cadmind/chart_data',
                dataType:'json',
                method:'get',
                success: data=>{
                    let chartX = []
                    let chartY = []
                    data.map(data=>{
                        chartX.push(data.jenis_kamar)
                        chartY.push(data.pendapatan)
                    })
                    const chartData = {
                        labels:chartX,
                        datasets:[
                        {
                            label: 'Pendapatan Dari Setiap Kamar',
                            data: chartY,
                            backgroundColor:['lightcoral'],
                            borderColor: ['lightcoral'],
                            borderWidth: 4
                            }
                        ]
                    }

                    const ctx =document.getElementById(chartType).getContext('2d')
                    const config = {
                        type: chartType,
                        data: chartData,
                        options: { // Properti options untuk mengatur tinggi chart
                            maintainAspectRatio: false, // Mengizinkan chart untuk menyesuaikan tinggi sesuai kebutuhan
                            responsive: true, // Mengizinkan chart untuk merespons perubahan ukuran layar
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    }
                    switch(chartType){
                        // case 'pie':
                        //     const pieColor = ['red','green','blue']
                        //     chartData.datasets[0].backgroundColor = pieColor
                        //     chartData.datasets[0].borderColor = pieColor
                        //     break
                        case 'bar':
                            chartData.datasets[0].backgroundColor = ['#E0B973']
                            chartData.datasets[0].borderColor = ['#E0B973']
                            break
                        default :
                            config.options = {
                                scales: {
                                    y: {
                                        beginAtZero:true
                                    }
                                }
                            }
                    }
                    const chart = new Chart(ctx, config)
                }
            })
        }

        myChart('bar')

        const myPieChart = () => {
            $.ajax({
                url: baseUrl + 'cadmind/chart_data',
                dataType: 'json',
                method: 'get',
                success: data => {
                    let chartX = [];
                    let chartY = [];

                    data.forEach(item => {
                        chartX.push(item.jenis_kamar);
                        chartY.push(item.jumlah_pemesanan);
                    });

                    const pieData = {
                        labels: chartX,
                        datasets: [{
                            data: chartY,
                            backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'], // Anda bisa mengganti warna sesuai keinginan
                            hoverBackgroundColor: ['#FF6384', '#36A2EB', '#FFCE56']
                        }]
                    };

                    const ctx = document.getElementById('pie').getContext('2d');
                    const config = {
                        type: 'pie',
                        data: pieData,
                        options: {
                            responsive: true,
                            maintainAspectRatio: false, // Menonaktifkan aspek rasio default
                            width: 400, // Menentukan lebar grafik
                            height: 400 // Menentukan tinggi grafik
                        }
                    };

                    const pieChart = new Chart(ctx, config);
                }
            });
        }

        // Memanggil fungsi untuk membuat chart pie
        myPieChart();

    </script>
    
</body>
</html>