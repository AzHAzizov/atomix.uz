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
            Новости
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
            </tr>
            <?php foreach ($this->services as $data) : ?>
                <tr>
                    <td><?= $data->id ?></td>
                    <td><a href="/index.php?ctrl=Product&id=<?=$data->id?>"><?= $data->name ?></a></td>
                    <td><?= $data->type ?></td>
                </tr>
            <?php endforeach ?>
        </table>
        <hr />
    </div>
</body>

</html>