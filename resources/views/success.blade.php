<!DOCTYPE html>
<html lang="en">
<head>
  <title>Tamil</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 1500px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
    }
  </style>
</head>
<body>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav">
      <h4>Products</h4>
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="{{ url('/category') }}">Category</a></li>
        <li><a href="{{ url('/units') }}">Units</a></li>
        <li><a href="{{ url('/products') }}">Product Page</a></li>
        
      </ul><br>
      
    </div>
<ul class="nav navbar-nav navbar-right">
        <li> <a class="btn btn-danger" href="{{ url('/logout') }}">Logout</a></li>
      </ul>
   


</body>
</html>








    