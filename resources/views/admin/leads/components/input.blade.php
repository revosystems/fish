<div class="form-group">
    <div class="input-group @if($errors->has($name)) is-invalid' @endif ">
        <input type="text" name="{{ $name }}" id="{{ $name }}" value="{{ old($name) ? : $object->$name }}" type="{{$type ?? 'text'}}" placeholder="{{ __("app.lead." . ($title ?? $name)) }}" class="form-control" >
    </div>
    @include('app.lead.components.error-field', compact('name'))
</div>

