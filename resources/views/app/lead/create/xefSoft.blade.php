<div class="row {{App\Models\LeadTypesSegment::XEF_SEGMENT_MEDIUM}} {{App\Models\LeadTypesSegment::XEF_SEGMENT_LARGE}}" style="display: none;">
    <input type="hidden" name="soft[]" value="">
    <div class="col-sm-6 col-md-6">
        <div class="form-group isPicker hasOverflow @if($errors->has('soft'))is-invalid @endif">
            <select class="selectpicker @if (old('soft') !='')started @endif" name="soft[]" id="soft" title="{{ __('app.lead.xefSoft') }}" data-size="5" multiple>
                @foreach($leadXefSofts as $softs)
                    <optgroup label="{{ App\Models\LeadSoftType::find($softs->first()['softType'])['name'] }}">
                        @foreach($softs as $key => $value)
                            <option value='{{$key}}' @if (old('soft') !='' && in_array($key, old('soft')))selected @endif data-content="<div class='hideHint'>{{ __('app.lead.xefSoft') }} </div><span class='colored'> {{ $value['name'] }}</span>">
                                {{ $value['name'] }}
                            </option>
                        @endforeach
                    </optgroup>
                @endforeach
                <option value='other' @if (old('soft') && in_array(('other'), old('soft')))selected @endif data-content="<div class='hideHint'>{{ __('app.lead.xefSoft') }} </div><span class='colored'> {{ __('app.lead.other') }}</span>"> {{ __('app.lead.other') }} </option>
                <option value='none' @if (old('soft') && in_array(('none'), old('soft')))selected @endif data-content="<div class='hideHint'>{{ __('app.lead.xefSoft') }} </div><span class='colored'> {{ __('app.lead.none') }}</span>"> {{ __('app.lead.none') }} </option>
            </select>

            @include('components.lead.app-error-field', ['name' => 'soft'])
        </div>
    </div>
    <div class="col-sm-6 col-md-6">
        <div class="form-group hasDW @if (old('soft') != -1)disabled @endif">
            <div class="input-group-text @if ($errors->has('soft_other'))is-invalid @endif hasDependency">
                <span class="input-group-prepend"><i class="fa fa-angle-double-left"></i></span>
                <input type="text" name="soft_other" id="soft_other" value="{{ old('soft_other') }}" placeholder="{{ __('app.lead.specify') }}" class="form-control" @if (old('soft') != -1) {{ 'disabled' }} @endif >
            </div>
            @include('components.lead.app-error-field', ['name' => 'soft_other'])
        </div>
    </div>
</div>
