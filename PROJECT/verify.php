<?php
    include 'db.php';
    session_start();

    if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
        header('Location: login.php');
        exit();
    }

    $query = "UPDATE complaints SET status='Verified' WHERE id=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $_GET['id']);
    $stmt->execute();
    $stmt->close();

    $select = "SELECT * FROM complaints WHERE id = " . mysqli_real_escape_string($conn, $_GET['id']) . " LIMIT 1";
    $result = $conn->query($select);
    $complaint = $result->fetch_assoc();
    $notifiedUserId = $complaint['user_id'];
    $title = $complaint['title'];
    $query = "INSERT INTO notifications (notified_user_id, message) VALUES ($notifiedUserId, 'Your complaint: $title has been verified.')";
    $conn->query($query);
    header("Location: admin.php");
    exit();
?>