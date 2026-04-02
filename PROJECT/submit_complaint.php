<?php
    include 'db.php';
    session_start();

    if (!isset($_SESSION['user_id'])) {
        header('Location: login.php');
        exit();
    }
    
    $user_id = $_SESSION['user_id'];
    $title = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';


    if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($title) && !empty($description)) {
        $stmt = $conn->prepare("INSERT INTO complaints (user_id, title, description) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $user_id, $title, $description);
        $stmt->execute();
        $stmt->close();

        $select = "SELECT * FROM complaints WHERE id = " . $conn->insert_id . " LIMIT 1";
        $result = $conn->query($select);
        $complaint = $result->fetch_assoc();

        $adminSelect = "SELECT * FROM userdata WHERE roles = 'admin'";
        $adminResult = $conn->query($adminSelect);

        while ($row = mysqli_fetch_assoc($adminResult)) {
            $adminId = $row['id'];
            $title = $complaint['title'];
            $query = "INSERT INTO notifications (notified_user_id, message) VALUES ($adminId, 'A complaint: $title has been sent.')";
            $conn->query($query);
        }


        header('Location: index.php');
        exit();
    }
?>

<html>
    <head>
        <title>Submit Complaint | Project</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <h1>Submit a Complaint</h1>
        <form method="POST" action="submit_complaint.php">
            <label for="title">Title:</label><br>
            <input type="text" id="title" name="title" required><br><br>
            <label for="description">Description:</label><br>
            <textarea id="description" name="description" rows="4" cols="50" required></textarea><br><br>
            <input type="submit" value="Submit Complaint">
        </form>
    </body>
</html>