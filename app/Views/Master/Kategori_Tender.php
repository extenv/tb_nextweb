<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kategori Tender</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>
    <div class="sidebar">
        <h2>Menu</h2>
        <?= view('Components/menus') ?>
    </div>
    <div class="main-content">
        <div class="actions-bar">
            <h1>Data Kategori Tender</h1>
            <div>
                <form method="get" action="/kategori_tender" class="search-form" style="display:inline-block;">
                    <input type="text" name="search" placeholder="Cari kategori..." value="<?= htmlspecialchars($_GET['search'] ?? '') ?>" />
                </form>
                <a href="/kategori_tender/create">
                    <button class="create-btn" title="Tambah kategori baru">Tambah Kategori</button>
                </a>
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
                        <th>Nama Kategori</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($kategori_tenders) && is_array($kategori_tenders)): ?>
                        <?php foreach ($kategori_tenders as $kategori): ?>
                            <tr>
                                <td><?= $kategori['kategori_id'] ?></td>
                                <td><?= esc($kategori['nama_kategori']) ?></td>
                                <td><?= $kategori['created_at'] ?></td>
                                <td><?= $kategori['updated_at'] ?></td>
                                <td class="aksi-links">
                                    <a href="/kategori_tender/edit/<?= $kategori['kategori_id'] ?>">Edit</a>
                                    <a href="/kategori_tender/delete/<?= $kategori['kategori_id'] ?>" onclick="return confirm('Yakin ingin menghapus kategori ini?')">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" style="text-align:center;">Tidak ada data kategori tender.</td>
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
