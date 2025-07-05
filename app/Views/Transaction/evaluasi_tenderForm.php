<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($evaluasi) ? 'Edit Evaluasi' : 'Tambah Evaluasi' ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 90%;
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        fieldset {
            border: 1px solid #ccc;
            padding: 1rem;
            margin-bottom: 1.5rem;
            border-radius: 5px;
        }

        legend {
            padding: 0 10px;
            font-weight: bold;
            color: #444;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 8px 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
        }

        button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #2563eb;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }

        button:hover {
            background-color: #1e40af;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2><?= isset($evaluasi) ? 'Edit Evaluasi' : 'Tambah Evaluasi' ?></h2>
        <form action="<?= isset($evaluasi) ? '/evaluasi-tender/update/' . $evaluasi['evaluasi_id'] : '/evaluasi-tender/store' ?>" method="post">
            <fieldset>
                <legend>Form Evaluasi</legend>

                <?php if (isset($evaluasi)): ?>
                    <input type="hidden" name="evaluasi_id" value="<?= $evaluasi['evaluasi_id'] ?>">
                <?php endif; ?>

              <div class="form-group">
    <label for="pengajuan_id">Pilih Pengajuan</label>
    <select id="pengajuan_id" name="pengajuan_id" required>
        <option value="">-- Pilih Pengajuan --</option>
        <?php foreach ($pengajuanList as $pengajuan): ?>
            <option value="<?= $pengajuan['pengajuan_id'] ?>"
                <?= isset($evaluasi) && $evaluasi['pengajuan_id'] == $pengajuan['pengajuan_id'] ? 'selected' : '' ?>>
                <?= $pengajuan['nama_vendor'] ?> - <?= $pengajuan['nama_tender'] ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>


                <div class="form-group">
                    <label for="nilai_teknis">Nilai Teknis</label>
                    <input type="number" step="0.01" id="nilai_teknis" name="nilai_teknis" value="<?= isset($evaluasi) ? esc($evaluasi['nilai_teknis']) : '' ?>" required>
                </div>

                <div class="form-group">
                    <label for="nilai_administrasi">Nilai Administrasi</label>
                    <input type="number" step="0.01" id="nilai_administrasi" name="nilai_administrasi" value="<?= isset($evaluasi) ? esc($evaluasi['nilai_administrasi']) : '' ?>" required>
                </div>

                <div class="form-group">
                    <label for="nilai_harga">Nilai Harga</label>
                    <input type="number" step="0.01" id="nilai_harga" name="nilai_harga" value="<?= isset($evaluasi) ? esc($evaluasi['nilai_harga']) : '' ?>" required>
                </div>

                <div class="form-group">
                    <label for="catatan">Catatan</label>
                    <textarea id="catatan" name="catatan" rows="4"><?= isset($evaluasi) ? esc($evaluasi['catatan']) : '' ?></textarea>
                </div>
            </fieldset>

            <?php if (isset($evaluasi)): ?>
                <fieldset>
                    <legend>Informasi Waktu</legend>
                    <div class="form-group">
                        <label for="created_at">Dibuat Pada</label>
                        <input type="text" id="created_at" name="created_at" value="<?= $evaluasi['created_at'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="updated_at">Terakhir Diubah</label>
                        <input type="text" id="updated_at" name="updated_at" value="<?= $evaluasi['updated_at'] ?>" readonly>
                    </div>
                </fieldset>
            <?php endif; ?>

            <button type="submit"><?= isset($evaluasi) ? 'Update Evaluasi' : 'Simpan Evaluasi' ?></button>
        </form>
    </div>
</body>
</html>
