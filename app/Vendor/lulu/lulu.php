<?php
define('AUTH_URL', 'https://www.lulu.com/account/endpoints/authenticator.php');
define('TOKEN_URL', 'https://apps.lulu.com/api/publish/v1/request_upload_token');
define('UPLOAD_URL', 'https://transfer.lulu.com/api/create/v1/file');
define('PUBLISH_URL', 'https://apps.lulu.com/api/publish/v1/create');

class lulu{

    private $api_key = 'sk8q54xxu5wde3gqe3fnvtnc';
    private $username = 'manashaiub@yahoo.com';
    private $password = 'abcd1234';
    var $url = AUTH_URL;
    var $data = '';
    private $auth_token = '';
    
    public function __construct($config = '') {
        if($config['api_key']){
            $this->api_key = $config['api_key'];
        }
        if($config['username']){
            $this->username = $config['username'];
        }
        if($config['password']){
            $this->password = $config['password'];
        }
         
    }
    
    public function authentication(){
        $this->url = AUTH_URL;
        $data = array('api_key' => $this->api_key,'username' => $this->username, 'password' => $this->password, 'responseType' => 'json');
        $response = $this->request($data);
        //echo 'authentication'. "\n";
        var_dump($response);die();
        return $response;
    }
    
    public function upload(){
        $this->url = UPLOAD_URL.'?api_key=sk8q54xxu5wde3gqe3fnvtnc';
        
        $data = 'POST /api/create/v1/file HTTP/1.1
                User-Agent: curl 7.15.5 (x86_64-redhat-linux-gnu) libcurl/7.15.5 OpenSSL/0.9.8b
                Host: transfer.lulu.com
                Content-Length: 32
                Content-Type: multipart/form-data; boundary=gc0p4Jq0M2Yt08jU534c0p

                --gc0p4Jq0M2Yt08jU534c0p
                Content-Disposition: form-data; name="testfile"; filename="TEST.pdf"
                Content-Type: application/pdf

                <body>file contents are here</body>


                --gc0p4Jq0M2Yt08jU534c0p--';
        
        $response = $this->request($data);
        //echo 'upload'. "\n";
        var_dump($response);die();
        return $response;
    }
    
    public function publish(){
        $this->url = PUBLISH_URL;
    }
    
    public function request($data = ''){
        //$url = "https://apps.lulu.com/api/publish/v1/update/id/".$content_id;
        //$data = array('project' => $data, 'api_key' => $apikey, 'auth_token' => $authToken,'auth_user' => $authUser);
        
        $ch = curl_init($this->url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_FORBID_REUSE, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;

    }
   
}

?>
