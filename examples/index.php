<?php
$links = [
    [
        'url' => 'example1.php',
    ],
    [
        'url' => 'example2.php',
    ],
];
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Examples</title>
</head>

<body>
    <ul>
        <?php foreach ($links as $l) : ?>
            <li>
                <a href="<?php echo $l['url']; ?>"><?php echo $l['url']; ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>

</html>