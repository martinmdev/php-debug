<?php
$files = scandir(__DIR__);

$links = [];
foreach ($files as $f) {
    if (strpos($f, 'example') === 0) {
        $links[] = $f;
    }
}

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
                <a href="<?php echo $l; ?>"><?php echo $l; ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>

</html>