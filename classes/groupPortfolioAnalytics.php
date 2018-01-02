<?php

class groupPortfolioAnalytics{

    private $db;
    
    public function __construct(PDO $db){
        $this->db = $db;
        
    }

    //Return transaction history of group 
    public function returnTransaction($groupName){
        $sdmt=$this->db->prepare("SELECT email, timestamp,
         eth_change, btc_change, eth_market_value, btc_market_value 
         FROM group_transaction Where group_name=:groupname");

        $sdmt->execute(array(':groupname'=>$groupName));
        $row = $sdmt->fetchAll(PDO::FETCH_ASSOC);
        return $row;


    }

    //Return btc balance of group

    //Return eth balance of group 

}