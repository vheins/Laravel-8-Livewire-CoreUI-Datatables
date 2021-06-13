@extends('coreui::master')

@section('title', config('coreui.title', __('coreui::coreui.default_title')))

@section('body')
    <livewire:backoff.permissions>
@stop
