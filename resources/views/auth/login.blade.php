@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">
            Вход
        </div>
        <div class="card-block">
            <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}

                <div  class="form-group row{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-sm-3 col-form-label">E-MAIL</label>

                    <div class="col-sm-9">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-sm-3 col-form-label">Password</label>

                    <div class="col-sm-9">
                        <input id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>

                <input type="submit" class="btn btn-secondary float-right" value="Войти">

                {{--<div class="form-group row">--}}
                    {{--<div class="offset-sm-9 col-sm-10">--}}
                        {{--<button type="submit" class="btn btn-primary">Вход</button>--}}
                    {{--</div>--}}
                {{--</div>--}}

            </form>
        </div>
    </div>

@endsection
