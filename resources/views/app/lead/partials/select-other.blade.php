<div class="form-group hasDW @if (old($name) !== "-1")disabled @endif ">
    <div class="input-group-text @if ($errors->has("{$name}_" . ($otherField ?? "other")))is-invalid @endif hasDependency">
        <span class="input-group-prepend"><i class="fa fa-angle-double-left"></i></span>
        <input type="text" name="{{$name}}_{{$otherField ?? "other"}}" id="{{$id ?? $name}}_{{$otherField ?? "other"}}" value="{{ old("{$name}_" . ($otherField ?? "other")) }}"
               placeholder="{{ __('app.lead.specify') }}"
               class="form-control" @if (old($name) !== "-1") {{ 'disabled' }} @endif >
    </div>
    @include('app.lead.components.error-field', ['name' => "{$name}_" . ($otherField ?? "other")])
</div>
