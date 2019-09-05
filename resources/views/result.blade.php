@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-3">
        <a class="btn btn-link" type="button" href="{{ url('/home') }}">Back</a>
    </div>
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="card text-center">
                <div class="card-body">
                    <h3 class="card-title">1st Prize</h3>
                    @if ($grandPrize)
                        <p class="card-text">{{ $grandPrize->member->name }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <h3 class="card-title">2nd Prize</h3>
                    @if ($secondPrize)
                        @foreach ($secondPrize as $item)
                            <p class="card-text">{{ $item->name }}</p>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <h3 class="card-title">3rd Prize</h3>
                    @if ($thirdPrize)
                        @foreach ($thirdPrize as $item)
                            <p class="card-text">{{ $item->name }}</p>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
