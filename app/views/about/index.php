<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<h1>Hi it is working from about/about
    <?php foreach ($data['posts'] as $post):?>
    <h3><?php echo $post->title ?></h3>
    <?php endforeach; ?>
</h1>

</body>
</html>
