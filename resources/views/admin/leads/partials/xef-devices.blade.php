<div class="row">
    <div class="col-sm-12">
        @include('admin.leads.components.input', ['name' => 'xef_pos_critical_quantity', 'title' => 'xefPosCriticalQuantity', 'object' => $lead])
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        @include('admin.leads.components.input', ['name' => 'xef_cash_quantity', 'title' => 'xefCashQuantity', 'object' => $lead])
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        @include('admin.leads.components.input', ['name' => 'xef_printers_quantity', 'title' => 'xefPrintersQuantity', 'object' => $lead])
    </div>
</div>
