<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Book extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Book_model', 'book');;
    }

    public function index()
    {
        $data['title'] = 'List Book';
        $data['books'] = $this->book->getAll();
        $this->load->view('templates/header', $data);
        $this->load->view('book/index');
        $this->load->view('templates/footer');
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Book';
        $data['book'] = $this->book->getById($id);
        $data['category'] = $this->book->getCategory($data['book']['category_id']);
        $data['writer'] = $this->book->getWriter($data['book']['writer_id']);
        $this->load->view('templates/header', $data);
        $this->load->view('book/detail', $data);
        $this->load->view('templates/footer');
    }

    public function addBook()
    {
        $data['title'] = 'Form Add Book';
        $data['categories'] = $this->book->getAllCategory();
        $data['writers'] = $this->book->getAllWriter();

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('category_id', 'Category', 'required|trim');
        $this->form_validation->set_rules('writer_id', 'Writer', 'required|trim');
        $this->form_validation->set_rules('publication_year', 'Publication Year', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('book/add_book', $data);
            $this->load->view('templates/footer');
        } else {
            $this->book->addBook();
        }
    }

    public function addCategory()
    {
        $data['title'] = 'Form Add Category';

        $this->form_validation->set_rules('name', 'Name', 'required|trim|is_unique[category_tb.name]');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('book/add_category', $data);
            $this->load->view('templates/footer');
        } else {
            $this->book->addCategory();
        }
    }

    public function addWriter()
    {
        $data['title'] = 'Form Add Writer';

        $this->form_validation->set_rules('name', 'Name', 'required|trim|is_unique[writer_tb.name]');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('book/add_writer', $data);
            $this->load->view('templates/footer');
        } else {
            $this->book->addWriter();
        }
    }


    public function editBook($id)
    {
        $data['title'] = 'Form Edit Book';
        $data['categories'] = $this->book->getAllCategory();
        $data['writers'] = $this->book->getAllWriter();
        $data['book'] = $this->book->getById($id);

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('category_id', 'Category', 'required|trim');
        $this->form_validation->set_rules('writer_id', 'Writer', 'required|trim');
        $this->form_validation->set_rules('publication_year', 'Publication Year', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('book/edit_book', $data);
            $this->load->view('templates/footer');
        } else {
            $this->book->editBook($id);
        }
    }

    public function deleteBook($id)
    {
        $this->book->deleteBook($id);
    }
}
