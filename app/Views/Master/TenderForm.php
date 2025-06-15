<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($tender) ? 'Edit Tender' : 'Tambah Tender' ?></title>
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
        input[type="text"] {
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
        <h2><?= isset($tender) ? 'Edit Tender' : 'Tambah Tender' ?></h2>
        <form action="<?= isset($tender) ? '/tender/update/' . $tender['tender_id'] : '/tender/store' ?>" method="post">
            <fieldset>
                <legend>Informasi Tender</legend>
                <?php if (isset($tender)): ?>
                    <input type="hidden" name="tender_id" value="<?= $tender['tender_id'] ?>">
                <?php endif; ?>

                <div class="form-group">
                    <label for="nama_tender">Nama Tender</label>
                    <input type="text" id="nama_tender" name="nama_tender" value="<?= isset($tender) ? esc($tender['nama_tender']) : '' ?>" required>
                </div>

                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <input type="text" id="deskripsi" name="deskripsi" value="<?= isset($tender) ? esc($tender['deskripsi']) : '' ?>" required>
                </div>

                <div class="form-group">
                    <label for="nilai_pagu">Nilai Pagu</label>
                    <input type="text" id="nilai_pagu" name="nilai_pagu" value="<?= isset($tender) ? esc($tender['nilai_pagu']) : '' ?>" required>
                </div>

                <div class="form-group">
                    <label for="instansi">Instansi</label>
                    <input type="text" id="instansi" name="instansi" value="<?= isset($tender) ? esc($tender['instansi']) : '' ?>" required>
                </div>
            </fieldset>

            <?php if (isset($tender)): ?>
                <fieldset>
                    <legend>Informasi Waktu</legend>
                    <div class="form-group">
                        <label for="created_at">Dibuat Pada</label>
                        <input type="text" id="created_at" name="created_at" value="<?= $tender['created_at'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="updated_at">Terakhir Diubah</label>
                        <input type="text" id="updated_at" name="updated_at" value="<?= $tender['updated_at'] ?>" readonly>
                    </div>
                </fieldset>
            <?php endif; ?>

            <button type="submit"><?= isset($tender) ? 'Update Tender' : 'Simpan Tender' ?></button>
        </form>
    </div>
</body>
</html>
