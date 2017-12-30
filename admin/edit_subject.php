<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>
<meta http-equiv="Content-Type" content="text/HTML; charset=utf-8" />
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('subject_sidebar.php'); ?>
		
						<div class="span9" id="content">
		                    <div class="row-fluid">
									 <a href="add_subject.php" class="btn btn-info"><i class="icon-plus-sign icon-large"></i> Konu Ekle</a>
		                        <!-- block -->
		                        <div id="" class="block">
		                            <div class="navbar navbar-inner block-header">
		                                <div class="muted pull-left">Konuyu Düzenle</div>
		                            </div>
		                            <div class="block-content collapse in">
									<a href="subjects.php"><i class="icon-arrow-left"></i> geri</a>
									
									<?php
									$query = mysql_query("select * from subject where subject_id = '$get_id'")or die(mysql_error());
									$row = mysql_fetch_array($query);
									?>
									
									    <form class="form-horizontal" method="post">
										<div class="control-group">
											<label class="control-label" for="inputEmail">Konu Kodu</label>
											<div class="controls">
											<input type="text" value="<?php echo $row['subject_code']; ?>" name="subject_code" id="inputEmail" placeholder="Konu Code">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="inputPassword">Konu BAşlığı</label>
											<div class="controls">
											<input type="text" value="<?php echo $row['subject_title']; ?>" class="span8" name="title" id="inputPassword" placeholder="Konu başlık" required>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="inputPassword">Birim Sayısı</label>
											<div class="controls">
											<input type="text" value="<?php echo $row['unit']; ?>" class="span1" name="unit" id="inputPassword" required>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="inputPassword">Açıklama</label>
											<div class="controls">
													<textarea name="description" id="ckeditor_full">
													<?php echo $row['description']; ?>
													</textarea>
											</div>
										</div>
												
																		
											
										<div class="control-group">
										<div class="controls">
										
										<button name="update" type="submit" class="btn btn-info"><i class="icon-save icon-large"></i> Güncelleme</button>
										</div>
										</div>
										</form>
										
										<?php
										if (isset($_POST['update'])){
										$subject_code = $_POST['subject_code'];
										$title = $_POST['title'];
										$unit = $_POST['unit'];
										$description = $_POST['description'];
										
										
									
										mysql_query("update subject set subject_code = '$subject_code' ,
																		subject_title = '$title',
																		unit  = '$unit',
																		description = '$description'
																		where subject_id = '$get_id' ")or die(mysql_error());
																		
										mysql_query("insert into activity_log (date,username,action) values(NOW(),'$user_username','düzenle Konu $subject_code')")or die(mysql_error());
										
										?>
										<script>
										window.location = "subjects.php";
										</script>
										<?php
										}
										
										
										?>
									
								
		                            </div>
		                        </div>
		                        <!-- /block -->
		                    </div>
		                </div>
            </div>
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>

</html>