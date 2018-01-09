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
    public function returnBtcBalance($groupName){
        $sdmt=$this->db->prepare("SELECT SUM(btc_change) FROM group_transaction where group_name = :groupname");
        $sdmt->execute(array(':groupname'=>$groupName));
        $row = $sdmt->fetch(PDO::FETCH_ASSOC);
        foreach($row as $key=>$value){
            if(is_null($row[$key])){
                $row[$key]=0;
            }
        }
        return $row;
    }

    //Return eth balance of group
    public function returnEthBalance($groupName){
        $sdmt=$this->db->prepare("SELECT SUM(eth_change) FROM group_transaction where group_name = :groupname");
        $sdmt->execute(array(':groupname'=>$groupName));
        $row = $sdmt->fetch(PDO::FETCH_ASSOC);
        foreach($row as $key=>$value){
            if(is_null($row[$key])){
                $row[$key]=0;
            }
        }
        return $row;
    }

    //Return a list of group names
    public function returnGroupNames(){
        $sdmt=$this->db->query("SELECT group_name from groups");
        $row = $sdmt->fetchAll(PDO::FETCH_COLUMN);
        
        return $row;
    }

    //Calculate portfolio value
    public function calculateValue($btcbalance,$ethbalance){
        //retrieve price data
        $url = "https://api.coinmarketcap.com/v1/ticker/";
        $json = file_get_contents($url);
        $data = json_decode($json, TRUE);
        $btc_current_price=$data[0]['price_usd'];
        $eth_current_price=$data[1]['price_usd'];

        $total=($btc_current_price*$btcbalance)+($eth_current_price*$ethbalance);
        return $total;
    }


        
    //Return group performance table
    public function returnGroupPerformance($activeGroup){

        $dataArray=array();
        //create array of data
        $namesArray=$this->returnGroupNames();
        
        foreach($namesArray as $groupName){
        
            $groupEthBalance=$this->returnEthBalance($groupName)["SUM(eth_change)"];
            $groupBtcBalance=$this->returnBtcBalance($groupName)["SUM(btc_change)"];

            $dataArray[$groupName]=array("groupName"=>$groupName,
                                     "eth_holding"=>$groupEthBalance,
                                     "btc_holding"=>$groupBtcBalance,
                                     "total_value"=>$this->calculateValue($groupBtcBalance,$groupEthBalance));
        }

        echo "<table>
        <tr>
        <th>Group Name</th>
        <th>eth holdings</th>
        <th>btc holdings</th>
        <th>value (usd)</th>
        
        </tr>";

       
         
        foreach($dataArray as $row){
            echo "<tr>";
        if($row['groupName']==$activeGroup){echo "<td class=\"investmentgreen\">". $row['groupName'] ."</td>";}
                    else{
            echo "<td>" . $row['groupName'] . "</td>";}
            echo "<td>" . $row['eth_holding'] . "</td>";
            echo "<td>" . $row['btc_holding'] . "</td>";
            echo "<td>" . $row['total_value'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";

    }

}