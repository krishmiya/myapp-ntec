<?php

if(count($schoolData) > 0){
	echo '<option value="0">Select school</option>';

	$k = 0;
    while ($k < count($schoolData)) {
		$sId = $schoolData[$k]['sId'];
		$schoolName = $schoolData[$k]['schoolName'];
		echo "<option value='$sId'>$schoolName</option>";
		$k++;
    }
		
}else{
	echo '<option value="0">School not available</option>';
}