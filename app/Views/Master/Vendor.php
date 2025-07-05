<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Vendor</title>
   <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>
    <div class="sidebar">
        <h2>Menu</h2>

      <?= view('Components/menus') ?>

    </div>
    <div class="main-content">
        <div class="actions-bar">
            <h1>Data Vendor</h1>
            <div>
                <form method="get" action="/vendor" class="search-form" style="display:inline-block;">
                    <input type="text" name="search" placeholder="Cari vendor..." value="<?= htmlspecialchars($_GET['search'] ?? '') ?>" />
                </form>
                <a href="/vendor/create"><button class="create-btn" title="Tambah vendor baru">Tambah Vendor</button></a>
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
                        <th>Nama Vendor</th>
                        <th>Alamat</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($vendors) && is_array($vendors)): ?>
                        <?php foreach ($vendors as $vendor): ?>
                            <tr>
                                <td><?= $vendor['vendor_id'] ?></td>
                                <td>
                                    <?= htmlspecialchars($vendor['nama_vendor']) ?>
                                </td>
                                <td><?= htmlspecialchars($vendor['alamat']) ?></td>
                                <td><?= $vendor['created_at'] ?></td>
                                <td><?= $vendor['updated_at'] ?></td>
                                <td class="aksi-links">
                                    <a href="/vendor/edit/<?= $vendor['vendor_id'] ?>" title="Edit vendor">Edit</a>
                                    <a href="/vendor/delete/<?= $vendor['vendor_id'] ?>" onclick="return confirm('Yakin ingin menghapus vendor ini?')" title="Hapus vendor">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" style="text-align:center; color:#999;">Tidak ada data vendor.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

     
    </div>
</body>
</html>
