@extends('layouts.app')
@section('content')
<div class="row justify-content-center align-items-center">
    <div class="col-10 text-center">
        <h1 class="my-5">Benvenuto</h1>
        <h3 class="mb-5">Premi il pulsante sottostante per essere indirizzato alla nostra lista aziende</h3>
        <a class="btn btn-primary" href="{{ route('admin.registries.index') }}">{{ __('VAI ALLE AZIENDE') }}</a>
    </div>
</div>
@endsection