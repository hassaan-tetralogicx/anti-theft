    @if ($user->plan->name == 'Free Plan')
        @if($check_setting != null)
            @if($check_setting->text_protection == 1)
                document.addEventListener('copy paste cut', event => event.preventDefault());
                document.onkeydown = function (e) {
                return false;
                };
                document.onselectstart = new Function ("return false");
                function nocontext(e) {
                var clickedTag = (e==null) ? event.srcElement.tagName : e.target.tagName;
                if (clickedTag != "IMG") {
                return false;
                }
                else {
                console.log(435435);
                return true;
                }
                }
                document.oncontextmenu = nocontext;

{{--                document.addEventListener('copy paste cut', event => event.preventDefault());--}}
{{--                document.onkeydown = function (e) {--}}
{{--                return false;--}}
{{--                }; document.addEventListener('contextmenu', event => event.preventDefault());--}}
{{--                document.onselectstart = new Function ("return false");--}}


            @endif
        @endif
    @else
        @if($check_setting != null)
            @if($check_setting->text_protection == 1)
                document.addEventListener('copy paste cut', event => event.preventDefault());
                document.onkeydown = function (e) {
                return false;
                };
                document.onselectstart = new Function ("return false");
                function nocontext(e) {
                var clickedTag = (e==null) ? event.srcElement.tagName : e.target.tagName;
                if (clickedTag != "IMG") {
                return false;
                }
                else {
                console.log(435435);
                return true;
                }
                }
                document.oncontextmenu = nocontext;

{{--                document.addEventListener('copy paste cut', event => event.preventDefault());--}}
{{--                document.onkeydown = function (e) {--}}
{{--                return false;--}}
{{--                }; document.addEventListener('contextmenu', event => event.preventDefault());--}}
{{--                document.onselectstart = new Function ("return false");--}}


            @endif

            @if($check_setting->image_protection == 1)

                document.ondragstart = function () {
                return false;
                };
                document.onkeydown = function (e) {
                return false;
                };
                document.addEventListener('contextmenu', event => event.preventDefault());
                document.onselectstart = new Function ("return false");


            @endif
        @endif
    @endif


