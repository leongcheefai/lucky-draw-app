@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card lucky-draw-card">
            <div class="content">
                <div class="card-header">Lucky Draw</div>
            </div>
            <div class="card-body">
                @if (session('status'))
                    <div class="ui positive message margin-btm-1em">
                        <div class="header">
                            {{ session('status') }}
                        </div>
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="/draw" method="POST">
                    @csrf
                    <input type="hidden" name="drawing_method" value="random">
                    <h5 class="text-center">Draw Randomly</h5>
                    <button class="btn btn-light btn-block">Draw</button>
                </form>
                <hr>
                <form action="/draw" method="POST">
                    @csrf
                    <input type="hidden" name="drawing_method" value="manual">
                    <h5 class="text-center">Draw Manually</h5>
                    <div class="form-group">
                        <label for="">Prize Type</label>
                        <select name="type" id="type" class="custom-select">
                            <option value="">Please select prize type</option>
                            @foreach ($prizeArr as $key => $item)
                                <option value="{{ $key }}">{{ $item }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Generate randomly</label>
                        <select name="random" id="random" class="custom-select">
                            <option value="">Please select</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Winning Number</label>
                        <input type="text" class="form-control" name="winning_number" placeholder="Winning Number">
                    </div>

                    <button class="btn btn-dark btn-block">Draw</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
