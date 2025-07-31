<div>
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>@yield('title')</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">@yield('title')</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <div class=" d-flex justify-content-between">
                    <div>
                        <button wire:click="create" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#createModal">
                            {{-- wire:click="create" a/ panggil fungsi create di \app\Livewire\Superadmin\User\Index.php --}}
                            <i class="fas fa-plus mr-1"></i>
                            Tambah Kategori
                        </button>
                    </div>

                <!-- Default dropleft button -->
                    <div class="btn-group dropleft">
                        <button type="button" class="btn btn-sm btn-warning dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-print mr-1"></i>
                            Cetak
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Excel</a>
                            <a class="dropdown-item" href="#">PDF</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="mb-2 d-flex justify-content-between">
                    <div class="col-1">
                        <select wire:model.live="paginate" class="form-control">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                    <div class=" col-4">
                        <input wire:model.live="search" type="text" class="form-control" placeholder="Pencarian....">
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kategori</th>
                                <th><i class="fas fa-cog"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kategori as $item )
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama_kategori }}</td>
                                    <td>
                                        <button wire:click="edit({{ $item->id }})" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editModalkategori">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button wire:click="confirm({{ $item->id }})" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModalkategori">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{-- pagination --}}
                    {{  $kategori->links() }}
                    {{-- $kategori dari foreach --}}

                </div>
            </div>
            <!-- /.card-body -->

        </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->

     @include('livewire.superadmin.kategori.create')
    <!-- /.content -->

    {{--  Close Modal --}}
    @script
        <script>
            $wire.on('closeCreateModal', () => {
                $('#createModalkategori').modal('hide');
                // createModalkategori = modal id
                Swal.fire({
                title: "Berhasil!",
                text: "kategori berhasil ditambahkan!",
                icon: "success"
                });
            });
        </script>
    @endscript

    {{--  Edit Modal --}}
    @include('livewire.superadmin.kategori.edit')

        {{--  Close Edit Modal --}}
    @script
        <script>
            $wire.on('closeEditModal', () => {
                $('#editModalkategori').modal('hide');
                // createModalkategori = modal id
                Swal.fire({
                title: "Berhasil!",
                text: "Data berhasil diubah!",
                icon: "success"
                });
            });
        </script>
    @endscript

        {{--  Delete Modal --}}
    @include('livewire.superadmin.kategori.delete')

    {{--  Close Delete Modal --}}
    @script
        <script>
            $wire.on('closeDeleteModal', () => {
                $('#deleteModalkategori').modal('hide');
                Swal.fire({
                title: "Berhasil!",
                text: "kategori berhasil dihapus!",
                icon: "success"
                });
            });
        </script>
    @endscript
  </div>
</div>
