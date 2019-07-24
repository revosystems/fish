<div id="filters-applied" class="mv4">
    @foreach(App\Reports\Filters\FiltersNames::filtersDescriptions() as $description)
        <span class="br1 bg-lighter-gray black ph2 pv1 mr2 fs1 shadow-outer-1"> {{ $description }} </span>
    @endforeach
</div>