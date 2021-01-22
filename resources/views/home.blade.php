@extends('layouts.app')

@section('content')
    <style>
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
        #disabled-button-wrapper {
            display: inline-block;

        }

        /*.disable[disabled] {*/
        /*    pointer-events: none;*/
        /*}*/

        #disabled-button-wrapper {
            pointer-events: none;
        }

        /*#disabled-button-wrapper .slider[disabled] {*/
        /*    pointer-events: none;*/
        /*}*/

        #disabled-button-wrapper {
            cursor: not-allowed;
        }
    </style>
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
                                <th scope="col">Text Protection</th>
                                <th scope="col">Image Protection</th>
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
                                            <span class="p-2 badge badge-primary">Free Plan</span>
                                        @else
                                            <span class="p-2 badge badge-success">Paid Plan</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($shop->setting != null)
                                            @if($shop->setting->text_protection == 1)

                                                <input @if($shop->setting != null) @if($shop->setting->text_protection == 1) checked @endif @endif type="checkbox" class="success status" disabled>
                                                <span class="slider"></span>
                                            @endif
                                        @endif
{{--                                                @if($shop->setting != null)--}}
{{--                                                    @if($shop->setting->image_protection == 1)--}}
{{--                                                            <span>Image Protection, </span>--}}
{{--                                                        @if($shop->setting->text_protection == 1)--}}
{{--                                                            <span>Text Protection </span>--}}
{{--                                                        @endif--}}

{{--                                                    @elseif($shop->setting->text_protection ==1)--}}
{{--                                                            <span>Text Protection, </span>--}}
{{--                                                        @if($shop->setting->image_protection == 1)--}}
{{--                                                            <span>Image Protection </span>--}}
{{--                                                        @endif--}}
{{--                                                    @endif--}}

{{--                                                @else--}}
{{--                                                   <span>No settings selected yet!</span>--}}
{{--                                                @endif--}}
                                    </td>
                                    <td>
                                        @if($shop->setting != null)
                                            @if($shop->setting->image_protection == 1)
                                                <input @if($shop->setting != null) @if($shop->setting->text_protection == 1) checked @endif @endif type="checkbox" class="success status" disabled>
                                                <span class="slider"></span>
                                            @endif
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
