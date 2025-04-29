<?php
include 'config/database.php';
$page_title = "Create Pengguna";
include 'includes/header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_depan = $conn->real_escape_string($_POST['nama_depan']);
    $nama_belakang = $conn->real_escape_string($_POST['nama_belakang']);
    $jenis_kelamin = $conn->real_escape_string($_POST['jenis_kelamin']);
    $tanggal_lahir = $conn->real_escape_string($_POST['tanggal_lahir']);
    $email = $conn->real_escape_string($_POST['email']);
    
    $stmt = $conn->prepare("INSERT INTO crud_101 (nama_depan, nama_belakang, jenis_kelamin, tanggal_lahir, email) 
                           VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nama_depan, $nama_belakang, $jenis_kelamin, $tanggal_lahir, $email);
    
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
    <div class="container" >
        <h1>Tambah Data Baru</h1>
        <form action="" method="POST">
            <label for="nama_depan">Nama Depan:</label>
            <input type="text" id="nama_depan" name="nama_depan" required>
            
            <label for="nama_belakang">Nama Belakang:</label>
            <input type="text" id="nama_belakang" name="nama_belakang" required>
            
            <label for="jenis_kelamin">Jenis Kelamin:</label>
            <select name="jenis_kelamin" id="jenis_kelamin" required>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            
            <label for="tanggal_lahir">Tanggal Lahir:</label>
            <input type="date" id="tanggal_lahir" name="tanggal_lahir" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <button type="submit" class="btn-submit">Simpan</button>
            <a href="index.php" class="btn-cancel">Batal</a>
        </form>
    </div>

<?php
include 'includes/footer.php';
?>