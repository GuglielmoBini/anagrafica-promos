@extends('layouts.app')
@section('title', 'Registro Aziende')
@section('content')
    <header>
        <h1 class="my-5">Aziende</h1>
        <a href="{{ route('admin.registries.create') }}" class="btn btn-success mb-3"><i class="fa-solid fa-plus"></i> Aggiungi</a>
    </header>
    <table class="table">
        <thead>
            <tr class="text-center">
              <th scope="col">#</th>
              <th scope="col">Ragione Sociale</th>
              <th scope="col">Tipo</th>
              <th scope="col">Settore</th>
              <th scope="col">P. IVA</th>
              <th scope="col">CF</th>
              {{-- todo - indirizzo --}}
              <th scope="col">Data inizio attività</th>
              <th scope="col">Rating</th>
              <th scope="col">Email</th>
              <th scope="col">Telefono</th>
              <th scope="col">Username</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @forelse ($companies as $company)
            <tr class="text-center">
                <th scope="row" class="border-start">{{ $company->id }}</th>
                <td>{{ $company->business_name }}</td>
                <td>{{ $company->sector }}</td>
                <td>{{ $company->vat_number }}</td>
                <td>{{ $company->tax_id_code }}</td>
                <td>{{ $company->activity_start_date }}</td>
                <td>{{ $company->rating }}</td>
                <td>{{ $company->email }}</td>
                <td>{{ $company->phone_number }}</td>
                <td>{{ $company->username }}</td>
                <td>{{ $company->created_at }}</td>
                <td class="border-end">
                    <div class="d-flex align-items-center justify-content-center">
                        <a href="{{ route('admin.registries.show', $company->id) }}" class="btn btn-success">
                            <i class="fa-solid fa-eye"></i>
                        </a>
                        <a href="{{ route('admin.registries.edit', $company->id) }}" class="btn btn-warning mx-4">
                            <i class="fa-solid fa-pencil"></i>
                        </a>
                        <form action="{{ route('admin.registries.destroy', $company->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </div>
                </td>
            </tr> 
            @empty
                <tr>
                    <th scope="row" colspan="5" class="text-center">Non sono presenti Aziende</th>
                </tr>
            @endforelse            
          </tbody>
    </table>
@endsection