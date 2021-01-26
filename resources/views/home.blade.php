@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <h1 class="my-3">Admin Dashboard</h1>
            <div class="card">
{{--                <div class="card-header">{{ __('Admin Dashboard') }}</div>--}}

                <div class="card-body p-0">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="d-flex px-3 pt-4">
                        <h4 class="card-title pt-1">Total Shops using Box Locker -</h4>
                        <h3 class="text-primary ml-2"> {{ count($shops) }} </h3>
                    </div>
                    <table class="table table-hover mt-3">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Plan</th>
                                <th scope="col" class="text-right">Text Protection</th>
                                <th scope="col" class="text-right">Image Protection</th>
{{--                                    <th>Disable Right Click</th>--}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($shops as $shop)
                                <tr>
                                    <td>{{$shop->name}}</td>
                                    <td>{{$shop->email}}</td>
                                    <td>
                                        @if($shop->plan_id == 1)
                                            <span class="p-2 badge badge-primary text-center">Free Plan</span>
                                        @else
                                            <span class="p-2 badge badge-success text-center">Paid Plan</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($shop->setting != null)
                                            @if($shop->setting->text_protection == 1)
                                                <label class="switch">
                                                    <input @if($shop->setting != null) @if($shop->setting->text_protection == 1) checked @endif @endif type="checkbox" class="success status" disabled>
                                                    <span class="slider"></span>
                                                </label>
                                            @else
                                                <label class="switch">
                                                    <input @if($shop->setting != null) @if($shop->setting->text_protection == 1) checked @endif @endif type="checkbox" class="status" disabled>
                                                    <span class="slider"></span>
                                                </label>
                                            @endif
                                        @endif
                                    </td>
                                    <td>
                                        @if($shop->plan_id != 1)
                                            @if($shop->setting != null)
                                                @if($shop->setting->image_protection == 1)
                                                    <label class="switch">
                                                        <input @if($shop->setting != null) @if($shop->setting->text_protection == 1) checked @endif @endif type="checkbox" class="success status" disabled>
                                                        <span class="slider"></span>
                                                    </label>
                                                @else
                                                    <label class="switch">
                                                        <input type="checkbox" class=" status" disabled>
                                                        <span class="slider"></span>
                                                    </label>
                                                @endif
                                            @endif
                                        @else
                                            <label class="switch">
                                                <input type="checkbox" class=" status" disabled>
                                                <span class="slider"></span>
                                            </label>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="float-right py-3">{{ $shops->links() }}</div>
        </div>
    </div>
</div>

@endsection
