@if ($errors->has($name))
    <span class="invalid-feedback" role="alert">{{ $errors->first($name) }}</span>
@endif
