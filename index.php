<?php
include 'config/database.php';
include 'read.php';
include 'includes/header.php';
?>
    <div class="main-wrapper">
        <div class="container">
            <h1>User LigmaShirt</h1>
            
            <a href="create.php" class="btn-add">Tambah Data</a>
            
            <table id="dataTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Lengkap</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Lahir</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['nama_depan'] . ' ' . $row['nama_belakang'] ?></td>
                        <td><?= $row['jenis_kelamin'] ?></td>
                        <td><?= $row['tanggal_lahir'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td>
                            <a href="update.php?id=<?= $row['id'] ?>" class="btn-edit">Edit</a>
                            <a href="delete.php?id=<?= $row['id'] ?>" class="btn-delete" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <div class="pagination">
                <?php if ($page > 1): ?>
                    <a href="?page=<?= $page - 1 ?>">Previous</a>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                    <a href="?page=<?= $i ?>" class="<?= $i == $page ? 'active' : '' ?>"><?= $i ?></a>
                <?php endfor; ?>

                <?php if ($page < $total_pages): ?>
                    <a href="?page=<?= $page + 1 ?>">Next</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php
include 'includes/footer.php';
?>