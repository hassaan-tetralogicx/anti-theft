@extends('shopify-app::layouts.default')

@section('content')
    <!-- You are: (shop domain name) -->
{{--    <p>You are: {{ Auth::user()->name }}</p>--}}
{{--    <a href="{{route('toggle')}}">toggle</a>--}}
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="margin:70px 0">
                    <!-- Default panel contents -->
                    <div class="px-0 py-3 pb-md-4 mx-auto text-center d-flex justify-content-between">
                        <div>
                            <h1 class="display-2">Desktop Settings</h1>
                        </div>
                        <div>
                            <p>{{ Illuminate\Support\Facades\Auth::user()->plan->name }}</p>
                            @if(Illuminate\Support\Facades\Auth::user()->plan->name == 'Free Plan')
                                <a href="/pricing-plans" class="btn btn-primary">upgarde Plan</a>
                            @endif
{{--                            <a class="btn btn-light my-3" href="/">Back</a>--}}
                        </div>
                    </div>
{{--                    <p >Desktop Settings</p>--}}
{{--                    <div class="card-header d-flex justify-content-between">--}}
{{--                        <div>--}}

{{--                            <p>{{ Illuminate\Support\Facades\Auth::user()->plan->name }}</p>--}}
{{--                            @if(Illuminate\Support\Facades\Auth::user()->plan->name == 'Free Plan')--}}
{{--                                <a href="/pricing-plans">Click here to upgarde Plan</a>--}}
{{--                            @endif--}}
{{--                        </div>--}}

{{--                    </div>--}}

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between">
                            <div>Text Protection
                                <p>Use this option to enable text protection</p>
                            </div>
                            <div>
                            <label class="switch">
                                <input @if($status != null) @if($status->text_protection == 1) checked @endif @endif data-route="{{route('setting.activation', Auth::user()->id)}}" data-csrf="{{csrf_token()}}" type="checkbox" data-type="text_protection" name="text_protection" class="success status">
                                <span class="slider"></span>
                            </label>

                            </div>
                        </li>

                            <li class="list-group-item d-flex justify-content-between">

                                    @if($plan_check == 2)
                                        <div>
                                        Image Protection
                                            <p>Use this option to enable text protection</p>
                                        </div>
                                        <div>
                                            <label class="switch ">
                                                <input @if($status != null) @if($status->image_protection == 1) checked @endif @endif data-route="{{route('setting.activation', Auth::user()->id)}}" data-csrf="{{csrf_token()}}" type="checkbox" data-type="image_protection" name="image_protection" class="success status">
                                                <span class="slider"></span>
                                            </label>
                                        </div>
                                    @else
                                            <div>
                                                Image Protection
                                                <p>Upgrade price plan to enable this option</p>
                                            </div>
                                            <label class="switch ">
                                                <div id="disabled-button-wrapper"data-toggle="tooltip" data-placement="bottom" data-title="Upgrade your price plan to enable this feature">
                                                    <input type="checkbox" class="success status" disabled>
                                                    <span class="slider"></span>
                                                </div>
                                            </label>
                                    @endif

                            </li>


{{--                        <li class="list-group-item">--}}
{{--                            Disable Shortcut keys--}}
{{--                            <label class="switch ">--}}
{{--                                <input @if($status != null) @if($status->disable_short_keys == 1) checked @endif @endif data-route="{{route('setting.activation', Auth::user()->id)}}" data-csrf="{{csrf_token()}}" type="checkbox" data-type="disable_short_keys" name="disable_short_keys" class="success status">--}}
{{--                                <span class="slider"></span>--}}
{{--                            </label>--}}
{{--                        </li>--}}
                    </ul>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('scripts')
    @parent

    <script type="text/javascript">
        var AppBridge = window['app-bridge'];
        var actions = AppBridge.actions;
        var TitleBar = actions.TitleBar;
        var Button = actions.Button;
        var Redirect = actions.Redirect;
        var titleBarOptions = {
            title: 'WELCOME',
        };
        var myTitleBar = TitleBar.create(app, titleBarOptions);

        $('.status').on('change',function(){
            // status.log(123);
            // var disable_right_click = $("input[name=disable_right_click]").val();
            if($(this).is(':checked')){
                status = 1;
            }
            else{
                status = 0;
            }
            $.ajax({
                url: $(this).data('route'),
                headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}' },
                type:'post',
                data:{
                    status : status,
                    type : $(this).data('type'),
                }
            })
        });

        $(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
        $(document).on("click", ".disable_right_click", function () {
            var disable_right_click = $(document);
            //disable right button
            disable_right_click.on('contextmenu', function (e) {
                // e.preventDefault(); //disable cut,copy,paste
                return false;
            });
        });
    </script>
@endsection
