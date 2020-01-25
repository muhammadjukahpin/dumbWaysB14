<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Book_model extends CI_Model
{
    public function getAll()
    {
        return $this->db->get('book_tb')->result_array();
    }

    public function getById($id)
    {
        return $this->db->get_where('book_tb', ['id' => $id])->row_array();
    }

    public function getAllCategory()
    {
        return $this->db->get('category_tb')->result_array();
    }

    public function getCategory($id)
    {
        return $this->db->get_where('category_tb', ['id' => $id])->row_array();
    }

    public function getAllWriter()
    {
        return $this->db->get('writer_tb')->result_array();
    }

    public function getWriter($id)
    {
        return $this->db->get_where('writer_tb', ['id' => $id])->row_array();
    }

    public function addBook()
    {
        $name = htmlspecialchars($this->input->post('name', true));
        $category_id = htmlspecialchars($this->input->post('category_id', true));
        $writer_id = htmlspecialchars($this->input->post('writer_id', true));
        $publication_year = htmlspecialchars($this->input->post('publication_year', true));
        $image = $_FILES['img']['name'];
        if ($image) {
            $config['upload_path']          = './asset/img/';
            $config['allowed_types']        = 'jpg|JPEG|png|PNG';
            $config['max_size']             = 2048;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('img')) {
                $image = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('message', $this->upload->display_errors());
                redirect('book/addBook');
            }
        } else {
            $this->session->set_flashdata('message', 'Image is required');
            redirect('book/addBook');
        }

        $data = [
            'name' => $name,
            'category_id' => $category_id,
            'writer_id' => $writer_id,
            'publication_year' => $publication_year,
            'img' => $image
        ];

        $this->db->insert('book_tb', $data);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('message', 'New Book has been added');
            redirect('book');
        } else {
            $this->session->set_flashdata('message', 'New Book fails to add');
            redirect('book/addBook');
        }
    }

    public function addCategory()
    {
        $name = htmlspecialchars($this->input->post('name', true));
        $this->db->insert('category_tb', ['name' => $name]);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('message', 'Category has been added');
            redirect('book');
        } else {
            $this->session->set_flashdata('message', 'Category fails to add');
            redirect('book/addCategory');
        }
    }

    public function addWriter()
    {
        $name = htmlspecialchars($this->input->post('name', true));
        $this->db->insert('writer_tb', ['name' => $name]);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('message', 'Writer has been added');
            redirect('book');
        } else {
            $this->session->set_flashdata('message', 'Writer fails to add');
            redirect('book/addWriter');
        }
    }

    public function editBook($id)
    {
        $data = $this->db->get_where('book_tb', ['id' => $id])->row_array();
        $name = htmlspecialchars($this->input->post('name', true));
        $category_id = htmlspecialchars($this->input->post('category_id', true));
        $writer_id = htmlspecialchars($this->input->post('writer_id', true));
        $publication_year = htmlspecialchars($this->input->post('publication_year', true));
        $image = $_FILES['img']['name'];
        if ($image) {
            $config['upload_path']          = './asset/img/';
            $config['allowed_types']        = 'jpg|JPEG|png|PNG';
            $config['max_size']             = 2048;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('img')) {
                $old_image = $data['img'];
                unlink(FCPATH . '/asset/img/' . $old_image);
                $new_image = $this->upload->data('file_name');
                $this->db->set('img', $new_image);
            } else {
                $this->session->set_flashdata('message', $this->upload->display_errors());
                redirect('book/editBook');
            }
        }

        $this->db->set('name', $name);
        $this->db->set('category_id', $category_id);
        $this->db->set('writer_id', $writer_id);
        $this->db->set('publication_year', $publication_year);
        $this->db->where('id', $id);
        $this->db->update('book_tb');

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('message', 'The Book has been edited');
            redirect('book');
        } else {
            $this->session->set_flashdata('message', 'The Book fails to edited');
            redirect('book/editBook/' . $id);
        }
    }

    public function deleteBook($id)
    {
        $this->db->delete('book_tb', ['id' => $id]);

        if ($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('message', 'The Book has been deleted');
            redirect('book');
        } else {
            $this->session->set_flashdata('message', 'The Book fails to deleted');
            redirect('book/detail/' . $id);
        }
    }
}
