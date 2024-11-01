<?php
include 'db.php';

$id = $_GET['id'];

$sql = "SELECT * FROM users WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
$user = $stmt->fetch();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];

    $sql = "UPDATE users SET name = :name, email = :email WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    header("Location: index.php");
}
?>

<form method="POST">
    <input type="text" name="name" value="<?php echo $user['name']; ?>" required>
    <input type="email" name="email" value="<?php echo $user['email']; ?>" required>
    <button type="submit">Update User</button>
</form>