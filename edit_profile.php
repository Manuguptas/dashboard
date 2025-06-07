<?php
session_start();
include "db.php";

if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION["user_id"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first = $_POST["first_name"];
    $last = $_POST["last_name"];
    $email = $_POST["email"];
    $phone = $_POST["phoneNumber"];
    $bio = $_POST["bio"];


    $sql = "UPDATE users SET first_name='$first', last_name='$last', email='$email' WHERE id=$user_id";

    if ($conn->query($sql)) {
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Error updating profile.";
    }
}

// Fetch current user info
$result = $conn->query("SELECT * FROM users WHERE id=$user_id");
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="card mx-auto shadow" style="max-width: 600px;">
            <div class="card-body">
                <h3 class="text-center mb-4">Edit Profile</h3>
                <form method="post">
                    <div class="mb-3">
                        <label class="form-label">First Name</label>
                        <input type="text" name="first_name" class="form-control" value="<?php echo $user['first_name']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Last Name</label>
                        <input type="text" name="last_name" class="form-control" value="<?php echo $user['last_name']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="<?php echo $user['email']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone Number</label>
                        <input type="text" name="phoneNumber" class="form-control" value="<?php echo $user['phoneNumber']; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Bio</label>
                        <textarea name="bio" class="form-control" rows="3"><?php echo $user['bio']; ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Save Changes</button>
                    <a href="dashboard.php" class="btn btn-link w-100 mt-2">Cancel</a>
                </form>

                <?php if (isset($error)) echo "<p class='text-danger mt-3'>$error</p>"; ?>
            </div>
        </div>
    </div>

</body>

</html>