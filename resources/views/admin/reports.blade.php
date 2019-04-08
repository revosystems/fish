@extends('layouts.admin')

@section('content')
    @each('thrust::metrics.panel', $metrics, 'metric')
@stop

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
@stop