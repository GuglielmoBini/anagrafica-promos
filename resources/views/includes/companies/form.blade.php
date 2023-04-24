<div class="card p-4 shadow">
    @if ($registry->exists)
    <form action="{{ route('admin.registries.update', $registry->id) }}" method="POST" enctype="multipart/form-data" novalidate>
    @method('PUT')
    @else    
    <form action="{{ route('admin.registries.store') }}" method="POST" enctype="multipart/form-data" novalidate>
    @endif
    @csrf
        <div class="row">
            <div class="col-9">
                <div class="mb-3">
                    <label for="business_name" class="form-label">Ragione Sociale</label>
                    <input type="text" class="form-control" id="business_name" name="business_name" value="{{ old('business_name', $registry->business_name) }}" minlength="5" maxlength="50" required>
                    <small class="text-muted">Inserisci la ragione sociale</small>
                  </div>
            </div>
            <div class="col-3">
                <div class="mb-3">
                    <label for="status" class="form-label">Tipo</label>
                    <select class="form-select" id="status" name="status">
                        <option value="">--</option>
                        <option @if(old('status', $registry->status) == "Business") selected @endif value="Business">Business</option>
                        <option @if(old('status', $registry->status) == "Privato") selected @endif value="Privato">Privato</option>
                      </select>
                    <small class="text-muted">Scegli la tipologia</small>
                  </div>
            </div>
            <div class="col-4">
                <div class="mb-3">
                    <label for="sector" class="form-label">Settore</label>
                    <select class="form-select" id="sector" name="sector">
                        <option value="">--</option>
                        <option @if(old('sector', $registry->sector) == "Informatica") selected @endif value="Informatica">Informatica</option>
                        <option @if(old('sector', $registry->sector) == "Edilizia") selected @endif value="Edilizia">Edilizia</option>
                        <option @if(old('sector', $registry->sector) == "Immobiliare") selected @endif value="Immobiliare">Immobiliare</option>
                        <option @if(old('sector', $registry->sector) == "Salute") selected @endif value="Salute">Salute</option>
                        <option @if(old('sector', $registry->sector) == "Finanza") selected @endif value="Finanza">Finanza</option>
                      </select>
                    <small class="text-muted">Scegli il settore</small>
                  </div>
            </div>
            <div class="col-4">
                <div class="mb-3">
                    <label for="vat_number" class="form-label">P.IVA</label>
                    <input type="text" class="form-control" id="vat_number" name="vat_number" value="{{ old('vat_number', $registry->vat_number) }}" required>
                    <small class="text-muted">Inserisci la P.IVA</small>
                  </div>
            </div>
            <div class="col-4">
                <div class="mb-3">
                    <label for="tax_id_code" class="form-label">Codice Fiscale</label>
                    <input type="text" class="form-control" id="tax_id_code" name="tax_id_code" value="{{ old('tax_id_code', $registry->tax_id_code) }}" required>
                    <small class="text-muted">Inserisci il codice fiscale</small>
                  </div>
            </div>
            <div class="col-4">
                <div class="mb-3">
                    <label for="activity_start_date" class="form-label">Data inizio attività</label>
                    <input type="text" class="form-control" id="activity_start_date" name="activity_start_date" value="{{ old('activity_start_date', $registry->activity_start_date) }}" placeholder="AAAA-MM-GG" required>
                    <small class="text-muted">Inserisci data inizio attività</small>
                  </div>
            </div>
            <div class="col-3">
                <div class="mb-3">
                    <label for="rating" class="form-label">Rating</label>
                    <select class="form-select" id="rating" name="rating">
                        <option value="">--</option>
                        <option @if(old('rating', $registry->rating) == "A") selected @endif value="A">A</option>
                        <option @if(old('rating', $registry->rating) == "B") selected @endif value="B">B</option>
                        <option @if(old('rating', $registry->rating) == "C") selected @endif value="C">C</option>
                        <option @if(old('rating', $registry->rating) == "D") selected @endif value="D">D</option>
                        <option @if(old('rating', $registry->rating) == "E") selected @endif value="E">E</option>
                        <option @if(old('rating', $registry->rating) == "F") selected @endif value="F">F</option>
                      </select>
                    <small class="text-muted">Scegli il rating</small>
                  </div>
            </div>
            {{-- <div class="col-3">
                <div class="mb-3">
                    <label for="rating" class="form-label">Rating</label>
                    <input type="text" class="form-control" id="rating" name="rating" value="{{ old('rating', $registry->rating) }}" placeholder="ad es. A" required>
                    <small class="text-muted">Inserisci il rating</small>
                  </div>
            </div> --}}
            <div class="col-5">
                <div class="mb-3">
                    <label for="chamber_of_commerce" class="form-label">Carica Visura Catastale</label>
                    <input type="file" class="form-control" id="chamber_of_commerce" name="chamber_of_commerce">
                    <small class="text-muted">Carica Visura Catastale</small>
                  </div>
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <label for="notes" class="form-label">Note</label>
                    <textarea class="form-control" id="notes" rows="7" name="notes" required>{{ old('notes', $registry->notes) }}</textarea>
                    <small class="text-muted">Inserisci una nota</small>
                  </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $registry->email) }}" maxlength="70" required>
                    <small class="text-muted">Inserisci l'Email</small>
                  </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="phone_number" class="form-label">Numero telefono</label>
                    <input type="tel" class="form-control" id="phone_number" name="phone_number" value="{{ old('phone_number', $registry->phone_number) }}" maxlength="20" required>
                    <small class="text-muted">Inserisci numero di telefono</small>
                  </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="username" class="form-label">username</label>
                    <input type="text" class="form-control" id="username" name="username" value="{{ old('username', $registry->username) }}" maxlength="50" required>
                    <small class="text-muted">Inserisci uno Username</small>
                  </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" value="{{ old('password', $registry->password) }}" maxlength="30" required>
                    <small class="text-muted">Inserisci la password</small>
                  </div>
            </div>
        </div>
        <div class="d-flex justify-content-center my-3">
            <button type="submit" class="btn btn-success w-25">Salva</button>
        </div>
    </form>
</div>
<a href="{{ route('admin.registries.index') }}" class="btn btn-primary my-3">Torna Indietro</a>

{{-- @section('scripts')
    <script>
        const placeholder = 'https://marcolanci.it/utils/placeholder.jpg';

        const imageInput = document.getElementById('image_url');
        const imagePreview = document.getElementById('img-preview');

        imageInput.addEventListener('change', () => {
            if (imageInput.files && imageInput.files[0]) {
                const reader = new FileReader();
                reader.readAsDataURL(imageInput.files[0]);
                reader.onload = e => {
                    imagePreview.setAttribute('src', e.target.result);
                }
            } else imagePreview.setAttribute('src', placeholder);
        });
    </script>
@endsection --}}