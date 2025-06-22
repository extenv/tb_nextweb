<!DOCTYPE html>
<html>
<head>
    <title>Detail Evaluasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">

    <h2>Detail Evaluasi Tender</h2>

    <table class="table table-striped">
        <tr><th>Vendor</th><td><?= esc($evaluasi['nama_vendor']) ?></td></tr>
        <tr><th>Tender</th><td><?= esc($evaluasi['nama_tender']) ?></td></tr>
        <tr><th>Instansi</th><td><?= esc($evaluasi['instansi']) ?></td></tr>
        <tr><th>Tanggal Pengajuan</th><td><?= esc($evaluasi['tanggal_pengajuan']) ?></td></tr>
        <tr><th>Status Pengajuan</th><td><?= esc($evaluasi['status_pengajuan']) ?></td></tr>
        <tr><th>Nilai Teknis</th><td><?= esc($evaluasi['nilai_teknis']) ?></td></tr>
        <tr><th>Nilai Administrasi</th><td><?= esc($evaluasi['nilai_administrasi']) ?></td></tr>
        <tr><th>Nilai Harga</th><td><?= esc($evaluasi['nilai_harga']) ?></td></tr>
        <tr><th>Catatan</th><td><?= esc($evaluasi['catatan']) ?></td></tr>
    </table>

    <a href="<?= site_url('evaluasi-tender') ?>" class="btn btn-secondary">Kembali</a>

</body>
</html>
