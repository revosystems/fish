@extends('layouts.app')
@section('section', 'onContact')
@section('title', __('app.pages.contact').' - ')
@section('content')
    <form method="POST" action="{{ route('lead.store') }}">
        @csrf
        <div class="section">
            <div class="container">
                <div class="row row_title no-mt">
                    <div class="col-sm-12 text-center"><div class="intro">{{__('app.contact.title')}}</div></div>
                </div>
                <div class="row">
                    <div class="offset-sm-1 col-sm-10 offset-lg-2 col-lg-8">
                        <div class="contact-card">
                            <h3 class="subtitle">{{__('app.contact.commercial')}}</h3>
                            <span class="card-name"><a href="https://www.linkedin.com/in/toniforcano" target="_blank"><i class="fa fa-linkedin"></i></a>Toni Forcano <span class="dividerr">|</span> <span>Telecom Business Development</span></span>
                            <div><i class="fa fa-phone"></i><a href="tel:+34 669872675">+34 669 872 675</a></div>
                            <div><i class="fa fa-envelope"></i><a href="mailto:toni.forcano@revo.works">toni.forcano@revo.works</a></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="offset-sm-1 col-sm-10 offset-lg-2 col-lg-8">
                        <div class="contact-card">
                            <h3 class="subtitle">{{__('app.contact.support')}}</h3>
                            <span class="card-name"><a href="https://www.linkedin.com/in/ramon-pi%C3%B1ot-5651219" target="_blank"><i class="fa fa-linkedin"></i></a>Ramon Piñot <span class="dividerr">|</span> <span>Support & Onboarding Manager</span></span>
                            <div><i class="fa fa-phone"></i><a href="tel:+346798128965">+34 679 812 896</a> <span class="dividerr">|</span> <i class="phoneM fa fa-phone"></i><a href="tel:+34900104668">+34 900 104 668</a></div>
                            <div><i class="fa fa-envelope"></i><a href="mailto:ramon.pinyot@revo.works">ramon.pinyot@revo.works</a></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="offset-sm-1 col-sm-10 offset-lg-2 col-lg-8">
                       <div class="contact-card">
                           <h3 class="subtitle">{{__('app.contact.marketing')}}</h3>
                           <span class="card-name"><a href="https://www.linkedin.com/in/evagarciafernandez" target="_blank"><i class="fa fa-linkedin"></i></a>Eva García <span class="dividerr">|</span> <span>CMO</span></span>
                           <div><i class="fa fa-phone"></i><a href="tel:+34652353398">+34 652 353 398</a></div>
                           <div><i class="fa fa-envelope"></i><a href="mailto:eva.garcia@revo.works">eva.garcia@revo.works</a></div>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

@stop