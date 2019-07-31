<a class="secondary button" onclick="shiftInterval(-1)"><</a>
<a class="button secondary dropdown">
    @icon(calendar)
    {{ Carbon\Carbon::parse($filters->valueFor('start_date'))->format("jS F Y") }} -
    {{ Carbon\Carbon::parse($filters->valueFor('end_date'))->format("jS F Y") }}
</a>
<div class="dropdown-container ml5">
    <div class="grid">
        <div class="pr3">
            <ul class="mt-2">
                <li><a class="pointer" onclick="filterSetToday()">{{ __('reports.today') }}</a></li>
                <li><a class="pointer" onclick="filterSetYesterday()">{{ __('reports.yesterday') }}</a></li>
                <li><a class="pointer" onclick="filterSetThisWeek()">{{ __('reports.thisWeek') }}</a></li>
                <li><a class="pointer" onclick="filterSetThisMonth()">{{ __('reports.thisMonth') }}</a></li>
                <li><a class="pointer" onclick="filterSetLastDays(30)">{{ __('reports.last30days') }}</a></li>
                <li><a class="pointer" onclick="filterSetLastDays(60)">{{ __('reports.last60days') }}</a></li>
                <li><a class="pointer" onclick="filterSetLastDays(90)">{{ __('reports.last90days') }}</a></li>
                <li><a class="button secondary pointer" onclick="$('#custom-date-range').show('fast')">{{ __('reports.customRange') }}</a></li>
            </ul>
        </div>
        <div id="custom-date-range" class="pl3 pt1 hidden bl">
            @icon(calendar)
            {{ Form::input('date', 'start_date', $filters->valueFor('start_date'), ["id" => "start_date"]) }}
            {{ Form::input('date', 'end_date',   $filters->valueFor('end_date'), ["id" => "end_date"]) }}
            <div class="mt3 text-right"><button id="filter_date_button"> {{ __('reports.filter') }}</button></div>
        </div>
    </div>
</div>
<a class="secondary button" onclick="shiftInterval(1)">></a>

@if (isset($groupByDate) && $groupByDate)
    @icon(calendar)
    {{ Form::select('groupByDate', [
        ""              => "--",
        'day'           => trans_choice('reports.day',          1),
        'dayOfWeek'     => trans_choice('reports.dayOfWeek',    1),
        'week'          => trans_choice('reports.week',         1),
        'month'         => trans_choice('reports.month',        1),
        ], $filters->valueFor('groupByDate'), ["id" => "group-by-date" ]) }}
@endif

<script>

    function filterSetToday(){
        var today = moment().format('YYYY-MM-DD');
        $('#start_date').val( today );
        $('#end_date')  .val( today );
        $('#filter_date_button').click();
    }

    function filterSetYesterday() {
        var yesterday   = moment().subtract(1, 'days').format('YYYY-MM-DD');
        $('#start_date').val( yesterday );
        $('#end_date')  .val( yesterday );
        $('#filter_date_button').click();
    }

    function filterSetThisWeek() {
        var start   = moment().startOf('week').add(1,'days').format('YYYY-MM-DD');
        var end     = moment().endOf('week').add(1,'days').format('YYYY-MM-DD');
        $('#start_date').val( start );
        $('#end_date')  .val( end );
        $('#filter_date_button').click();
    }

    function filterSetThisMonth() {
        var start   = moment().startOf('month').format('YYYY-MM-DD');
        var end     = moment().endOf('month').format('YYYY-MM-DD');
        $('#start_date').val( start );
        $('#end_date')  .val( end );
        $('#filter_date_button').click();
    }

    function filterSetLastDays( days ) {
        var start   = moment().subtract(days, 'days').format('YYYY-MM-DD');
        var end     = moment().format('YYYY-MM-DD');
        $('#start_date').val( start );
        $('#end_date')  .val( end );
        $('#filter_date_button').click();
    }

    Date.prototype.addDays = function(days) {
        var date = new Date(this.valueOf());
        date.setDate(date.getDate() + days);
        return date;
    };

    function formatDate(date) {
        var dd = date.getDate();
        var mm = date.getMonth() + 1; //January is 0!
        var yyyy = date.getFullYear();
        if (dd<10) {
            dd = '0' + dd;
        }
        if (mm<10) {
            mm = '0' + mm;
        }
        return yyyy + '-' + mm + '-' + dd;
    }

    function shiftInterval(sign) {
        var start       = new Date('{{ $filters->valueFor('start_date') }}');
        var end         = new Date('{{ $filters->valueFor('end_date') }}');
        const millisecondsForDay = 3600*24*1000;
        var interval    = (end - start) / millisecondsForDay;
        start   = start.addDays(interval ? interval*sign : sign);
        end     = end.addDays(interval ? interval*sign : sign);
        $('#start_date').val( formatDate(start) );
        $('#end_date')  .val( formatDate(end) );
        $('#filter_date_button').click();
    }
</script>