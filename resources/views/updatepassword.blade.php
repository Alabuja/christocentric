@extends('layouts.app2')

@section('title', '| CHANGE PASSWORD')

@section('content')

<section id="facts" class="padding">
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Change Password</div>
            </div>
            <form class="form-horizontal" role="form" method="POST" action="{{ url('update') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('old') ? ' has-error' : '' }} required">
                    <label for="old" class="col-md-4 control-label">Current Password</label>

                    <div class="col-md-6">
                        <input id="old" type="password" class="form-control" name="old" required>

                        @if ($errors->has('old'))
                            <span class="help-block">
                                <strong>{{ $errors->first('old') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} required">
                    <label for="password" class="col-md-4 control-label">New Password</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }} required">
                    <label for="password_confirm" class="col-md-4 control-label">Re-enter Password</label>

                    <div class="col-md-6">
                        <input id="password_confirm" type="password" class="form-control" name="password_confirmation" required>

                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-8 col-md-offset-4">
                        <button type="submit" class="btn btn-default">
                            Change Password
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
