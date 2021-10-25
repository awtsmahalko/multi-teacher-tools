            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
						<?php
						if($_SESSION['user_type'] == 0){
						?>
                        <li>
                            <a href="index.php?page=faculty"><i class="fa fa-users fa-fw"></i> Faculty</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-print fa-fw"></i> Reports<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="index.php?page=class-record">Class Records</a>
                                </li>
                                <li>
                                    <a href="index.php?page=admin-print-seat-plan">Seat Plan</a>
                                </li>
                                <li>
                                    <a href="index.php?page=admin-print-dropped-failed">List of Dropped & Failed</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						<?php }else if($_SESSION['user_type'] == 1){?>
                        <li>
                            <a href="index.php?page=faculty-class"><i class="fa fa-book fa-fw"></i> Classes</a>
                        </li>
						 <li>
                            <a href="index.php?page=classes-for-scoring"><i class="fa fa-plus-circle fa-fw"></i> Add Scores</a>
                        </li>
                       <li>
                            <a href="index.php?page=class-by-schedule"><i class="fa fa-calendar fa-fw"></i> Schedules</a>
                        </li>
                       <li>
                            <a href="index.php?page=class-term"><i class="fa fa-list fa-fw"></i> Terms</a>
                        </li>
                       <li>
                            <a href="index.php?page=grading-system"><i class="fa fa-list-alt fa-fw"></i> Grading System</a>
                        </li>
                        <li>
                            <a href="index.php?page=students-grade"><i class="fa fa-bar-chart fa-fw"></i> Students' Grade</a>
                        </li>
                       <li>
                            <a href="index.php?page=settings"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-print fa-fw"></i> Reports<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="index.php?page=fac-print-schedule">Schedule</a>
                                </li>
								<li>
                                    <a href="index.php?page=print-seat-plan">Seat Plan</a>
                                </li>
                                <li>
                                    <a href="index.php?page=print-dropped-failed">List of Dropped & Failed</a>
                                </li>
                                <li>
                                    <a href="index.php?page=fac-graph-dropped-and-failed">Graph for Dropped & Failed</a>
                                </li>
                                <li>
                                    <a href="index.php?page=students-ranking">Top 10 students</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
						<?php }?>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>