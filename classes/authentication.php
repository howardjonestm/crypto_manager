<?php
//tutorial followed at: http://www.dreamincode.net/forums/topic/247188-user-authentication-class/

class authentication{

    //siteKey is a salt, it should be changed for each web application
    private $_siteKey;
    private $db;

    public function __construct(PDO $db){
        $this->sitKey = 'site-wide-salt';
        $this->db = $db;
    }

    //it is suggested that this be converted to a random generated, user unique value
    private function returnString(){
        return "123";
    }

    protected function hash($data){
        return hash_hmac('sha512', $data, $this->_siteKey);        
    }

    public function checkExists($email){

        //Check whether user already exists
        //Select users row from database based on $email
        $select = $this->db->prepare("select id, email, password, user_salt from users where email = :email");
        $select->execute(array(':email'=>$email));

        $row = $select->fetch(PDO::FETCH_ASSOC);

        if($select->rowCount() > 0){           
            return true;
        }
        
        return false;
        
    }

    public function createUser($email, $password){
        
        //Generating user salt
        $userSalt = $this->returnString();
        $password = $userSalt . $password;
        $password = $this->hash($password);


        //Need to commit values to the database
        $stmt = $this->db->prepare("INSERT INTO users (email,password,user_salt) VALUES (:email, :password, :usersalt)");
        $stmt->execute([
            'email' => $email,
            'password' => $password,
            'usersalt' => $userSalt
        ]);
                
        return false;
    }
    

    public function login($email, $password)
    {
        
       //Select users row from database base on $email
        $r = $this->db->prepare("select id, email, password, user_salt from users where email = :email");
        $r->execute(array(':email'=>$email));
        
        //row is array of id, email, password $ user_salt
        $row = $r->fetch(PDO::FETCH_ASSOC);
       
        //check if passwords match
        if($r->rowCount()==1){

        //Salt and hash password for checking
        
        $password = $row['user_salt'] . $password;
        $password = $this->hash($password);

        if($password==$row['password']){
            

            //Email & Password combination exists so set sessions

            $random = $this->returnString();           
            $token = $this->hash($token);
                
            //Setup sessions vars
            session_start();
            $_SESSION['token'] = $token;
            $_SESSION['user_id'] = $row['id'];
            $sessionID = session_id();
                
            //Delete old logged_in_member records for user
            $deleteRecord = $this->db->prepare("delete from logged_in_member where user_id = :userid");
            $deleteRecord->execute(array(':userid'=>$row['id']));

            //Insert new logged_in_member record for user

            $insertRecord = $this->db->prepare("insert into logged_in_member (user_id, session_id, token) values (:userid, :sessionid, :token)");
            $insertRecord->execute(array(':userid'=>$row['id'], ':sessionid'=>$sessionID, ':token'=>$token));
        
            
        //no match reject
        return true;
        }
    }
    return false;
    
}

    public function checkSession(){

        $sessID = $_SESSION['user_id'];
        
        //Retrieved logged in user data
        $selection = $this->db->prepare("select user_id, session_id, token from logged_in_member where user_id = :sessID");
        $selection->execute(array(':sessID'=>$sessID));
        
        $row = $selection->fetch(PDO::FETCH_ASSOC);

       if($selection->rowCount()==1){
            //check ID and Token

           
            if(session_id() == $row['session_id'] && $_SESSION['token'] == $row['token']){
                //Refresh the session for the next request

                return true;
            }
        }
        return false;
    }

    public function logout(){

       //Remove from logged_in_member table and destroy session
        $userID = $_SESSION['user_id'];
        $deleteRecord = $this->db->prepare("delete from logged_in_member where user_id = :userid");
        $deleteRecord->execute(array(':userid'=>$userID));

    session_destroy();

    }

    //Return user ID from email 
    public function getUserID($email){
        $sdmt=$this->db->prepare("SELECT id from users where email = :email");
        $sdmt->execute(array(':email'=>$email));
        $row = $sdmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    //Return user email from id
    public function getUserEmail($userID){
        $sdmt=$this->db->prepare("SELECT email from users where id = :userID");
        $sdmt->execute(array(':userID'=>$userID));
        $row = $sdmt->fetch(PDO::FETCH_ASSOC);
        return $row['email'];
    }

 
    
}
