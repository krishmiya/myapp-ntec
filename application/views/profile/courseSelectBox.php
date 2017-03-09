<?php

if(count($courseData) > 0){
	echo '<option value="0">Select course</option>';
	
	$k = 0;
    while ($k < count($courseData)) {
		$crsId = $courseData[$k]['crsId'];
		$courseName = $courseData[$k]['courseName'];
		echo "<option value='$crsId'>$courseName</option>";
		$k++;
    }
}else{
	echo '<option value="0">Course not available</option>';
}