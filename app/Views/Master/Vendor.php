<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Vendor</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #f4f6f8;
        }
        .sidebar {
            position: fixed;
            left: 0; top: 0; bottom: 0;
            width: 230px;
            background: linear-gradient(135deg, #283e51 0%, #485563 100%);
            color: #fff;
            padding: 32px 0;
            box-shadow: 2px 0 8px rgba(0,0,0,0.06);
        }
        .sidebar h2 {
            text-align: center;
            margin-bottom: 38px;
            font-size: 1.6em;
            letter-spacing: 2px;
            font-weight: 600;
        }
        .sidebar a {
            display: block;
            color: #fff;
            text-decoration: none;
            padding: 13px 32px;
            margin-bottom: 10px;
            border-left: 4px solid transparent;
            transition: background 0.2s, border 0.2s;
        }
        .sidebar a.active, .sidebar a:hover {
            background: #1a2533;
            border-left: 4px solid #4fc3f7;
        }
        .main-content {
            margin-left: 250px;
            padding: 44px 36px;
        }
        h1 {
            margin-top: 0;
            color: #283e51;
            font-size: 2em;
            letter-spacing: 1px;
        }
        .actions-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 22px;
            flex-wrap: wrap;
            gap: 10px;
        }
        .create-btn {
            background: #4fc3f7;
            color: #fff;
            border: none;
            padding: 10px 24px;
            border-radius: 4px;
            font-size: 1em;
            cursor: pointer;
            margin-right: 10px;
            transition: background 0.2s;
        }
        .create-btn:hover {
            background: #039be5;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
            border-radius: 6px;
            overflow: hidden;
        }
        th, td {
            padding: 13px 16px;
            text-align: left;
        }
        th {
            background: #e3f2fd;
            color: #283e51;
            font-weight: 600;
        }
        tr:nth-child(even) {
            background: #f9fafb;
        }
        .aksi-links a {
            color: #039be5;
            text-decoration: none;
            margin-right: 10px;
            font-weight: 500;
        }
        .aksi-links a:last-child {
            color: #e74c3c;
        }
        .aksi-links a:hover {
            text-decoration: underline;
        }
        .vendor-link {
            color: #43a047;
            font-weight: 500;
        }
        .vendor-link:hover {
            text-decoration: underline;
        }
        .flash-message {
            padding: 12px;
            background: #d0f0c0;
            color: #256029;
            border-radius: 4px;
            margin-bottom: 16px;
        }
        form.search-form input[type="text"] {
            padding: 8px;
            width: 240px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
        .table-wrapper {
            overflow-x: auto;
        }
        .pagination {
            margin-top: 20px;
        }
        .pagination a {
            margin-right: 8px;
            padding: 6px 12px;
            background: #e3f2fd;
            color: #283e51;
            border-radius: 4px;
            text-decoration: none;
        }
        .pagination a.active {
            background: #039be5;
            color: #fff;
        }
        @media (max-width: 900px) {
            .sidebar {
                width: 90px;
                padding: 12px 0;
            }
            .sidebar h2 {
                font-size: 1em;
            }
            .main-content {
                margin-left: 110px;
                padding: 18px 6px;
            }
            th, td {
                padding: 8px 6px;
            }
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Menu</h2>
        <a href="/dashboard">Dashboard</a>
        <a href="/vendor" class="active">Vendor</a>
        <a href="/tender">Tender</a>
        <a href="/pengajuan">Pengajuan</a>
        <a href="/logout">Logout</a>
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
                                    <a href="/vendor/detail/<?= $vendor['vendor_id'] ?>" class="vendor-link" title="Lihat detail vendor">
                                        <?= htmlspecialchars($vendor['nama_vendor']) ?>
                                    </a>
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

        <!-- Pagination -->
        <?php if (!empty($pager)) : ?>
            <div class="pagination">
                <?= $pager->links() ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
