@extends('layouts.app-master')

@section('content')
    <div class="container">

        <div class="row" id="noti-session">
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{session()->get('success')}}
                </div>
            @endif

            @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{session()->get('error')}}
                </div>
            @endif
        </div>

        <div class="row">
            <div class="col-md-12">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        @foreach (config('role.user_roles') as $k=>$r)
                            <a class="nav-link @if($k==auth()->user()->role_id) active @endif" id="nav-{{$k}}-tab" data-bs-toggle="tab" href="#nav-{{$k}}" role="tab" aria-controls="nav-{{$k}}" @if($k == auth()->user()->role_id) aria-selected="true" @else aria-selected="false" @endif>{{$r}}</a>
                        @endforeach
                    </div>
                </nav>

                <div class="tab-content" id="nav-tabContent">
                    @foreach (config('role.user_roles') as $key=>$role)
                    <div class="tab-pane fade @if($key==auth()->user()->role_id) show active @endif" id="nav-{{$key}}" role="tabpanel" aria-labelledby="nav-{{$key}}-tab">

                        @php
                            $permissions = \App\Models\Permission::where('role_id', $key)->pluck('route_name')->toArray();
                        @endphp

                        <form action="/permissions" method="post">
                        @csrf
                        <input type="hidden" name="role_id" value="{{$key}}">
                        <div class="row" style="margin: 0;">
                            <div class="col-md-2 rs_role">
                                <h6>User Module</h6>
                                <span>
                                    <input type="checkbox" name="user-index" value="user-index" id="" @if(in_array("user-index", $permissions)) checked @endif>User List
                                </span>
                                <span>
                                    <input type="checkbox" name="user-create" value="user-create" id="" @if(in_array("user-create", $permissions)) checked @endif>User Create
                                </span>
                                <span>
                                    <input type="checkbox" name="user-edit" value="user-edit" id="" @if(in_array("user-edit", $permissions)) checked @endif>User Edit
                                </span>
                                <span>
                                    <input type="checkbox" name="user-detail" value="user-detail" id="" @if(in_array("user-detail", $permissions)) checked @endif>User Detail
                                </span>
                                <span>
                                    <input type="checkbox" name="user-delete" value="user-delete" id="" @if(in_array("user-delete", $permissions)) checked @endif>User Delete
                                </span>
                            </div>

                            <div class="col-md-2 rs_role">
                                <h6>Product Module</h6>
                                <span>
                                    <input type="checkbox" name="product-index" id="" value="product-index" @if(in_array("product-index", $permissions)) checked @endif>Product List
                                </span>
                                <span>
                                    <input type="checkbox" name="product-create" id="" value="product-create" @if(in_array("product-create", $permissions)) checked @endif>Product Create
                                </span>
                                <span>
                                    <input type="checkbox" name="product-edit" id="" value="product-edit" @if(in_array("product-edit", $permissions)) checked @endif>Product Edit
                                </span>
                                <span>
                                    <input type="checkbox" name="product-show" id="" value="product-show" @if(in_array("product-show", $permissions)) checked @endif>Product View Detail
                                </span>
                                <span>
                                    <input type="checkbox" name="product-delete" id="" value="product-delete" @if(in_array("product-delete", $permissions)) checked @endif>Product Delete
                                </span>
                            </div>
                        </div>

                        <div class="row" style="margin: 0;">
                            <div class="col-md-6 text-right">
                                <a href="/permissions" class="btn btn-md btn-default">Cancel</a>
                                <button type="submit" class="btn btn-md btn-primary">Save</button>
                            </div>
                        </div><br><hr>
                        </form>
                    </div>
                    @endforeach
                </div>
            </div>

            
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $( document ).ready(function() {
            setTimeout(function() {
                $("#noti-session").delay(3000).hide(1);
            }, 1000);
        });
        
    </script>
@endpush
