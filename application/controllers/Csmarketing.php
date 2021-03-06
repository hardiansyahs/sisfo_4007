<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Csmarketing extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
    public function __construct(){
        parent::__construct();
        $this->load->model('CSMarketing_model');
    }

  	public function index()
  	{
      $data['banner'] = $this->CSMarketing_model->getBanner();
  		$data['article'] = $this->CSMarketing_model->getArticle();
  		$data['about'] = $this->CSMarketing_model->getAbout();
  		$this->load->view('marketing/cms-marketing',$data);
    }

    public function editBanner($id){
        if(isset($_POST['submit'])){
            $title = $this->input->post('title');
            $ket = $this->input->post('ket');

            $input = array(
                    'h1' => $title,
                    'keterangan' => $ket
            );

            $update = $this->CSMarketing_model->update($id, $input, 'banner');
            if($update){
                redirect('csmarketing');
            }
        }
    }

    public function editAbout($id){
        if(isset($_POST['submit'])){
            $title = $this->input->post('title');
            $isi = $this->input->post('isi');

            $input = array(
                    'title' => $title,
                    'isi' => $isi
            );

            $update = $this->CSMarketing_model->update($id, $input, 'about');
            if($update){
                redirect('csmarketing');
            }
        }
    }

    public function editArticle($id){
        if(isset($_POST['submit'])){
            $title = $this->input->post('title');
            $isi = $this->input->post('isi');

            $input = array(
                    'title' => $title,
                    'isi' => $isi
            );

            $update = $this->CSMarketing_model->update($id, $input, 'article');
            if($update){
                redirect('csmarketing');
            }
        }
    }

    public function addArticle(){
        if(isset($_POST['submit'])){
            $title = $this->input->post('title');
            $isi = $this->input->post('isi');

            $input = array(
                    'title' => $title,
                    'isi' => $isi
            );
            $insert = $this->CSMarketing_model->insert($input);
            if($insert){
                redirect('csmarketing');
            }
        }
    }

    public function hapusArticle($id){
        $delete = $this->CSMarketing_model->delete($id);
        if($delete){
            redirect('csmarketing');
        }
    }
}
