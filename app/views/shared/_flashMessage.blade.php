@if (Session::has('flash_message'))
    <div class="alert alert-{{ Session::get('flash_type') }}">
        {{ Session::get('flash_message') }}
    </div>
@endif