@if (session('store'))
    <span class="text-success">{{session('store')}}</span>
@endif
@if (session('destroy'))
    <span class="text-danger">{{session('destroy')}}</span>
@endif
@if (session('update'))
    <span class="text-success">{{session('update')}}</span>
@endif