<div class="form-group hasDW @if (old($name) !== "-1")disabled @endif ">
    <div class="input-group-text @if ($errors->has("{$name}_other"))is-invalid @endif hasDependency">
        <span class="input-group-prepend"><i class="fa fa-angle-double-left"></i></span>
        <input type="text" name="{{$name}}_other" id="{{$id ?? $name}}_other" value="{{ old("{$name}_other") }}" placeholder="{{ __('app.lead.specify') }}" class="form-control" @if (old($name) !== "-1")disabled @endif >
    </div>
    @include('app.lead.components.error-field', ['name' => "{$name}_other"])
</div>
