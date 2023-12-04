<?php
include __DIR__ . '/Model/Genres.php';
class Movie
{
    private int $id;
    private string $title;
    private string $original_language;
    private string $overview;
    private float $vote_average;
    private string $poster_path;
    private string $release_date;
    private array $genres;


    public function __construct($id, $name, $lang, $descr, $vote, $image, $release, $genres)
    {
        $this->id = $id;
        $this->title = $name;
        $this->original_language = $lang;
        $this->overview = $descr;
        $this->vote_average = $vote;
        $this->poster_path = $image;
        $this->release_date = $release;
        $this->genres = $genres;
    }

    public function getVote()
    {
        $vote = ceil($this->vote_average / 2);
        $template = "<p>";
        for ($i = 0; $i < 5; $i++) {
            $template .= $i <= $vote ? '<i class="fa-solid fa-star"></i>' : '<i class="fa-regular fa-star"></i>';
        }
        $template .= "</p>";
        return $template;
    }

    public function getGenres()
    {

        $genreArray = [];
        while (count($genreArray) < 2) {
            $randGenre = $this->genres[rand(0, count($this->genres) - 1)];
            if (!in_array($randGenre, $genreArray)) {
                array_push($genreArray, $randGenre);
            }
        }
        $template = "<h5>";
        foreach ($genreArray as $genre) {
            $template .= $genre->genre . "<br>";
        }
        $template .= "</h5>";
        return $template;
    }

    public function getFlags()
    {
        $acceptedLanguages = ['de', 'es', 'en', 'fr', 'it', 'ja'];
        if (!in_array($this->original_language, $acceptedLanguages)) {
            return "question.png";
        }
        return $this->original_language . ".png";
    }


    public function printCard()
    {

        $title = $this->title;
        $id = $this->id;
        $image = $this->poster_path;
        $descr = $this->overview;
        $vote = $this->getVote();
        $flag = $this->getFlags();
        $lang = $this->original_language;
        $release = $this->release_date;
        $printGenre = $this->getGenres();

        include __DIR__ . '/Views/cards.php';

    }


}

$getContent = file_get_contents(__DIR__ . '/Model/movie_db.json');
$movieList = json_decode($getContent, true);
$moviesDecoded = [];

foreach ($movieList as $movie) {
    $moviesDecoded[] = new Movie($movie['id'], $movie['title'], $movie['original_language'], $movie['overview'], $movie['vote_average'], $movie['poster_path'], $movie['release_date'], $genres);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</head>
<title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row gy-4">
            <?php foreach ($moviesDecoded as $movie) {
                $movie->printCard();
            } ?>
        </div>
    </div>
</body>

</html>