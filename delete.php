<?php
require_once "Podcast.php";

if (!isset($_GET["id"])) {
    die("ID podcastu chýba.");
}

$id = (int)$_GET["id"];
$podcast = new Podcast();

if ($podcast->delete($id)) {
    header("Location: read.php?deleted=1");
    exit;
} else {
    echo "Chyba pri mazaní podcastu.";
}
?>
