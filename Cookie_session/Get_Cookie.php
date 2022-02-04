<h1>Get Cookie from Create Cookie dot php</h1>
<?php
if (isset($_COOKIE['Name'])){
    echo $_COOKIE['Name'];
}
else
	echo "Cookie not found.";
?>