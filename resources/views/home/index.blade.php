@extends('layouts.app-master')

@section('content')
    @guest
    <div class="bg-light m-2 p-5 rounded">
        <h1>Home Page</h1>
        <p>You are in home page</p>
    </div>
    @endguest

    @auth
    @can('isAdmin')
    <div class="bg-light m-2 p-5 rounded">
        <h1>Home Page</h1>
        <p>You are in home page and have admin user access.</p>
    </div>
    @elsecan('isManager')
    <div class="bg-light m-2 p-5 rounded">
        <h1>Home Page</h1>
        <p>You are in home page and have manager user access.</p>
    </div>
    @else
    <div class="bg-light m-2 p-5 rounded">
        <h1>Home Page</h1>
        <p>You are in home page and have user access.</p>
    </div>
    @endcan
    @endauth
@endsection