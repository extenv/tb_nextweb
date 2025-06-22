<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluasi Tender</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>
    <div class="sidebar">
        <h2>Menu</h2>
        <?= view('Components/menus') ?>
    </div>

    <div class="main-content">
        <div class="actions-bar">
            <h1>Evaluasi Tender</h1>
            <div>
                <form method="get" action="/evaluasi-tender" class="search-form" style="display:inline-block;">
                    <input type="text" name="search" placeholder="Cari vendor atau tender..." value="<?= htmlspecialchars($_GET['search'] ?? '') ?>" />
                </form>
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
                    <?php if (!empty($evaluasi) && is_array($evaluasi)): ?>
                        <?php foreach ($evaluasi as $key => $row): ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= htmlspecialchars($row['nama_vendor']) ?></td>
                                <td><?= htmlspecialchars($row['nama_tender']) ?></td>
                                <td><?= htmlspecialchars($row['nilai_teknis']) ?></td>
                                <td><?= htmlspecialchars($row['nilai_administrasi']) ?></td>
                                <td><?= htmlspecialchars($row['nilai_harga']) ?></td>
                                <td><?= htmlspecialchars($row['status_pengajuan']) ?></td>
                                <td class="aksi-links">
                                    <a href="/evaluasi-tender/detail/<?= $row['evaluasi_id'] ?>">Detail</a>
                                    <a href="/evaluasi-tender/delete/<?= $row['evaluasi_id'] ?>" onclick="return confirm('Hapus data ini?')">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8" style="text-align:center; color:#999;">Tidak ada data evaluasi tender.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <?php if (!empty($pager)) : ?>
            <div class="pagination">
                <?= $pager->links() ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
