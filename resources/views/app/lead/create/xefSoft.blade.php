<div class="row {{App\Models\LeadTypesSegment::XEF_SEGMENT_MEDIUM}} {{App\Models\LeadTypesSegment::XEF_SEGMENT_LARGE}}" style="display: none;">
    <input type="hidden" name="xef_soft[]" value="">
    <div class="col-sm-6 col-md-6">
        <div class="form-group isPicker hasOverflow {{ $errors->has('xef_soft') ? ' is-invalid' : '' }}">
            <select class="selectpicker @if (old('xef_soft') !='') started @endif" name="xef_soft[]" id="xef_soft" title="{{ __('app.lead.xefSoft') }}" data-size="5" multiple>
                @foreach($leadXefSofts as $xefSofts)
                    <optgroup label="{{ $xefSofts->first()->softType->name}}">
                        @foreach($xefSofts as $soft)
                            <option value='{{$soft->id}}' @if (old('xef_soft') !='' && in_array($soft->id,old('xef_soft'))) {{ 'selected' }} @endif data-content="<div class='hideHint'>{{ __('app.lead.xefSoft') }} </div><span class='colored'> {{ $soft->name }}</span>">
                                {{ $soft->name }}
                            </option>
                        @endforeach
                    </optgroup>
                @endforeach
                <option value='other' @if (old('xef_soft')) {{ in_array(('other'),old('xef_soft')) ? ' selected':'' }} @endif data-content="<div class='hideHint'>{{ __('app.lead.xefSoft') }} </div><span class='colored'> {{ __('app.lead.other') }}</span>"> {{ __('app.lead.other') }} </option>
                <option value='none' @if (old('xef_soft')) {{ in_array(('none'),old('xef_soft')) ? ' selected':'' }} @endif data-content="<div class='hideHint'>{{ __('app.lead.xefSoft') }} </div><span class='colored'> {{ __('app.lead.none') }}</span>"> {{ __('app.lead.none') }} </option>
            </select>

            @include('components.lead.app-error-field', ['name' => 'xef_soft'])
        </div>
    </div>
    <div class="col-sm-6 col-md-6">
        <div class="form-group hasDW @if (old('xef_soft') != -1) {{ 'disabled' }} @endif">
            <div class="input-group-text @if ($errors->has('xef_soft_other'))is-invalid @endif hasDependency">
                <span class="input-group-prepend"><i class="fa fa-angle-double-left"></i></span>
                <input type="text" name="xef_soft_other" id="xef_soft_other" value="{{ old('xef_soft_other') }}" placeholder="{{ __('app.lead.specify') }}" class="form-control" @if (old('xef_soft') != -1) {{ 'disabled' }} @endif >
            </div>
            @include('components.lead.app-error-field', ['name' => 'xef_soft_other'])
        </div>
    </div>
</div>
