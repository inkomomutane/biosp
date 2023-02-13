@extends('layouts.backend.app')
@section('dashboard_title', __(key:'Viewing :resource',replace:[ 'resource' => Str::lower(__('Biosp'))]) . ' ' . $biosp->name)
@section('title', __(key:'Viewing :resource',replace:[ 'resource' => Str::lower(__('Biosp'))]) . ' ' . $biosp->name)
@section('content')
    <div class="row gx-5 gx-xl-10">
        <x-biosp-service-card
            :route="route('biosp_service_assignment.genres',[ 'biosp' => $biosp ])"
            method="put"
            :name="__(key:'Assigned :resource',replace : ['resource' => __('Genres')])"
            :service-name="__('Genres')"
            :services="$genres"
            :selected-services="$biosp->genres"/>

        <x-biosp-service-card
            :route="route('biosp_service_assignment.forwarded_services',[ 'biosp' => $biosp ])"
            method="put"
            :name="__(key:'Assigned :resource',replace : ['resource' => __('Forwarded services')])"
            :service-name="__('Forwarded services')"
            :services="$forwardedServices"
            :selected-services="$biosp->forwardedServices"/>
    </div>
    <div class="row gx-5 gx-xl-10">
        <x-biosp-service-card
            :route="route('biosp_service_assignment.document_types',[ 'biosp' => $biosp ])"
            method="put"
            :name="__(key:'Assigned :resource',replace : ['resource' => __('Document types')])"
            :service-name="__('Document types')"
            :services="$documentTypes"
            :selected-services="$biosp->documentTypes"/>

        <x-biosp-service-card
            :route="route('biosp_service_assignment.provenances',[ 'biosp' => $biosp ])"
            method="put"
            :name="__(key:'Assigned :resource',replace : ['resource' => __('Provenances')])"
            :service-name="__('Provenances')"
            :services="$provenances"
            :selected-services="$biosp->provenances"/>
    </div>

    <div class="row gx-5 gx-xl-10">
        <x-biosp-service-card
            :route="route('biosp_service_assignment.purpose_of_visits',[ 'biosp' => $biosp ])"
            method="put"
            :name="__(key:'Assigned :resource',replace : ['resource' => __('Purposes of visit')])"
            :service-name="__('Purposes of visit')"
            :services="$purposeOfVisits"
            :selected-services="$biosp->purposeOfVisits"/>
        <x-biosp-service-card
            :route="route('biosp_service_assignment.reason_opening_cases',[ 'biosp' => $biosp ])"
            method="put"
            :name="__(key:'Assigned :resource',replace : ['resource' => __('Reasons of opening case')])"
            :service-name="__('Reasons of opening case')"
            :services="$reasonOpeningCases"
            :selected-services="$biosp->reasonOpeningCases"/>
    </div>

@endsection
