<div class="row show-on-product" style="display: none;">
    <div class="col-sm-6 col-md-6">
        @include('app.lead.components.select', ['name' => 'erp', 'options' => App\Models\Erp::all(), 'hasOther' => true, 'hasNone' => true])
    </div>
    <div class="col-sm-6 col-md-6">
        @include('app.lead.partials.select-other', ['name' => 'erp'])
    </div>
</div>
