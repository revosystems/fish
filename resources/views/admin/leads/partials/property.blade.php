<div class="card-header border-bottom">
    <h6 class="m-0"> {{ __('app.lead.propertyTitle') }} </h6>
</div>
<div class="card-body p-3">
    <div class="row">
        <div class="col-sm-12">
            @include('admin.leads.components.input', ['name' => 'property_quantity', 'title' => 'propertyQuantity', 'object' => $lead])
        </div>
    </div>
    @if($lead->product == App\Models\Product::XEF)
        <div class="row">
            <div class="col-sm-12">
                @include('admin.leads.partials.property-xef-franchise')
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-sm-12">
            @include('admin.leads.components.select', ['options' => App\Models\PropertySpace::all()->where('product', $lead->product), 'name' => 'property_space', 'title' => 'propertySpaces'])
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            @include('admin.leads.components.input', ['name' => 'property_capacity', 'title' => $lead->product == App\Models\Product::XEF ? 'xefPropertyCapacity' : 'retailPropertyStaffQuantity', 'object' => $lead])
        </div>
    </div>
</div>
