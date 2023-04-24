@extends('layouts.app')
@section('title', 'Dettagli')
@section('content')
<section id="detail">
    <header>
        <h1 class="my-5">Dettaglio Azienda: </h1>
    </header>
    <div class="d-flex flex-column align-items-center">
        <div class="card col-6 mb-4">
            <div class="card-body">
                <div class="text-center">
                    <h3 class="card-title">{{ $registry->business_name }}</h3>
                    <h4 class="card-subtitle text-body-secondary my-4">{{ $registry->status }}</h4>
                </div>
                <hr>
              <div class="card-text mb-3"><strong>Settore: </strong>{{ $registry->sector }}</div>
              <div class="card-text mb-3"><strong>P.IVA: </strong>{{ $registry->vat_number }}</div>
              <div class="card-text mb-3"><strong>Codice Fiscale: </strong>{{ $registry->tax_id_code }}</div>
              <div class="card-text mb-3"><strong>Data inizio attività: </strong>{{ $registry->activity_start_date }}</div>
              <div class="card-text mb-3"><strong>Rating: </strong>{{ $registry->rating }}</div>
              <div class="card-text mb-3"><strong>Visura camerale: </strong>{{ $registry->chamber_of_commerce }}</div>
              <div class="card-text mb-3"><strong>Email: </strong>{{ $registry->email }}</div>
              <div class="card-text mb-3"><strong>Telefono: </strong>{{ $registry->phone_number }}</div>
              <div class="card-text mb-3"><strong>Username: </strong>{{ $registry->username }}</div>
              <p class="card-text mb-3"><strong>Note: </strong>{{ $registry->notes }}.</p>
            </div>
          </div>
        <div class="d-flex">
          <a href="{{ route('admin.registries.index') }}" class="btn btn-primary">Torna Indietro</a>
          <a href="{{ route('admin.registries.edit', $registry->id) }}" class="btn btn-warning mx-4">
            <i class="fa-solid fa-pencil"></i>
        </a>
          <form action="{{ route('admin.registries.destroy', $registry->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Sei sicuro di voler cancellare questa azienda?')"><i class="fa-solid fa-trash"></i></button>
        </form>
        </div>
    </div>
  </section>
@endsection