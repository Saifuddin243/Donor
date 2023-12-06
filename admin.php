<!-- admin-panel.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="adminPanel.css">
</head>
<body>
    <div class="admin-container">
        <h1>Admin Panel</h1>
        <?php
        try {
            // Database connection
            $db = new PDO('mysql:host=localhost;dbname=donorInfo', 'root', '');
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Handle delete action
            if (isset($_POST['delete_id'])) {
                $deleteId = $_POST['delete_id'];
                $deleteQuery = "DELETE FROM donorDetails WHERE id = :id";
                $deleteStmt = $db->prepare($deleteQuery);
                $deleteStmt->bindParam(':id', $deleteId, PDO::PARAM_INT);
                $deleteStmt->execute();
            }

            // Fetch all records from the database
            $query = "SELECT * FROM donorDetails";
            $stmt = $db->query($query);
            $records = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($records) {
                echo "<div class='table-container'>";
                echo "<table>";
                echo "<tr>";
                foreach ($records[0] as $columnName => $value) {
                    echo "<th>" . htmlspecialchars($columnName) . "</th>";
                }
                echo "<th>Action</th></tr>";

                foreach ($records as $record) {
                    echo "<tr>";
                    foreach ($record as $value) {
                        echo "<td>" . htmlspecialchars($value) . "</td>";
                    }
                    echo "<td>";
                    echo "<form method='post' style='display:inline;'>";
                    echo "<input type='hidden' name='delete_id' value='" . $record['id'] . "'>";
                    echo "<button class='delete-button' type='submit'>Delete</button>";
                    echo "</form>";
                    echo "<button class='edit-button' onclick='editRecord(" . $record['id'] . ")'>Edit</button>";
                    echo "</td>";
                    echo "</tr>";
                }
                echo "</table>";
                echo "</div>";
            } else {
                echo "<p>No records found.</p>";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        ?>
    </div>

    <script>
        function editRecord(id) {
            alert("Edit record with ID: " + id);
            // Add your logic for editing a record (e.g., redirect to an edit page)
        }
    </script>
</body>
</html>










