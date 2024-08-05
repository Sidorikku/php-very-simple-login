<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
    include "db_conn.php";

    // Fetch user's current information from the database
    $user_id = $_SESSION['id'];
    $sql = "SELECT * FROM users WHERE id=$user_id";
    $result = mysqli_query($con, $sql);
    $user = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
    <link rel="stylesheet" type="text/css" href="styling.css">
</head>
<body>
    <h2>Edit Profile</h2>
    <form action="update-profile.php" method="post">
        <label>Full Name</label>
        <input type="text" name="name" value="<?php echo $user['name']; ?>"><br>
        
        <label>Username</label>
        <input type="text" name="uname" value="<?php echo $user['user_name']; ?>"><br>
        
        <label>Email</label>
        <input type="email" name="email" value="<?php echo $user['email']; ?>"><br>
        
        <label>Birthday</label>
        <input type="date" name="bday" value="<?php echo $user['birthday']; ?>"><br>
        
        <!-- Add more fields as needed -->
        
        <button type="submit">Update Profile</button>
    </form>
</body>
</html>

<?php 
} else {
     header("Location: index.php");
     exit();
}
 ?>
