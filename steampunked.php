<?php
require __DIR__ . '/lib/steampunked.inc.php';
$view = new \Steampunked\SteamppunkedView($steampunked);
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Steampunked</title>
    <link href="steampunked.css" type="text/css" rel="stylesheet"/>
</head>
<body>
<?php echo $view->presentHeader(); ?>
<?php echo $view->presentGrid(); ?>
<?php echo $view->presentButtons(); ?>

</body>
</html>
