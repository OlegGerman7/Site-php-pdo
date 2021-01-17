<?php
    $views = $data_film['views'] + 1;
    $id = $_GET['id'];
    $dbh->query("UPDATE films SET views = $views WHERE id = $id");
