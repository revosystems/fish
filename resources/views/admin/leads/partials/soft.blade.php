<div class="row">
    <div class="col-sm-12">
        <div class="form-group isPicker">
            {{-- TODO: use multiple select --}}
            <select class="selectpicker form-control started" title="{{ __("app.lead.xefSoft") }}" data-style="btn-light" data-size="5">
            </select>
            <div class="ml-5">{{ $lead->softwareNames() }}</div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="form-group ml-5">
            <input type="text" name="soft_other" id="soft_other" value="{{ old('soft_other') ? : $lead->soft_other }}" placeholder="{{ __('app.lead.specify') }}" class="form-control">
        </div>
    </div>
</div>