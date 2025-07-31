<!-- Modal -->
<div wire:ignore.self class="modal fade" id="editModalUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
            Edit {{ $title }}
        </h5>
        {{-- $title C:\xampp\htdocs\e-gudang\app\Livewire\Superadmin\User\Index.php --}}
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="row">
            <label for="nama" class="form-label">Nama</label>
            <input wire:model="nama" type="text"
                class="form-control @error('nama') is-invalid @enderror"
                placeholder="Masukkan Nama">
            @error('nama')
            <small class="text-danger">
                {{ $message }}
            </small>
            @enderror
        </div>

        <div class="row mt-2">
            <label for="email" class="form-label">Email</label>
            <input wire:model="email" type="email" autocomplete="off"
                class="form-control @error('email') is-invalid @enderror"
                placeholder="Masukkan Email">
            @error('email')
            <small class="text-danger">
                {{ $message }}
            </small>
            @enderror
        </div>

        <div class="row mt-2">
            <label for="role" class="form-label">Role</label>
            <select id="role" wire:model="role" class="form-control @error('role') is-invalid @enderror">
                <option selected>- Pilih Role -</option>
                <option value="Super Admin">Super Admin</option>
                <option value="Admin">Admin</option>
            </select>
            @error('role')
            <small class="text-danger">
                {{ $message }}
            </small>
            @enderror
        </div>

        <div class="row">
            <label for="password" class="form-label">Password</label>
            <input wire:model="password" type="password" autocomplete="new-password"
                class="form-control @error('password') is-invalid @enderror"
                placeholder="Masukkan Password">
            @error('password')
            <small class="text-danger">
                {{ $message }}
            </small>
            @enderror
        </div>

        <div class="row">
            <label for="password_confirmation" class="form-label">Password Konfirmasi</label>
            <input wire:model="password_confirmation" type="password" autocomplete="new-password"
                class="form-control @error('password_confirmation') is-invalid @enderror"
                placeholder="Masukkan Password Konfirmasi">
            @error('password_confirmation')
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
        <button wire:click="update({{ $user_id }})" type="button" class="btn btn-warning btn-sm">
            {{-- store public function store di \e-gudang\app\Livewire\Superadmin\User\Index.php --}}
            <i class="fas fa-edit mr-1"></i>
            Update
        </button>
      </div>
    </div>
  </div>
</div>
{{-- PART 9 - 17.20 --}}
