<ul class="menu right">
    <li><a class="{{ setActive('revo') }} revo"     href="{{ route("home") }}"><img src="{{ asset('images/logo-mini.png') }}" alt="{{ __('app.pages.revo') }}"><span>{{ __('app.pages.revo') }}</span></a></li>
    <li><a class="{{ setActive('contact') }}"       href="{{ route("contact") }}">{{ __('app.pages.contact') }}</a></li>
    <li><a class="{{ setActive('resources') }}"     href="{{ route("resources") }}">{{ __('app.pages.resources') }}</a></li>
    <li><a class=""                                 href="http://support.revo.works/es" target="_blank">{{ __('app.pages.support') }}</a></li>
    <li><a class="{{ setActive('lead.create') }}"   href="{{ route("lead.create") }}">{{ __('app.pages.lead') }}</a></li>
    <li><a class="{{ setActive('crm') }}"           href="{{ route('thrust.index', ['organizations']) }}">{{ __('app.pages.crm') }}</a></li>
    <li><a class=""                                 href="{{route("logout")}}"><i class="fa fa-sign-out"></i></a></li>
</ul>
