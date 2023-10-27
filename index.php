<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Är det fredag?</title>
</head>
<body>
    <h1>Är det fredag?</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="datum">Välj ett datum:</label>
        <input type="date" id="datum" name="datum" required>
        <input type="submit" value="Skicka">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $inputDate = $_POST['datum'];
        
        $timestamp = strtotime($inputDate);
        $dayOfWeek = date('w', $timestamp);
        $daysUntilFriday = ($dayOfWeek <= 5) ? (5 - $dayOfWeek) : (5 + (7 - $dayOfWeek));

        if ($daysUntilFriday === 0) {
            echo "<h2>Det är fredag!</h2>";
            echo '<img src="fredag.gif" alt="Fredag">';
        } else {
            echo "<h2>Det är inte fredag än</h2>";
            echo "<p>Det är $daysUntilFriday dag(ar) kvar till fredag.</p>";
        }
    }
    ?>
</body>
</html>

<!--
    https://www.w3schools.com/php/php_form_validation.asp
-->