<input type="hidden" name="soft[]" value="">
<div class="form-group isPicker @if ($errors->has("soft"))is-invalid @endif">
    <select class="selectpicker form-control started" name="soft[]"
            id="soft" title="{{ __('app.lead.xefSoft') }}" data-size="5"
            data-style="btn-light" multiple>
        @foreach(App\Models\Soft::all()->where('product', $lead->product)->groupBy("softType") as $softs)
            <optgroup label="{{ App\Models\SoftType::find($softs->first()['softType'])->reference['name'] }}">
                @foreach($softs as $key => $value)
                    <option value='{{$key}}'
                            @if (in_array($key, explode(",",old("soft"))) || in_array($key,explode(",", $lead->soft)))selected
                            @endif data-content="<div class='hideHint'>{{ __('app.lead.xefSoft') }} </div><span class='colored'> {{ $value['name'] }}</span>">
                        {{ $value['name'] }}
                    </option>
                @endforeach
            </optgroup>
        @endforeach
        <option value='other' @if(in_array("other", explode(",", $lead->soft)))selected
                @endif data-content="<div class='hideHint'>{{ __('app.lead.xefSoft') }} </div><span class='colored'> {{ __('app.lead.other') }}</span>"> {{ __('app.lead.other') }} </option>
        <option value='none' @if(in_array("none", explode(",", $lead->soft)))selected
                @endif data-content="<div class='hideHint'>{{ __('app.lead.xefSoft') }} </div><span class='colored'> {{ __('app.lead.none') }}</span>"> {{ __('app.lead.none') }} </option>
    </select>

    @include('admin.leads.components.error-field', ['name' => 'soft'])
</div>
