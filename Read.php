<?php
require_once "Podcast.php";

$podcast = new Podcast();
$all = $podcast->getAll();
?>

<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>Zoznam podcastov</title>
</head>
<body>
    <h1>Všetky podcasty</h1>

    <a href="create.php">➕ Pridať nový podcast</a><br><br>

    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Názov</th>
            <th>Kategória</th>
            <th>Speaker</th>
            <th>Obrázok</th>
            <th>Akcia</th>
        </tr>
        <?php foreach ($all as $p): ?>
        <tr>
            <td><?= $p["id"] ?></td>
            <td><?= htmlspecialchars($p["title"]) ?></td>
            <td><?= htmlspecialchars($p["category"]) ?></td>
            <td><?= htmlspecialchars($p["speaker"]) ?></td>
            <td><img src="<?= htmlspecialchars($p["image"]) ?>" width="100"></td>
            <td>
                <a href="update.php?id=<?= $p["id"] ?>">✏️</a>
                <a href="delete.php?id=<?= $p["id"] ?>" onclick="return confirm('Naozaj zmazať?')">🗑️</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
