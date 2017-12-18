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



}


?>