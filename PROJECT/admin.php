<?php
session_start();
include 'db.php';

if(!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin'){
    header('Location: login.php');
    exit();
}

$query = "SELECT c.*, u.username AS user_name
          FROM complaints c
          JOIN userdata u ON c.user_id = u.id
          ORDER BY c.created_at DESC";
$stmt = mysqli_prepare($conn, $query);

if (!$stmt) {
    die("SQL Error: " . mysqli_error($conn));
}

mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
?>


<html>
<head>
    <title>Admin Portal | Project</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header class="welcome-header-bar">
        <div class="header-content">
            <h1>Admin Dashboard</h1>
            <a href="notification.php">Notifications</a>
            <a href="logout.php" class="logout-btn">Logout</a>
        </div>
    </header>

    <main style="display: flex; flex-direction: column; align-items: center; min-height: 60vh;">
        <h2>All Complaints</h2>
        <div style="width: 100%; max-width: 1100px;">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<tr>";
                            echo "<td>".htmlspecialchars($row['id'])."</td>";
                            echo "<td>".htmlspecialchars($row['user_name'])."</td>";
                            echo "<td>".htmlspecialchars($row['title'])."</td>";
                            echo "<td>".htmlspecialchars($row['description'])."</td>";
                            echo "<td>".htmlspecialchars($row['status'])."</td>";
                            echo "<td>
                                    <a href='verify.php?id=".urlencode($row['id'])."'>Verify</a> |
                                    <a href='reviewer.php?id=".urlencode($row['id'])."'>Send to Review</a>
                                  </td>";
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
</body>
</html>
