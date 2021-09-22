<?php

namespace App\Controllers;

use App\Models\BlogModel;
use App\Models\CategoryModel;

class Blog extends BaseController
{
    protected $blogModel;
    protected $categoryModel;
    protected $pager;
    public function __construct()
    {
        $this->blogModel = new BlogModel();
        $this->categoryModel = new CategoryModel();
        $this->pager = \Config\Services::pager();

        helper('text');
    }
    public function index()
    {
        $data = [
            'title' => 'Home',
            'blog' => $this->blogModel->join('category', 'blog.category_id = category.category_id')->orderBy('blog_id', 'DESC')->paginate(3),
            'pager' => $this->blogModel->pager,
            'category' => $this->categoryModel->findAll(),
        ];
        return view('blog', $data);
    }
    public function detail($slug)
    {
        $data = [
            'title' => 'Detail',
            'blog' => $this->blogModel->join('category', 'blog.category_id = category.category_id')->where(['slug' => $slug])->first(),
            'category' => $this->categoryModel->findAll()
        ];
        return view('detail', $data);
    }
    public function search()
    {
        if (!empty($this->request->getVar('search'))) {
            $data = [
                'title' => 'Search',
                'blog' => $this->blogModel->join('category', 'blog.category_id = category.category_id')->like('blog.blog_title', $this->request->getVar('search'))->findAll(),
                'category' => $this->categoryModel->findAll()
            ];
            session()->setFlashdata('error', 'Anda mencari : ' . $this->request->getVar('search'));
            return view('search', $data);
        } else {
            session()->setFlashdata('error', 'Masukkan keyword pencarian');
            return redirect()->to('/');
        }
    }
    public function category($id)
    {
        if (!empty($id)) {
            $data = [
                'title' => 'Search',
                'blog' => $this->blogModel->join('category', 'blog.category_id = category.category_id')->where(['blog.category_id' => $id])->findAll(),
                'category' => $this->categoryModel->findAll()
            ];
            $category = $this->categoryModel->where(['category_id' => $id])->first();
            session()->setFlashdata('error', 'Anda mencari berdasarkan kategori : ' . $category['category']);
            return view('category', $data);
        }
    }
}
