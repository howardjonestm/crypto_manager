<?php
class groups{

    private $db;
    
    public function __construct(PDO $db){
        $this->db = $db;
        
    }

    public function addGroup($groupName,$groupAdmin,$groupDescription){
        $add = $this->db->prepare('INSERT into groups (group_name,admin_user,group_description) values (:name,:admin,:description)');
        $add->execute(array(':name'=>$groupName,':admin'=>$groupAdmin,':description'=>$groupDescription));
    }
    
    //Return groups and details
    public function returnGroups($userID){
        $groups = $this->db->prepare('SELECT group_id, group_name, admin_user, group_description FROM groups WHERE admin_user = :userID');
        $groups->execute(array(':userID'=>$userID));
        $row = $groups->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    //Return groups which user is admin of
    public function returnUserAdmins($userID){
        $groups = $this->returnGroups($userID);
        $groupNames = [];
        foreach($groups as $value){
            foreach($value as $key=>$data){
                if($key=='group_name'){
                    $groupNames[]=$data;
                }
            }
        }
        return $groupNames;
    }

    //Return description of group from group name
    public function returnDescription($groupName){
        $groups = $this->db->prepare('SELECT group_description FROM groups WHERE group_name = :groupName');
        $groups->execute(array(':groupName'=>$groupName));
        $row = $groups->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    //Delete group by group name
    public function deleteByGroupName($groupName){
        $groups = $this->db->prepare('DELETE FROM groups WHERE group_name = :groupName');
        $groups->execute(array(':groupName'=>$groupName));       
    }

    //Add user to an existing group 
    public function addUser($userID,$groupID){
        $add = $this->db->prepare('INSERT INTO group_membership (user_id, group_id) values (:userID, :groupID)');
        $add->execute(array(':userID'=>$userID, 'groupID'=>$groupID));
    }

     //Remove user from an existing group 
     public function deleteUser($userID,$groupID){
        $add = $this->db->prepare('DELETE FROM group_membership where user_id = :userID AND group_id = :groupID');
        $add->execute(array(':userID'=>$userID, 'groupID'=>$groupID));
    }

    //Return group ID from group name 
    public function getGroupId($groupName){
        $sdmt=$this->db->prepare("SELECT group_id from groups where group_name = :groupName");
        $sdmt->execute(array(':groupName'=>$groupName));
        $row = $sdmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    }

    //Remove all group membership records
    public function deleteGroupMembers($groupId){
        $sdmt=$this->db->prepare("DELETE from group_membership where group_id = :groupId");
        $sdmt->execute(array(':groupId'=>$groupId));       
    }

    //Return email/username from user_id
    public function returnUser($userID){
        $sdmt=$this->db->prepare("SELECT email from users WHERE id = :userID");
        $sdmt->execute(array('userID'=>$userID));
        $result = $sdmt->fetch(PDO::FETCH_ASSOC);
        return $result['email'];

    }

    //Return groupID from groupName
    public function returnGroup($groupName){
        $sdmt=$this->db->prepare("SELECT group_id from groups WHERE group_name = :groupName");
        $sdmt->execute(array('groupName'=>$groupName));
        $result = $sdmt->fetch(PDO::FETCH_ASSOC);
        return $result['group_id'];

    }

    //Return groupName from groupID
    public function returnGroupName($groupID){
        $sdmt=$this->db->prepare("SELECT group_name from groups WHERE group_id = :groupid");
        $sdmt->execute(array('groupid'=>$groupID));
        $result = $sdmt->fetch(PDO::FETCH_ASSOC);
        return $result['group_name'];
    }

    //Return array of group members;
    public function getMembers($groupName){
        $groupID=$this->returnGroup($groupName);
        $sdmt=$this->db->prepare("SELECT user_id from group_membership where group_id = :groupID");
        $sdmt->execute(array(':groupID'=>$groupID));
        $row = $sdmt->fetchAll(PDO::FETCH_COLUMN, 0);
        
        $memberNames=[];
        foreach($row as $value){
            $memberNames[]=$this->returnUser($value);
        }

        return $memberNames;
    
    }

    //Return array of groups for user
    public function getGroups($userID){
        $sdmt=$this->db->prepare("select group_id from group_membership where user_id = :userID");
        $sdmt->execute(array(':userID'=>$userID));
        $row = $sdmt->fetchAll(PDO::FETCH_COLUMN, 0);
        $group_names=[];
        foreach($row as $value){
            $group_names[]=$this->returnGroupName($value);
        }

        return $group_names;
    }

    //insert user group transaction record
    public function insertTransaction($groupName, $email, $time, $eth_adjustment, 
    $btc_adjustment, $eth_current_price, $btc_current_price){

        $sdmt=$this->db->prepare("INSERT INTO group_transaction (group_name, email, timestamp, eth_change,
         btc_change, eth_market_value, btc_market_value) values (:groupName, :email, :timestamp, :ethChange,
         :btcChange, :ethMarketValue, :btcMarketValue)");

        $sdmt->execute(array(':groupName'=>$groupName, ':email'=>$email, ':timestamp'=>$time, ':ethChange' =>$eth_adjustment,
        ':btcChange'=>$btc_adjustment, ':ethMarketValue'=>$eth_current_price, ':btcMarketValue'=> $btc_current_price));

    }

    //Return all users as array
    public function returnUsers(){
        $users = $this->db->query("SELECT email from users");
        $row = $users->fetchAll(PDO::FETCH_COLUMN, 0);
        return $row;
    }



}


?>