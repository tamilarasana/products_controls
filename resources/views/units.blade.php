<!DOCTYPE html>
<html>
    <head>
       <title>Login</title>
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    </head>
    <body>
        <h2 style="text-align:center;">Units </h2>
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

       {{--@if(count($errors-> all()))
       <div class="alert alert-danger">
          <ul>
             @foreach($errors->all() as $error)
              <li>Oops! {{$error}}</li>
             @endforeach
           </ul>
       </div>
       @endif--}}

                <div class="row">
                  <div class="col-md-3">
           <form class="" action="{{URL::to('/units')}}" method="post" autocomplete="off">
                    {{ csrf_field() }}
                    <div class="form-group">
                            <label>Unit ID</label>
                            <input type="text" name="uid" placeholder=" Unit ID " class="form-control">
                            @if($errors->has('uid'))
                            <span class="text-danger">
                                {{$errors->first('uid')}}
                            </span>
                            @endif
                    </div>
                    <div class="form-group">
                            <label>Unit Name</label>
                            <input type="text" name="uname" placeholder="Unit Name " class="form-control">
                             @if($errors->has('uname'))
                            <span class="text-danger">
                                {{$errors->first('uname')}}
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
                                    <td>{{ $value-> uid }}</td>
                                    <td>{{ $value ->uname }}</td>
                                    <td>
                                        <a href="{{action('UnitsController@edit',['id' =>  $value->id ])}}"><button>Edit</button>
                                        </a>
                                        <a href="{{action('UnitsController@destroy',['id' =>  $value->id ])}}"><button>Delete</button>
                                        </a> </td>
                                      </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                 </div>
      </body>
</html>
