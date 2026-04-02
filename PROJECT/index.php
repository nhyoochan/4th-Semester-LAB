<?php
session_start();
include 'db.php'; 


if(!isset($_SESSION['user_id'])){
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'] ?? 'User';

$sql_complaints = "CREATE TABLE IF NOT EXISTS complaints (
    id INT NOT NULL AUTO_INCREMENT,
    user_id INT NOT NULL,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    status VARCHAR(255) DEFAULT 'Pending' NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    FOREIGN KEY (user_id) REFERENCES userdata(id) ON DELETE CASCADE
)";

mysqli_query($conn, $sql_complaints);

$noti_sql_complaints = "CREATE TABLE IF NOT EXISTS notifications (
    id INT NOT NULL AUTO_INCREMENT,
    notified_user_id INT NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    FOREIGN KEY (notified_user_id) REFERENCES userdata(id) ON DELETE CASCADE
)";

mysqli_query($conn, $noti_sql_complaints);

$query = "SELECT * FROM complaints WHERE user_id = ? ORDER BY created_at DESC";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
?>


<html>
<head>
    <title>User Dashboard | Project</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header class="welcome-header-bar">
        <div class="header-content">
            <h1>Welcome</h1>
            <a href="notification.php">Notifications</a>
            <a href="logout.php" class="logout-btn">Logout</a>
        </div>
    </header>

    <main style="display: flex; flex-direction: column; align-items: center; min-height: 60vh;">
        <h2>Your Complaints</h2>
        <div style="width: 100%; max-width: 1100px;">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<tr>";
                            echo "<td>".htmlspecialchars($row['id'])."</td>";
                            echo "<td>".htmlspecialchars($row['title'])."</td>";
                            echo "<td>".htmlspecialchars($row['description'])."</td>";
                            echo "<td>".htmlspecialchars($row['status'])."</td>";
                            echo "<td>".htmlspecialchars($row['created_at'])."</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>No complaints found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>

    <!-- Floating Plus Button -->
    <a href="submit_complaint.php" class="floating-plus" title="Submit New Complaint" aria-label="Submit New Complaint">
        <span>+</span>
    </a>
</body>
</html>