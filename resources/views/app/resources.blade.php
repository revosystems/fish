@extends('layouts.app')
@section('section', 'onResources')
@section('title', __('app.pages.resources').' - ')
@section('content')

        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="revolution">
                            <img src="{{ asset('images/revolution.png') }}" class="hero" alt="@lang('app.channel')"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container dossier xxs slim-b">
                <div class="row">
                    <div class="col-xs-6 offset-sm-1 col-sm-5 mb-40">
                        <a href="{{__('app.resources.highlights_dw')}}" target="_blank">
                            <span class="btn">{{__('app.resources.highlights')}}</span>
                            <div class="item featured text-center">
                                <div class="icon"><div class="download">&nbsp;</div></div>
                                {{__('app.resources.highlights_txt')}}
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-6 col-sm-5">
                        <a href="{{__('app.resources.references_dw')}}" target="_blank">
                            <span class="btn">{{__('app.resources.references')}}</span>
                            <div class="item featured text-center">
                                <div class="icon"><div class="download">&nbsp;</div></div>
                                {{__('app.resources.references_txt')}}
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="container dossier xxs slim-t">
                <div class="row">
                    <div class="d-xs-block d-sm-block d-md-none col-12 hero-special ">
                            <span class="btn">{{__('app.resources.catalogs')}}</span>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-4">
                        <a href="{{__('app.resources.catalogs_xef_dw')}}" target="_blank">
                            <div class="item no-mt">
                                <div class="icon"><div class="download">&nbsp;</div></div>
                                <span class="product">{{__('app.resources.catalogs_xef')}}</span>
                                {{__('app.resources.catalogs_xef_txt')}}
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-4 ">
                        <a href="{{__('app.resources.catalogs_retail_dw')}}" target="_blank">
                            <div class="item no-mt">
                                <div class="icon"><div class="download">&nbsp;</div></div>
                                <span class="product">{{__('app.resources.catalogs_retail')}}</span>
                                {{__('app.resources.catalogs_retail_txt')}}
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-4 d-none d-md-block">
                        <div class="item no-mt no-pl">
                            <div>
                                <span class="btn">{{__('app.resources.catalogs')}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-4">
                        <a href="{{__('app.resources.catalogs_flow_dwogs_txt')}}" target="_blank">
                            <div class="item">
                                <div class="icon"><div class="download">&nbsp;</div></div>
                                <span class="product">{{__('app.resources.catalogs_flow')}}</span>
                                {{__('app.resources.catalogs_flow_txt')}}
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-4">
                        <a href="{{__('app.resources.catalogs_intouch_dw')}}" target="_blank">
                            <div class="item">
                                <div class="icon"><div class="download">&nbsp;</div></div>
                                <span class="product">{{__('app.resources.catalogs_intouch')}}</span>
                                {{__('app.resources.catalogs_intouch_txt')}}
                            </div>
                        </a>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-4">
                        <a href="{{__('app.resources.catalogs_hotels_dw')}}" target="_blank">
                            <div class="item">
                                <div class="icon"><div class="download">&nbsp;</div></div>
                                <span class="product">{{__('app.resources.catalogs_hotels')}}</span>
                                {{__('app.resources.catalogs_hotels_txt')}}
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="full">
                <div class="full-inner col-md-5 d-none d-md-block d-lg-block">
                    <div class="full-inner-img"></div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-7 offset-md-5 dossier xxs">
                            <span class="btn">{{__('app.resources.dossiers')}}</span>
                            <br />
                            {{__('app.resources.dossiers_txt')}}
                            <div class="row">
                                <div class="col-xs-6 col-sm-6">
                                    <a href="{{__('app.resources.dossiers_xef_dw_' . auth()->user()->platform() )}}" target="_blank">
                                        <div class="item">
                                            <div class="icon"><div class="download">&nbsp;</div></div>
                                            <span class="product">{{__('app.resources.dossiers_xef')}}</span>
                                            <div>{{__('app.resources.dossiers_xef_txt')}}</div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-xs-6 col-sm-6">
                                    <a href="{{__('app.resources.dossiers_retail_dw_' . auth()->user()->platform() )}}" target="_blank">
                                        <div class="item">
                                            <div class="icon"><div class="download">&nbsp;</div></div>
                                            <span class="product">{{__('app.resources.dossiers_retail')}}</span>
                                            <div>{{__('app.resources.dossiers_retail_txt')}}</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-6 col-sm-6">
                                    <a href="{{__('app.resources.dossiers_flow_dw_' . auth()->user()->platform() )}}" target="_blank">
                                        <div class="item">
                                            <div class="icon"><div class="download">&nbsp;</div></div>
                                            <span class="product">{{__('app.resources.dossiers_flow')}}</span>
                                            <div>{{__('app.resources.dossiers_flow_txt')}}</div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-xs-6 col-sm-6">
                                    <a href="{{__('app.resources.dossiers_intouch_dw_' . auth()->user()->platform() )}}" target="_blank">
                                        <div class="item">
                                            <div class="icon"><div class="download">&nbsp;</div></div>
                                            <span class="product">{{__('app.resources.dossiers_intouch')}}</span>
                                            <div>{{__('app.resources.dossiers_intouch_txt')}}</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="subtitle">{{__('app.resources.testimonials_title_xef')}}</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <a href="{{__('app.resources.testimonials_llevant_video')}}" target="_blank">
                            <div class="video">
                                <div class="play"><i class="fa fa-play"></i></div>
                                <img src="{{ asset(__('app.resources.testimonials_llevant_img')) }}" />
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <a href="{{__('app.resources.testimonials_despiece_video')}}" target="_blank">
                            <div class="video">
                                <div class="play"><i class="fa fa-play"></i></div>
                                <img src="{{ asset(__('app.resources.testimonials_despiece_img')) }}" />
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <a href="{{__('app.resources.testimonials_cardamomo_video')}}" target="_blank">
                            <div class="video">
                                <div class="play"><i class="fa fa-play"></i></div>
                                <img src="{{ asset(__('app.resources.testimonials_cardamomo_img')) }}" />
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <a href="{{__('app.resources.testimonials_bereber_video')}}" target="_blank">
                            <div class="video">
                                <div class="play"><i class="fa fa-play"></i></div>
                                <img src="{{ asset(__('app.resources.testimonials_bereber_img')) }}" />
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <a href="{{__('app.resources.testimonials_circulo_video')}}" target="_blank">
                            <div class="video">
                                <div class="play"><i class="fa fa-play"></i></div>
                                <img src="{{ asset(__('app.resources.testimonials_circulo_img')) }}" />
                            </div>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-12">
                        <h3 class="subtitle">{{__('app.resources.testimonials_title_retail')}}</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <a href="{{__('app.resources.testimonials_padel_video')}}" target="_blank">
                            <div class="video">
                                <div class="play"><i class="fa fa-play"></i></div>
                                <img src="{{ asset(__('app.resources.testimonials_padel_img')) }}" />
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <a href="{{__('app.resources.testimonials_stk_video')}}" target="_blank">
                            <div class="video">
                                <div class="play"><i class="fa fa-play"></i></div>
                                <img src="{{ asset(__('app.resources.testimonials_stk_img')) }}" />
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <a href="{{__('app.resources.testimonials_milokka_video')}}" target="_blank">
                            <div class="video">
                                <div class="play"><i class="fa fa-play"></i></div>
                                <img src="{{ asset(__('app.resources.testimonials_milokka_img')) }}" />
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <a href="{{__('app.resources.testimonials_future_video')}}" target="_blank">
                            <div class="video">
                                <div class="play"><i class="fa fa-play"></i></div>
                                <img src="{{ asset(__('app.resources.testimonials_future_img')) }}" />
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
@endsection