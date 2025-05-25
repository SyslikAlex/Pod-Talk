<?php
require_once "Podcast.php";

$podcast = new Podcast();
$message = "";
$data = null;

if (!isset($_GET["id"])) {
    die("ID podcastu nie je zadané.");
}

$id = (int)$_GET["id"];
$data = $podcast->getById($id);

if (!$data) {
    die("Podcast s ID $id neexistuje.");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = $_POST["title"] ?? '';
    $category = $_POST["category"] ?? '';
    $speaker = $_POST["speaker"] ?? '';
    $image = $_POST["image"] ?? '';

    if ($podcast->update($id, $title, $category, $speaker, $image)) {
        $message = "Podcast bol úspešne upravený!";
        $data = $podcast->getById($id); // Refresh data
    } else {
        $message = "Chyba pri úprave podcastu.";
    }
}
?>

<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>Upraviť podcast</title>
</head>
<body>
    <h1>Upraviť podcast ID <?= $id ?></h1>

    <?php if ($message): ?>
        <p><strong><?= htmlspecialchars($message) ?></strong></p>
    <?php endif; ?>

    <form method="POST">
        <label>Názov:</label><br>
        <input type="text" name="title" value="<?= htmlspecialchars($data['title']) ?>" required><br><br>

        <label>Kategória:</label><br>
        <input type="text" name="category" value="<?= htmlspecialchars($data['category']) ?>" required><br><br>

        <label>Speaker:</label><br>
        <input type="text" name="speaker" value="<?= htmlspecialchars($data['speaker']) ?>" required><br><br>

        <label>Obrázok (link):</label><br>
        <input type="text" name="image" value="<?= htmlspecialchars($data['image']) ?>"><br><br>

        <button type="submit">Uložiť zmeny</button>
    </form>
</body>
</html>
