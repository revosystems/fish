<div class="card-header border-bottom">
    <h6 class="m-0"> {{ __('app.lead.clientTitle') }} </h6>
</div>
<div class="card-body p-3">
    <div class="row">
        <div class="col-sm-12">
            @include('admin.leads.components.select', ['object' => $lead, 'name' => 'product', 'options' => App\Models\Product::all()])
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            @include('admin.leads.components.select', ['object' => $lead, 'options' => \App\Models\TypeSegment::all(), 'name' => 'type_segment'])
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            @include('admin.leads.components.select', ['object' => $lead, 'options' => \App\Models\GeneralTypology::all()->where('product', $lead->product), 'name' => 'general_typology', 'title' => 'generalTypology'])
        </div>
    </div>

    @if($lead->product == App\Models\Product::XEF)
        <div class="row">
            <div class="col-sm-12">
                <div class="form-control" disabled="">
                    {{-- TODO: use multiple select--}}
                    <div>{{ __('app.lead.xefSpecificTypology') }}</div>
                    <div>{{ $lead->xefSpecificTypologyNames() }}</div>
                </div>
            </div>
        </div>
    @endif
</div>
