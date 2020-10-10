<?php 
echo "I am order.php!";
echo "<br>";
$redis = new Redis();
$redis->connect('myredis-master', 6379);
$redis->auth('my_master_password');
echo "Connection to Redis server sucessfully!"; 
echo "<br>";
echo "Server is running: " . $redis->ping();
echo "<br>";
$redis->set("Cloud Computing", "INFS3208/7208"); 
echo "Course code of Cloud Computing is: " .$redis->get("Cloud Computing"); 
?>
