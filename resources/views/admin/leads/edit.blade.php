@php
    $productName = $lead->product['key'];
@endphp

<div class="card card-small mb-4">
    @include('admin.leads.partials.segmentation')
</div>
<div class="card card-small mb-4">
    @include('admin.leads.partials.generalInfo')
</div>
<div class="card card-small mb-4">
    @include('admin.leads.partials.property')
</div>
<div class="card card-small mb-4">
@include('admin.leads.partials.configuration')</div>