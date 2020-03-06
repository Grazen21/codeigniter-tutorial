<?php 

    class Main_model extends CI_Model {
        function model_function(){
            echo "created function in model";
        }

        function insert_data($data) {
            $this->db->insert("tbl_user", $data); //"tbl_user" is table name
        }

        function fetch_data() {
            // $query = $this->db->get("tbl_user");
            //select *  from tbl_user
            // $query = $this->db->query("SELECT * FROM tbl_user ORDER BY id DESC");
            $this->db->select("*");
            $this->db->from("tbl_user");
            $query = $this->db->get();
            return $query;
        }

        function delete_data($id) {
            $this->db->where("id", $id);
            $this->db->delete("tbl_user");
            //DELETE FROM tbl_user WHERE id = $id
        }

        function fetch_single_data($id) {
            $this->db->where("id", $id);
            $query = $this->db->get("tbl_user");
            return $query;
        }

        function update_data($data, $id) {
            $this->db->where("id", $id);
            $this->db->update("tbl_user", $data);
            // UPDATE tbl_user SET first_name= "$first_name", last_name="last_name" where id="id"
        }
    } 