<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/styles/css/admin.css'); ?>">
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
        const baseUrl = "<?php echo base_url() ?>"

        const myChart = (chartType) => {
            $.ajax({
                url: baseUrl + 'cadmind/chart_data',
                dataType: 'json',
                method: 'get',
                success: data => {
                    let chartX = []
                    let chartY = []
                    data.map(data => {
                        chartX.push(data.jenis_kamar)
                        chartY.push(data.pendapatan)
                    })
                    const chartData = {
                        labels: chartX,
                        datasets: [{
                            label: 'Pendapatan Dari Setiap Kamar',
                            data: chartY,
                            backgroundColor: ['lightcoral'],
                            borderColor: ['lightcoral'],
                            borderWidth: 4
                        }]
                    }

                    const ctx = document.getElementById(chartType).getContext('2d')
                    const config = {
                        type: chartType,
                        data: chartData,
                        options: {
                            maintainAspectRatio: false,
                            responsive: true,
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    }
                    switch (chartType) {
                        case 'bar':
                            chartData.datasets[0].backgroundColor = ['#E0B973']
                            chartData.datasets[0].borderColor = ['#E0B973']
                            break
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
                    let chartX = []
                    let chartY = []

                    data.forEach(item => {
                        chartX.push(item.jenis_kamar)
                        chartY.push(item.jumlah_pemesanan)
                    })

                    const pieData = {
                        labels: chartX,
                        datasets: [{
                            data: chartY,
                            backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'],
                            hoverBackgroundColor: ['#FF6384', '#36A2EB', '#FFCE56']
                        }]
                    }

                    const ctx = document.getElementById('pie').getContext('2d')
                    const config = {
                        type: 'pie',
                        data: pieData,
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            width: 400,
                            height: 400
                        }
                    }

                    const pieChart = new Chart(ctx, config)
                }
            })
        }

        myPieChart()
    </script>

</body>

</html>