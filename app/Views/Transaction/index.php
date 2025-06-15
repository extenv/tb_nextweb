<!DOCTYPE html>
<html>
<head>
    <title>Evaluasi Tender</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">

    <h2>Daftar Evaluasi Tender</h2>

    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Vendor</th>
                <th>Tender</th>
                <th>Nilai Teknis</th>
                <th>Nilai Administrasi</th>
                <th>Nilai Harga</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($evaluasi as $key => $row): ?>
            <tr>
                <td><?= $key + 1 ?></td>
                <td><?= esc($row['nama_vendor']) ?></td>
                <td><?= esc($row['nama_tender']) ?></td>
                <td><?= esc($row['nilai_teknis']) ?></td>
                <td><?= esc($row['nilai_administrasi']) ?></td>
                <td><?= esc($row['nilai_harga']) ?></td>
                <td><?= esc($row['status_pengajuan']) ?></td>
                <td>
                    <a href="<?= site_url('evaluasi-tender/detail/' . $row['evaluasi_id']) ?>" class="btn btn-info btn-sm">Detail</a>
                    <a href="<?= site_url('evaluasi-tender/delete/' . $row['evaluasi_id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>
