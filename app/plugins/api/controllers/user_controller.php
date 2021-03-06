<?php
class UserController extends ApiAppController {

    public function query(){
        App::import('Sanitize');
        $id = trim($this->params['id']);
        try{
            $u = User::getInstance($id);
        }catch(UserNullException $e){
            $this->error(ECode::$USER_NOID);
        }
        $wrapper = Wrapper::getInstance();
        $this->set('data', $wrapper->user($u));
    }

    public function login(){
        $u = User::getInstance();
        $wrapper = Wrapper::getInstance();
        $data = $wrapper->user($u);
        $this->set('data', $data);
    }

    public function logout(){
        $u = User::getInstance();
        $wrapper = Wrapper::getInstance();
        $this->set('data', $wrapper->user($u));
        $this->ApiSession->logout();
    }
}

?>
