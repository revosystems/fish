<div class="row row_title bold upper">
    <div class="col-sm-12">{{ __('app.lead.informationTitle') }}</div>
</div>
<div class="row">
    <div class="col-sm-4">
        @include('components.lead.app-input', ['name' => 'name'])
    </div>
    <div class="col-sm-4">
        @include('components.lead.app-input', ['name' => 'surname1'])
    </div>
    <div class="col-sm-4">
        @include('components.lead.app-input', ['name' => 'surname2'])
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        @include('components.lead.app-input', ['name' => 'trade_name'])
    </div>
    <div class="col-sm-6">
        @include('components.lead.app-input', ['name' => 'email'])
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        @include('components.lead.app-input', ['name' => 'phone'])
    </div>
    <div class="col-sm-6">
        @include('components.lead.app-input', ['name' => 'city'])
    </div>
</div>
