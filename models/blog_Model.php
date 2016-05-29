<?php defined('SECURITY') or die('No direct script access.');

require_once 'ORM/query_orm.php';

class blog_Model extends query_orm {
    
    public function getPost($check) {
        
        return $this->query_select_orm('SELECT * FROM blog_post LIMIT '.$this->slashes(($check-1)*3).', 3');
    }
	
	public function getPostOne($id_post) {
        
        return $this->query_select_orm('SELECT * FROM blog_post WHERE id='.$this->slashes($id_post));
    }

    public function getComment($check) {
        
        return $this->query_select_orm('SELECT * FROM coments WHERE id_post='.$this->slashes($check));
    }

    public function getItemPost() {
        
        return $this->query_select_orm('SELECT COUNT(id) FROM blog_post');
    }

    public function addComent($check, $data) {
        
        return $this->query_insert_orm('INSERT INTO coments (coments.id_post, coments.user, coments.data_add, coments.texts) 
                                        VALUES ("'.$this->slashes($check).'","'.$this->slashes($data['nameUser']).'","'.date("Y.m.d H:i").'",
                                        "'.$this->slashes($data['texts']).'")');
    }
    
}
