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




}


?>