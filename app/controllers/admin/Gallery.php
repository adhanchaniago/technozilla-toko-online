<?php

use App\Core\Controller;
use App\Helpers\Auth;
use App\Helpers\DB;
use App\Helpers\Flash;
use App\Helpers\Image;
use App\Helpers\Redirect;

class Gallery extends Controller
{
    protected $db;

    public function __construct()
    {
        $this->db = new DB;
        Auth::auth('admin');
    }


    public function index()
    {

        $data['judul'] = 'Galeri Foto Produk';
        $data['foto'] = $this->db
            ->select(
                'produk.nama',
                'gambar_produk.nama as gambar',
                'gambar_produk.id'
            )
            ->from('gambar_produk')
            ->join('produk', 'gambar_produk.produk_id', '=', 'produk.id')
            ->get();

        $this->view('admin/templates/header', $data);
        $this->view('admin/gallery/index', $data);
        $this->view('admin/templates/footer');
    }

    public function create()
    {
        $data['judul'] = 'Tambah Foto Produk';
        $data['produk'] = $this->db->get('produk');
        $this->view('admin/templates/header', $data);
        $this->view('admin/gallery/tambah', $data);
        $this->view('admin/templates/footer');
    }


    public function store()
    {


        $image = new Image;
        $gambar = $image->upload('gambar');
        if ($gambar != false) {

            $insert = $this->db->insert('gambar_produk', [
                'id' => '',
                'produk_id' => $_POST['id'],
                'nama' => $gambar,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }

        if ($insert) {
            Flash::setFlash('Berhasil menambahkan foto produk baru', 'success');
        } else {
            Flash::setFlash('Gagal menambahkan foto produk baru', 'danger');
        }

        Redirect::to('admin/gallery');
    }

    public function edit($id)
    {
        $data['judul'] = 'Edit Foto Produk';
        $data['produk'] = $this->db->get('produk');
        $data['foto'] = $this->db
            ->select('*')
            ->from('gambar_produk')
            ->where('id', '=', $id)
            ->first();


        $this->view('admin/templates/header', $data);
        $this->view('admin/gallery/edit', $data);
        $this->view('admin/templates/footer');
    }

    public function update($id)
    {
        
    }


    public function destroy()
    {


        $delete = $this->db->delete('gambar_produk', 'id', '=', $_POST['id']);
        if ($delete) {
            unlink('images/' . $_POST['gambar']);
            Flash::setFlash('Berhasil menghapus foto produk', 'success');
        } else {
            Flash::setFlash('Gagal menghapus foto produk', 'danger');
        }
        Redirect::to('admin/gallery');
    }
}