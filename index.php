<?php
class Movie
{
    private int $id;
    private string $title;

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->title = $name;
    }

    public function printCard()
    {

        $title = $this->title;
        $id = $this->id;
        include __DIR__ . '/cards.php';

    }


}

$firstMovie = new Movie(1, 'Hello World');
$secondMovie = new Movie(2, "Ciao Mondo");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <?php $firstMovie->printCard() ?>
    </div>
    <div>
        <?php $secondMovie->printCard() ?>
    </div>
</body>

</html>