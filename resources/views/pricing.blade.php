@extends('shopify-app::layouts.default')

@section('content')


    <div class="container">
        <div class="pricing-header px-0 py-3  pb-md-4 mx-auto text-center d-flex justify-content-between">
            <div>
            <h1 class="display-2 ">Pricing Plans</h1></div>
            <div>
            <a class="btn btn-primary my-3" href="/">Back</a></div>
        </div>
        <div class="card-deck mb-3 text-center">
            <div class="card mb-4 box-shadow">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">Free</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">$0 </h1>
                    <ul class="list-unstyled mt-4 mb-4">
                        <li>Text Protection</li>
                        <li>Right Click Disabled</li>
                        <li>Short Keys Disabled</li>
                        <li>&nbsp;</li>
                    </ul>
                    @if($user->plan->name == 'Free Plan')
                        <strong>Current Plan</strong>
                    @else
                        <a class="btn btn-lg btn-block btn-primary" href="{{ route('billing', ['plan' => 1]) }}">Free Plan</a>
{{--                        <button type="button" class="btn btn-lg btn-block btn-outline-primary">Free Plan</button>--}}
                    @endif

                </div>
            </div>
            <div class="card mb-4 box-shadow">
                <div class="card-header">
                    <h4 class="my-0 font-weight-normal">Paid Plan</h4>
                </div>
                <div class="card-body">
                    <h1 class="card-title pricing-card-title">$5 <small class="text-muted">/ mo</small></h1>
                    <ul class="list-unstyled mt-4 mb-4">
                        <li>Image Protection</li>
                        <li>Text Protection</li>
                        <li>Right Click Disabled</li>
                        <li>Short Keys Disabled</li>

                    </ul>
                    @if($user->plan->name == 'Paid Plan')
                        <strong>Current Plan</strong>
                    @else
                        <a class="btn btn-lg btn-block btn-primary" href="{{ route('billing', ['plan' => 2]) }}">Upgrade</a>
{{--                        <button type="button" class="btn btn-lg btn-block btn-primary">Upgrade</button>--}}
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
