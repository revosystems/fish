<div class="row @segmentClasses()" style="display: none;">
    <div class="col-sm-6 col-md-6">
        @include('app.lead.components.select', ['name' => 'pos', 'options' => App\Models\Pos::all(), 'hasOther' => true, 'hasNone' => true])
    </div>
    <div class="col-sm-6 col-md-6">
        @include('app.lead.partials.select-other', ['name' => 'pos'])
    </div>
</div>
<div class="row @segmentClasses()" style="display: none;">
    <div class="col-sm-12 col-md-12">
        @include('app.lead.components.select', ["options" => ['1' => __('app.lead.yes'), '0' => __('app.lead.no')], 'name' => 'franchise_pos_external', 'title' => 'franchisePosExternal', 'disabledOn' => 'xef_property_franchise'])
    </div>
</div>
