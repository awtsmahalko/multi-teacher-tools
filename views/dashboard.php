	<div id="page-wrapper">
		<div class="row">
                <div class="col-lg-12">
                    <center><h1 class="page-header">WELCOME TO TEACHER'S TOOL</h1></center>
                </div>
			<?php if($_SESSION['user_type'] == 1){
				$f_id_for_class = $_SESSION['account_id'];
				$fetch_class = mysql_query("SELECT * FROM tbl_class WHERE f_id = '$f_id_for_class'");
				function countStudentClass($class_id){
				$fetch = mysql_fetch_array(mysql_query("SELECT count(class_load_id) FROM tbl_class_load WHERE class_id=$class_id"));
				return $fetch[0];
				}
			?>
				<div class="row">
				<?php 
				$count = 1;
				while($row_class = mysql_fetch_array($fetch_class)){
                                    if($count %2 != 0){
                                        $panel_type = "panel-primary";
                                    }elseif($count %3 != 0){
                                        $panel_type = "panel-green";
                                    }
				?>
					<div class="col-lg-3 col-md-6">
						<div class="panel <?php echo $panel_type; ?>">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-book fa-5x"></i>
									</div>
									<div class="col-xs-9 text-right">
										<div class="huge"><?php echo countStudentClass($row_class['class_id'])?></div>
										<div>Students!</div>
									</div>
								</div>
							</div>
							<a href="index.php?page=class-load&class_id=<?php echo $row_class['class_id'];?>">
								<div class="panel-footer">
									<span class="pull-left"><?php echo $row_class['class_code'] ?></span>
									<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div>
				<?php $count++; } ?>
				</div>
			<?php } ?>
		</div>
	</div>