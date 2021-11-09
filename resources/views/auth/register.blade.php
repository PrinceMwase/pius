@extends('layouts.visitor.app')

@section('content')
    			<!-- One -->
            <section class="wrapper style5">
                <div class="inner">
                     
                    <h4>{{ __('Register') }}</h4>
                    <form method="POST" action="{{route('register')}}">
                        @csrf
                        <div class="row gtr-uniform">
                            <div class="col-6 col-12-xsmall">
                                {{-- firstname --}}
                                <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror"  id="first_name" value="{{ old('first name') }}" required autocomplete="first_name" autofocus placeholder="First Name">
                                @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                            <div class="col-6 col-12-xsmall">
                                <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror"  id="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus placeholder="Last Name">
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                {{-- <input type="email" name="demo-email" id="demo-email" value="" placeholder="Email"> --}}
                            </div>
                            <div class="col-12">
                                <select name="gender" id="gender">
                                    <option value="">- Gender -</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-12">
                                <select name="outstation" id="outstation">
                                    <option value="">- outstation -</option>
                                    @foreach ($outstations as $outstation)
                                        <option value="{{$outstation->id}}">{{$outstation->name}}</option>
                                    @endforeach

                                </select>
                                @error('outstation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{-- date of birth --}}
                            <div class="col-6 col-12-xsmall">
                                {{-- Date of birth --}}
                                <label for="DOB" class="col-md-4 col-form-label text-md-right">{{ __('Date of Birth') }}</label>
                                <input style="color: black" type="date" name="DOB" class="form-control @error('DOB') is-invalid @enderror"  id="DOB" value="{{ old('DOB') }}" required autocomplete="DOB" autofocus placeholder="Date Of Birth">
                                @error('DOB')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        
                            {{-- baptism --}}
                            <div class="col-6 col-12-xsmall">
                                <input type="text" name="baptism" class="form-control @error('baptism') is-invalid @enderror"  id="baptism" value="{{ old('baptism') }}" required autocomplete="baptism" autofocus placeholder="Baptism ID">
                                @error('baptism')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                            </div>
                            {{-- password --}}
                            <div class="col-6 col-12-xsmall">
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"  id="password"  required autocomplete="password" autofocus placeholder="Password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                {{-- <input type="email" name="demo-email" id="demo-email" value="" placeholder="Email"> --}}
                            </div>

                            {{-- confirm password --}}
                            <div class="col-6 col-12-xsmall">
                                <input  id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                @error('password-confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                
                            </div>
                            
                            <div class="col-12">
                                <ul class="actions">
                                    <li><input type="submit" value="Register" class="primary"></li>
                                    <li><a href="{{route('login')}}" class="button fit">Login ?</a></li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </div>
            </section>

@endsection