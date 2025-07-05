<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Sertifikasi Tender</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>
    <div class="sidebar">
        <h2>Menu</h2>
        <?= view('Components/menus') ?>
    </div>
    <div class="main-content">
        <div class="actions-bar">
            <h1>Data Sertifikasi Tender</h1>
            <div>
                <form method="get" action="/sertifikasi_tender" class="search-form" style="display:inline-block;">
                    <input type="text" name="search" placeholder="Cari sertifikat..." value="<?= htmlspecialchars($_GET['search'] ?? '') ?>" />
                </form>
                <a href="/sertifikasi_tender/create"><button class="create-btn" title="Tambah sertifikat baru">Tambah Sertifikat</button></a>
            </div>
        </div>

        <!-- Flash message -->
        <?php if (session()->getFlashdata('success')): ?>
            <div class="flash-message">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>ID Tender</th>
                        <th>Nama Sertifikat</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($sertifikasi) && is_array($sertifikasi)): ?>
                        <?php foreach ($sertifikasi as $item): ?>
                            <tr>
                                <td><?= $item['sertifikat_id'] ?></td>
                                <td><?= $item['tender_id'] ?></td>
                                <td><?= htmlspecialchars($item['nama_sertifikat']) ?></td>
                                <td><?= $item['created_at'] ?></td>
                                <td><?= $item['updated_at'] ?></td>
                                <td class="aksi-links">
                                    <a href="/sertifikasi_tender/edit/<?= $item['sertifikat_id'] ?>">Edit</a>
                                    <a href="/sertifikasi_tender/delete/<?= $item['sertifikat_id'] ?>" onclick="return confirm('Yakin ingin menghapus?')">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" style="text-align:center; color:#999;">Tidak ada data sertifikat.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

  
    </div>
</body>
</html>
