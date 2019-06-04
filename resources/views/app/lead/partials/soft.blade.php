<div class="row show-on-{{App\Models\Product::XEF}}" style="display: none;">
    <div class="col-sm-6 col-md-6">
        @include('app.lead.partials.softRow', ['options' => App\Models\Soft::groupedBy(App\Models\Product::XEF), 'name' => 'xef_soft', 'title' => 'xefSoft', ])
    </div>
    <div class="col-sm-6 col-md-6">
        @include('app.lead.partials.select-other', ['name' => 'xef_soft'])
    </div>
</div>

<div class="row show-on-{{App\Models\Product::RETAIL}}" style="display: none;">
    <div class="col-sm-6 col-md-6">
        @include('app.lead.partials.softRow', ['options' => App\Models\Soft::groupedBy(App\Models\Product::RETAIL), 'name' => 'retail_soft', 'title' => 'retailSoft', ])
    </div>
    <div class="col-sm-6 col-md-6">
        @include('app.lead.partials.select-other', ['name' => 'retail_soft'])
    </div>
</div>