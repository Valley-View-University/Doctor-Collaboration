@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                <!-- <br/>

                                <select name="field" required>
                                    <option value="Empty"> Select a Field</option>
                                    <option value="Cardiology">Cardiology</option>
                                    <option value="Dermatology">Dermatology</option>
                                    <option value="Oncology">Oncology</option>
                                    <option value="Geriatry">Geriatry</option>
                                    <option value="Pediatrics">Pediatrics</option>
                                    <option value="Endocrinology">Endocrinology</option>
                                    <option value="Radiology">Radiology</option>

                                </select>

                                <br/>
                                <br/> -->

                                

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('field') ? ' has-error' : '' }}">
                            <label for="field" class="col-md-4 control-label">Select Field of Study</label>

                            <div class="col-md-6">
                                <select name="field" required>
                                    <option value="Empty"> Select a Field</option>
                                    <option value="Cardiology">Cardiology</option>
                                    <option value="Dermatology">Dermatology</option>
                                    <option value="Oncology">Oncology</option>
                                    <option value="Geriatry">Geriatry</option>
                                    <option value="Pediatrics">Pediatrics</option>
                                    <option value="Endocrinology">Endocrinology</option>
                                    <option value="Radiology">Radiology</option>

                                </select>

                                @if ($errors->has('field'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('field') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('yoe') ? ' has-error' : '' }}">
                            <label for="yoe" class="col-md-4 control-label">Years Of Experience</label>

                            <div class="col-md-6">
                                <!-- <input id="yoe" type="text" class="form-control" name="yoe" value="{{ old('name') }}" required autofocus> -->
                                <input type="number" size="2" name="yoe" placeholder="Enter your years of experience" required autofocus> 

                                @if ($errors->has('yoe'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('yoe') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
