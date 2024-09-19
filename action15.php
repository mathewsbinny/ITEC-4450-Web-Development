<?php
session_start();
?>

<html>
<body>
<?php
//$_SESSION["PC"]=$_SESSION["Pad"]=$_SESSION["Mac"]=$_POST["PC"]=$_POST["Pad"]=$_POST["Mac"]="";
if(isset($_POST["submit"])){
if($_POST["PC"]=="PC"){
     $_SESSION["PC"]="PC";
	 if(isset($_SESSION["nPC"]))
	   $_SESSION["nPC"]+=$_POST["nPC"]; //for continue shopping
	 else
	   $_SESSION["nPC"]=$_POST["nPC"]; //for the first time
  }
  //for iPad
  if($_POST["Pad"]=="Pad"){
     $_SESSION["Pad"]="Pad";
	 if(isset($_SESSION["nPad"]))
	   $_SESSION["nPad"]+=$_POST["nPad"]; //for continue shopping
	 else
	   $_SESSION["nPad"]=$_POST["nPad"]; //for the first time
  }
  
  //for Mac
  if($_POST["Mac"]=="Mac"){
     $_SESSION["Mac"]="Mac";
	 
	 if(isset($_SESSION["nMac"]))
	   $_SESSION["nMac"]+=$_POST["nMac"]; //for continue shopping
	 else
	   $_SESSION["nMac"]=$_POST["nMac"]; //for the first time
  }
  
}

$total=0;
echo"<h1> Your shopping cart:</h1>
  <hr>
  <table>
  <tr>
  <td> Item</td>  <td> Price </td>  <td> Quantity</td>
  </tr>";
  if($_SESSION["PC"]=="PC"){
	 
	  $total+=$_POST["PCPrice"]* $_SESSION["nPC"];
	  echo "<tr> <td> <img src='".$_POST["PCImage"]."' width='100'></td>";
	  echo"<td>". $_POST["PCPrice"]."</td>";
	   echo"<td>". $_SESSION["nPC"]."</td>";
	   echo "</tr>";
  }
  
  //handle iPad
  if($_SESSION["Pad"]=="Pad"){
	 
	  $total+=$_POST["PadPrice"]* $_SESSION["nPad"];
	  echo "<tr> <td> <img src='".$_POST["PadImage"]."' width='100'></td>";
	  echo"<td>". $_POST["PadPrice"]."</td>";
	   echo"<td>". $_SESSION["nPad"]."</td>";
	   echo "</tr>";
  }
  //handle Mac
  if($_SESSION["Mac"]=="Mac"){
	 
	  $total+=$_POST["MacPrice"]* $_SESSION["nMac"];
	  echo "<tr> <td> <img src='".$_POST["MacImage"]."' width='100'></td>";
	  echo"<td>". $_POST["MacPrice"]."</td>";
	   echo"<td>". $_SESSION["nMac"]."</td>";
	   echo "</tr>";
  }
  
  echo"</table>";
   echo"<hr>";
    echo"<h3>The total cost is ".$total."</h3>";
	$_SESSION["total_cost"]=$total;
	 echo"<h3>Please verify your order and <a href='action15-2.php'>proceed to checkout</a>
	 or <a href='Activity15.php'>click here</a> to continue shoppping</h3>";
	
  
  
?>
</body>
</html>