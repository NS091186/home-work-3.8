<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dsn = "mysql:host=localhost;dbname=hm3.8";
    $username = "root";
    $password = "";
    try {
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
        $name = $_POST['name'];
        $review = $_POST['review'];
        $rating = (int) $_POST['rating'];
        $sql = "INSERT INTO reviews (name, review, rating) VALUES (:name, :review, :rating)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['name' => $name, 'review' => $review, 'rating' => $rating]);
        echo "Отзыв добавлен!";
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
 }
?>
