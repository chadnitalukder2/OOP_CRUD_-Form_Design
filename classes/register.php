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
            #----------img-----------------
            $permited  = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $file['photo']['name'];
            $file_size = $file['photo']['size'];
            $file_temp = $file['photo']['tmp_name'];
            #----------------
            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $upload_image = "upload/".$unique_image;

            #---------empty ---------
            if((empty($name)) || empty($email) || empty($phone) || empty($address) || empty($unique_image)){
                $msg = "Filds Must Not Be Empty";
                return $msg;
            }
            #---------img------
            else if($file_size > 1048567){
                $msg = "File size must be less than 1 MB";
                return $msg;
            }
            else if(in_array($file_ext, $permited) == false){
                $msg = "You Can upload only".implode(', ', $permited);
                return $msg;
            }
            #=====================insert Data============================
            else {
                move_uploaded_file($file_temp, $upload_image);
                $query = "INSERT INTO `tbl_register`(`name`, `email`, `phone`, `photo`, `address`)
                         VALUES ('$name', '$email', '$phone', '$upload_image', '$address') ";
                
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
            #----------img-----------------
            $permited  = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $file['photo']['name'];
            $file_size = $file['photo']['size'];
            $file_temp = $file['photo']['tmp_name'];
            #----------------
            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $upload_image = "upload/".$unique_image;

            #---------empty ---------
            if((empty($name)) || empty($email) || empty($phone) || empty($address)){
                $msg = "Filds Must Not Be Empty";
                return $msg;
            }
            #------------
            if(!empty($file_name)){
                #---------img------
                if($file_size > 1048567){
                    $msg = "File size must be less than 1 MB";
                    return $msg;
                }
                else if(in_array($file_ext, $permited) == false){
                    $msg = "You Can upload only".implode(', ', $permited);
                    return $msg;
                }
                #=====================insert Data with img============================
                else {
                    #--------update img delete----------
                    $img_query = "SELECT * FROM tbl_register WHERE id = '$id' ";
                    $img_res   = $this->db->select($img_query);
                    if($img_res){
                        while($row = mysqli_fetch_assoc($img_res)){
                            $photo = $row['photo'];
                            unlink($photo);
                        }
                    }
                    #-----------------
                    move_uploaded_file($file_temp, $upload_image);

                    $query = "UPDATE tbl_register
                    SET name = '$name', email = '$email', phone = '$phone', photo = '$upload_image', address = '$address' 
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
            #-----------insert Data with img---------------------
            else{
                $query = "UPDATE tbl_register
                SET name = '$name', email = '$email', phone = '$phone', address = '$address' 
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
        #======================delete==================
        public function delStudent($id){
            $del_query = "DELETE FROM tbl_register
                        WHERE id = '$id' ";
            $del  = $this->db->delete($del_query);
            
            if($del){
                $msg = "Student delete Susscessfull ";
                return $msg;
            }
            else{
                $msg = "Student delete Failed ";
                return $msg;
            }
        }

    }

 


?>