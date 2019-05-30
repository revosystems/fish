<div class="row @segmentClasses(App\Models\Product::XEF)" style="display: none;">
    <div class="col-sm-6 col-md-6">
        @include('app.lead.components.select', ['name' => 'xef_pms', 'title' => 'xefPms', 'options' => App\Models\XefPms::all(), 'disabled' => old('xef_general_typology') != App\Models\GeneralTypology::HOTEL, 'hasOther' => true, 'hasNone' => true])
    </div>
    <div class="col-sm-6 col-md-6">
        @include('app.lead.partials.select-other', ['name' => 'xef_pms'])
    </div>
</div>
