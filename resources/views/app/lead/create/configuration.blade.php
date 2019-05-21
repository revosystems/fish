<div class="row @segmentClasses() row_title bold upper" style="display: none;">
    <div class="col-sm-12">{{ __('app.lead.configurationTitle') }}</div>
</div>

@include('app.lead.create.devices')
@include('app.lead.create.kds')
@include('app.lead.create.sales')

@include('app.lead.create.pos')
@include('app.lead.create.pms')
@include('app.lead.create.erp')
@include('app.lead.create.soft')
