<div class="row">
    <div class="col-sm-12">
        <div class="form-group isPicker @if ($errors->has('pos'))is-invalid @endif">
            <select class="selectpicker form-control started" name="pos" id="pos" title="{{ __('app.lead.pos') }}"
                    data-style="btn-light" data-size="5">
                @foreach(App\Models\Pos::all() as $key => $value)
                    <option value='{{$key}}' @if ($lead->pos == $key)selected
                            @endif data-content="<div class='hideHint'>{{ __('app.lead.pos') }} </div><div class='colored'> {{ $value['name'] }}</div>">
                        {{ $value['name'] }}
                    </option>
                @endforeach
                <option data-divider="true"></option>
                <option value='-1' @if ($lead->pos == -1)selected
                        @endif data-content="<div class='hideHint'>{{ __('app.lead.pos') }} </div><span class='colored'> {{ __('app.lead.other') }}</span>"> {{ __('app.lead.other') }} </option>
                <option value='-2' @if ($lead->pos == -2)selected
                        @endif data-content="<div class='hideHint'>{{ __('app.lead.pos') }} </div><span class='colored'> {{ __('app.lead.none') }}</span>"> {{ __('app.lead.none') }} </option>
            </select>

            @if ($errors->has('pos'))
                <span class="invalid-feedback" role="alert">{{ $errors->first('pos') }}</span>
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="form-group ml-5 @if ($lead->pos != -1)disabled @endif">
            <input type="text" name="pos_other" id="pos_other" value="{{ old('pos_other') ? : $lead->pos_other }}"
                   placeholder="{{ __('app.lead.specify') }}" class="form-control"
                   @if ($lead->pos != -1)disabled @endif>
        </div>
    </div>
</div>
