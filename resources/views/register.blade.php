<!DOCTYPE html>
<html>
    <head>
    <title>Register</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    </head>
        <body>
        <h2 style="text-align:center;">Register </h2>
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

        <div class="container">
          <div class="row">
            <div class="col-md-3">
                <form class="" action="{{URL::to('/store')}}" method="post" autocomplete="off">
                    <div class="form-group">
                        <label>Firstname</label>
                        <input type="text" name="fname"  placeholder="Firstname" class="form-control">
                          @if($errors->has('fname'))
                            <span class="text-danger">
                                {{$errors->first('fname')}}
                            </span>
                            @endif
                    </div>
                    <div class="form-group">
                        <label>Lastname</label>
                        <input type="text" name="lname" placeholder="Lastname" class="form-control">
                          @if($errors->has('lname'))
                            <span class="text-danger">
                                {{$errors->first('lname')}}
                            </span>
                            @endif
                    </div>
                    <div class="form-group">
                        <label>Email Id</label>
                        <input type="text" name="email" placeholder="Email" class="form-control">
                          @if($errors->has('email'))
                            <span class="text-danger">
                                {{$errors->first('email')}}
                            </span>
                            @endif
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" name="phone" placeholder="Phone" class="form-control">
                          @if($errors->has('phone'))
                            <span class="text-danger">
                                {{$errors->first('phone')}}
                            </span>
                            @endif
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" placeholder="Password" class="form-control">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                          @if($errors->has('password'))
                            <span class="text-danger">
                                {{$errors->first('password')}}
                            </span>
                            @endif
                    </div>
                    <div class="form-group">
                        <tr><input type="submit" name="button" class="btn btn-success" value="Register" />
                        <td><a class="btn btn-danger" href="login">Login</a></td></tr>
                    </div>
                </form>
                    </div>
                    </div>
            </body>
        </html>
