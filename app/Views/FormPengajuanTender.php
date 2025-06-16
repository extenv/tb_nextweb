<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan Tender</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 480px;
            margin: 40px auto;
            background: #fff;
            padding: 32px 24px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        }
        h2 {
            text-align: center;
            margin-bottom: 24px;
        }
        .form-group {
            margin-bottom: 18px;
        }
        label {
            display: block;
            margin-bottom: 6px;
            font-weight: 500;
        }
        input, select {
            width: 100%;
            padding: 8px 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1em;
        }
        input[readonly] {
            background: #f1f1f1;
        }
        button[type="submit"] {
            width: 100%;
            padding: 10px;
            background: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 1em;
            cursor: pointer;
            transition: background 0.2s;
        }
        button[type="submit"]:hover {
            background: #0056b3;
        }
        fieldset {
            border: 1px solid #e0e0e0;
            border-radius: 6px;
            padding: 18px 14px;
            margin-bottom: 18px;
        }
        legend {
            font-size: 1.1em;
            font-weight: bold;
            color: #333;
            padding: 0 8px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Pengajuan Tender</h2>
        <form action="<?= base_url('/pengajuan/store') ?>" method="post">
            <fieldset>
                <legend>Data Pengajuan</legend>

                <div class="form-group">
                    <label for="vendor_id">Vendor</label>
                    <select name="vendor_id" id="vendor_id" required>
                        <option value="">-- Pilih Vendor --</option>
                        <?php foreach ($vendor as $v): ?>
                            <option value="<?= $v['vendor_id'] ?>"><?= $v['nama_vendor'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="tender_id">Tender</label>
                    <select name="tender_id" id="tender_id" required>
                        <option value="">-- Pilih Tender --</option>
                        <?php foreach ($tender as $t): ?>
                            <option value="<?= $t['tender_id'] ?>"><?= $t['nama_tender'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="tanggal_pengajuan">Tanggal Pengajuan</label>
                    <input type="date" id="tanggal_pengajuan" name="tanggal_pengajuan" required>
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" id="status" required>
                        <option value="Pending">Pending</option>
                        <option value="Diterima">Diterima</option>
                        <option value="Ditolak">Ditolak</option>
                    </select>
                </div>
            </fieldset>

            <button type="submit">Simpan Pengajuan</button>
        </form>
    </div>
</body>
</html>
