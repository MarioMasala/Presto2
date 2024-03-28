<form class="d-inline" action="{{route('setLocale', $lang)}}" method="POST">
    @csrf
    <button type="submit" class="btn">
        <img src="{{asset('vendor/blade-flags/language-' . $lang . ".svg")}}" width="20" height="20" alt="Bandiera selezione lingua">
    </button>
</form>