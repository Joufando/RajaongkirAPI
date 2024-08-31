<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Ongkir Joufando</title>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script>
        $(document).ready(function() {
            $('.autosearch').select2();
        });
    </script>
</head>

<body>
    <div class="container mt-4">
        <h2>Cek Ongkirmu Disini!</h2>
        <form method="post" action="<?php echo site_url('Home/cekOngkir') ?>">
            <div>
                <div class="form-group mb-2">
                    <label for="origin">Kota Asal</label>
                    <select class="form-control autosearch" id="origin" name="origin">
                        <option value="">Pilih Kota</option>
                        <?php if ($city) : ?>
                            <?php foreach ($city['rajaongkir']['results'] as $data) : ?>
                                <option value="<?= $data['city_id'] ?>"><?= $data['city_name'] ?></option>
                            <?php endforeach; ?>
                        <?php endif ?>
                    </select>
                </div>

                <div class="form-group mb-2">
                    <label for="destination">Kota Tujuan</label>
                    <select class="form-control autosearch" name="destination">
                        <option value="">Pilih Kota</option>
                        <?php if ($city) : ?>
                            <?php foreach ($city['rajaongkir']['results'] as $data) : ?>
                                <option value="<?= $data['city_id'] ?>"><?= $data['city_name'] ?></option>
                            <?php endforeach; ?>
                        <?php endif ?>
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label for="weight">Berat (Kg)</label>
                    <input type="text" class="form-control" id="weight" name="weight">
                </div>
                <div class="form-group mb-2">
                    <label for="courier">Pilih</label>
                    <select class="form-control" id="courier" name="courier">
                        <option value="jne">JNE</option>
                        <option value="pos">POS Indonesia</option>
                        <option value="tiki">TIKI</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Cek Ongkir</button>
            </div>
        </form>
        <h1>Created by Joufando for Mr. Package</h1>
    </div>
</body>

</html>