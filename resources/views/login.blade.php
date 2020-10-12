<!DOCTYPE html>
<html>
    <head>
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    </head>
    <body>
    <h2 style="text-align:center;">Login</h2>

      {{--   @if(session('success'))
                <div class ="alert alert-success">
                {{session::get('success')}}

                @php
                    Session::forget('success')
                @endphp
                </div>
            @endif--}}
      @if(session('success'))
      <div class ="alert alert-danger">
            {{session('success')}}
            </div>
        @endif
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="content">
                        <form class="" action="{{URL::to('/logs')}}" method="get" autocomplete="off">
                            <div class="form-group">
                                <label>Email</label>
                                    <input type="email" name="email" class="form-control" />
                                        @if($errors->has('email'))
                                            <span class="text-danger">
                                                {{$errors->first('email')}}
                                                    </span>
                                                        @endif
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                    <input type="password" name="password" class="form-control" />
                                      <input type="hidden" name="_token" value="{{csrf_token()}}">
                                          @if($errors->has('password'))
                                            <span class="text-danger">
                                                {{$errors->first('password')}}
                                                    </span>
                                                        @endif
                            </div>
                            <div class="form-group">
                                <input type="submit" name="login" class="btn btn-success" value="Login" />
                                <a class="btn btn-primary" href="register">Register</a>
                            </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>
</html>
