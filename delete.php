<?php
include 'config/database.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM crud_101 WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: index.php?msg=sukses_hapus");
        exit();
    } else {
        echo "Gagal menghapus data.";
    }

    $stmt->close();
} else {
    echo "ID tidak ditemukan.";
}

$conn->close();
?>
