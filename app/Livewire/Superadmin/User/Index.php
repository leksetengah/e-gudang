<?php

namespace App\Livewire\Superadmin\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\support\Facades\Hash;

class Index extends Component
{
    //u/ pagination
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    //u/ paginate
    public $paginate='10';
    public $search='';
    public $nama, $email, $role, $password, $password_confirmation, $user_id;
    public function render()
    {
        $data = array(
            'title' => 'Data User',
            //supaya tidak hilang saat pindah halaman di pagination

            'user' => User::where('name', 'like','%'.$this->search.'%')
                ->orWhere('email', 'like','%'.$this->search.'%')
                ->orderBy('role', 'asc')->paginate($this->paginate), //order by kolom role di database
        );
        return view('livewire.superadmin.user.index', $data);
    }

    public function create() {
        $this->resetValidation();
        $this->reset([
            'nama',
            'email',
            'role',
            'password',
            'password_confirmation',
        ]);
    }

    public function store(){
        $this->validate([
            'nama'                  => 'required',
            'email'                 => 'required|email',
            'role'                  => 'required',
            'password'              => 'required|min:8|confirmed',
            'password_confirmation' => 'required',
        ],
    [
        'nama.required'                  => 'Nama tidak boleh kosong!',
        'email.required'                 => 'email tidak boleh kosong!',
        'email.email'                    => 'email invalid!',
        'role.required'                  => 'role tidak boleh kosong!',
        'password.required'              => 'password tidak boleh kosong!',
        'password.min'                   => 'password minimal 8 karakter!',
        'password.confirmed'             => 'password konfirmasi tidak sama!',
        'password_confirmation.required' => 'password konfirmasi tidak boleh kosong!',
    ]);

    $user = new User;
    $user->name = $this->nama;
    // $user->name(name = field di database) = $this->nama (nama = wire:model="nama");
    $user->name = $this->nama;
    $user->email = $this->email;
    $user->role = $this->role;
    $user->password = Hash::make($this->password);
    $user->save();

    $this->dispatch('closeCreateModal');
    }

    public function edit($id) {
        // edit({{ $item->id }}) yg telah dipanggil di resources\views\livewire\superadmin\user\index.blade.php
        $this-> resetValidation();

        $user = User::findOrFail($id);
        $this->nama                     = $user->name;
        // $this->nama dari wire:model="nama" = $user->name dari database kolom name
        $this->email                    = $user->email;
        $this->role                     = $user->role;
        $this->password                 = '';
        $this->password_confirmation    = '';
        $this->user_id                  = $user->id;
        // user_id dari wire:click="update({{ $user_id }})" resources\views\livewire\superadmin\user\edit.blade.php
    }

    public function update($id) {
        $user = User::findOrFail($id);

        $this->validate([
            'nama'                  => 'required',
            'email'                 => 'required|email|unique:users,email,'.$id,
            // users = nama table, email adalah kolom nya
            'role'                  => 'required',
            'password'              => 'nullable|min:8|confirmed',
        ],
        [
            'nama.required'                  => 'Nama tidak boleh kosong!',
            'email.required'                 => 'email tidak boleh kosong!',
            'email.email'                    => 'email invalid!',
            'email.unique'                   => 'email sudah terdaftar!',
            'role.required'                  => 'role tidak boleh kosong!',
            'password.min'                   => 'password minimal 8 karakter!',
            'password.confirmed'             => 'password konfirmasi tidak sama!',
        ]);

        $user->name = $this->nama;
        // $user->name(name = field di database) = $this->nama (nama = wire:model="nama");
        $user->name = $this->nama;
        $user->email = $this->email;
        $user->role = $this->role;

        if(filled($this->password)) {
        $user->password = Hash::make($this->password);
        }

        $user->save();

        $this->dispatch('closeEditModal');
    }

    public function confirm($id) {
        $user = User::findOrFail($id);
        $this->nama  = $user->name;
        $this->email  = $user->email;
        $this->role  = $user->role;
        $this->user_id = $user->id;
        // $this->user_id = $user->id; mengirim user_id ke wire:click="destroy({{ $user_id }})"
    }

    public function destroy($id) {
        $user = User::findOrFail($id);
        $user->delete();
        $this->dispatch('closeDeleteModal');
    }
}
