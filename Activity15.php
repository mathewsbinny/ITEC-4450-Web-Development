<html>
<head>
<title>Activity 15 </title>
</head>
<body>
<h1>Welcome to Jeff's Online Tech Store </h1>
<hr>
<p> Submitted by Mathews Binny </p>


<form method="post" action="action15.php">
<table width="60%">
<tr>
<td> Item </td> <td>Price </td> <td> Want to Purchase?</td> <td>Quantity </td>
</tr>

<tr>
<td> <img src="https://www.digitalstorm.com/img/products/lumos/2020-overview-2-b.jpg" width="100"> 
<input type="hidden" name="PCImage" value="https://www.digitalstorm.com/img/products/lumos/2020-overview-2-b.jpg">
</td>
<td>$499 <input type="hidden" name="PCPrice" value="499"> </td> 
<td> <input type="checkbox" name="PC" value="PC" > </td> 
<td><input type="number" name="nPC" value="1" > </td>
</tr>

<tr>
<td> <img src="https://cdn.mos.cms.futurecdn.net/mYqKAn6RCL65SSs2U3muiE.jpg" width="100"> 
<input type="hidden" name="PadImage" value="https://cdn.mos.cms.futurecdn.net/mYqKAn6RCL65SSs2U3muiE.jpg">
</td>
<td>$299 <input type="hidden" name="PadPrice" value="299"> </td> 
<td> <input type="checkbox" name="Pad" value="Pad" > </td> 
<td><input type="number" name="nPad" value="1" > </td>
</tr>

<tr>
<td> <img src="https://images.idgesg.net/images/article/2019/11/2017-5k-imac-100819096-large.jpg" width="100"> 
<input type="hidden" name="MacImage" value="https://images.idgesg.net/images/article/2019/11/2017-5k-imac-100819096-large.jpg">
</td>
<td>$1299 <input type="hidden" name="MacPrice" value="1299"> </td> 
<td> <input type="checkbox" name="Mac" value="Mac" > </td> 
<td><input type="number" name="nMac" value="1" > </td>
</tr>
</table>

<input type ="submit" name="submit" value="Add to shopping cart">
</form>
</body>
</html>
