<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

    // first test
	// public function index()
	// {
    //     // echo 'test main controller';
    //     // $this-> test1();
    //     $this->load->model("main_model");
    //     // echo $this->main_model->model_function();
    //     $data["title"]= "Controller passed down text.";
    //     $data["test1"]= "Other controller passed down text.";
    //     $data["model_function"]= $this->main_model->model_function();
    //     $this->load->view("main_view", $data);
    // }
    
    // public function test1() {
    //     echo "main controller: test 1 function";
    // }

    public function index() {
        $this->load->model("main_model");
        $data["fetch_data"] = $this->main_model->fetch_data();
        $this->load->view("main_view", $data);
    }

    public function form_validation() {
        $this->load->library("form_validation");
        $this->form_validation->set_rules("first_name", "First Name", "required|alpha");
        $this->form_validation->set_rules("last_name", "Last Name", "required|alpha");

        

        if ($this->form_validation->run()) {
            $this->load->model("main_model");
            $data= array(
                "first_name"=> $this->input->post("first_name"),
                "last_name"=> $this->input->post("last_name"),
            );
            // update insert code
            if ($this->input->post("update")) {
                $this->main_model->update_data($data, $this->input->post("hidden_id"));
                redirect(base_url() . "index.php/main/updated");
            }
            if ($this->input->post("insert")) {
                $this->main_model->insert_data($data);
                redirect(base_url() . "index.php/main/inserted");
            }

        } else {
            $this->index();
        }
    }

    public function inserted() {
        $this->index();
    }

    public function delete_data() {
        $id= $this->uri->segment(3);
        $this->load->model("main_model");
        $this->main_model->delete_data($id);
        redirect(base_url(). "index.php/main/deleted");
    }

    public function deleted() {
        $this->index();
    }

    public function update_data() {
        $user_id= $this->uri->segment(3);
        $this->load->model("main_model");
        $data["user_data"]= $this->main_model->fetch_single_data($user_id); 
        $data["fetch_data"] = $this->main_model->fetch_data(); //fetch all user data
        $this->load->view("main_view", $data);
    }

    public function updated() {
        $this->index();
    }
}
