<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Tender</title>
   <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">

</head>
<body>
    <div class="sidebar">
        <h2>Menu</h2>
      <?= view('Components/menus') ?>
    </div>
    <div class="main-content">
        <div class="actions-bar">
            <h1>Data Tender</h1>
            <div>
                <form method="get" action="/tender" class="search-form" style="display:inline-block;">
                    <input type="text" name="search" placeholder="Cari tender..." value="<?= htmlspecialchars($_GET['search'] ?? '') ?>" />
                </form>
                <a href="/tender/create"><button class="create-btn" title="Tambah tender baru">Tambah Tender</button></a>
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
    <th>Nama Tender</th>
    <th>Deskripsi</th>
    <th>Nilai Pagu</th>
    <th>Instansi</th>
    <th>Created At</th>
    <th>Updated At</th>
    <th>Aksi</th>
</tr>

            </thead>

                <tbody>
                    <?php if (!empty($tenders) && is_array($tenders)): ?>
                       <?php foreach ($tenders as $tender): ?>
                    <tr>
                        <td><?= $tender['tender_id'] ?></td>
                        <td><?= htmlspecialchars($tender['nama_tender']) ?></td>
                        <td><?= htmlspecialchars($tender['deskripsi']) ?></td>
                        <td><?= htmlspecialchars($tender['nilai_pagu']) ?></td>
                        <td><?= htmlspecialchars($tender['instansi']) ?></td>
                        <td><?= $tender['created_at'] ?></td>
                        <td><?= $tender['updated_at'] ?></td>
                        <td class="aksi-links">
                            <a href="/tender/edit/<?= $tender['tender_id'] ?>">Edit</a>
                            <a href="/tender/delete/<?= $tender['tender_id'] ?>">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" style="text-align:center; color:#999;">Tidak ada data tender.</td>
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
