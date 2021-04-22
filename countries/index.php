<?php

require("src/init.php");

?>
<!doctype html>
<html lang="en-GB">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Jackhelodeon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>All + Popular Countries Json/Array Experiment</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="../assets/all.css">
</head>
<body>

    <header>
        <h1>Countries Experiment</h1>
        <h3>Showcases basic extraction from data file to form element</h3>
    </header>

    <main>
        <section>
            <div class="example-area">
                <label for="country">Select a country:</label>
                <select id="country" name="country">
                    <optgroup label="Popular Countries">
                        <?php foreach($getCountries['popular'] as $country) : ?><option value="<?php echo $country['code']; ?>"><?php echo $country['country']; ?></option><?php endforeach; ?>
                    </optgroup>
                    <optgroup label="All Countries">
                        <?php foreach($getCountries['all'] as $country) : ?><option value="<?php echo $country['code']; ?>"><?php echo $country['country']; ?></option><?php endforeach; ?>
                    </optgroup>
                </select>

                <br>

                <small><a href="src/data/countries.json">JSON data</a></small>
            </div>
        </section>

        <br>

        <section>
            <div class="example-area">
                <h4>JSON: Add a country to popular list</h4>
                <pre>
                  "popular":[
                    {
                      "code":"GB",
                      "country":"United Kingdom"
                    },
                    {
                      "code":"AU",
                      "country":"Australia"
                    },
                    ......
                    ..........
                    ..............
                    {
                      "code":"US",
                      "country":"United States"
                    },
                  ],
                </pre>
            </div>
            <hr>
            <div class="example-area">
                <h4>PHP: Add a country to popular list</h4>
                <pre>
                    'popular' => [
                        [
                            'code' => 'GB',
                            'country' => 'United Kingdom',
                        ],
                        [
                            'code' => 'AU',
                            'country' => 'Australia',
                        ],
                        [
                            'code' => 'CA',
                            'country' => 'Canada',
                        ],
                        [
                            'code' => 'NZ',
                            'country' => 'New Zealand',
                        ],
                        ......
                        ..........
                        ..............
                        [
                            'code' => 'US',
                            'country' => 'United States',
                        ],
                    ],
                </pre>
            </div>
        </section>
    </main>

</body>
</html>