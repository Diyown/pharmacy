<?php
// Include database connection file
include 'connector.php';

if (!isset($_SESSION['idno'])) {
    header("Location: login.php");
    exit();
}

$userId = $_SESSION['idno'];

// Query to fetch order history for the logged-in user
$sql = "SELECT id, medicine_name, quantity, total_price, created_at 
        FROM orders 
        WHERE user_id = $userId
        ORDER BY created_at DESC";

// Execute the query
$result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Order History</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Medicine Name</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Date Ordered</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Check if there are orders
                if ($result && mysqli_num_rows($result) > 0) {
                    // Output data of each row
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td><?php echo $row["id"]; ?></td>
                            <td><?php echo $row["medicine_name"]; ?></td>
                            <td><?php echo $row["quantity"]; ?></td>
                            <td>$<?php echo number_format($row["total_price"], 2); ?></td>
                            <td><?php echo $row["created_at"]; ?></td>
                        </tr>
                        <?php
                    }
                } else {
                    echo "<tr><td colspan='5'>No orders found.</td></tr>";
                }

                // Close database connection
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
