<div class="row row_title bold upper">
    <div class="col-sm-12">{{ __('app.lead.clientTitle') }}</div>
</div>
<div class="row">
    <div class="col-sm-6">
        @include('app.lead.components.select', ["options" => App\Models\Product::all(), 'name' => 'product'])
    </div>
    <div class="col-sm-6">
        @include('app.lead.components.select', ["options" => App\Models\TypeSegment::all(), 'name' => 'type_segment'])
    </div>
</div>

<div class="row show-on-{{App\Models\Product::XEF}}" style="display: none;">
    <div class="col-sm-6">
        @include('app.lead.components.select', ["options" => App\Models\GeneralTypology::all()->where('product', (App\Models\Product::XEF)), 'id' => 'general_typology', 'name' => 'xef_general_typology', 'title' => 'generalTypology'])
    </div>
    <div class="col-sm-6">
        @include('app.lead.components.select', ["options" => App\Models\XefSpecificTypology::all(), 'name' => 'xef_specific_typology', 'title' => 'xefSpecificTypology'])
    </div>
</div>
<div class="row show-on-{{App\Models\Product::RETAIL}}" style="display: none;">
    <div class="col-sm-12">
        @include('app.lead.components.select', ["options" => App\Models\GeneralTypology::all()->where('product', (App\Models\Product::RETAIL)), 'id' => 'general_typology', 'name' => 'retail_general_typology', 'title' => 'generalTypology'])
    </div>
</div>

