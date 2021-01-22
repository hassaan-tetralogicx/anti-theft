@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Admin Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Total Shops using Anti-Theft </h4>
                        <h3 class="text-primary"> {{ count($shops) }} </h3>
                    </div>
                    <table class="table table-hover mt-3">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Plan</th>
                                <th colspan="3">Setting</th>
{{--                                    <th>Text Protection</th>--}}
{{--                                    <th>Image Protection</th>--}}
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
                                            Free Plan
                                        @else
                                            Paid Plan
                                        @endif
                                    </td>
                                    <td>
<!--                                        --><?php //dd($shop->setting); ?>
{{--                                        @if($shop->text_protection && $shop->image_protection && $shop->disable_right_click == 1)--}}
{{--                                            <span>Text Protection</span>--}}
{{--                                            <span>Image Protection</span>--}}
{{--                                            <span>Disable Right Click</span>--}}
{{--                                        @endif--}}
{{--                                        @if()--}}
                                                @if($shop->setting != null)
                                                    @if($shop->setting->image_protection == 1)
                                                            <span>Image Protection, </span>
                                                        @if($shop->setting->text_protection == 1)
                                                            <span>Text Protection </span>
                                                        @endif

                                                    @elseif($shop->setting->text_protection ==1)
                                                            <span>Text Protection, </span>
                                                        @if($shop->setting->image_protection == 1)
                                                            <span>Image Protection </span>
                                                        @endif
                                                    @endif

                                                @else
                                                   <span>No settings selected yet!</span>
                                                @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
