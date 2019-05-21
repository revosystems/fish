<div class="row row_title bold upper">
    <div class="col-sm-12">{{ __('app.lead.clientTitle') }}</div>
</div>
<div class="row">
    <div class="col-sm-6">
        @include('components.lead.app-select', ["options" => App\Models\Lead::products(), 'name' => 'product', 'title' => 'type'])
    </div>
    <div class="col-sm-6">
        <input type="hidden" id="type_segment_old" value="{{ old('type_segment') }}"/>
        @include('components.lead.app-select', ["options" => [], 'name' => 'type_segment'])
    </div>
</div>

<div class="row @segmentClasses(App\Models\Lead::PRODUCT_XEF) " style="display: none;">
    <div class="col-sm-6">
        @include('components.lead.app-select', ["options" => App\Models\LeadGeneralTypology::whereProduct(App\Models\Lead::PRODUCT_XEF)->pluck('name', 'id'), 'name' => 'xef_general_typology_id', 'title' => 'generalTypology'])
    </div>
    <div class="col-sm-6">
        @include('components.lead.app-select', ["options" => App\Models\LeadXefSpecificTypology::all(), 'name' => 'xef_specific_typology_id', 'title' => 'xefSpecificTypology'])
    </div>
</div>
<div class="row @segmentClasses(App\Models\Lead::PRODUCT_RETAIL)" style="display: none;">
    <div class="col-sm-12">
        @include('components.lead.app-select', ["options" => App\Models\LeadGeneralTypology::whereProduct(App\Models\Lead::PRODUCT_RETAIL)->pluck('name', 'id'), 'name' => 'retail_general_typology_id', 'title' => 'generalTypology'])
    </div>
</div>

