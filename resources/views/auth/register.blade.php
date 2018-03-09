@extends('layouts.app2')

@section('content')
<!--Page Header-->
<section class="page_header padding-top">
  <div class="container">
    <div class="row">
      <div class="col-md-12 page-content">
        <p class="register">REGISTER</p>
      </div>
    </div>
  </div>
</section>
<!--Page Header-->
<section id="faq" class="padding">
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
           <p id="register">You can register once on the site and login to Submit Songs</p>
            
            <form role="form" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}
                
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('fullname') ? ' has-error' : '' }} required">
                        <label for="fullname">Fullname</label>
                        <input id="fullname" type="text" placeholder="Fullname" class="form-control" name="fullname" value="{{ old('fullname') }}" required autofocus>
                        @if ($errors->has('fullname'))
                            <span class="help-block">
                                <strong>{{ $errors->first('fullname') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }} required">
                        <label for="username">Username</label>
                        <input id="username" type="text" placeholder="Username" class="form-control" name="username" value="{{ old('username') }}" required>
                        @if ($errors->has('username'))
                            <span class="help-block">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} required">
                        <label for="email">E-Mail Address</label>

                        <input id="email" type="email" placeholder="E-Mail Address" class="form-control" name="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('twitter_name') ? ' has-error' : '' }}">
                        <label for="twitter_name">Twitter Handle</label>

                        <input id="twitter_name" type="text" placeholder="Twitter Handle" class="form-control" name="twitter_name" value="{{ old('twitter_name') }}">

                        @if ($errors->has('twitter_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('twitter_name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('facebook_name') ? ' has-error' : '' }}">
                        <label for="facebook_name">Facebook URL</label>

                        <input id="facebook_name" type="text" placeholder="Facebook URL" class="form-control" name="facebook_name" value="{{ old('facebook_name') }}">

                        @if ($errors->has('facebook_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('facebook_name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} required">
                        <label for="password">Password</label>

                        <input id="password" type="password" placeholder="Password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-default">
                            Register
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</section>
@include('footer')
@endsection
