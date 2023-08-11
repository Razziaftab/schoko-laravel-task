@extends('layouts.app')

@section('content')
    <div class="ml-3">
        <div class="kontaktform neu row" id="kontaktform">
            <h1>Welcome to Schokoladenseite</h1>
        </div>
        <div>
            <a class="btn btn-primary" href="{{ route('contact.export.csv') }}">Download CSV</a>
        </div>
    </div>

@endsection
