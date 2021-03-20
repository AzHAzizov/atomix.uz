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
            
        </h1>
        <table class="table table-striped table-hover">
            <tr>
                <th>
                    ID
                </th>
                <th>
                    Заголовок
                </th>
                <th>
                    Текст
                </th>
                <th>
                    Имя Автора
                </th>
                <th>
                    Редактировать
                </th>
            </tr>
            <?php foreach ($this->news as $new) : ?>
                <tr>
                    <td><?= $new->id ?></td>
                    <td><?= $new->title ?></a></td>
                    <td><?= $new->text ?></td>
                    <td><?= $new->author_id ?></td>
                    <td><a href="/index.php?ctrl=Admin&id=<?= $new->id ?>"><?= $new->title ?></a></td>
                </tr>
            <?php endforeach ?>
        </table>
        <hr />
    </div>
</body>

</html>