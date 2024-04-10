<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A & W Menu</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>A & W Menu</h1>
        <table>
            <thead>
                <tr>
                    <th>Order</th>
                    <th>About</th>
                    <th>Ammount</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Connect to database
                $db_host = 'localhost';
                $db_user = 'root';
                $db_pass = '';
                $db_name = 'mcdonalds_menu';

                $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Query database
                $sql = "SELECT * FROM menu_items";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr><td>" . $row['item'] . "</td><td>" . $row['description'] . "</td><td>$" . $row['price'] . "</td></tr>";
                    }
                } else {
                    echo "0 results";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
