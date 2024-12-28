<?php
session_start(); // Start session to check login status

// Include database connection
include 'connect.php';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the submitted values
    $username = isset($_POST['username']) ? trim($_POST['username']) : null;
    $new_password = isset($_POST['password']) ? trim($_POST['password']) : null;
    $confirm_password = isset($_POST['confirm_password']) ? trim($_POST['confirm_password']) : null;

    // Validate inputs
    if (empty($username) || empty($new_password) || empty($confirm_password)) {
        echo "<script>
                alert('All fields are required!');
                window.history.back();
              </script>";
        exit;
    }

    // Check if the passwords match
    if ($new_password !== $confirm_password) {
        echo "<script>
                alert('Passwords do not match!');
                window.history.back();
              </script>";
        exit;
    }

    // Check if the username exists in the database
    $checkUsernameQuery = "SELECT * FROM users WHERE username = ?";
    $stmt = $con->prepare($checkUsernameQuery);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Username found, proceed with password update
        $updatePasswordQuery = "UPDATE users SET password = ? WHERE username = ?";
        $update_stmt = $con->prepare($updatePasswordQuery);
        $update_stmt->bind_param("ss", $new_password, $username);

        if ($update_stmt->execute()) {
            echo "<script>
                    alert('Password successfully changed!');
                    window.location.href = 'login.php'; // Redirect to login page after successful password change
                  </script>";
        } else {
            echo "Error updating password: " . $con>error;
        }
    } else {
        echo "<script>
                alert('Username not found!');
                window.history.back();
              </script>";
    }

    // Close statements and connection
    $stmt->close();
    if (isset($update_stmt)) {
        $update_stmt->close();
    }
}

$con->close();
?>
