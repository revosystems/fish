@extends('layouts.admin')

@section('content')
    <div class="card card-small mb-4">
        @each('thrust::metrics.panel', $metrics, 'metric')
    </div>
@stop

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
@stop