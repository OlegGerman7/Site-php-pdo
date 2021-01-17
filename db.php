<?php

const DSN = "mysql:host=localhost;dbname=films";
const USERNAME = 'oleg';
const PASSWORD = 123;

$dbh = new PDO( DSN, USERNAME , PASSWORD );

function get_films_data(){
    global $dbh;
    $data_films = $dbh->query('SELECT * FROM films')->fetchAll(PDO::FETCH_ASSOC);
    return $data_films;
}

function get_category( $id ){
    global $dbh;
    $category = $dbh->query("SELECT category FROM categories WHERE id = $id")->fetch(PDO::FETCH_COLUMN);
    return $category;
}

function get_film_data( $id ){
    global $dbh;
    $data_film = $dbh->query("SELECT * FROM films WHERE id = $id")->fetch(PDO::FETCH_ASSOC);
    return $data_film;
}

function get_categories_name(){
    global $dbh;
    $categories_name = $dbh->query("SELECT * FROM categories")->fetchAll(PDO::FETCH_ASSOC);
    return $categories_name;
}

function get_films_by_category( $id_category ){
    global $dbh;
    $films = $dbh->query("SELECT * FROM films WHERE id_category=$id_category")->fetchAll(PDO::FETCH_ASSOC);
    return $films;
}

function get_search_result( $query ){
    global $dbh;
    $search = "%$query%";
    $stm = $dbh->prepare("SELECT * FROM films WHERE title LIKE ?");
    $stm->execute(array($search));
    $data_films = $stm->fetchAll();
    return $data_films;
}




