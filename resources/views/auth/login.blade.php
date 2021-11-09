@extends('layouts.visitor.app')

@section('content')
    			<!-- One -->
            <section class="wrapper style5">
                <div class="inner">
                     
                    <h4>{{ __('Login') }}</h4>
                    <form method="POST"action="{{ route('login') }}">
                        @csrf
                        <div class="row gtr-uniform">
                            <div class="col-6 col-12-xsmall">
                                {{-- firstname --}}
                                <input style="color:black" type="number" name="baptism_id" class="form-control"  id="baptism_id" value="{{ old('baptism_id') }}" required autocomplete="baptism_id" autofocus placeholder="Baptism ID">
                                @error('baptism_id')
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

                           
                            
                            <div class="col-12">
                                <ul class="actions">
                                    <li><input type="submit" value="Login" class="primary"></li>
                                    <li><a href="{{route('register')}}" class="button fit">Register ?</a></li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </div>
            </section>

@endsection