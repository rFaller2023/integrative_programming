<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../public/assets/css/dashboard.css">
</head>
<body>
    <header>
        <h1>Dashboard</h1>
    </header>
    <main>
        <section class="widget">
            <h2>Total Posts</h2>
            <?php
            // Simulated data - Replace with actual logic to fetch post count
            $totalPosts = 100; // Example total post count
            ?>
            <p><?php echo $totalPosts; ?></p>
        </section>
        <section class="widget">
            <h2>Total Users</h2>
            <?php
            // Simulated data - Replace with actual logic to fetch user count
            $totalUsers = 50; // Example total user count
            ?>
            <p><?php echo $totalUsers; ?></p>
        </section>
        <!-- Add more widget sections as needed -->
    </main>
</body>
</html>
