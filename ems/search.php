<?php
require_once "includes/config.php"; // Include your database connection code

$searchQuery = isset($_GET['query']) ? $_GET['query'] : '';

$sql = "SELECT * FROM equipment_profiles WHERE equipment_name LIKE :query OR equipment_description LIKE :query";
$query = $dbh->prepare($sql);
$query->bindValue(':query', '%' . $searchQuery . '%', PDO::PARAM_STR);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
</head>
<body>
    <h1>Search Results</h1>
    <?php foreach ($results as $result) : ?>
        <div>
            <h3><?php echo $result['equipment_name']; ?></h3>
            <p><?php echo $result['equipment_description']; ?></p>
            <!-- Add more fields as needed -->
        </div>
    <?php endforeach; ?>
</body>
</html>