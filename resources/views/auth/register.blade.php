@extends('master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3"></div>
            <div class="col-md-6 col-sm-6" style="direction:rtl;">
                <div class="panel panel-default poonez_panel">
                    <div class="panel-heading poonez_panel_header"><h2>ثبت نام</h2></div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" style="" class="poonez_control_label control-label">نام و نام خانوادگی</label>

                                <div class="col-md-12">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="poonez_control_label control-label">ایمیل</label>

                                <div class="col-md-12">
                                    <input id="email" style="direction:ltr;" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="poonez_control_label control-label">جنسیت</label>

                                <div class="col-md-12">
                                    <select class="form-control">
                                        <option value="">مرد</option>
                                        <option value="">زن</option>
                                        <option value="">دیگر</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="poonez_control_label control-label">رمز عبور</label>

                                <div class="col-md-12">
                                    <input id="password" style="direction:ltr;" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="poonez_control_label control-label">تکرار رمز</label>

                                <div class="col-md-12">
                                    <input id="password-confirm" style="direction:ltr;" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>
                                        <input style="vertical-align:middle;" type="checkbox" name="rules"> من <a href="#">قوانین</a> پونز را قبول دارم.
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <button type="submit" class="btn">
                                        ثبت نام
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="panel-footer poonez_panel_footer">
                        قبلا عضو شده اید ..؟؟؟&nbsp;<a href="{{route('login')}}">ورود به پونز</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3  col-sm-3"></div>
        </div>
    </div>
@endsection
