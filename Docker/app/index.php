<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Docker Compose Web Environment</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background: #f5f5f5; }
        .card { background: #fff; border-radius: 8px; padding: 20px; margin-bottom: 20px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        h1 { color: #333; }
        h2 { color: #666; border-bottom: 1px solid #eee; padding-bottom: 8px; }
        .ok { color: green; font-weight: bold; }
        .err { color: red; font-weight: bold; }
        pre { background: #f8f8f8; padding: 10px; border-radius: 4px; overflow-x: auto; }
    </style>
</head>
<body>
    <h1>Docker Compose Self-Contained Template</h1>
    <p>University Assignment - Web Development Environment</p>

    <div class="card">
        <h2>PHP Information</h2>
        <p><strong>PHP Version:</strong> <?= phpversion() ?></p>
        <p><strong>Current Date:</strong> <?= date('Y-m-d H:i:s') ?></p>
        <p><strong>Timezone:</strong> <?= date_default_timezone_get() ?></p>
    </div>

    <div class="card">
        <h2>MySQL Connection</h2>
        <?php
        try {
            $pdo = new PDO('mysql:host=mysql;dbname=app;charset=utf8mb4', 'user', 'secret');
            echo '<p class="ok">Connected successfully</p>';
            $stmt = $pdo->query('SELECT VERSION() AS ver');
            $row = $stmt->fetch();
            echo '<p><strong>MySQL Version:</strong> ' . $row['ver'] . '</p>';
        } catch (PDOException $e) {
            echo '<p class="err">Connection failed: ' . $e->getMessage() . '</p>';
        }
        ?>
    </div>

    <div class="card">
        <h2>Redis Connection</h2>
        <?php
        try {
            $redis = new Redis();
            $redis->connect('redis', 6379);
            $redis->set('test_key', 'Hello from Redis!');
            echo '<p class="ok">Connected successfully</p>';
            echo '<p><strong>Redis Test:</strong> ' . $redis->get('test_key') . '</p>';
            $redis->del('test_key');
        } catch (Exception $e) {
            echo '<p class="err">Connection failed: ' . $e->getMessage() . '</p>';
        }
        ?>
    </div>

    <div class="card">
        <h2>Services</h2>
        <ul>
            <li><strong>Web Server:</strong> Nginx</li>
            <li><strong>Application Server:</strong> PHP 8.2 (Devilbox PHP-FPM)</li>
            <li><strong>Database:</strong> MySQL 8.0</li>
            <li><strong>Database Management:</strong> phpMyAdmin (<a href="http://localhost:8080">http://localhost:8080</a>)</li>
            <li><strong>Cache:</strong> Redis</li>
            <li><strong>Email Testing:</strong> Mailhog (<a href="http://localhost:8025">http://localhost:8025</a>)</li>
            <li><strong>Workspace:</strong> Development tools (Git, Composer, Node, npm)</li>
        </ul>
    </div>
</body>
</html>
