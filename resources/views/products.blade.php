<!DOCTYPE html>
<html>
    <head>
        <title>products</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    </head>
        <body>
            <h2 style="text-align:center;">Products </h2>
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

            {{-- @if(count($errors-> all()))
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
                <form class="" action="{{URL::to('/products')}}" method="post" autocomplete="off">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Products ID</label>
                        <input type="text" name="pid" placeholder="Products ID" class="form-control">
                         @if($errors->has('pid'))
                            <span class="text-danger">
                                {{$errors->first('pid')}}
                            </span>
                            @endif
                    </div>
                        <div class="form-group">
                        <label>Products Code</label>
                        <input type="text" name="pcode" placeholder="Products Code" class="form-control">
                         @if($errors->has('pcode'))
                            <span class="text-danger">
                                {{$errors->first('pcode')}}
                            </span>
                            @endif
                    </div>
                    <div class="form-group">
                        <label>Products Category</label>
                        {{-- <input type="text" name="pcategory" placeholder="Products Category" class="form-control"> --}}
                        <select name="pcategory">
                            <option>-Select-</option>
                            @foreach ($category as $item)
                                <option value="{{$item->id}}" >{{$item->cname}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Products Unit</label>
                        {{--<input type="text" name="punit" placeholder="Products Unit" class="form-control">--}}
                        <select name="punit">
                            <option>-Select-</option>
                            @foreach ($unit as $item)
                            <option value="{{$item->id}}" >{{$item->uname}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                         <label>Products Price</label>
                         <input type="text" name="pprice" placeholder="Products Price" class="form-control">
                          @if($errors->has('pprice'))
                            <span class="text-danger">
                                {{$errors->first('pprice')}}
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
                            <th>Product ID</th>
                            <th>Product Code</th>
                            <th>Product Category</th>
                            <th>Product Unit</th>
                            <th>Product Price</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $value)
                        <tr>
                            <td>{{ $value-> pid }}</td>
                            <td>{{ $value ->pcode }}</td>
                            <td>{{ $value ->pcategory }}</td>
                            <td>{{ $value ->punit }}</td>
                            <td>{{ $value ->pprice }}</td>
                            <td>
                                <a href="{{action('ProductController@edit',['id' =>  $value->id ])}}"><button>Edit</button>
                                </a>
                                <a href="{{action('ProductController@destroy',['id' =>  $value->id ])}}"><button>Delete</button>
                                </a> </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>
