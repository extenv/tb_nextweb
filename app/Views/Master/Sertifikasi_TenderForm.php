<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($sertifikasi) ? 'Edit Sertifikasi' : 'Tambah Sertifikasi' ?></title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>
    <div class="container">
        <h2><?= isset($sertifikasi) ? 'Edit Sertifikasi Tender' : 'Tambah Sertifikasi Tender' ?></h2>
        <form action="<?= isset($sertifikasi) ? '/sertifikasi_tender/update/' . $sertifikasi['sertifikat_id'] : '/sertifikasi_tender/store' ?>" method="post">
            <fieldset>
                <legend>Informasi Sertifikasi</legend>

                <?php if (isset($sertifikasi)): ?>
                    <input type="hidden" name="sertifikat_id" value="<?= $sertifikasi['sertifikat_id'] ?>">
                <?php endif; ?>

                <div class="form-group">
                    <label for="tender_id">Pilih Tender</label>
                    <select name="tender_id" id="tender_id" required>
                        <option value="">-- Pilih Tender --</option>
                        <?php foreach ($tenders as $tender): ?>
                            <option value="<?= $tender['tender_id'] ?>"
                                <?= isset($sertifikasi) && $sertifikasi['tender_id'] == $tender['tender_id'] ? 'selected' : '' ?>>
                                <?= $tender['nama_tender'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="nama_sertifikat">Nama Sertifikat</label>
                    <input type="text" id="nama_sertifikat" name="nama_sertifikat" value="<?= isset($sertifikasi) ? esc($sertifikasi['nama_sertifikat']) : '' ?>" required>
                </div>
            </fieldset>

            <?php if (isset($sertifikasi)): ?>
                <fieldset>
                    <legend>Informasi Waktu</legend>
                    <div class="form-group">
                        <label for="created_at">Dibuat Pada</label>
                        <input type="text" id="created_at" name="created_at" value="<?= $sertifikasi['created_at'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="updated_at">Terakhir Diubah</label>
                        <input type="text" id="updated_at" name="updated_at" value="<?= $sertifikasi['updated_at'] ?>" readonly>
                    </div>
                </fieldset>
            <?php endif; ?>

            <button type="submit"><?= isset($sertifikasi) ? 'Update Sertifikasi' : 'Simpan Sertifikasi' ?></button>
        </form>
    </div>
</body>
</html>
