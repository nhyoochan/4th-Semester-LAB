<?php
session_start();
include 'db.php'; 


if(!isset($_SESSION['user_id'])){
    header('Location: login.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$user_name = $_SESSION['user_name'] ?? 'User';

$sql = "SELECT * FROM notifications WHERE notified_user_id = " . $user_id . " ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

?>


<html>
<head>
    <title>Notifications | Project</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header class="welcome-header-bar">
        <div class="header-content">
            <h1>Welcome</h1>
            <a href="logout.php" class="logout-btn">Logout</a>
        </div>
    </header>

    <main style="display: flex; flex-direction: column; align-items: center; min-height: 60vh;">
        <h2>Your Notifications</h2>
        <div style="width: 100%; max-width: 1100px;">
            <table>
                <thead>
                    <tr>
                        <th>Message</th>
                        <th>Notified At</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<tr>";
                            echo "<td>".htmlspecialchars($row['message'])."</td>";
                            echo "<td>".htmlspecialchars($row['created_at'])."</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='6'>No notifications found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>