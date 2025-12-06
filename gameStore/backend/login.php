<?php
require __DIR__ . '/../config.php';
header('Content-Type: application/json');
session_start();

// Validate CSRF token
if(!verify_csrf_token($_POST['csrf_token'] ?? '')){
    echo json_encode(['success'=>false, 'message'=>'Invalid request']);
    exit;
}

$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

if(!$email || !$password){
    echo json_encode(['success'=>false, 'message'=>'Email and password are required']);
    exit;
}

if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo json_encode(['success'=>false, 'message'=>'Invalid email']);
    exit;
}

$res = pg_query_params($conn, "SELECT id, password FROM users WHERE email=$1", [$email]);
$user = pg_fetch_assoc($res);

if($user && password_verify($password, $user['password'])){
    session_regenerate_id(true);
    $_SESSION['user_id'] = $user['id'];
    echo json_encode(['success'=>true]);
    exit;
} else {
    echo json_encode(['success'=>false, 'message'=>'Invalid credentials']);
    exit;
}
?>
