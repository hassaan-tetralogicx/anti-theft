@extends('shopify-app::layouts.default')

@section('content')
    <!-- You are: (shop domain name) -->
{{--    <p>You are: {{ Auth::user()->name }}</p>--}}
{{--    <a href="{{route('toggle')}}">toggle</a>--}}
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="mt-5 pb-md-4 text-center d-flex justify-content-between">
                    <div>
                        <h1 class="display-4">Settings</h1>
                    </div>
                    <div>
                        <p class="my-1">{{ Illuminate\Support\Facades\Auth::user()->plan->name }}</p>
                        @if(Illuminate\Support\Facades\Auth::user()->plan->name == 'Free Plan')
                            <a href="/pricing-plans" class="btn btn-primary">Upgrade Plan</a>
                        @else
                            <a href="/pricing-plans" class="btn btn-primary">View Plans</a>
                        @endif
                        {{--                            <a class="btn btn-light my-3" href="/">Back</a>--}}
                    </div>
                </div>
                <div class="card mt-3" >
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between">
                            <div>
                                <h3>Text Protection</h3>
                                <p>Use this option to enable text protection</p>
                            </div>
                            <div>
                                <label class="switch my-4">
                                    <input @if($status != null) @if($status->text_protection == 1) checked @endif @endif data-route="{{route('setting.activation', Auth::user()->id)}}" data-csrf="{{csrf_token()}}" type="checkbox" data-type="text_protection" name="text_protection" class="success status">
                                    <span class="slider"></span>
                                </label>
                            </div>
                        </li>
                            <li class="list-group-item d-flex justify-content-between">
                                    @if($plan_check == 2)
                                        <div>
                                            <h3>Image Protection</h3>
                                            <p>Use this option to enable text protection</p>
                                        </div>
                                        <div>
                                            <label class="switch my-4">
                                                <input @if($status != null) @if($status->image_protection == 1) checked @endif @endif data-route="{{route('setting.activation', Auth::user()->id)}}" data-csrf="{{csrf_token()}}" type="checkbox" data-type="image_protection" name="image_protection" class="success status">
                                                <span class="slider"></span>
                                            </label>
                                        </div>
                                    @else
                                        <div>
                                            <h3>Image Protection</h3>
                                            <p class="my-0">Use this option to enable Image protection </p>
                                            <p class="text-danger ">Upgrade Price plan to enable this feature</p>
                                        </div>
                                        <label class="switch tool my-4">
                                            <div id="disabled-button-wrapper"data-toggle="tooltip" data-placement="bottom" data-title="Upgrade your price plan to enable this feature">
                                                <input type="checkbox" class="success " disabled>
                                                <span class="slider"></span>
                                            </div>
                                        </label>
                                    @endif
                            </li>
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
