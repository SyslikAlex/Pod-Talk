<?php
require_once "Podcast.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = $_POST["title"] ?? '';
    $category = $_POST["category"] ?? '';
    $speaker = $_POST["speaker"] ?? '';
    $image = $_POST["image"] ?? '';

    $podcast = new Podcast();
    if ($podcast->create($title, $category, $speaker, $image)) {
        $message = "Podcast bol úspešne pridaný!";
    } else {
        $message = "Chyba pri pridávaní podcastu.";
    }
}
?>

<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>Pridať podcast</title>
</head>
<body>
    <h1>Pridať nový podcast</h1>

    <?php if ($message): ?>
        <p><strong><?= htmlspecialchars($message) ?></strong></p>
    <?php endif; ?>

    <form method="POST">
        <label>Názov:</label><br>
        <input type="text" name="title" required><br><br>

        <label>Kategória:</label><br>
        <input type="text" name="category" required><br><br>

        <label>Speaker:</label><br>
        <input type="text" name="speaker" required><br><br>

        <label>Obrázok (link):</label><br>
        <input type="text" name="image"><br><br>

        <button type="submit">Pridať</button>
    </form>
</body>
</html>
