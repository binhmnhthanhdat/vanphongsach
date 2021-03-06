<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tintuc extends CI_Controller {

    function tintuc() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('tintuc_model');
        $this->load->model('Trangchu_model');
        $this->load->library('util');
        $this->load->helper(array('form', 'url', 'date'));
        $this->load->library('form_validation');
        $this->load->library('pagination');
        $this->load->helper('url');
        $this->session->unset_userdata('anh');
        $this->session->set_userdata('anh', 'tin-tuc');
    }

    function index($alias = null) {
        $data['title'] = "Tin tức thi công - Tin tức công nghệ";
        $data['laygrouptintuc'] = $this->Trangchu_model->laygrouptintuc();
        if ($alias == null || is_numeric($alias)) {
            $data['laytinmoi'] = $this->tintuc_model->laytinmoi_index();
            $sql = "select * from cat_new where type='4'";
            $laytitle = $this->db->query($sql);
            $kqlaytitle = $laytitle->row();
            $data['title'] = $kqlaytitle->title;
            $data['description'] = $kqlaytitle->metadescription;
            $data['keywords'] = $kqlaytitle->metakeyword;
        } else {
              if ($this->uri->segment(3) != "" && !is_numeric($this->uri->segment(3))) {
                $url = $this->uri->segment(3);
            } else if ($this->uri->segment(2) != "" && !is_numeric($this->uri->segment(2))) {
                $url = $this->uri->segment(2);
            } else if ($this->uri->segment(1) != "" && !is_numeric($this->uri->segment(1))) {
                $url = $this->uri->segment(1);
            }
            $sql = "SELECT * FROM group_new where alias=\"" . $url . "\"";
            $laytitle = $this->db->query($sql);
            $kqlaytitle = $laytitle->row();
            $data['title'] = $kqlaytitle->title;
            $data['description'] = $kqlaytitle->metadescription;
            $data['keywords'] = $kqlaytitle->metakeyword;
            $config['base_url'] = base_url('tin-tuc/' . $url); // xác đ?nh trang phân trang
            $config['total_rows'] = $this->tintuc_model->laytinmoi_alias($alias)->num_rows(); // xác đ?nh t?ng s? record
            $config['per_page'] = 7; // xác đ?nh s? record ? m?i trang
            $config['uri_segment'] = 3; // xác đ?nh segment ch?a page number
            $config['full_tag_open'] = '<li>';
            $config['full_tag_close'] = '</li>';
            $this->pagination->initialize($config);
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data['laytinmoi'] = $this->tintuc_model->laytinmoi_alias_pt($alias, $page, $config['per_page']);
        }
        $data['laypartner'] = $this->Trangchu_model->laypartner();
        $data['content'] = 'tintuc/index';
        $this->load->view('layout/template', $data);
    }

    function tag($alias, $page = null) {
        $data['title'] = "tag";
        if ($alias != null) {
            $data['title'] = str_replace("-", " ", $alias);
            $data['description'] = "Dịch vụ vệ sinh và Giúp việc nhà - văn phòng theo giờ ở Hà Nội và T.P Hồ Chí Minh. Liên hệ: 012.19001080 - Từ khóa dịch vụ: " . str_replace("-", " ", $alias);
            $data['keywords'] = str_replace("-", " ", $alias);
            $config['base_url'] = base_url('tag/' . $alias); // xác đ?nh trang phân trang
            $config['total_rows'] = $this->tintuc_model->tagtin($alias)->num_rows(); // xác đ?nh t?ng s? record
            $config['per_page'] = 30; // xác đ?nh s? record ? m?i trang
            $config['uri_segment'] = 3; // xác đ?nh segment ch?a page number
            $config['full_tag_open'] = '<li>';
            $config['full_tag_close'] = '</li>';
            $this->pagination->initialize($config);
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data['laytinproject'] = $this->tintuc_model->tagtin_pt($alias, $page, $config['per_page']);
        }
        $data['laypartner'] = $this->Trangchu_model->laypartner();
        $data['content'] = 'tag/index';
        $this->load->view('layout/template', $data);
    }

    function chitiet($alias) {
        $data['title'] = "Chi tiết tin tức";
        $data['laygrouptintuc'] = $this->Trangchu_model->laygrouptintuc();
        $data['chitiettintuc'] = $this->tintuc_model->chitiettintuc($alias);
        $data['laypartner'] = $this->Trangchu_model->laypartner();
        $data['content'] = 'tintuc/chitiettintuc';
        $this->load->view('layout/template', $data);
    }

    function chitietdichvucongnghe($alias, $page = null) {
        $data['title'] = "Chi tiết tin tức";
        $laytitle = $this->tintuc_model->chitiettintuc($alias);
        $kqlaytitle = $laytitle->row();
        $data['title'] = $kqlaytitle->title;
        $data['description'] = $kqlaytitle->metadescription;
        $data['keywords'] = $kqlaytitle->metakeyword;
        $data['laygrouptintuc'] = $this->Trangchu_model->laygrouptintuc();
        $data['chitiettintuc'] = $this->tintuc_model->chitiettintuc($alias);
        if (($data['chitiettintuc']->num_rows()) <= 0) {
            $this->output->set_status_header('404');
            show_404();
        }
        $data['laypartner'] = $this->Trangchu_model->laypartner();
        $data['content'] = 'tintuc/chitiettintuc';
        $this->load->view('layout/template', $data);
    }

    function chitietkythuat($alias) {
        $data['title'] = "Chi tiết tin tức";
        $data['title'] = "Chi tiết tin tức";
        $laytitle = $this->tintuc_model->chitiettintuc($alias);
        $kqlaytitle = $laytitle->row();
        $data['title'] = $kqlaytitle->title;
        $data['description'] = $kqlaytitle->metadescription;
        $data['keywords'] = $kqlaytitle->metakeyword;
        $data['laygrouptintuc'] = $this->Trangchu_model->laygrouptintuc();
        $data['chitiettintuc'] = $this->tintuc_model->chitiettintuc($alias);
        if (($data['chitiettintuc']->num_rows()) <= 0) {
            $this->output->set_status_header('404');
            show_404();
        }
        $data['laypartner'] = $this->Trangchu_model->laypartner();
        $data['content'] = 'tintuc/chitiettintuc';
        $this->load->view('layout/template', $data);
    }

    function chitietcongnghemaytinh($alias) {

        $data['title'] = "Chi tiết tin tức";
        $laytitle = $this->tintuc_model->chitiettintuc($alias);
        $kqlaytitle = $laytitle->row();
        $data['title'] = $kqlaytitle->title;
        $data['description'] = $kqlaytitle->metadescription;
        $data['keywords'] = $kqlaytitle->metakeyword;
        $data['laygrouptintuc'] = $this->Trangchu_model->laygrouptintuc();
        $data['chitiettintuc'] = $this->tintuc_model->chitiettintuc($alias);
        if (($data['chitiettintuc']->num_rows()) <= 0) {
            $this->output->set_status_header('404');
            show_404();
        }
        $data['laypartner'] = $this->Trangchu_model->laypartner();
        $data['content'] = 'tintuc/chitiettintuc';
        $this->load->view('layout/template', $data);
    }

    function chitietthicongnoithat($alias) {

        $data['title'] = "Chi tiết tin tức";
        $laytitle = $this->tintuc_model->chitiettintuc($alias);
        $kqlaytitle = $laytitle->row();
        $data['title'] = $kqlaytitle->title;
        $data['description'] = $kqlaytitle->metadescription;
        $data['keywords'] = $kqlaytitle->metakeyword;
        $data['laygrouptintuc'] = $this->Trangchu_model->laygrouptintuc();
        $data['chitiettintuc'] = $this->tintuc_model->chitiettintuc($alias);
        if (($data['chitiettintuc']->num_rows()) <= 0) {
            $this->output->set_status_header('404');
            show_404();
        }
        $data['laypartner'] = $this->Trangchu_model->laypartner();
        $data['content'] = 'tintuc/chitiettintuc_dichvu';
        $this->load->view('layout/template', $data);
    }

    function chitietthicongvanphong($alias) {

        $data['title'] = "Chi tiết tin tức";
        $laytitle = $this->tintuc_model->chitiettintuc($alias);
        $kqlaytitle = $laytitle->row();
        $data['title'] = $kqlaytitle->title;
        $data['description'] = $kqlaytitle->metadescription;
        $data['keywords'] = $kqlaytitle->metakeyword;
        $data['laygrouptintuc'] = $this->Trangchu_model->laygrouptintuc();
        $data['chitiettintuc'] = $this->tintuc_model->chitiettintuc($alias);
        if (($data['chitiettintuc']->num_rows()) <= 0) {
            $this->output->set_status_header('404');
            show_404();
        }
        $data['laypartner'] = $this->Trangchu_model->laypartner();
        $data['content'] = 'tintuc/chitiettintuc_dichvu';
        $this->load->view('layout/template', $data);
    }
    function chitietthicongmang($alias, $page = null) {

        $data['title'] = "Chi tiết tin tức";
        $laytitle = $this->tintuc_model->chitiettintuc($alias);
        $kqlaytitle = $laytitle->row();
        $data['title'] = $kqlaytitle->title;
        $data['description'] = $kqlaytitle->metadescription;
        $data['keywords'] = $kqlaytitle->metakeyword;
        $data['laygrouptintuc'] = $this->Trangchu_model->laygrouptintuc();
        $data['chitiettintuc'] = $this->tintuc_model->chitiettintuc($alias);
        if (($data['chitiettintuc']->num_rows()) <= 0) {
            $this->output->set_status_header('404');
            show_404();
        }
        $data['laypartner'] = $this->Trangchu_model->laypartner();
        $data['content'] = 'tintuc/chitiettintuc_dichvu';
        $this->load->view('layout/template', $data);
    }
    function chitietcongtynoithat($alias) {
        $data['title'] = "Chi tiết tin tức";

        $laytitle = $this->tintuc_model->chitiettintuc($alias);
        $kqlaytitle = $laytitle->row();
        $data['title'] = $kqlaytitle->title;
        $data['description'] = $kqlaytitle->metadescription;
        $data['keywords'] = $kqlaytitle->metakeyword;
        $data['laygrouptintuc'] = $this->Trangchu_model->laygrouptintuc();
        $data['chitiettintuc'] = $this->tintuc_model->chitiettintuc($alias);
        if (($data['chitiettintuc']->num_rows()) <= 0) {
            $this->output->set_status_header('404');
            show_404();
        }
        $data['laypartner'] = $this->Trangchu_model->laypartner();
        $data['content'] = 'tintuc/chitiettintuc_dichvu';
        $this->load->view('layout/template', $data);
    }
    function chitietsuachuanhacua($alias) {
        $data['title'] = "Chi tiết tin tức";

        $laytitle = $this->tintuc_model->chitiettintuc($alias);
        $kqlaytitle = $laytitle->row();
        $data['title'] = $kqlaytitle->title;
        $data['description'] = $kqlaytitle->metadescription;
        $data['keywords'] = $kqlaytitle->metakeyword;
        $data['laygrouptintuc'] = $this->Trangchu_model->laygrouptintuc();
        $data['chitiettintuc'] = $this->tintuc_model->chitiettintuc($alias);
        if (($data['chitiettintuc']->num_rows()) <= 0) {
            $this->output->set_status_header('404');
            show_404();
        }
        $data['laypartner'] = $this->Trangchu_model->laypartner();
        $data['content'] = 'tintuc/chitiettintuc_dichvu';
        $this->load->view('layout/template', $data);
    }

    function chitietdichvusonnha($alias) {
        $data['title'] = "Chi tiết tin tức";

        $laytitle = $this->tintuc_model->chitiettintuc($alias);
        $kqlaytitle = $laytitle->row();
        $data['title'] = $kqlaytitle->title;
        $data['description'] = $kqlaytitle->metadescription;
        $data['keywords'] = $kqlaytitle->metakeyword;
        $data['laygrouptintuc'] = $this->Trangchu_model->laygrouptintuc();
        $data['chitiettintuc'] = $this->tintuc_model->chitiettintuc($alias);
        if (($data['chitiettintuc']->num_rows()) <= 0) {
            $this->output->set_status_header('404');
            show_404();
        }
        $data['laypartner'] = $this->Trangchu_model->laypartner();
        $data['content'] = 'tintuc/chitiettintuc_dichvu';
        $this->load->view('layout/template', $data);
    }
}
