<?php
$quotes_json = file_get_contents('./quotes.json');
$quotes_decoded = json_decode($quotes_json , true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Generate Random Quote</title>
</head>
<body>
    <div class="quote_container">
        <div class="quote">
            <?php
            if (isset($_GET['a'])){
                if ($_GET['a'] == 'generate') {
                    $rand_quote = $quotes_decoded[rand(0, count($quotes_decoded) - 1)];
                    echo "<h1><span>&#8220</span>$rand_quote[quote]<span>&#8221</span></h1>";
                    echo "<br>";
                    echo "<h2><span>Quote By:</span> $rand_quote[quote_by]</h2>";
                } 
            } else {
                $total_quotes = count($quotes_decoded);
                echo "<h1>Generate Random Quote</h1>";
                echo "<h2><span>Total Quotes:</span>$total_quotes</h2>";
            }
            ?>
        </div>
        <form action="" method="get">
            <button name="a" value="generate" type="submit">Generate</button>
        </form>
    </div>
</body>
</html>