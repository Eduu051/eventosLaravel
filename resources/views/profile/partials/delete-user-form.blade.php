<div class="card mb-4">
    <div class="card-header">Borrar Cuenta</div>

    <div class="card-body">
        <div class="mb-3">
            Al eliminar la cuenta se borraran todos los datos de la base de datos
        </div>

        <div class="row mb-0">
            <div class="col-md-6">
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">
                    Borrar cuenta
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="deleteAccountModalLabel">
            ¿Seguro que quieres borrar la cuenta?
        </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
            Al eliminar la cuenta se borraran todos los datos de la base de datos
        </div>
        <form id="deleteAccountForm" method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <div>
                <input type="password" class="form-control @error('password', 'userDeletion') is-invalid @enderror" name="password" placeholder="{{ __('Password') }}" required>

                @error('password', 'userDeletion')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            Cancelar
        </button>
        <button type="submit" class="btn btn-danger" form="deleteAccountForm">
            Borra cuenta
        </button>
      </div>
    </div>
  </div>
</div>

@push('scripts')
    @php $shouldOpenModal = $errors->userDeletion->isNotEmpty(); @endphp

    <script>
        let shouldOpenModal = {{ Js::from($shouldOpenModal) }};

        if (shouldOpenModal) {
            window.addEventListener('load', function() {
                let deleteAccountModal = new bootstrap.Modal('#deleteAccountModal');
                deleteAccountModal.toggle();
            });
        }
    </script>
@endPush