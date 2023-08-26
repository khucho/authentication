@extends('layouts.app-master')
@section('content')
    @can('isAdmin')
        <div>
            {{-- {{auth()->user()->name}} --}}
            <h1>Home Page</h1>
            <p>You are in home page & You have Admin Access</p>
        </div>
    @elsecan('isManager')
        <div>
            {{-- {{auth()->user()->name}} --}}
            <h1>Home Page</h1>
            <p>You are in home page & You have Manager Access</p>
        </div>
    @else
        <div>
            {{-- {{auth()->user()->name}} --}}
            <h1>Home Page</h1>
            <p>You are in home page & You have User Access </p>
        </div>
    @endcan
  
  
@endsection