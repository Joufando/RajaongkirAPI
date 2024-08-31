<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-4">
        <h3>Hasil Cek Ongkos Kirim</h3>

        <?php if (isset($result['error']) && $result['error']): ?>
            <div class="alert alert-danger"><?php echo $result['message']; ?></div>
        <?php else: ?>
            <strong>Pengiriman Dari:</strong>
            <?php echo $result['rajaongkir']['origin_details']['city_name']; ?>, <?php echo $result['rajaongkir']['origin_details']['province']; ?> (<?php echo $result['rajaongkir']['origin_details']['postal_code']; ?>)<br>

            <strong>Tujuan Ke:</strong>
            <?php echo $result['rajaongkir']['destination_details']['city_name']; ?>, <?php echo $result['rajaongkir']['destination_details']['province']; ?> (<?php echo $result['rajaongkir']['destination_details']['postal_code']; ?>)<br>

            <strong>Berat Barang:</strong> <?php echo number_format($result['rajaongkir']['query']['weight'] / 1000, 2, ',', '.'); ?> kg<br>

            <strong>Pilihan Kurir:</strong> <?php echo $result['rajaongkir']['results'][0]['name']; ?><br>

            <h4>Rincian Layanan</h4>
            <?php foreach ($result['rajaongkir']['results'][0]['costs'] as $cost) : ?>
                <strong>Layanan:</strong> <?php echo $cost['service']; ?><br>
                <strong>Estimasi:</strong> <?php echo $cost['cost'][0]['etd']; ?> hari<br>
                <strong>Biaya:</strong> Rp. <?php echo number_format($cost['cost'][0]['value'], 0, ',', '.'); ?><br><br>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <h1>Created by Joufando for Mr. Package</h1>

</body>

</html>