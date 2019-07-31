<div id="filters-applied" class="mv4">
        @php $descriptions = App\Reports\Filters\FiltersNames::filtersDescriptions() @endphp
    @foreach($descriptions as $description)
        <span class="br1 bg-lighter-gray black ph2 pv1 mr2 fs1 shadow-outer-1"> {{ $description }} </span>
    @endforeach
    @if (count($descriptions))<a href="?" class="secondary">@icon(ban)</a> @endif
</div>
