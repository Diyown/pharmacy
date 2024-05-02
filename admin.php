<!DOCtype html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Page</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<style>
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
			width: 300px;
			height: 150px;
			padding: 15px;
			background-color: #ede9e8;
			box-shadow: 10px 15px 10px grey;
			border-radius: 10px;
			
			border-color: black;
			
		}
	</style>
	
</head>
<body>
    <div class="sidebar">
		<h2>ADMIN DASHBOARD</h2>
        <a href="admin.php">Home</a>
        <a href="#about">Order</a>
        <a href="#services">Order History</a>
        <a href="#contact">Stocks</a>
		<a href="login.php">Log Out</a>
    </div>
<!--============CONTENT==============-->
    <div class="content">
		<form class="wrapper">
			<p>the JUDE BOTIKA Admin Dashboard. This dashboard provides you with the tools and information you need to effectively manage the operations of our pharmacy.</p>
		</form>
    </div>
</body>
</body>
</html>