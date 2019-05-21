<div class="form-group">
    <div class="input-group @if($errors->has($name)) is-invalid' @endif ">
        <input type="text" name="{{ $name }}" id="{{ $name }}" value="{{ old($name) }}" placeholder="{{ __("app.lead." . ($title ?? $name)) }}" class="form-control" >
    </div>
    @include('components.lead.app-error-field', compact('name'))
</div>

