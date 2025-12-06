<?php
require __DIR__ . '/../config.php';
header('Content-Type: application/json');
session_start();

// Validate CSRF token
if(!verify_csrf_token($_POST['csrf_token'] ?? '')){
    echo json_encode(['success'=>false, 'message'=>'Invalid request']);
    exit;
}

$username = trim($_POST['username'] ?? '');
$email = trim($_POST['email'] ?? '');
$raw_password = $_POST['password'] ?? '';

if(!$username || !$email || !$raw_password){
    echo json_encode(['success'=>false, 'message'=>'All fields are required']);
    exit;
}

if(strlen($username) < 3 || strlen($username) > 50){
    echo json_encode(['success'=>false, 'message'=>'Username must be 3-50 characters']);
    exit;
}

if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo json_encode(['success'=>false, 'message'=>'Invalid email address']);
    exit;
}

if(strlen($raw_password) < 8){
    echo json_encode(['success'=>false, 'message'=>'Password must be at least 8 characters']);
    exit;
}

$password = password_hash($raw_password, PASSWORD_DEFAULT);

// Check for existing user
$res = pg_query_params($conn, "SELECT id FROM users WHERE email=$1", [$email]);
if(pg_fetch_assoc($res)){
    echo json_encode(['success'=>false, 'message'=>'Email already exists']);
    exit;
}

// Insert new user
$result = pg_query_params($conn, "INSERT INTO users (username, email, password) VALUES ($1,$2,$3)", [$username,$email,$password]);

if($result){
    // Auto-login after registration
    $user_res = pg_query_params($conn, "SELECT id FROM users WHERE email=$1", [$email]);
    $user = pg_fetch_assoc($user_res);
    if($user){
        session_regenerate_id(true);
        $_SESSION['user_id'] = $user['id'];
        echo json_encode(['success'=>true, 'message'=>'Account created and logged in']);
        exit;
    }
} else {
    echo json_encode(['success'=>false, 'message'=>'Registration failed']);
    exit;
}
?>
