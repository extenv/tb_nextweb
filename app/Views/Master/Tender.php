<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Data Tender</h1>
    <a href="/tender/create">
    <button>
        Create
    </button>
    </a>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Tender</th>
                <th>Deskripsi</th>
                <th>nilai_pagu</th>
                <th>instansi</th>
                <th>created_at</th>
                <th>updated_at</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tenders as $tender): ?>
                <tr>
                    <td><?= $tender['tender_id'] ?></td>
                    <td><?= $tender['nama_tender'] ?></td>
                    <td><?= $tender['deskripsi'] ?></td>
                    <td><?= $tender['nilai_pagu'] ?></td>
                    <td><?= $tender['instansi'] ?></td>
                    <td><?= $tender['created_at'] ?></td>
                    <td><?= $tender['updated_at'] ?></td>
                    <td>
                        <a href="/tender/edit/<?= $tender['tender_id'] ?>">Edit</a> |
                        <a href="/tender/delete/<?= $tender['tender_id'] ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
</body>
</html>