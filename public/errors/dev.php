<!DOCTYPE html>

<html>
    <head>
        <title>Ошибка</title>
        <meta charset="UTF-8">

    </head>
    <body>
        <h1>Произошла ошибка</h1>
        <p><b>Код ошибки: </b><?= $errno ?></p>
        <p><b>Текст ошибки: </b><?= $errstr ?></p>
        <p><b>Файл, в котором произошла ошибка: </b><?= $errfile ?></p>
        <p><b>Строка, в которой произошла ошибка: </b><?= $errline ?></p>



    </body>
</html>
