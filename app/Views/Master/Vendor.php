<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Vendor</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f4f6f8;
        }
        .sidebar {
            position: fixed;
            left: 0; top: 0; bottom: 0;
            width: 220px;
            background: #2d3e50;
            color: #fff;
            padding: 30px 0;
            box-shadow: 2px 0 8px rgba(0,0,0,0.05);
        }
        .sidebar h2 {
            text-align: center;
            margin-bottom: 40px;
            font-size: 1.5em;
            letter-spacing: 2px;
        }
        .sidebar a {
            display: block;
            color: #fff;
            text-decoration: none;
            padding: 12px 30px;
            margin-bottom: 8px;
            transition: background 0.2s;
        }
        .sidebar a:hover {
            background: #1a2533;
        }
        .main-content {
            margin-left: 240px;
            padding: 40px 30px;
        }
        h1 {
            margin-top: 0;
            color: #2d3e50;
        }
        .create-btn {
            background: #3498db;
            color: #fff;
            border: none;
            padding: 10px 22px;
            border-radius: 4px;
            font-size: 1em;
            cursor: pointer;
            margin-bottom: 20px;
            transition: background 0.2s;
        }
        .create-btn:hover {
            background: #217dbb;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        }
        th, td {
            padding: 12px 16px;
            text-align: left;
        }
        th {
            background: #f0f3f7;
        }
        tr:nth-child(even) {
            background: #f9fafb;
        }
        .aksi-links a {
            color: #3498db;
            text-decoration: none;
            margin-right: 8px;
        }
        .aksi-links a:last-child {
            color: #e74c3c;
        }
        .aksi-links a:hover {
            text-decoration: underline;
        }
        @media (max-width: 800px) {
            .sidebar {
                width: 100px;
                padding: 15px 0;
            }
            .sidebar h2 {
                font-size: 1em;
            }
            .main-content {
                margin-left: 120px;
                padding: 20px 10px;
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
        <a href="/vendor">Vendor</a>
        <a href="/produk">Produk</a>
        <a href="/logout">Logout</a>
    </div>
    <div class="main-content">
        <h1>Data Vendor</h1>
        <a href="/vendor/create">
            <button class="create-btn">Create</button>
        </a>
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
                <?php foreach ($vendors as $vendor): ?>
                    <tr>
                        <td><?= $vendor['vendor_id'] ?></td>
                        <td><?= $vendor['nama_vendor'] ?></td>
                        <td><?= $vendor['alamat'] ?></td>
                        <td><?= $vendor['created_at'] ?></td>
                        <td><?= $vendor['updated_at'] ?></td>
                        <td class="aksi-links">
                            <a href="/vendor/edit/<?= $vendor['vendor_id'] ?>">Edit</a>
                            <a href="/vendor/delete/<?= $vendor['vendor_id'] ?>">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>