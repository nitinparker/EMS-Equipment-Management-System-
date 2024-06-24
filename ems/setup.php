<?php
session_start();
include('includes/config.php');

// Check if the user has already accepted the terms and conditions
if (isset($_SESSION['accepted_terms']) && $_SESSION['accepted_terms'] === true) {
    // Redirect to the main application or dashboard if terms are already accepted
    header('Location: dashboard.php');
    exit();
}

// If the user has accepted the terms but has not set the software name yet
if (isset($_POST['accept_terms']) && isset($_POST['software_name'])) {
    // User accepted the terms and set the software name, store this information in the session
    $_SESSION['accepted_terms'] = true;
    $_SESSION['software_name'] = $_POST['software_name'];

    // Save software name to the database
    $softwareName = $_POST['software_name'];
    $sql = "INSERT INTO tblsoftware_setup (software_name, accepted_terms) VALUES (:softwareName, 1)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':softwareName', $softwareName, PDO::PARAM_STR);
    $query->execute();

    // Redirect to the main application or dashboard
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Software Setup</title>
</head>
<body>
    <h1>Software Setup</h1>
    <p>Welcome to the software setup. Please read and accept the terms and conditions below:</p>
    <form method="post">
        <input type="checkbox" name="accept_terms" value="1" required>
        <label for="accept_terms">I accept the terms and conditions</label><br>
        <label for="software_name">Enter the software name:</label><br>
        <input type="text" name="software_name" required><br>
        <button type="submit">Continue</button>
    </form>
</body>
</html>
