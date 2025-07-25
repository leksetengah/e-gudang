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
    public $nama, $email, $role, $password, $password_confirmation;
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
}
