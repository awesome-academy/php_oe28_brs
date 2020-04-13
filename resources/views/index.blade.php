{{ trans('welcome') }} {{ Auth::user()->full_name }}
<form action="{{ route('logout') }}" method="post">
    @csrf
    <button type="submit" class="btn btn-link">{{ trans('menus.logout') }}</button>
</form>
