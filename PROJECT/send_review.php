<?php
    include 'db.php';
    session_start();

    if (!isset($_SESSION['user_id'])) {
        header('Location: login.php');
        exit();
    }

    $complaint_id = $_GET['id'] ?? '';
    $user_id = $_SESSION['user_id'];

    // Verify the complaint belongs to the user
    $verify_query = "SELECT id FROM complaints WHERE id = ? AND user_id = ?";
    $verify_stmt = $conn->prepare($verify_query);
    $verify_stmt->bind_param("ii", $complaint_id, $user_id);
    $verify_stmt->execute();
    $verify_result = $verify_stmt->get_result();

    if ($verify_result->num_rows > 0) {
        // Update status to "Sent to Review"
        $query = "UPDATE complaints SET status='Sent to Review' WHERE id = ? AND user_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ii", $complaint_id, $user_id);
        $stmt->execute();
        $stmt->close();
    }

    $verify_stmt->close();
    header("Location: index.php");
    exit();
?>
