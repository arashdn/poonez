@extends('master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3"></div>
            <div class="col-md-6 col-sm-6" style="direction:rtl;">
                <div class="panel panel-default poonez_panel">
                    <div class="panel-heading poonez_panel_header"><h2>ورود</h2></div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="poonez_control_label control-label">ایمیل</label>

                                <div class="col-md-12">
                                    <input id="email" style="direction:ltr;" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="poonez_control_label control-label">رمز عبور</label>

                                <div class="col-md-12">
                                    <input id="password" type="password" style="direction:ltr;"  class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" style="vertical-align:center;" name="remember" {{ old('remember') ? 'checked' : '' }}> من رو به یاد یسپار
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn">
                                        ورود
                                    </button>

                                    <a class="btn" href="{{ route('password.request') }}">
                                        رمز خود را فراموش کرده ام..؟!
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="panel-footer poonez_panel_footer">
                        هنوز عضو نشده اید ..؟؟؟&nbsp;<a href="{{route('register')}}">ثبت نام در پونز</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-3"></div>
        </div>
    </div>
@endsection
