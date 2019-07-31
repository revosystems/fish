<div class="filters">
    @if(isset($url)) {{ Form::open(["url" => $url, 'method'=>'get']) }}
    @else            {{ Form::open(["url" => request()->getUri(), 'method'=>'get']) }}    @endif

    @foreach($filterForms as $filter)
        @if($filter == 'dates')
            @include('admin.reports.common.dateFilters')
        @endif
    @endforeach

    <a class="button secondary" onclick="$('#filters').slideToggle('fast'); $('#filters-applied').slideToggle('fast');"> @icon(filter) {{ __("reports.showFilters") }}</a>
    <div id="filters" class="hidden mt4">
        @foreach($filterForms as $filter)
            @if($filter == 'product')
                @icon(barcode)
                {{ Form::select('product', ["" => "--"] + App\Models\Product::all()->map(function($p1) {return $p1["name"];})->toArray(), $filters->valueFor('product')) }}
            @elseif($filter == 'type_segment')
                @icon(barcode)
                {{ Form::select('type_segment', ["" => "--"] + App\Models\TypeSegment::all()->map(function($p1) {return $p1["name"];})->toArray(), $filters->valueFor('type_segment')) }}
            @elseif($filter == 'general_typology')
                @icon(barcode)
                {{ Form::select('general_typology', ["" => "--"] + App\Models\GeneralTypology::all()->map(function($p1) {return $p1["name"];})->toArray(), $filters->valueFor('general_typology')) }}
            @elseif($filter == 'property_spaces')
                @icon(barcode)
                {{ Form::select('property_spaces', ["" => "--"] + App\Models\PropertySpace::all()->map(function($p1) {return $p1["name"];})->toArray(), $filters->valueFor('property_spaces')) }}
            @elseif($filter == 'property_franchise')
                @icon(barcode)
                {{ Form::select('property_franchise', ["" => "--", "1" => __('reports.property_franchise'), "0" => __('reports.no'),], $filters->valueFor('property_franchise')) }}
            @elseif($filter == 'status')
                @icon(bookmark)
                {{ Form::select('status', ["" => "--"] + App\Models\Status::all()->map(function($p1) {return $p1["name"];})->toArray(), $filters->valueFor('status')) }}
            @elseif($filter == 'user_id')
                @icon(user)
                {{ Form::select('user_id', createSelectArray(App\Models\User::all(), true), $filters->valueFor('user_id')) }}
            @endif
        @endforeach

        @if( isset($groupBy) )
            @icon(pie-chart)
            {{ Form::select('groupBy[]', $groupBy, $filters->valueFor('groupBy'), ['multiple' => true]) }}
        @endif
        @if( $filterForms )
            <button>@icon(filter) {{ __('reports.filter') }}</button>
        @endif
    </div>
    {{ Form::close()}}

    @include('admin.reports.common.filtersApplied')

</div>
