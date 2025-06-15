<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($tender) ? 'Edit Tender' : 'Tambah Tender' ?></title>
   <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
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
