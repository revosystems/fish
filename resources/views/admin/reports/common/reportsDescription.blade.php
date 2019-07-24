<div class="description">
    <span class="title">
        @if(is_array($title))
            @foreach($title as $text)
                @if(is_array($text))     {{ link_to($text[1],$text[0]) }} /
                @else                    {{ $text }}
                @endif
            @endforeach
        @else
            {{ $title }}
        @endif
    </span>
    @if( $filters )
        @include('admin.reports.common.filtersForm', $filters)
    @endif


    <div class="actions">
        @if(isset($actions))
            @foreach($actions as $action)
                <a href="{{$action['url']}}" class="button secondary"> {!! icon($action['icon']) !!} {{$action['title']}} </a>&nbsp;
            @endforeach
        @endif
        @if (isset($export) )
            @include("admin.common.exportButton")
        @endif
    </div>
</div>

@if( isset($withChart) && $withChart )
    <div class="description mt4">
        <div class="pb3 bold">{{ __('admin.top10') }}</div>
        <div class="mb2">
            <canvas id="chart"></canvas>
        </div>
    </div>
@endif
