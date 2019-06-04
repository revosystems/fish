@php
    $hardware = $lead->product == App\Models\Product::XEF ? ['Caja', 'Comandero', 'KDS cocina', 'KIOSK "Pre-Order, In-Room & In-Table"', 'Payment', 'Printers', 'Wifi', 'Balanzas y lectores' ] : ;
@endphp
<table class="table">
    <thead>
    <tr>
        <th class="title">HARDWARE</th>
    </tr>
    </thead>
    <tbody>
    @foreach($hardware as $item)
        <tr>
            <td>
                {!!$item!!}
            </td>
    @endforeach
    </tbody>
</table>
