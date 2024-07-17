<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('assets/styles/css/admin.css'); ?>">
    <title>Admin-Laporan</title>
</head>

<body>
    <main>
        <?php include('sidebar.php') ?>
        <div class="content">
            <div class="user">
                <h2>admin</h2>
            </div>
            <div class="title">
                <h1>Laporan</h1>
            </div>
            <div class="table">
                <table>
                    <thead>

                        <tr>
                            <th>No</th>
                            <th>Bulan</th>
                            <th>Tahun</th>
                            <th>Jenis Kamar</th>
                            <th>Jumlah pemesanan</th>
                            <th>Pendapatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($report_data as $row) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row->bulan; ?></td>
                                <td><?= $row->tahun; ?></td>
                                <td><?= $row->jenis_kamar; ?></td>
                                <td><?= $row->jumlah_pemesanan; ?></td>
                                <td><?= $row->pendapatan; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>

</html>