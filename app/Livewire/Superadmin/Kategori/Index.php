<?php

namespace App\Livewire\Superadmin\Kategori;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Kategori;

class Index extends Component
{
    //u/ pagination
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    //u/ paginate
    public $paginate='10';
    public $search='';
    public $nama_kategori, $kategori_id;
    public function render()
    {
        $data = array(
            'title' => 'Data kategori',
            //supaya tidak hilang saat pindah halaman di pagination

            'kategori' => Kategori::where('nama_kategori', 'like','%'.$this->search.'%')
                ->orderBy('nama_kategori', 'asc')->paginate($this->paginate), //order by kolom role di database
        );
        return view('livewire.superadmin.kategori.index', $data);
    }

    public function create() {
        $this->resetValidation();
        $this->reset([
            'nama_kategori',
        ]);
    }

    public function store(){
        $this->validate([
            'nama_kategori'  => 'required',
        ],
    [
        'nama_kategori.required'   => 'Nama kategori tidak boleh kosong!',
    ]);

    $kategori = new kategori;
    $kategori->nama_kategori = $this->nama_kategori;
    // $kategori->nama_kategori(name = field di database) = $this->nama_kategori (nama_kategori = wire:model="nama_kategori");
    $kategori->save();

    $this->dispatch('closeCreateModal');
    }

    public function edit($id) {
        // edit({{ $item->id }}) yg telah dipanggil di resources\views\livewire\superadmin\kategori\index.blade.php
        $this-> resetValidation();

        $kategori = kategori::findOrFail($id);
        $this->nama_kategori  = $kategori->nama_kategori;
        // $this->nama_kategori dari wire:model="nama_kategori" = $kategori->name dari database kolom name
        $this->kategori_id    = $kategori->id;
        // kategori_id dari wire:click="update({{ $kategori_id }})" resources\views\livewire\superadmin\kategori\edit.blade.php
    }

    public function update($id) {
        $kategori = kategori::findOrFail($id);

        $this->validate([
            'nama_kategori'            => 'required',
        ],
        [
            'nama_kategori.required'   => 'Nama kategori tidak boleh kosong!',
        ]);

        $kategori->nama_kategori = $this->nama_kategori;
        // $kategori->name(name = field di database) = $this->nama_kategori (nama_kategori = wire:model="nama_kategori");
        $kategori->save();

        $this->dispatch('closeEditModal');
    }

    public function confirm($id) {
        $kategori = kategori::findOrFail($id);
        $this->nama_kategori  = $kategori->nama_kategori;
        $this->kategori_id = $kategori->id;
        // $this->kategori_id = $kategori->id; mengirim kategori_id ke wire:click="destroy({{ $kategori_id }})"
    }

    public function destroy($id) {
        $kategori = kategori::findOrFail($id);
        $kategori->delete();
        $this->dispatch('closeDeleteModal');
    }
}
// 12.27
