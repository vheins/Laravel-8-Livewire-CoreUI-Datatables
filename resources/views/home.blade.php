@extends('coreui::master')

@section('title', config('coreui.title', __('coreui::coreui.default_title')))

@section('body')
    <div class="row">
        <div class="col">
            <div class="text-center card">
                <div class="card-header">
                    Woohoo!
                </div>
                <div class="card-body">
                    <h5 class="card-title">You are now logged in!</h5>
                    <p class="card-text">Click on the button below to visit the official CoreUI documentation and learn how to build an amazing app.</p>
                    <a href="https://coreui.io/docs/getting-started/introduction/" target="_blank" class="btn btn-primary">Take me to CoreUI</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <img class="card-img-top" src="https://via.placeholder.com/300x180" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text">You can also use headers like this image!</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
                <div class="card-footer">
                    Cards can even have footers
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="mb-3 text-white card bg-warning">
                <div class="card-header">Header</div>
                <div class="card-body">
                    <h5 class="card-title">Alarming title</h5>
                    <p class="card-text">You can use a couple of color classes to make your cards more visually appealing too!</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3 card border-danger">
                <div class="card-header">Danger card</div>
                <div class="card-body text-danger">
                    <p class="card-text">Or make use of some slightly less intense coloring, which can convey your intentions well enough too.</p>
                </div>
            </div>
        </div>
    </div>
@stop
