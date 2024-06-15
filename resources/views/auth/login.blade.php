@extends('layouts.auth-master')

@section('content')
    <h1>Login Form</h1>
    <form action="/user-login" method="post">
        @csrf
        <div class="form-group mb-2">
            <label for="">Email</label>
            <input type="text" name="email" id="" class="form-control" placeholder="Enter your mail">
        </div>
        <div class="form-group mb-2">
            <label for="">Password</label>
            <input type="password" name="password" id="" class="form-control" placeholder="Enter your password">
        </div>
        <a href="/" class="btn btn-md btn-secondary">Cancel</a>
        <button type="submit" class="btn btn-md btn-primary float-end">Submit</button>
    </form>
@endsection