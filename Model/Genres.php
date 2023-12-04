<?php

class Genre
{
    public string $genre;

    public function __construct($genre)
    {
        $this->genre = $genre;
    }

}

$genresString = file_get_contents(__DIR__ . '/genre_db.json');
$genresList = json_decode($genresString, true);
$genres = [];
foreach ($genresList as $genre) {
    $genres[] = new Genre($genre);
}


?>