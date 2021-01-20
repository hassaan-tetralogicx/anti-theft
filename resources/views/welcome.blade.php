@extends('shopify-app::layouts.default')

@section('content')
    <!-- You are: (shop domain name) -->
{{--    <p>You are: {{ Auth::user()->name }}</p>--}}
{{--    <a href="{{route('toggle')}}">toggle</a>--}}
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card" style="margin:50px 0">

                    <!-- Default panel contents -->
                    <div class="card-header d-flex justify-content-between">

                        <p>Desktop Settings</p>
{{--<!--                     <?php $id ; dd($id);?>--}}
                        @if($plan_check == 1)
                            <p><a class="btn btn-primary" href="{{ route('billing', ['plan' => 2]) }}">Upgrade Plan</a></p>
                        @else
                            <span class="text-right">You're upgraded!</span>
{{--                            <a class="btn btn-primary" href="{{ route('billing', ['plan' => 2]) }}">Check Plans</a>--}}
                        @endif

                    </div>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            Text Protection
                            <label class="switch ">
                                <input @if($status != null) @if($status->text_protection == 1) checked @endif @endif data-route="{{route('setting.activation', Auth::user()->id)}}" data-csrf="{{csrf_token()}}" type="checkbox" data-type="text_protection" name="text_protection" class="success status">
                                <span class="slider"></span>
                            </label>
                        </li>
                        @if($plan_check == 2)
                            <li class="list-group-item">
                                Image Protection
                                <label class="switch ">
                                    <input @if($status != null) @if($status->image_protection == 1) checked @endif @endif data-route="{{route('setting.activation', Auth::user()->id)}}" data-csrf="{{csrf_token()}}" type="checkbox" data-type="image_protection" name="image_protection" class="success status">
                                    <span class="slider"></span>
                                </label>
                            </li>
                        @endif
                        <li class="list-group-item">
                            Disable Right Click
                            <label class="switch ">
                                <input @if($status != null) @if($status->disable_right_click == 1) checked @endif @endif data-route="{{route('setting.activation', Auth::user()->id)}}" data-csrf="{{csrf_token()}}" type="checkbox" data-type="disable_right_click" name="disable_right_click" value="" class="success status">
                                <span class="slider"></span>
                            </label>
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

    <style>


        /* The switch - the box around the slider */
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
            float:right;
        }

        /* Hide default HTML checkbox */
        .switch input {display:none;}

        /* The slider */
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input.success:checked + .slider {
            background-color: #8bc34a;
        }


        input:focus + .slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>
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
        $(document).on("click", ".disable_right_click", function () {
            var disable_right_click = $(document);
            // console.log(disable_right_click);
            //disable right button
            disable_right_click.on('contextmenu', function (e) {
                // e.preventDefault(); //disable cut,copy,paste
                return false;
            });
        });
    </script>
@endsection
