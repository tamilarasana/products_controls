<!DOCTYPE html>
<html>
 <head>
  <title>List</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 </head>
 <body>
    <div class="container">


 <h2 style="text-align:center;">Report </h2>

    <div class="table table-responsive">
    <table class ="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Category Name</th>
                <th>Unit Name</th>
                <th>Product Price</th>
            </tr>
            </thead>
            <tbody>
                @foreach($data as $value)
                <tr>

                    <td>{{ $value ->cname }}</td>
                    <td>{{ $value ->uname }}</td>
                    <td>{{ $value ->pprice }}</td>

                    </tr>
                @endforeach
                </tbody>
    </table>
</div>
</div>
</body>
</html>

</body>
</html>
