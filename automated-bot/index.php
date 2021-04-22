<?php

require("src/init.php");

?>
<!doctype html>
<html lang="en-GB">
<head>
    <meta charset="utf-8">
    <meta name="author" content="Jackhelodeon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Automated Bot Experiment</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="../assets/all.css">
</head>
<body>

    <header>
        <h1>Automated Bot Experiment</h1>
        <h3>Implements basic automated response functionality from a class interpreting tone and topic.</h3>
        <small>Cool addition could be automatic topics, no select input - knows what topic you are after</small>
    </header>

    <main>
        <section>
            <div class="example-area">
                <form method="post" action="">
                    <label for="question">Enter your question:</label>
                    <input type="text" id="question" name="question">

                    <br>

                    <label for="topics">Select a topic:</label>
                    <select id="topics" name="topics">
                        <?php

                        foreach ($topics as $topic => $responses) {
                            echo "<option value=\"$topic\">" . ucwords($topic) . "</option>";
                        }

                        ?>
                    </select>

                    <br>

                    <button type="submit">Send</button>
                </form>

                <br>

                <?php
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    echo '<div class="bg-green">';
                    echo "<p><b>Bot says:</b> $response</p>";
                    echo '</div>';
                } ?>

            </div>

            <br>

            <div class="example-area">
                <h3>Trigger Questions</h3>
                <h4>Greetings:</h4>
                <h5>Input</h5>
                <pre>
                    Hi
                    Hello
                    Greetings
                </pre>
                <h5>Output</h5>
                <pre>
                    Hi there :)
                </pre>
                <h4>Asking Questions:</h4>
                <h5>Input</h5>
                <pre>
                    How do I get rid of a cough?
                    Is it possible to get rid of a headache
                    What's the weather today?
                </pre>
                <h5>Output</h5>
                <pre>
                    You might have covid, please order a test and stay home
                    Make sure you drink plenty of water.. for more info visit nhs.uk
                    I don't know how to answer that just yet :/
                </pre>
                <h4>Yell Asking Questions:</h4>
                <h5>Input</h5>
                <pre>
                    HOW DO I FIX A COUGH?
                </pre>
                <h5>Output</h5>
                <pre>
                    No need to yell! You might have covid, please order a test and stay home
                </pre>
                <h4>Rude Comment:</h4>
                <h5>Input</h5>
                <pre>
                    Useless idiot!
                    Crap bot
                </pre>
                <h5>Output</h5>
                <pre>
                    There's no need for that
                    I have feelings ya know :(
                </pre>
                <h4>Bye:</h4>
                <h5>Input</h5>
                <pre>
                    Bye
                    Goodbye
                    Cya
                </pre>
                <h5>Output</h5>
                <pre>
                    Thanks for getting in touch
                </pre>
            </div>
        </section>
    </main>

</body>
</html>