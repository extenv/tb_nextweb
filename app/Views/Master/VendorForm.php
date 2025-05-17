<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($vendor) ? 'Edit Vendor' : 'Tambah Vendor' ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f6fa;
            margin: 0;
            padding: 0;
        }

        .container {
            background: #fff;
            max-width: 420px;
            margin: 40px auto;
            padding: 32px 28px 24px 28px;
            border-radius: 10px;
            box-shadow: 0 4px 24px rgba(0, 0, 0, 0.08);
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 28px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            color: #444;
            font-weight: 500;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 18px;
            border: 1px solid #dcdde1;
            border-radius: 5px;
            font-size: 15px;
            background: #fafbfc;
            transition: border 0.2s;
        }

        input[type="text"]:focus,
        input[type="email"]:focus {
            border: 1.5px solid #4078c0;
            outline: none;
            background: #fff;
        }

        input[readonly] {
            background: #f1f2f6;
            color: #888;
        }

        button[type="submit"] {
            width: 100%;
            padding: 12px;
            background: #4078c0;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s;
        }

        button[type="submit"]:hover {
            background: #305a8c;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2><?= isset($vendor) ? 'Edit Vendor' : 'Tambah Vendor' ?></h2>

        <form action="<?= isset($vendor) ? '/vendor/update/' . $vendor['vendor_id'] : '/vendor/store' ?>" method="post">
            <?php if (isset($vendor)): ?>
                <input type="hidden" name="vendor_id" value="<?= $vendor['vendor_id'] ?>">
            <?php endif; ?>

            <label for="nama_vendor">Nama Vendor:</label>
            <input type="text" id="nama_vendor" name="nama_vendor" value="<?= isset($vendor) ? esc($vendor['nama_vendor']) : '' ?>">

            <label for="alamat">Alamat:</label>
            <input type="text" id="alamat" name="alamat" value="<?= isset($vendor) ? esc($vendor['alamat']) : '' ?>">


            <?php if (isset($vendor)): ?>
                <label for="created_at">Dibuat Pada:</label>
                <input type="text" id="created_at" name="created_at" value="<?= $vendor['created_at'] ?>" readonly>

                <label for="updated_at">Terakhir Diubah:</label>
                <input type="text" id="updated_at" name="updated_at" value="<?= $vendor['updated_at'] ?>" readonly>
            <?php endif; ?>

            <button type="submit"><?= isset($vendor) ? 'Update Vendor' : 'Simpan Vendor' ?></button>
        </form>
    </div>
</body>

</html>