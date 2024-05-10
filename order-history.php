<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order History</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<style>
	ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
        }

        li {
            float: none;
            display: inline-block;
        }

        li a {
            display: inline-block;
            color: white;
            text-align: left;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover {
            background-color: #111;
        }

        .search-container {
            text-align: center;
            margin-top: 50px;
        }

        .search-container input[type=text] {
            width: 70%;
            padding: 12px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
        }

        .search-container button {
            width: 20%;
            padding: 12px;
            margin: 8px 0;
            box-sizing: border-box;
            border: none;
            background-color: #007bff;
            color: white;
            border-radius: 4px;
            cursor: pointer;
        }

        .search-container button:hover {
            background-color: #0056b3;
        }
        body {
			margin: 0;
			font-family: Arial, sans-serif;
		}
/*==========NAVIGATION SIDE BAR=============*/
		.sidebar {
			height: 100%;
			width: 300px;
			position: fixed;
			top: 0;
			left: 0;
			background-color: #333;
			padding-top: 20px;
		}

		.sidebar a {
			padding: 10px 15px;
			text-decoration: none;
			font-size: 18px;
			color: #fff;
			display: block;
		}

		.sidebar a:hover {
			background-color: #555;
		}

		.content {
			margin-left: 200px;
			padding: 20px;
		}
		.sidebar h2 {
			color: #fff; 
			font-family: "Arial Black", sans-serif; 
			font-size: 24px; 
			text-align: left; 
			margin-bottom: 20px; 
			margin-left: 20px;
		}
/*===========CONTENT=============*/
		.content {
			display: flex;
			justify-content: center;
			align-items: center;
			height: 100vh; 
		}
		.wrapper{
			width: 1000px;
			height: 400px;
			padding: 15px;
			background-color: #ede9e8;
			box-shadow: 10px 15px 10px grey;
			border-radius: 10px;
			
		}
		.wrapper h2{
			font-weight: bold;
		}
		.wrapper p{
			font-size: 20px;
			
		}
</style>
<body>
<ul>
        <li><a href="admin.php">Admin Dashboard</a></li>
        <div class="right" style="float: right;">
            
            <li>&nbsp;&nbsp;</li>
        </div>    
    </ul>
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
                // Include database connection file
                include 'connector.php';

                // Query to fetch order history
                $sql = "SELECT * FROM orders ORDER BY created_at DESC";
                $result = mysqli_query($conn, $sql);

                // Check if there are orders
                if (mysqli_num_rows($result) > 0) {
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
