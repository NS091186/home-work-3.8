<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dsn = "mysql:host=localhost;dbname=hm3.8";
    $username = "root";
    $password = "";
    try {
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
        $order_id = $_POST['order_id'];
        $cancel_reason = $_POST['cancel_reason'];
        $sql = "INSERT INTO cancellations (order_id, reason) VALUES (:order_id, :cancel_reason)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['order_id' => $order_id, 'cancel_reason' => $cancel_reason]);
        echo "Запись добавлена!";
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
 }
?>
