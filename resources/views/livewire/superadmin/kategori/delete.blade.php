<!-- Modal -->
<div wire:ignore.self class="modal fade" id="deleteModalKategori" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
            Hapus {{ $title }}
        </h5>
        {{-- $title C:\xampp\htdocs\e-gudang\app\Livewire\Superadmin\User\Index.php --}}
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-4">Nama Kategori</div>
            <div class="col-8">
               : {{ $nama_kategori }}
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">
            <i class="fas fa-times mr-1"></i>
            Close
        </button>
        <button wire:click="destroy({{ $kategori_id }})" type="button" class="btn btn-warning btn-sm">
            {{-- store public function store di \e-gudang\app\Livewire\Superadmin\User\Index.php --}}
            <i class="fas fa-trash mr-1"></i>
            Hapus
        </button>
      </div>
    </div>
  </div>
</div>
{{-- 24.40 --}}
