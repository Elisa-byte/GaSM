<?php
    require_once "dbh.inc.php";
    $sql = "SELECT imageId FROM campanii_images ORDER BY imageId DESC"; 
    $result = mysqli_query($conn, $sql);
?>
<HTML>
<HEAD>
<TITLE>List BLOB Images</TITLE>
<link href="../formularCampanie.css" rel="stylesheet" type="text/css" />
</HEAD>
<BODY>
<?php
	while($row = mysqli_fetch_array($result)) {
	?>
		<img src="imageView.php?image_id=<?php echo $row["imageId"]; ?>" /><br/>
	
<?php		
	}
    mysqli_close($conn);
?>
</BODY>
</HTML>