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
            <label for="nama_kategori" class="form-label">Nama Kategori</label>
            <input wire:model="nama_kategori" type="text"
                class="form-control @error('nama_kategori') is-invalid @enderror"
                placeholder="Masukkan nama_kategori">
            @error('nama_kategori')
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
        <button wire:click="update({{ $kategori_id }})" type="button" class="btn btn-warning btn-sm">
            {{-- store public function store di \e-gudang\app\Livewire\Superadmin\User\Index.php --}}
            <i class="fas fa-edit mr-1"></i>
            Update
        </button>
      </div>
    </div>
  </div>
</div>
{{-- PART 9 - 17.20 --}}
