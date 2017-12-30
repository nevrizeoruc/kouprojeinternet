	      <!-- block -->
		  <meta http-equiv="Content-Type" content="text/HTML; charset=utf-8" />
                        <div class="block" id="search_class">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-left"><strong>Geçmiş Sınıfı Ara</strong></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form method="post" action="search_class.php">	
										<div class="control-group">
											<label>Okul yılı:</label>
                                          <div class="controls">
                                            <select name="school_year"  class="span8" required>
                                             	<option></option>
											<?php
											$query = mysql_query("select * from school_year order by school_year DESC");
											while($row = mysql_fetch_array($query)){
											
											?>
											<option><?php echo $row['school_year']; ?></option>
											<?php } ?>
                                            </select>
                                          </div>
                                        </div>
											<div class="control-group">
                                          <div class="controls">
												<button name="search" class="btn btn-info"><i class="icon-search"></i> Ara</button>

                                          </div>
                                        </div>
                                </form>
								</div>
                            </div>
                        </div>
                        <!-- /block -->