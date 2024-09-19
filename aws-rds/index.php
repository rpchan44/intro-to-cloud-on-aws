<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAMPF Philippines</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h1>CAMPF member data file</h1>

<table>
    <thead>
        <tr>
            <th>Batch</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Registration Date</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $host = 'enrollment.c3gqiqci8wst.ap-southeast-1.rds.amazonaws.com'; // e.g., 'mydb.123456789012.us-east-1.rds.amazonaws.com'
        $dbname = 'enrollment';
        $username = 'admin';
        $password = 'ultimateavatar';
        print "RDS Endpoint - $host";

        try {
            // Create a new PDO instance
            $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
            $pdo = new PDO($dsn, $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Prepare the SQL statement
            $stmt = $pdo->prepare("SELECT id, firstname, lastname, regyear, section FROM registration");

            // Execute the statement
            $stmt->execute();

            // Fetch data as an associative array
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Loop through the results and output them
            foreach ($results as $row) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['section']) . "</td>";
                echo "<td>" . htmlspecialchars($row['firstname']) . "</td>";
                echo "<td>" . htmlspecialchars($row['lastname']) . "</td>";
                echo "<td>" . htmlspecialchars($row['regyear']) . "</td>";
                echo "</tr>";
            }
        } catch (PDOException $e) {
            // Handle connection error
            echo "<tr><td colspan='5'>Connection failed: " . htmlspecialchars($e->getMessage()) . "</td></tr>";
        }

        // Close the connection (optional, PDO closes automatically at the end of the script)
        $pdo = null;
        ?>
    </tbody>
</table>

</body>
</html>