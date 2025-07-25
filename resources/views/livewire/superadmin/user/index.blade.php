<div>
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{  $title }}</h1>
            {{-- $title C:\xampp\htdocs\e-gudang\app\Livewire\Superadmin\User\Index.php --}}
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
              <li class="breadcrumb-item active">{{  $title }}</li>
              {{-- $title C:\xampp\htdocs\e-gudang\app\Livewire\Superadmin\User\Index.php --}}
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
                        <button wire:click="create" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#createModalUser">
                            {{-- wire:click="create" a/ panggil fungsi create di \app\Livewire\Superadmin\User\Index.php --}}
                            <i class="fas fa-plus mr-1"></i>
                            Tambah Data
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
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th><i class="fas fa-cog"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $item )
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    @if ($item->role=='Super Admin')
                                        <td>
                                            <span class="badge badge-info">{{ $item->role }}</span>
                                        </td>
                                    @elseif ($item->role=='Admin')
                                        <td>
                                        <span class="badge badge-primary">{{ $item->role }}</span>
                                        </td>
                                    @endif
                                    <td>
                                        <button class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{-- pagination --}}
                    {{  $user->links() }}
                    {{-- $user dari foreach --}}

                </div>
            </div>
            <!-- /.card-body -->

        </div>
      <!-- /.card -->

    </section>
    {{--  Create Modal --}}
    @include('livewire.superadmin.user.create')
    <!-- /.content -->

    {{--  Close Modal --}}
    @script
        <script>
            $wire.on('closeCreateModal', () => {
                $('#createModalUser').modal('hide');
                // createModalUser = modal id
                Swal.fire({
                title: "Berhasil!",
                text: "User berhasil ditambahkan!",
                icon: "success"
                });
            });
        </script>
    @endscript
  </div>
</div>

