@extends('layouts.auth-master')

@section('content')
    <form action="/register" method="post">
        @csrf
        <div class="form-group mb-2">
            <label for="">User Name</label>
            <input class="form-control" type="text" name="name" value="{{old('name')}}" id="" placeholder="Enter your name">
            @if ($errors->has('name'))
                <span class="text-danger">{{$errors->first('name')}}</span>
            @endif
        </div>

        <div class="form-group mb-2">
            <label for="">Email</label>
            <input type="text" name="email" value="{{old('email')}}" id="" class="form-control" placeholder="Enter your mail">
            @if ($errors->has('email'))
                <span class="text-danger">{{$errors->first('email')}}</span>
            @endif
        </div>

        <div class="form-group mb-2">
            <label for="">Password</label>
            <input type="password" name="password" id="" class="form-control" placeholder="Enter your password">
            @if ($errors->has('password'))
                <span class="text-danger">{{$errors->first('password')}}</span>
            @endif
        </div>

        <div class="form-group mb-2">
            <label for="">Confirm Password</label>
            <input type="password" name="confirm_password" id="" class="form-control">
            @if ($errors->has('confirm_password'))
                <span class="text-danger">{{$errors->first('confirm_password')}}</span>
            @endif
        </div>

        <a href="/" class="btn btn-md btn-secondary">Cancel</a>
        <button type="submit" class="btn btn-md btn-primary float-end">Submit</button>
    </form>
@endsection