<div class="card-header border-bottom">
    <h6 class="m-0"> {{ __('app.lead.configurationTitle') }} </h6>
</div>
<div class="card-body p-3">
    @if($lead->product == App\Models\Product::XEF)
        @include('admin.leads.partials.xef-devices')
        @include('admin.leads.partials.kds')
    @endif
    @include('admin.leads.partials.devices')
    @if($lead->product == App\Models\Product::RETAIL)
        <div class="row">
            <div class="col-sm-12">
                @include('admin.leads.partials.sales')
            </div>
        </div>
    @endif
    @include('admin.leads.partials.pos')
    @if($lead->product == App\Models\Product::XEF)
        @include('admin.leads.partials.pms')
    @endif
    <div class="row">
        <div class="col-sm-12">
            @include('admin.leads.partials.soft')
        </div>
    </div>
    @if($lead->product == App\Models\Product::RETAIL)
        <div class="row">
            <div class="col-sm-12">
                @include('admin.leads.partials.sale-location')
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-sm-12">
            @include('admin.leads.partials.can-use-another-pos')
        </div>
    </div>
    @include('admin.leads.partials.erp')
</div>
