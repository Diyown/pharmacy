<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap Form</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header bg-primary text-white">
          Add Medicine
        </div>
        <div class="card-body">
          <form>
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" placeholder="Enter medicine name">
            </div>
            
            <div class="form-group">
              <label for="description">Description</label>
              <textarea class="form-control" id="description" rows="3" placeholder="Enter description"></textarea>
            </div>
             <div class="form-group">
              <label for="prescription">Prescription</label>
              <textarea class="form-control" id="prescription" rows="3" placeholder="Enter prescription"></textarea>
            </div>
             <div class="form-group">
              <label for="price">Price</label>
              <input type="text" class="form-control" id="price" placeholder="Enter price">
            </div>
             <div class="form-group">
              <label for="quantity">Quantity</label>
              <input type="text" class="form-control" id="quantity" placeholder="Enter Quantity">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
