@extends('layouts.backend.app')
@section('dashboard_title', __(key:'Viewing :resource',replace:[ 'resource' => Str::lower(__('Biosp'))]) . ' ' . $biosp->name)
@section('title', __(key:'Viewing :resource',replace:[ 'resource' => Str::lower(__('Biosp'))]) . ' ' . $biosp->name)
@section('content')
    <div class="row gx-5 gx-xl-10">
        <x-biosp-service-card name="Servicos do Biosp"  :services="\App\Models\Biosp::all()" />
    </div>
@endsection
