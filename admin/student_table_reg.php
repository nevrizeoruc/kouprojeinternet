	<?php include('dbcon.php'); ?>
	<meta http-equiv="Content-Type" content="text/HTML; charset=utf-8" />
	<form action="delete_student.php" method="post">
	<table cellpadding="0" cellspacing="0" border="0" class="table" id="example">
	<a data-toggle="modal" href="#student_delete" id="delete"  class="btn btn-danger" name=""><i class="icon-trash icon-large"></i></a>
	<div class="pull-right">
			    <ul class="nav nav-pills">
				<li class="">
					<a href="students.php">Tüm</a>
				</li>
				<li class="">
					<a href="unreg_students.php">Kayıtsız</a>
				</li>
				<li class="active">
				<a href="reg_students.php">Kayıtlı</a>
				</li>
				</ul>
	</div>
	<?php include('modal_delete.php'); ?>
		<thead>
		<tr>
					<th></th>
				
					<th>İsim</th>
					<th>ID >Numarası</th>
			
					<th>Ders Yılı ve Bölümü</th>
					<th></th>
		</tr>
		</thead>
		<tbody>
			
		<?php
	$query = mysql_query("select * from student LEFT JOIN class ON student.class_id = class.class_id where status = 'Kayıtlı' ORDER BY student.student_id DESC") or die(mysql_error());
	while ($row = mysql_fetch_array($query)) {
		$id = $row['student_id'];
		?>
	
		<tr>
		<td width="30">
		<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
		</td>
	
		<td><?php echo $row['firstname'] . " " . $row['lastname']; ?></td> 
		<td><?php echo $row['username']; ?></td> 
	
		<td width="100"><?php echo $row['class_name']; ?></td> 
	
		<td width="30"><a href="edit_student.php<?php echo '?id='.$id; ?>" class="btn btn-success"><i class="icon-pencil"></i> </a></td>
	
		</tr>
	<?php } ?>    
	
		</tbody>
	</table>
	</form>