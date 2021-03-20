<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php2</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>
            <?= $this->article->title ?>
        </h1>

        <?php 
        
        ?>

        <form method="POST" action="/index.php?ctrl=Admin&id=<?= $this->article->id ?>">
            <input type="text" name="title" placeholder="Enter title" value="<?= $this->article->title ?>">
            <input type="text" name="text"placeholder="Enter text" value="<?= $this->article->text ?>">
            <input type="text" name="author_id"placeholder="Enter Author name" value="<?= $this->article->author_id ?>">
            <input type="hidden" name="id" value="<?= $this->article->id ?>">
            <button type="submit">Submit</button>
        </form>
    </div>
</body>

</html>