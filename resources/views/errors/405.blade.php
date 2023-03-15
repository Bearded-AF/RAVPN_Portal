@extends('layouts.app')

@section('content')
  <div class="alert alert-danger">
    <h2>Method Not Allowed</h2>
    <p>The request method {{ $exception->getHeaders()['Allow'] }} is not allowed for this resource.</p>
  </div>
@endsection
