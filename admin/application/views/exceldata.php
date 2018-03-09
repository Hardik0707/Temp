<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>Upload here</h1>
<div>		
<!-- <?php print_r($header);?> -->
<!-- <table border="1">
		<tr>
			<?php foreach ($header as $key => $value) {
				foreach ($value as $key2 => $value2) {
					echo "<th>".$value2."</th>";
				}
				
			} ?>
		</tr>

		<?php foreach ($values as $key => $value) {
			echo "<tr>";
			foreach ($value as $key1 => $value2) {
			echo "<td>".$value2."</td>";				
			}
			echo "</tr>";
		} ?> 
			

</table> -->

<!-- <?php print_r($employee_data);

foreach ($employee_data as $key => $value) {
	# code...
echo $value->subject;
echo $value->date;
echo $value->duration;
echo $value->test_type;
} 
 ?> -->

<form action="<?php echo base_url("index.php/ExcelDataInsert/ExcelDataAdd"); ?>">

<label>Excel File:</label>                        
<input type="file" name="userfile" />				                   
<input type="submit" value="upload" name="upload" />
</form>	

</div>



</body>
</html>

