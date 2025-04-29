<?php
include 'config/database.php';
$page_title = "Update Pengguna";
include 'includes/header.php';

// Ambil data berdasarkan ID
if (isset($_GET['id'])) {
    $id = $conn->real_escape_string($_GET['id']);
    $query = "SELECT * FROM crud_101 WHERE id = $id";
    $result = $conn->query($query);
    $data = $result->fetch_assoc();
}

// Proses update data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $conn->real_escape_string($_POST['id']);
    $nama_depan = $conn->real_escape_string($_POST['nama_depan']);
    $nama_belakang = $conn->real_escape_string($_POST['nama_belakang']);
    $jenis_kelamin = $conn->real_escape_string($_POST['jenis_kelamin']);
    $tanggal_lahir = $conn->real_escape_string($_POST['tanggal_lahir']);
    $email = $conn->real_escape_string($_POST['email']);
    
    $stmt = $conn->prepare("UPDATE crud_101 SET 
                          nama_depan = ?, 
                          nama_belakang = ?, 
                          jenis_kelamin = ?, 
                          tanggal_lahir = ?, 
                          email = ?
                          WHERE id = ?");
    
    $stmt->bind_param("sssssi", $nama_depan, $nama_belakang, $jenis_kelamin, $tanggal_lahir, $email, $id);
    
    if ($stmt->execute()) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
    
    $stmt->close();
}
$conn->close();
?>

    <div class="container">
        <h1>Edit Data Pengguna</h1>
        
        <form action="update.php" method="POST">
            <input type="hidden" name="id" value="<?= $data['id'] ?>">
            
            <label for="nama_depan">Nama Depan:</label>
            <input type="text" id="nama_depan" name="nama_depan" value="<?= htmlspecialchars($data['nama_depan']) ?>" required>
            
            <label for="nama_belakang">Nama Belakang:</label>
            <input type="text" id="nama_belakang" name="nama_belakang" value="<?= htmlspecialchars($data['nama_belakang']) ?>" required>
            
            <label for="jenis_kelamin">Jenis Kelamin:</label>
            <select name="jenis_kelamin" id="jenis_kelamin" required>
                <option value="Laki-laki" <?= $data['jenis_kelamin'] == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                <option value="Perempuan" <?= $data['jenis_kelamin'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
            </select>
            
            <label for="tanggal_lahir">Tanggal Lahir:</label>
            <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="<?= $data['tanggal_lahir'] ?>" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($data['email']) ?>" required>
            
            <button type="submit" class="btn-submit">Update Data</button>
            <a href="index.php" class="btn-cancel">Batal</a>
        </form>
    </div>

<?php
include 'includes/footer.php';
?>
