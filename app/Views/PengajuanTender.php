<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Pengajuan Tender</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', Arial, sans-serif;
      background: #f4f6f8;
    }
    .sidebar {
      position: fixed;
      left: 0; top: 0; bottom: 0;
      width: 230px;
      background: linear-gradient(135deg, #283e51 0%, #485563 100%);
      color: #fff;
      padding: 32px 0;
      box-shadow: 2px 0 8px rgba(0,0,0,0.06);
    }
    .sidebar h2 {
      text-align: center;
      margin-bottom: 38px;
      font-size: 1.6em;
      letter-spacing: 2px;
      font-weight: 600;
    }
    .sidebar a {
      display: block;
      color: #fff;
      text-decoration: none;
      padding: 13px 32px;
      margin-bottom: 10px;
      border-left: 4px solid transparent;
    }
    .sidebar a.active, .sidebar a:hover {
      background: #1a2533;
      border-left: 4px solid #4fc3f7;
    }
    .main-content {
      margin-left: 250px;
      padding: 44px 36px;
    }
    h1 { color: #283e51; }
    .actions-bar {
      display: flex;
      justify-content: space-between;
      margin-bottom: 22px;
    }
    .create-btn {
      background: #4fc3f7;
      color: white;
      padding: 10px 24px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    .create-btn:hover { background: #039be5; }
    table {
      width: 100%;
      border-collapse: collapse;
      background: white;
      border-radius: 6px;
      overflow: hidden;
    }
    th, td {
      padding: 13px 16px;
      text-align: left;
    }
    th { background: #e3f2fd; }
    tr:nth-child(even) { background: #f9fafb; }
    .aksi-links a {
      margin-right: 10px;
      text-decoration: none;
      font-weight: 500;
    }
    .aksi-links a:hover { text-decoration: underline; }
    .aksi-links a:last-child { color: #e74c3c; }
    .flash-message {
      background: #d0f0c0;
      color: #256029;
      padding: 12px;
      margin-bottom: 16px;
      border-radius: 4px;
    }

    #editModal {
      display: none;
      position: fixed;
      inset: 0;
      background: rgba(0,0,0,0.5);
      z-index: 9999;
      justify-content: center;
      align-items: center;
    }
    .modal-content {
      background: white;
      padding: 24px;
      border-radius: 8px;
      width: 400px;
    }
    .modal-content h3 { margin-top: 0; }
    .modal-content input, .modal-content select {
      width: 100%;
      padding: 8px;
      margin: 8px 0;
    }
    .modal-content button {
      padding: 8px 16px;
      margin-top: 10px;
    }
  </style>
</head>
<body>

<div class="sidebar">
  <h2>Menu</h2>
 
      <?= view('Components/menus') ?>
</div>

<div class="main-content">
  <div class="actions-bar">
    <h1>Data Pengajuan Tender</h1>
    <a href="/pengajuan/create"><button class="create-btn">Tambah Pengajuan</button></a>
  </div>

  <?php if (session()->getFlashdata('success')): ?>
    <div class="flash-message">
      <?= session()->getFlashdata('success') ?>
    </div>
  <?php endif; ?>

  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Nama Vendor</th>
        <th>Nama Tender</th>
        <th>Tanggal Pengajuan</th>
        <th>Status</th>
        <th>Dibuat</th>
        <th>Diperbarui</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($pengajuanList as $p): ?>
      <tr>
        <td><?= $p['pengajuan_id'] ?></td>
        <td><?= esc($p['nama_vendor']) ?></td>
        <td><?= esc($p['nama_tender']) ?></td>
        <td><?= esc($p['tanggal_pengajuan']) ?></td>
        <td><?= esc($p['status']) ?></td>
        <td><?= esc($p['created_at']) ?></td>
        <td><?= esc($p['updated_at']) ?></td>
        <td class="aksi-links">
          <a href="#" class="edit-btn"
             data-id="<?= $p['pengajuan_id'] ?>"
             data-vendor="<?= $p['vendor_id'] ?>"
             data-tender="<?= $p['tender_id'] ?>"
             data-tanggal="<?= $p['tanggal_pengajuan'] ?>"
             data-status="<?= $p['status'] ?>">Edit</a>
          <a href="/pengajuan/delete/<?= $p['pengajuan_id'] ?>">Delete</a>
        </td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</div>

<!-- Modal Edit -->
<div id="editModal" class="modal">
  <div class="modal-content">
    <h3>Edit Pengajuan</h3>
    <form id="editForm" method="post" action="/pengajuan/update">
      <input type="hidden" name="pengajuan_id" id="edit_pengajuan_id">

      <label for="edit_vendor">Vendor ID</label>
      <input type="text" name="vendor_id" id="edit_vendor" required>

      <label for="edit_tender">Tender ID</label>
      <input type="text" name="tender_id" id="edit_tender" required>

      <label for="edit_tanggal">Tanggal Pengajuan</label>
      <input type="date" name="tanggal_pengajuan" id="edit_tanggal" required>

      <label for="edit_status">Status</label>
      <select name="status" id="edit_status" required>
        <option value="Pending">Pending</option>
        <option value="Diterima">Diterima</option>
        <option value="Ditolak">Ditolak</option>
      </select>

      <button type="submit">Simpan</button>
    </form>
  </div>
</div>

<script>
document.querySelectorAll('.edit-btn').forEach(button => {
  button.addEventListener('click', function(e) {
    e.preventDefault();

    const id = this.dataset.id;
    const vendor = this.dataset.vendor;
    const tender = this.dataset.tender;
    const tanggal = this.dataset.tanggal;
    const status = this.dataset.status;

    document.getElementById('edit_pengajuan_id').value = id;
    document.getElementById('edit_vendor').value = vendor;
    document.getElementById('edit_tender').value = tender;
    document.getElementById('edit_tanggal').value = tanggal;

    const statusSelect = document.getElementById('edit_status');
    Array.from(statusSelect.options).forEach(option => {
      option.selected = option.value.toLowerCase() === status.toLowerCase();
    });

    document.getElementById('editModal').style.display = 'flex';
  });
});
</script>

</body>
</html>
