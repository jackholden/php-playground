<?php

// folder names to exclude from list
$blacklist = [
    'assets'
];

// get the directories
$fetch = glob('*', GLOB_ONLYDIR);
// compare arrays, return differences
$directories = array_diff($fetch, $blacklist);

?>
<!doctype html>
<html lang="en-GB">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Jackhelodeon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PHP Playground</title>
    <meta name="description" content="A meta description...">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="assets/all.css">
</head>
<body>

    <header>
        <h1>PHP Playground</h1>
        <h3>Just having some fun</h3>
    </header>

    <main>
        <section>
            <div class="example-area">
                <ul>
                <?php

                foreach ($directories as $directory)
                {
                    echo '<li><a href="' . $directory . '">' . $directory . '</a></li>';
                }

                ?>
                </ul>
            </div>
        </section>
    </main>

</body>
</html>