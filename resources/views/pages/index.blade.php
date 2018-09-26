<h1>Salam Papalam</h1>

@guest
    <a href="{{ route('login') }}">Login blyat</a>
@else
    <a href=" {{ route('logout') }}"
       onclick="event.preventDefault();
       document.getElementById('logout-form').submit();">Cix suka</a>
@endguest

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>