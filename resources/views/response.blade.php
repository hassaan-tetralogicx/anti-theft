
@if($check_setting != null)
    @if ($user->plan->name == 'Free Plan')

            @if($check_setting->text_protection == 1)

                document.addEventListener('copy paste cut', event => event.preventDefault());
                document.onkeydown = function (e) {
                return false;
                }; document.addEventListener('contextmenu', event => event.preventDefault());

            @endif
    @else
            @if($check_setting->text_protection == 1)

                document.addEventListener('copy paste cut', event => event.preventDefault());
                document.onkeydown = function (e) {
                return false;
                }; document.addEventListener('contextmenu', event => event.preventDefault());

            @endif

            @if($check_setting->image_protection == 1)

                document.ondragstart = function () {
                return false;
                };
                document.onkeydown = function (e) {
                return false;
                };
                document.addEventListener('contextmenu', event => event.preventDefault());

            @endif
    @endif
@endif


