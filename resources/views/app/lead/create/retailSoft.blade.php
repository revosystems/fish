<div class="row" style="display: none;">
    <input type="hidden" name="retail_soft[]" value="">
    <div class="col-sm-6 col-md-6">
        <div class="form-group isPicker hasOverflow {{ $errors->has('retail_soft') ? ' is-invalid' : '' }}">
            <select class="selectpicker @if (old('retail_soft') !='') started @endif" name="retail_soft[]"
                    id="retail_soft" title="{{ __('app.lead.retailSoft') }}" data-size="5" multiple>
                @foreach($leadRetailSofts as $retailSofts)
                    <optgroup label="{{ $retailSofts->first()->softType->name}}">
                        @foreach($retailSofts as $soft)
                            <option value='{{$soft->id}}'
                                    @if (old('retail_soft') !='' && in_array($soft->id,old('retail_soft'))) {{ 'selected' }} @endif
                                    data-content="<div class='hideHint'>{{ __('app.lead.retailSoft') }} </div><span class='colored'> {{ $soft->name }}</span>">
                                {{ $soft->name }}
                            </option>
                        @endforeach
                    </optgroup>
                @endforeach
                <option value='other' @if (old('retail_soft') && in_array(('other'), old('retail_soft')))selected @endif data-content="<div class='hideHint'>{{ __('app.lead.retailSoft') }} </div><span class='colored'> {{ __('app.lead.other') }}</span>"> {{ __('app.lead.other') }} </option>
                <option value='none' @if (old('retail_soft') && in_array(('none'), old('retail_soft')))selected @endif data-content="<div class='hideHint'>{{ __('app.lead.retailSoft') }} </div><span class='colored'> {{ __('app.lead.none') }}</span>"> {{ __('app.lead.none') }} </option>
            </select>
            @include('components.lead.app-error-field', ['name' => 'retail_soft'])
        </div>
    </div>
    <div class="col-sm-6 col-md-6">
        <div class="form-group hasDW @if (old('retail_soft') != -1) {{ 'disabled' }} @endif">
            <div class="input-group-text @if ($errors->has('retail_soft_other'))is-invalid @endif hasDependency">
                <span class="input-group-prepend"><i class="fa fa-angle-double-left"></i></span>
                <input type="text" name="retail_soft_other" id="retail_soft_other" value="{{ old('retail_soft_other') }}" placeholder="{{ __('app.lead.specify') }}" class="form-control" @if (old('retail_soft') != -1) {{ 'disabled' }} @endif >
            </div>
            @include('components.lead.app-error-field', ['name' => 'retail_soft_other'])
        </div>
    </div>
</div>
