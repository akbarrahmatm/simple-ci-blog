<?php

namespace App\Controllers;

use App\Models\BlogModel;
use App\Models\CategoryModel;
use CodeIgniter\CodeIgniter;

class Admin extends BaseController
{
    protected $blogModel;
    protected $categoryModel;
    public function __construct()
    {
        $this->blogModel = new BlogModel();
        $this->categoryModel = new CategoryModel();
    }
    public function index()
    {
        $data = [
            'title' => 'Admin Dashboard',
            'blog' => $this->blogModel->findAll()
        ];
        return view('admin/index', $data);
    }
    public function blog()
    {
        session();
        $data = [
            'title' => 'Blog Data',
            'blog' => $this->blogModel->findAll()
        ];
        return view('admin/blog', $data);
    }
    public function category()
    {
        session();
        $data = [
            'title' => 'Category Data',
            'category' => $this->categoryModel->findAll()
        ];
        return view('admin/category', $data);
    }
    public function createCategory()
    {
        session();
        $data = [
            'title' => 'Category Data',
            'error' => \Config\Services::validation()
        ];
        return view('admin/category/create', $data);
    }
    public function saveCategory()
    {
        if (!$this->validate([
            'category' => [
                'rules' => 'required|max_length[255]|is_unique[category]',
                'errors' => [
                    'required' => 'Category wajib diisi',
                    'max_length' => 'Maksimal 255 karakter',
                    'is_unique' => 'Category sudah terdaftar'
                ]
            ]
        ])) {
            return redirect()->to('/admin/category/create')->withInput();
        }

        $this->categoryModel->save([
            'category' => $this->request->getVar('category')
        ]);

        session()->setFlashdata('success', 'Data Berhasil Ditambahkan');
        return redirect()->to('/admin/category')->withInput();
    }
    public function deleteCategory()
    {
        $this->categoryModel->delete($this->request->getVar('id'));

        session()->setFlashdata('success', 'Data Berhasil Dihapus');
        return redirect()->to('/admin/category');
    }
    public function editCategory($id)
    {
        $data = [
            'title' => 'Category Data',
            'category' => $this->categoryModel->where(['category_id' => $id])->first()
        ];
        return view('admin/category/edit', $data);
    }
    public function updateCategory()
    {
        if (!$this->validate([
            'category' => [
                'rules' => 'required|max_length[255]|is_unique[category,category_id,' . $this->request->getVar('category_id') . ']',
                'errors' => [
                    'required' => 'Category wajib diisi',
                    'max_length' => 'Maksimal 255 karakter',
                    'is_unique' => 'Category sudah terdaftar'
                ]
            ]
        ])) {
            return redirect()->to('/admin/category/edit')->withInput();
        }

        $this->categoryModel->save([
            'category_id' => $this->request->getVar('id'),
            'category' => $this->request->getVar('category')
        ]);

        session()->setFlashdata('success', 'Data Berhasil Diupdate');
        return redirect()->to('/admin/category')->withInput();
    }
    public function createBlog()
    {
        session();
        $data = [
            'title' => 'Blog Data',
            'category' => $this->categoryModel->findAll(),
            'error' => \Config\Services::validation()
        ];
        return view('admin/blog/create', $data);
    }
    public function saveBlog()
    {
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|max_length[255]|is_unique[blog.blog_title]',
                'errors' => [
                    'required' => 'Masukkan judul blog',
                    'max_length' => 'Judul blog maksimal memiliki 255 karakter',
                    'is_unique' => 'Judul anda sudah terdaftar'
                ]
            ],
            'content' => [
                'rules' => 'required|min_length[300]',
                'errors' => [
                    'required' => 'Masukkan isi/konten blog',
                    'min_length' => 'Isi/konten blog minimal memiliki 300 karakter'
                ]
            ],
            'category' => [
                'rules' => 'numeric',
                'errors' => [
                    'numeric' => 'Masukkan Kategori'
                ]
            ]
        ])) {
            return redirect()->to('/admin/blog/create')->withInput();
        }
        $slug = url_title($this->request->getVar('judul'), '-', true);

        $this->blogModel->save([
            'blog_title' => $this->request->getVar('judul'),
            'slug' => $slug,
            'category_id' => $this->request->getVar('category'),
            'blog_content' => $this->request->getVar('content'),
        ]);
        session()->setFlashdata('success', 'Data Berhasil Dibuat');
        return redirect()->to('/admin/blog');
    }
    public function deleteBlog()
    {
        $this->blogModel->delete($this->request->getVar('id'));

        session()->setFlashdata('success', 'Data Berhasil Dihapus');
        return redirect()->to('/admin/blog');
    }
    public function editBlog($id)
    {
        session();
        $data = [
            'title' => 'Blog Data',
            'blog' => $this->blogModel->where(['blog_id' => $id])->first(),
            'category' => $this->categoryModel->findAll(),
            'error' => \Config\Services::validation()
        ];
        return view('/admin/blog/edit', $data);
    }
    public function updateBlog()
    {
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|max_length[255]|is_unique[blog.blog_title,blog_id,' . $this->request->getVar('id') . ']',
                'errors' => [
                    'required' => 'Masukkan judul blog',
                    'max_length' => 'Judul blog maksimal memiliki 255 karakter',
                    'is_unique' => 'Judul anda sudah terdaftar'
                ]
            ],
            'content' => [
                'rules' => 'required|min_length[300]',
                'errors' => [
                    'required' => 'Masukkan isi/konten blog',
                    'min_length' => 'Isi/konten blog minimal memiliki 300 karakter'
                ]
            ],
            'category' => [
                'rules' => 'numeric',
                'errors' => [
                    'numeric' => 'Masukkan Kategori'
                ]
            ]
        ])) {
            return redirect()->to('/admin/blog/edit')->withInput();
        }
        $slug = url_title($this->request->getVar('judul'), '-', true);

        $this->blogModel->save([
            'blog_id' => $this->request->getVar('id'),
            'blog_title' => $this->request->getVar('judul'),
            'slug' => $slug,
            'category_id' => $this->request->getVar('category'),
            'blog_content' => $this->request->getVar('content'),
        ]);
        session()->setFlashdata('success', 'Data Berhasil DiUpdate');
        return redirect()->to('/admin/blog');
    }
}
