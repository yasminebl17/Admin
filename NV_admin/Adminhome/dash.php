<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
   
    <?php
    // Include the config.php file
    include("config.php");

    // SQL query to fetch user type statistics
    $query = "SELECT type_de_compte, COUNT(*) as count FROM userss GROUP BY type_de_compte";
    $result = mysqli_query($con, $query);

    // Fetch data and initialize chart data array
    $chartData = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $chartData[] = [
            'type_de_compte' => $row['type_de_compte'],
            'count' => $row['count']
        ];
    }
    ?>

    <canvas id="userTypeChart"></canvas>

    <script>
    // Get the chart canvas element
    const ctx = document.getElementById('userTypeChart').getContext('2d');

    // Create the chart using the chart data
    const userTypeChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode(array_column($chartData, 'type_de_compte')); ?>,
            datasets: [{
                label: 'User Type Statistics',
                data: <?php echo json_encode(array_column($chartData, 'count')); ?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    </script>
</body>
</html>