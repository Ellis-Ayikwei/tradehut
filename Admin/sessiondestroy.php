<?php
// Start or resume the session
session_start();

// Destroy the session
session_destroy();

// Send a response (alert and redirect)
echo "<script>alert('Session destroyed'); window.location.href='variatis.php';</script>";
