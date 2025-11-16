<?php
// SPARK Platform - Main Entry Point
session_start();

// Check if user is logged in and redirect accordingly
if (isset($_SESSION['user_id'])) {
    if ($_SESSION['role'] === 'admin') {
        header('Location: admin/');
    } else {
        header('Location: student/');
    }
    exit();
}

// Redirect to student home page by default
header('Location: student/');
?>