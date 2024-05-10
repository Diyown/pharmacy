<?php
// Include database connection file
include 'connector.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $medicine_name = $_POST['medicine_name'];
    $quantity = $_POST['quantity'];

    // Check if the medicine exists and if there is enough quantity available
    $sql = "SELECT * FROM medicine WHERE medicine_name = '$medicine_name'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($row['quantity'] >= $quantity) {
            // Calculate total price
            $total_price = $row['price'] * $quantity;

            // Update medicine quantity
            $new_quantity = $row['quantity'] - $quantity;
            $update_sql = "UPDATE medicine SET quantity = $new_quantity WHERE medicine_name = '$medicine_name'";
            if (mysqli_query($conn, $update_sql)) {
                // Insert order into database
                $insert_sql = "INSERT INTO orders (medicine_name, quantity, total_price) VALUES ('$medicine_name', $quantity, $total_price)";
                if (mysqli_query($conn, $insert_sql)) {
                    echo "Order placed successfully!";
                } else {
                    echo "Error: " . $insert_sql . "<br>" . mysqli_error($conn);
                }
            } else {
                echo "Error: " . $update_sql . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "Not enough quantity available for this medicine!";
        }
    } else {
        echo "Medicine not found!";
    }
}
// Close database connection
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Place Order</title>
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
        <li><a href="homepage.php">User Dashboard</a></li>
        <div class="right" style="float: right;">
            
            <li>&nbsp;&nbsp;</li>
        </div>    
    </ul>
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header bg-primary text-white">
          Place Order
        </div>
        <div class="card-body">
          <form action="order.php" method="post">
            <div class="form-group">
              <label for="medicine_name">Medicine Name</label>
              <input type="text" class="form-control" id="medicine_name" name="medicine_name" placeholder="Enter Medicine Name" required>
            </div>
            <div class="form-group">
              <label for="quantity">Quantity</label>
              <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Enter Quantity" required>
            </div>
            <button type="submit" class="btn btn-primary">Place Order</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
