<?php
    include_once 'library/Database.php';

    class Register
    {
        public $bd;

        public function __construct()
        {
            $this->db = new Database();
        }
        //===============insert===============
        public function addRegister($data, $file){
            $name    = $data['name'];
            $email   = $data['email'];
            $phone   = $data['phone'];
            $address = $data['address'];

           /* $permited   = array ('jpg', 'jpeg', 'png', 'gif');
            $file_name  = $file['photo']['name'];
            $file_size  = $file['photo']['size'];
            $file_temp  = $file['photo']['tmp_name'];

            $div           = explode ('.', $file_name);
            $file_ext      = strtolower(end($div));
            $unique_image  = substr(md5(time()),  0, 10).'.'.$file_ext;
            $upload_image  = "upload/".$unique_image;*/
    
            if((empty($name)) || empty($email) || empty($phone) || empty($address) )
            {
                $msg = "Filds Must Not Be Empty";
                return $msg;
            }
           /* else if($file_size > 1048567)
            {
                $msg = "File size must be less than 1MB ";
                return $msg;
            }
            else if(in_array($file_ext, $permited) == false)
            {
                $msg = "You Can upload only ".implode(', ', $permited);
                return $msg;
            }*/
            else {
                //move_uploaded_file($file_temp, $upload_image);
                #=====================insert Data============================

                $query = "INSERT INTO `tbl_register`(`name`, `email`, `phone`, `photo`, `address`) VALUES ('$name', '$email', '$phone',  ' photo','$address')";
                
                $result = $this->db->insert($query);

                if($result){
                    $msg = "Registration Susscessfull ";
                    return $msg;
                }
                else{
                    $msg = "Registration Failed ";
                    return $msg;
                }
            }
        }
        //add student==========================================
        public  function allStudent(){
            $query  = "SELECT * FROM tbl_register ORDER BY id DESC";
            $result = $this->db->select($query);
            return $result;
            
        }

        //======show student==============================
        public function getStdById($id){
            $query  = "SELECT * FROM tbl_register  WHERE id = '$id' ";
            $result = $this->db->select($query);
            return $result;
        }
        //================update Student========
        public function updateStudent($data, $file, $id){
            $name    = $data['name'];
            $email   = $data['email'];
            $phone   = $data['phone'];
            $address = $data['address'];
    
            if((empty($name)) || empty($email) || empty($phone) || empty($address) ){
                $msg = "Filds Must Not Be Empty";
                return $msg;
            }
            else{
                $query = "UPDATE tbl_register 
                SET name ='$name',email = '$email', phone = '$phone', address = '$address'
                WHERE id = '$id' ";
        
                $result = $this->db->insert($query);

                if($result){
                    $msg = "Student Update Susscessfull ";
                    return $msg;
                }
                else{
                    $msg = "Student Update Failed ";
                    return $msg;
                }
            }

        }


    }

 


?>