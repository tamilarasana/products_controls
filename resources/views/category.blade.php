<!DOCTYPE html>
<html>
      <head>
        <title>Login</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      </head>
  <body>
      <h2 style="text-align:center;">Category </h2>
      <nav class="navbar navbar-inverse">
         <div class="container-fluid">
           <ul class="nav navbar-nav navbar-right">
              <li> <a class="btn btn-danger" href="{{ url('/logout') }}">Logout</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-left">
              <li> <a class="btn btn-danger" href="{{ url('/success') }}">Back</a></li>
            </ul>
          </div>
      </nav>
      
         @if(session('success'))
         <div class ="alert alert-success">
         {{session::get('success')}}

          @php
               Session::forget('success')
          @endphp
          </div>
       @endif


    <div class="row">
    <div class="col-md-3">
          <form class="" action="{{URL::to('/cate')}}" method="post" autocomplete="off">
              {{ csrf_field() }}
                <div class="form-group">
                    <label>Category ID</label>
                    <input type="text" name="cid" placeholder="Category ID" class="form-control">
                       @if($errors->has('cid'))
                            <span class="text-danger">
                                {{$errors->first('cid')}}
                            </span>
                            @endif
                </div>
                <div class="form-group">
                      <label>Category Name</label>
                      <input type="text" name="cname" placeholder="Category Name" class="form-control">
                       @if($errors->has('cname'))
                            <span class="text-danger">
                                {{$errors->first('cname')}}
                            </span>
                            @endif
                </div>
                <div class="form-group">
                      <tr><input type="submit" name="button" class="btn btn-success" value="Ok" />
                      <td><a class="btn btn-danger" href="success">Cancel</a></td></tr>
                </div>
            </form>
               <div class="container">
                  <table class="table table-responsive">
                      <thead>
                        <tr>
                          <th>Category ID</th>
                          <th>Category Name</th>
                        </tr>
                      </thead>
                    <tbody>
                      @foreach($data as $value)
                        <tr>
                          <td>{{ $value-> cid }}</td>
                          <td>{{ $value ->cname }}</td>
                          <td>
                            <a href="{{action('CategoryController@edit',['id' =>  $value->id ])}}"><button>Edit</button>
                            </a>
                            <a href="{{action('CategoryController@destroy',['id' =>  $value->id ])}}"><button>Delete</button>
                            </a> </td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
             </div>
     </body>
</html>
