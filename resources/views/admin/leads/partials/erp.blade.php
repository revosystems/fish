<div class="row">
    <div class="col-sm-12">
        @include('admin.leads.components.select', ['object' => $lead, 'options' => \App\Models\Erp::all(), 'name' => 'erp', 'hasOther' => true, 'hasNone' => true])
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        @include('admin.leads.components.select-other', ['name' => 'erp'])
    </div>
</div>
