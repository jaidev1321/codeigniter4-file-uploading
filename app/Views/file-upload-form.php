<!DOCTYPE html>
<html lang="en">

<head>
    <title>Upload Form</title>
</head>

<body>

    <p>
        <?php foreach ($errors as $error) : ?>
            <li>
                <?= esc($error) ?>
            </li>
        <?php endforeach ?>
    </p>

    File is required:
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="userfile" size="20">
        <br><br>
        <input type="submit" value="upload">
    </form>

    <hr>



</body>

</html>