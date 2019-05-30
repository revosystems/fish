<div class="card-header border-bottom">
    <h6 class="m-0"> {{ __('app.lead.informationTitle') }} </h6>
</div>
<div class="card-body p-3">
    <div class="row">
        <div class="col-sm-12">
            @include('admin.leads.components.input', ['name' => 'name', 'object' => $lead])
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            @include('admin.leads.components.input', ['name' => 'surname1', 'object' => $lead])
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            @include('admin.leads.components.input', ['name' => 'surname2', 'object' => $lead])
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            @include('admin.leads.components.input', ['name' => 'trade_name', 'object' => $lead])
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            @include('admin.leads.components.input', ['name' => 'email', 'object' => $lead])
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            @include('admin.leads.components.input', ['name' => 'phone', 'object' => $lead])
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            @include('admin.leads.components.input', ['name' => 'city', 'object' => $lead])
        </div>
    </div>
</div>
