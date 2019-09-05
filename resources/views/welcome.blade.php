@extends('layouts.app')

@section('content')
    <div class="container">
    @if (session('status'))
            <div class="ui positive message margin-btm-1em">
                <div class="header">
                    {{ session('status') }}
                </div>
            </div>
        @endif
    </div>

    <member app-title="{{ config('app.name', 'Laravel') }}"></member>
@endsection
