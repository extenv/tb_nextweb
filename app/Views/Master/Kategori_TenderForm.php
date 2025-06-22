<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($kategori) ? 'Edit Kategori' : 'Tambah Kategori' ?></title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>
    <div class="container">
        <h2><?= isset($kategori) ? 'Edit Kategori Tender' : 'Tambah Kategori Tender' ?></h2>
        <form action="<?= isset($kategori) ? '/kategori_tender/update/' . $kategori['kategori_id'] : '/kategori_tender/store' ?>" method="post">
            <fieldset>
                <legend>Informasi Kategori</legend>

                <?php if (isset($kategori)): ?>
                    <input type="hidden" name="kategori_id" value="<?= $kategori['kategori_id'] ?>">
                <?php endif; ?>

                <div class="form-group">
                    <label for="nama_kategori">Nama Kategori</label>
                    <input type="text" id="nama_kategori" name="nama_kategori" value="<?= isset($kategori) ? esc($kategori['nama_kategori']) : '' ?>" required>
                </div>
            </fieldset>

            <?php if (isset($kategori)): ?>
                <fieldset>
                    <legend>Informasi Waktu</legend>
                    <div class="form-group">
                        <label for="created_at">Dibuat Pada</label>
                        <input type="text" id="created_at" name="created_at" value="<?= $kategori['created_at'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="updated_at">Terakhir Diubah</label>
                        <input type="text" id="updated_at" name="updated_at" value="<?= $kategori['updated_at'] ?>" readonly>
                    </div>
                </fieldset>
            <?php endif; ?>

            <button type="submit"><?= isset($kategori) ? 'Update Kategori' : 'Simpan Kategori' ?></button>
        </form>
    </div>
</body>
</html>
