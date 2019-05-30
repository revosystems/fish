<div class="row {{ App\Models\TypeSegment::RETAIL_SEGMENT_FRANCHISE . ' ' . App\Models\TypeSegment::XEF_SEGMENT_MEDIUM . ' ' . App\Models\TypeSegment::XEF_SEGMENT_LARGE }}" style="display: none;">
    <div class="col-sm-6 col-md-6">
        @include('app.lead.components.select', ['name' => 'erp', 'options' => App\Models\Erp::all(), 'hasOther' => true, 'hasNone' => true])
    </div>
    <div class="col-sm-6 col-md-6">
        @include('app.lead.partials.select-other', ['name' => 'erp'])
    </div>
</div>
