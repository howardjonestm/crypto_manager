<?php 

class portfolio{

    private $db;

    public function __construct(PDO $db){
        $this->db = $db;
    }

    public function addUser($userID){
        $add = $this->db->prepare('INSERT into balances (user_id,btc,eth) values (:userID,0,0)');
        $add->execute(array(':userID'=>$userID));
    }

    public function portfolioAdjustment($btcAdjustment, $ethAdjustment, $userID){
        $adjust = $this->db->prepare('UPDATE balances SET btc = btc + :btcAdjustment, eth = eth + :ethAdjustment WHERE user_id = :userID');
        $adjust->execute(array(':btcAdjustment'=>$btcAdjustment, ':ethAdjustment'=>$ethAdjustment, ':userID'=>$userID));
    }

    public function retrieveBalance($userID){
        // $retrieve = $this->db->prepare('SELECT :currency From balances where user_id = :userID');
        // $retrieve->execute(array(':currency'=>$currency, 'userID'=>$userID));

        $retrieve = $this->db->prepare('SELECT btc, eth From balances where user_id = :userID');
        $retrieve->execute(array('userID'=>$userID));
        $row = $retrieve->fetch(PDO::FETCH_ASSOC);
        
       return $row;
    }



  

    

}


?>