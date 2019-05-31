<div class="row @segmentClasses(App\Models\Product::XEF)" style="display: none;">
    <div class="col-sm-6 col-md-6">
        @include('app.lead.components.select', ['options' => App\Models\Soft::all()->where('product', App\Models\Product::XEF), 'name' => 'xef_soft', 'title' => 'xefSoft', 'hasOther' => true, 'hasNone' => true])
    </div>
    <div class="col-sm-6 col-md-6">
        @include('app.lead.partials.select-other', ['name' => 'xef_soft'])
    </div>
</div>
<div class="row @segmentClasses(App\Models\Product::RETAIL)" style="display: none;">
    <div class="col-sm-6 col-md-6">
        @include('app.lead.components.select', ['options' => App\Models\Soft::all()->where('product', App\Models\Product::RETAIL), 'name' => 'retail_soft', 'title' => 'retailSoft', 'hasOther' => true, 'hasNone' => true])
    </div>
    <div class="col-sm-6 col-md-6">
        @include('app.lead.partials.select-other', ['name' => 'retail_soft'])
    </div>
</div>
