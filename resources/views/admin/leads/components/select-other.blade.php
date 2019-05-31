@php $otherName = "{$name}_other"; @endphp
<div class="form-group ml-5 @if ($lead->$name != -1)disabled @endif">
    <input type="text" name="{{$otherName}}" id="{{$otherName}}" value="{{ old($otherName) ? : $lead->$otherName }}" placeholder="{{ __('app.lead.specify') }}" class="form-control" @if ($lead->$name != -1)disabled @endif>
</div>
