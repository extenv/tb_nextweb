<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($tender) ? 'Edit Tender' : 'Tambah Tender' ?></title>
</head>
<body>
    <h2><?= isset($tender) ? 'Edit Tender' : 'Tambah Tender' ?></h2>

    <form action="<?= isset($tender) ? '/tender/update/' . $tender['tender_id'] : '/tender/store' ?>" method="post">
        <?php if (isset($tender)): ?>
            <input type="hidden" name="tender_id" value="<?= $tender['tender_id'] ?>">
        <?php endif; ?>

        <label for="nama_tender">Nama Tender:</label><br>
        <input type="text" id="nama_tender" name="nama_tender" value="<?= isset($tender) ? esc($tender['nama_tender']) : '' ?>"><br><br>

        <label for="deskripsi">Deskripsi:</label><br>
        <input type="text" id="deskripsi" name="deskripsi" value="<?= isset($tender) ? esc($tender['deskripsi']) : '' ?>"><br><br>

        <label for="nilai_pagu">Nilai Pagu:</label><br>
        <input type="text" id="nilai_pagu" name="nilai_pagu" value="<?= isset($tender) ? esc($tender['nilai_pagu']) : '' ?>"><br><br>

        <label for="instansi">Instansi:</label><br>
        <input type="text" id="instansi" name="instansi" value="<?= isset($tender) ? esc($tender['instansi']) : '' ?>"><br><br>

        <?php if (isset($tender)): ?>
            <label for="created_at">Dibuat Pada:</label><br>
            <input type="text" id="created_at" name="created_at" value="<?= $tender['created_at'] ?>" readonly><br><br>

            <label for="updated_at">Terakhir Diubah:</label><br>
            <input type="text" id="updated_at" name="updated_at" value="<?= $tender['updated_at'] ?>" readonly><br><br>
        <?php endif; ?>

        <button type="submit"><?= isset($tender) ? 'Update Tender' : 'Simpan Tender' ?></button>
    </form>
</body>
</html>
