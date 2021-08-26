<?php

namespace Model;

use http\Env\Request;
use Model\Database;

class Devices
{
    private $conn;
    public function __construct(
        Database $data
    ) {
        $this->conn = $data;
    }
    public function getAll()
    {
        $sql = "SELECT * FROM devices";
$result = $this->conn->connect()->query($sql);


$a = [];
$i=0;
if ($result->rowCount() > 0) {
    // output data of each row
   while($row = $result->fetch()) {
//        echo "id: " . $row["device_id"]. " - Name: " . $row["name"]. " -Age: " . $row["mac_address"]. "-Gender: " . $row["ip"]." -Position:".$row["created_date"]." -PC: " . $row["pc"]."<br>";
//        for($i =0;$i<5;$i++)
//       {
       $stack=new \stdClass();
           $datas['device_id'] = $row["device_id"];
           $datas['name'] = $row["name"];
           $datas['mac_address'] = $row["mac_address"];
           $datas['ip'] = $row["ip"];
           $datas['created_date'] = $row["created_date"];
           $datas['pc'] = $row["pc"];
       $datas['color'] = $row["color"];
           $stack=(object)$datas;

           $a[$i]=(array)$stack;
           $i++;


//       array_push($stack, $datas);
      // array_push($stack,$row["device_id"],$row["name"],$row["mac_address"],$row["ip"],$row["created_date"],$row["pc"]);
//       $obj=(object)$stack;
   }
  // var_dump($a);
    //$stacks=[5];
    ?>
    <script type="text/javascript">var arr = <?php echo json_encode($a); ?>;</script>
    <script type="text/javascript" src="/intern/assets/js/dashboard.js"></script>
    <?php

    } else {
        echo "0 results";
    }
        }


    public function getById($id)
    {
        $conn = $this->conn->connect();

        $sql = "Select * FROM devices WHERE device_id = ?";

        $stmt = $conn->prepare($sql);

        $stmt->execute([$id]);

        while($row= $stmt->fetch()){
            echo "id: " . $row["device_id"]. " - Name: " . $row["name"]. " -Age: " . $row["mac_address"]. "-Gender: " . $row["ip"]." -Position:".$row["created_date"]." -PC: " . $row["pc"]."<br>";
        }
    }
   public function store(Request $request)
        {

            $name=$request['name'];
            $ip=$request['ip'];
            $mac=$request['mac'];
            $pc=$request['pc'];
            $date=date("Y/m/d");
            $cl='rgb('.rand(0,200).','.rand(0,200).','.rand(0,200).')';
var_dump($cl);
            $sql='Insert into devices values("$name","$ip","$mac","$pc","$date","$cl")';
            $this->conn->connect()->query($sql);
            echo '<script language="text/javascript">alert("Insert successfully")</script>';
        }

}

?>



