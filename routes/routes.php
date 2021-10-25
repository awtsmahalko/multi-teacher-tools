<?php
	if($page == 'faculty'){
		require view.'admin_faculty.php';
	}else if($page == 'class-record'){
		require view.'admin_class_record.php';
	}else if($page == 'admin-print-seat-plan'){
		require view.'admin_print_seat_plan.php';
	}else if($page == 'admin-print-dropped-failed'){
		require view.'admin_print_dropped_failed.php';
	}else if($page == 'dashboard'){
		require view.'dashboard.php';
	}else if($page == 'faculty-class'){
		require view.'fac_class.php';
	}else if($page == 'class-by-schedule'){
		require view.'fac_class_by_schedule.php';
	}else if($page == 'class-schedule'){
		require view.'fac_class_schedule.php';
	}else if($page == 'class-term'){
		require view.'fac_class_term.php';
	}else if($page == 'class-load'){
		require view.'fac_class_load.php';
	}else if($page == 'seat-plan'){
		require view.'fac_seat_plan.php';
	}else if($page == 'settings'){
		require view.'fac_settings.php';
	}else if($page == 'grading-system'){
		require view.'fac_grading_system.php';
	}else if($page == 'classes-for-scoring'){
		require view.'fac_classes_for_scoring.php';
	}else if($page == 'add-scores'){
		require view.'fac_add_scores.php';
	}else if($page == 'students-grade'){
		require view.'fac_students_grade.php';
	}else if($page == 'students-grade-per-class'){
		require view.'fac_students_grade_per_class.php';
	}else if($page == 'print-seat-plan'){
		require view.'fac_print_seat_plan.php';
	}else if($page == 'print-dropped-failed'){
		require view.'fac_print_dropped_student.php';
	}else if($page == 'student-attendance'){
		require view.'fac_student_attendance.php';
	}else if($page == 'students-ranking'){
		require view.'fac_students_ranking.php';
	}else if($page == 'fac-graph-dropped-and-failed'){
		require view.'fac_graph_dropped_and_failed.php';
	}else if($page == 'fac-print-schedule'){
		require view.'fac_print_schedule.php';
	}else{
		if(!empty($page) or $page != $page){
			require view.'error/error.php';
		}else{
			require view.'dashboard.php';
		}
	}
	
 ?>
