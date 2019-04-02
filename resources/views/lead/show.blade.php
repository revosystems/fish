@extends('layouts.app')
@section('html', 'onProposal')
@section('title', __('app.pageTitles.proposalLead').' '.$trade_name.' - ')
@section('content')
        <div class="section">
            <div class="container">
                <ul class="nav nav-pills mobileTab text-center" role="tablist">
                    <li role="presentation" class="active hidden-xs"><a role="tab" data-toggle="tab" href="#software">{{__('app.proposal.nav_software')}}</a></li>
                    <li role="presentation" class="hidden-xs"><a class="hasArrow" role="tab" data-toggle="tab" href="#hardware">{{__('app.proposal.nav_hardware')}}</a></li>
                    <li role="presentation" class="hidden-xs"><a class="hasArrow" role="tab" data-toggle="tab" href="#services">{{__('app.proposal.nav_services')}}</a></li>
                    <li role="presentation" class="dropdown visible-xs customSelect">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <span class="txt">{{__('app.proposal.nav_software')}}</span> <i class='fa fa-chevron-down right'></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="active"><a role="tab" data-toggle="tab" href="#software">{{__('app.proposal.nav_software')}}</a></li>
                            <li><a role="tab" data-toggle="tab" href="#hardware">{{__('app.proposal.nav_hardware')}}</a></li>
                            <li><a role="tab" data-toggle="tab" href="#services">{{__('app.proposal.nav_services')}}</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="software">
                        <ul class="gridder row">
                            @foreach($proposals as $item)
                                <li class="gridder-list" data-griddercontent="#content{{$loop->index}}">
                                    <div class="img-wrap"><img src="{{$item->media}}" /></div>
                                </li>
                                <div id="content{{$loop->index}}" class="gridder-content">
                                    <div class="row">
                                        <div class="col-sm-7">
                                            <h3 class="subtitle">{!!$item->name!!}</h3>
                                            {!!$item->description!!}
                                        </div>
                                        <div class="col-sm-5">
                                            <img src="{{$item->hero}}" />
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </ul>
                    </div>
                    <div role="tabpanel" class="tab-pane gridder-show" id="hardware">
                        <div class="row">
                            <div class="col-md-12 text-center"><div class="intro">{!! __('app.hardware.hard_title') !!}</div></div>
                        </div>
                        <div style="{{  $type === 2 ? "display:none" : "display:block" }}">
                            <div class="row">
                                <div class="col-md-12"><h3 class="subtitle">{{__('app.hardware.type_cash')}}</h3></div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    {{__('app.hardware.ipad_large_type_cash')}}
                                    <span class="product block text-center">{{__('app.hardware.ipad_large')}}</span>
                                    <img src="{{ asset(__('app.hardware.ipad_large_img')) }}">
                                </div>
                                <div class="col-md-6">
                                    {{__('app.hardware.ipad_stand_type_cash')}}
                                    <span class="product block text-center">{{__('app.hardware.ipad_stand')}}</span>
                                    <img src="{{ asset(__('app.hardware.ipad_stand_img')) }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"><hr><h3 class="subtitle">{{__('app.hardware.type_pos')}}</h3></div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    {{ __('app.hardware.ipad_iphone_type_pos') }}
                                    <span class="product block text-center">{{ __('app.hardware.ipad_iphone') }}</span>
                                    <img src="{{ asset(__('app.hardware.ipad_iphone_img')) }}">
                                </div>
                                <div class="col-md-6">
                                    {{ __('app.hardware.ipad_cover_type_pos') }}
                                    <span class="product block text-center"> {{ __('app.hardware.ipad_cover') }}</span>
                                    <img src="{{ asset(__('app.hardware.ipad_cover_img')) }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"><hr><h3 class="subtitle">{{__('app.hardware.type_kds')}}</h3></div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    {{ __('app.hardware.ipad_large_type_kds') }}
                                    <span class="product block text-center"> {{ __('app.hardware.ipad_large') }}</span>
                                    <img src="{{ asset( __('app.hardware.ipad_large_img')) }}">
                                </div>
                                <div class="col-md-6">
                                    {{ __('app.hardware.kds_stand_type_kds') }}
                                    <span class="product block text-center"> {{ __('app.hardware.kds_stand') }}</span>
                                    <img src="{{ asset( __('app.hardware.kds_stand_img')) }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"><hr><h3 class="subtitle">{{__('app.hardware.type_kiosk')}}</h3></div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    {{ __('app.hardware.ipad_large_type_kiosk') }}
                                    <span class="product block text-center">{{ __('app.hardware.ipad_large') }}</span>
                                    <img src="{{ asset( __('app.hardware.ipad_large_img')) }}">
                                </div>
                                <div class="col-md-6">
                                    {{__('app.hardware.kiosk_stand_type_kiosk')}}
                                    <span class="product block text-center">{{__('app.hardware.kiosk_stand')}}</span>
                                    <img src="{{ asset( __('app.hardware.kiosk_stand_img')) }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"><hr><h3 class="subtitle">{{__('app.hardware.type_payment')}}</h3></div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    {{__('app.hardware.itos_type_payment')}}
                                    <span class="product block text-center">{{__('app.hardware.itos')}}</span>
                                    <img src="{{ asset(__('app.hardware.itos_img')) }}">
                                </div>
                                <div class="col-md-6">
                                    {{__('app.hardware.infinity_type_payment')}}
                                    <span class="product block text-center">{{__('app.hardware.infinity')}}</span>
                                    <img src="{{ asset(__('app.hardware.infinity_img')) }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"><hr></div>
                                <div class="col-md-6">
                                    <h3 class="subtitle">{{__('app.hardware.type_printers')}}</h3>
                                    {{__('app.hardware.star_type_printers')}}
                                    <span class="product block text-center">{{__('app.hardware.star')}}</span>
                                    <img src="{{ asset(__('app.hardware.star_img')) }}">
                                </div>
                                <div class="col-md-6">
                                    <h3 class="subtitle">{{__('app.hardware.type_wifi')}}</h3>
                                    {{__('app.hardware.ubiquiti_type_wifi')}}
                                    <span class="product block text-center"> {{__('app.hardware.ubiquiti')}}</span>
                                    <img src="{{ asset(__('app.hardware.ubiquiti_img')) }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"><hr></div>
                                <div class="col-md-6">
                                    <h3 class="subtitle">{{__('app.hardware.type_balances')}}</h3>
                                    {{__('app.hardware.dibal_type_balances')}}
                                    <span class="product block text-center">{{__('app.hardware.dibal')}}</span>
                                    <img src="{{ asset(__('app.hardware.dibal_img')) }}">
                                </div>
                            </div>
                        </div>
                        <div style="{{  $type === 1 ? "display:none" : "display:block" }}">
                            <div class="row">
                                <div class="col-md-12"><h3 class="subtitle">{{__('app.hardware.type_cash_display')}}</h3></div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    {{__('app.hardware.ipad_large_type_display')}}
                                    <span class="product block text-center">{{ __('app.hardware.ipad_large') }}</span>
                                    <img src="{{ asset( __('app.hardware.ipad_large_img')) }}">
                                </div>
                                <div class="col-md-6">
                                    {{__('app.hardware.ipad_stand_type_display')}}
                                    <span class="product block text-center">{{__('app.hardware.ipad_stand')}}</span>
                                    <img src="{{ asset(__('app.hardware.ipad_stand_img')) }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"><hr><h3 class="subtitle">{{__('app.hardware.type_cash_mobile')}}</h3></div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    {{__('app.hardware.ipad_ipmini_type_cmobile')}}
                                    <span class="product block text-center">{{__('app.hardware.ipad_ipmini')}}</span>
                                    <img src="{{ asset(__('app.hardware.ipad_ipmini_img')) }}">
                                </div>
                                <div class="col-md-6">
                                    {{__('app.hardware.ipad_cover_type_cmobile')}}
                                    <span class="product block text-center"> {{__('app.hardware.ipad_cmobile_cover')}}</span>
                                    <img src="{{ asset(__('app.hardware.ipad_cover_cmobile_img')) }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"><hr><h3 class="subtitle">{{__('app.hardware.type_payment')}}</h3></div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    {{__('app.hardware.itos_type_payment')}}
                                    <span class="product block text-center">{{__('app.hardware.itos')}}</span>
                                    <img src="{{ asset(__('app.hardware.itos_img')) }}">
                                </div>
                                <div class="col-md-6">
                                    {{__('app.hardware.infinity_type_payment')}}
                                    <span class="product block text-center">{{__('app.hardware.infinity')}}</span>
                                    <img src="{{ asset(__('app.hardware.infinity_img')) }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"><hr><h3 class="subtitle">{{__('app.hardware.type_balances')}}</h3></div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    {{__('app.hardware.dibal_type_balances')}}
                                    <span class="product block text-center">{{__('app.hardware.dibal')}}</span>
                                    <img src="{{ asset(__('app.hardware.dibal_img')) }}">
                                </div>
                                <div class="col-md-6">
                                    {{__('app.hardware.motorola_type_balances')}}
                                    <span class="product block text-center">{{__('app.hardware.motorola')}}</span>
                                    <img src="{{ asset(__('app.hardware.motorola_img')) }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"><hr></div>
                                <div class="col-md-6">
                                    <h3 class="subtitle">{{__('app.hardware.type_warehouse')}}</h3>
                                    {{__('app.hardware.ipad_ipmini_type_ware')}}
                                    <span class="product block text-center">{{__('app.hardware.ipad_ipmini')}}</span>
                                    <img src="{{ asset(__('app.hardware.ipad_ipmini_img')) }}">
                                </div>
                                <div class="col-md-6">
                                    <h3 class="subtitle">{{__('app.hardware.type_printers')}}</h3>
                                    {{__('app.hardware.star_type_printers')}}
                                    <span class="product block text-center">{{__('app.hardware.star')}}</span>
                                    <img src="{{ asset(__('app.hardware.star_img')) }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12"><hr></div>
                                <div class="col-md-6">
                                    <h3 class="subtitle">{{__('app.hardware.type_wifi')}}</h3>
                                    {{__('app.hardware.ubiquiti_type_wifi')}}
                                    <span class="product block text-center">{{__('app.hardware.ubiquiti')}}</span>
                                    <img src="{{ asset(__('app.hardware.ubiquiti_img')) }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane gridder-show" id="services">
                        <div class="row">
                            <div class="col-md-12 text-center"><div class="intro">{!! __('app.services.title')!!}</div></div>
                            <div class="col-md-12 text-center hide"><h3 class="subtitle">{!! __('app.services.title')!!}</h3></div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center"><h3 class="subtitle">{!! __('app.services.setup')!!}</h3><h3 class="service">{{__('app.services.setup')}}</h3></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4 text-center">
                                <img src="{{ asset(__('app.services.install_img')) }}">
                                <span class="product block text-center">{{__('app.services.install')}}</span>
                                {{__('app.services.install_txt')}}
                            </div>
                            <div class="col-sm-4 text-center">
                                <img src="{{ asset(__('app.services.training_img')) }}">
                                <span class="product block text-center">{{__('app.services.training')}}</span>
                                {{__('app.services.training_txt')}}
                            </div>
                            <div class="col-sm-4 text-center">
                                <img src="{{ asset(__('app.services.onboarding_img')) }}">
                                <span class="product block text-center">{{__('app.services.onboarding')}}</span>
                                {{__('app.services.onboarding_txt')}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 text-center"><hr><h3 class="subtitle second">{{__('app.services.maintenance')}}</h3><h3 class="service">{{__('app.services.maintenance')}}</h3></div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 support">
                                <img src="{{ asset(__('app.services.support_img')) }}">
                                <span class="product block text-center">{{__('app.services.support')}}</span>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="support-wrapped">
                                            <span class="hero"><img src="{{ asset(__('app.services.support_service_img')) }}"></span>
                                            <div>{{__('app.services.support_service')}}</div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="support-wrapped">
                                            <span class="hero"><img src="{{ asset(__('app.services.support_phone_img')) }}"></span>
                                            <div>{!! __('app.services.support_phone')!!}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="support-wrapped">
                                            <span class="hero"><img src="{{ asset(__('app.services.support_mail_img')) }}"></span>
                                            <div>{!! __('app.services.support_mail')!!}</div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="support-wrapped">
                                            <span class="hero"><img src="{{ asset(__('app.services.support_web_img')) }}"></span>
                                            <div>{{__('app.services.support_web')}}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="support-wrapped">
                                            <span class="hero"><img src="{{ asset(__('app.services.support_info_img')) }}"></span>
                                            <div>{{__('app.services.support_info')}}</div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="support-wrapped">
                                            <span class="hero"><img src="{{ asset(__('app.services.support_ticket_img')) }}"></span>
                                            <div>{{__('app.services.support_ticket')}}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="support-wrapped">
                                            <span class="hero"><img src="{{ asset(__('app.services.support_idea_img')) }}"></span>
                                            <div>{{__('app.services.support_idea')}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-md-offset-3 col-md-3 text-center">
                                <img src="{{ asset(__('app.services.hosting_img')) }}">
                                <span class="product block text-center">{{__('app.services.hosting')}}</span>
                                {{__('app.services.hosting_txt')}}
                            </div>
                            <div class="col-sm-6 col-md-3 text-center">
                                <img src="{{ asset(__('app.services.updates_img')) }}">
                                <span class="product block text-center">{{__('app.services.updates')}}</span>
                                {{__('app.services.updates_txt')}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3 text-center">
                        <div class="dossier">
                            <a href="{{Request::url()}}/download">
                                <div class="item featured">
                                    <div class="icon"></div><div class="download">&nbsp</div>
                                    <span class="product text-center">{{__('app.proposal.download')}}</span>
                                    <div class="download-hint text-center">
                                        {{__('app.proposal.download_hint')}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection
