<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createModalUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
            Tambah {{ $title }}
        </h5>
        {{-- $title C:\xampp\htdocs\e-gudang\app\Livewire\Superadmin\User\Index.php --}}
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-3 mb-3">
                <label for="nama" class="form-label">Nama</label>
            </div>
            <div class="col-9">
                <input wire:model="nama" type="text" class="form-control" placeholder="masukkan nama">
            </div>
            @error('nama')
            <small class="text-danger">
                {{ $message }}
            </small>
            @enderror

            <div class="col-3 mb-3">
                <label for="email" class="form-label">Email</label>
            </div>
            <div class="col-9">
                <input wire:model="email" type="email" class="form-control" placeholder="masukkan email">
            </div>
            @error('email')
            <small class="text-danger">
                {{ $message }}
            </small>
            @enderror

            <div class="col-3 mb-3">
                <label for="role" class="form-label">Role</label>
            </div>
            <div class="col-9">
                <select id="role" class="form-control" wire:model="role" @error('role') is_invalid @enderror>
                    <option selected disabled>- Select Role -</option>
                    <option value="Super Admin">Super Admin</option>
                    <option value="Admin">Admin</option>
                </select>
            </div>

            <div class="col-3 mb-3">
                <label for="password" class="form-label">Nama</label>
            </div>
            <div class="col-9">
                <input wire:model="password" type="password" class="form-control" placeholder="masukkan password">
            </div>
            @error('password')
            <small class="text-danger">
                {{ $message }}
            </small>
            @enderror

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
            <i class="fas fa-times mr-1"></i>
            Close
        </button>
        <button wire:click="store" type="button" class="btn btn-primary btn-sm">
            {{-- store public function store di \e-gudang\app\Livewire\Superadmin\User\Index.php --}}
            <i class="fas fa-save mr-1"></i>
            Save
        </button>
      </div>
    </div>
  </div>
</div>
{{-- 18:18 errror --}}
