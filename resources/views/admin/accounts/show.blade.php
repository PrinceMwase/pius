@extends('layouts.admin.app')

@section('content')
    
    <div class="row">
        <div class="card">
            <div class="card-header card-header-primary">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="{{route('user.edit', auth()->user()->id)}}" class="nav-link">Update Account</a> 
                    </li> 
                    @if (Gate::allows('member'))
                    <li class="nav-item">
                        <a href="{{route('payment.index')}}" class="nav-link">Tithes</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('userGroups')}}" class="nav-link ">Groups</a>
                    </li>
                    <li class="nav-item">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"  aria-haspopup="true" aria-expanded="false">
                            Sacraments
                        </button>
                        <div class="class dropdown-menu"  aria-labelledby="dropdownMenuButton">
                            <a href="{{route('wedding.edit', auth()->user()->id)}}" class="dropdown-item">Wedding</a>
                            <a href="{{route('baptism.edit', auth()->user()->id)}}" class="dropdown-item">Baptism</a>
                            <a href="{{route('confirmation.edit', auth()->user()->id)}}" class="dropdown-item">Confirmation</a>
                        </div>
                    </li>
                    @endif
                </ul>
            </div>
            <div class="card-body">

                @if (   Route::currentRouteName() == 'userGroups')
                   @include('admin.accounts.groups')
                @endif
                @if (   Route::currentRouteName() == 'wedding.edit')
                    @include('admin.accounts.addWedding')
                @endif
                @if (   Route::currentRouteName() == 'wedding.index')
                    @include('admin.accounts.showWedding')
                @endif
                @if (   Route::currentRouteName() == 'baptism.index')
                    @include('admin.accounts.showBaptism')
                @endif
                @if (   Route::currentRouteName() == 'baptism.edit')
                    @include('admin.accounts.addBaptism')
                @endif
                @if (   Route::currentRouteName() == 'confirmation.index')
                    @include('admin.accounts.showConfirmation')
                @endif
                @if (   Route::currentRouteName() == 'confirmation.edit')
                    @include('admin.accounts.addConfirmation')
                @endif
            </div>
        </div>
    </div>


@endsection
{{-- tithes --}}
{{-- groups --}}

{{-- sacraments 
    wedding
    Baptism
    Confirmation
    Funeral    
--}}
