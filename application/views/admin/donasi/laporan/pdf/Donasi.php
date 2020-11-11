<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 5px;
        }

        th {
            text-align: left;
        }
    </style>
</head><body>
    <h2 style="text-align: center;"><?= $logo; ?> SISTEM INFORMASI KEGIATAN DAN PENGELOLAAN KOMUNITAS BENANG PUTIH</h2>
    <h4 style="background-color: #bdc3c7; color: black; padding: 1px; width: 370px; border: 1px solid #bdc3c7; margin-left: 330px; text-align: center;">LAPORAN DATA DONASI KEGIATAN</h4>
    <?php foreach ($totalpenjualan as $data) : ?>
    <h4 style="text-align: center;">Donasi Terkumpul <b>Rp. <?= number_format($data->total, 0, ',', '.'); ?></b><h4>
    <?php endforeach ?>
    <p style="text-align: center;"><span>Antara Tanggal </span></span>: <?= $awal; ?> - <?= $akhir; ?></p>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama kegiatan</th>
                <th>Donasi Terkumpul</th>
                <th>Total Donatur</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($nasabah as $data) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $data->nama_kegiatan ?></td>
                    <td>Rp. <?= number_format($data->total, 0, ',', '.'); ?></td>
                    <td><?= $data->totaldonatur ?></td>
                    <td><?php if ($data->total <= $data->nominal_dana_kegiatan) { ?>
                       Belum terpenuhi
                        <?php } elseif ($data->total >= $data->nominal_dana_kegiatan) { ?>
                        Terpenuhi
                    <?php } ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body></html>