

<html><title>GPA Prediction</title>
<head>
<script type="text/javascript" src="floating-1.8.js">  
</script>  

</head>
<body>
<link rel = "stylesheet" type = "text/css" href = "style.css" />


<div id="floatdiv" style="  
    position:absolute;  
    width:200px;height:70px;top:10px;right:10px;  
    padding:16px;background:#FFFFFF;  
    border:2px solid #2266AA;  
    z-index:100;
    font-size:xx-small;">  
	Presenter: Jianheng Zhang <br />
	Advisor: Ryan Phelps(Economics and Finance)<br />
	Nelson Rusche College of Business <br />
	Stephen F. Austin State University <br />
</div>  
  
<script type="text/javascript">  
    floatingMenu.add('floatdiv',  
        {  
            // Represents distance from left or right browser window  
            // border depending upon property used. Only one should be  
            // specified.  
            // targetLeft: 0,  
            targetRight: 10,  
  
            // Represents distance from top or bottom browser window  
            // border depending upon property used. Only one should be  
            // specified.  
            // targetTop: 10,  
            targetBottom: 10,  
  
            // Uncomment one of those if you need centering on  
            // X- or Y- axis.  
            // centerX: true,  
            // centerY: true,  
  
            // Remove this one if you don't want snap effect  
            snap: true  
        });  
</script>  



<div id = "pagetitle">SFA GPA Prediction
<div id = "desc">
<ul>
	<li>Predicts the Average GPA of SFA Students Described</li>
	<li>Based on a Survey of 100 SFA Students</li>
	<li>For Entertainment Only</li>
	</ul>
</div>
	
</div>

<div id = "data">

	<form method="post">Please Select Your SAT/ACT Test Version<br />
		<input type="radio" name="test" value="sata" /> SAT<br />
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" name="score" value="1600" /> 1600<br />
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="score" value="2400" /> 2400<br />
		<input type="radio" name="test" value="acta" /> ACT<br />
		
	<table>
		<tr><td>SAT/ACT Score</td><td><input type="text"  name="sat" value = "<?php echo $_REQUEST['sat']; ?>"/></td></tr>
		<tr><td>High School GPA Scale</td><td><input type="radio" name="gpaScale" value="4" />4.0<input type="radio" name="gpaScale" value="5" />5.0</td></tr>
		<tr><td>High School GPA</td><td><input type="text" name="hsgpa" value = "<?php echo $_REQUEST['hsgpa']; ?>"/></td></tr>
		<tr><td>Hours of Work per Week</td><td><input type="text" name="how" value = "<?php echo $_REQUEST['how']; ?>"/></td></tr>
		<tr><td>Percentage of Tuition Paid by Student</td><td><input type="text" name="youpay" value = "<?php echo $_REQUEST['youpay']; ?>"/>%</td></tr>
		<tr><td>Percentage of Tuition Paid by Parents</td><td><input type="text" name="parentpay" value = "<?php echo $_REQUEST['parentpay']; ?>"/>%</td></tr>
		<tr><td>Party Nights per Week</td><td><input type="text" name="party" value = "<?php echo $_REQUEST['party']; ?>"/></td></tr>
		<tr><td>Alcoholic Drinks per Week</td><td><input type="text" name="drink" value = "<?php echo $_REQUEST['drink']; ?>"/></td></tr>
		<tr><td>Hours of Exercise per Week</td><td><input type="text" name="workout" value = "<?php echo $_REQUEST['workout']; ?>"/></td></tr>
		<tr><td>Hours of Video Entertainment per Week</td><td><input type="text" name="video" value = "<?php echo $_REQUEST['video']; ?>"/></td></tr>
		<tr><td>Hours of Social Network per Week</td><td><input type="text" name="socialnetwork" value = "<?php echo $_REQUEST['socialnetwork']; ?>"/></td></tr>
		<tr><td>Hours of AARC Tutoring per Week</td><td><input type="text" name="aarc" value = "<?php echo $_REQUEST['aarc']; ?>"/></td></tr>
	</table>
	

		<div class = "buttons">
			<input type="submit" class = "positive" value="Submit" /><br />
		</div>
	</form>
</div>

<div id = "output">Predicted GPA:

<?php	
		$gpaRlt;
		$scoreType = 0;
		if($_REQUEST['sat'] != "" && $_REQUEST['hsgpa'] != "" && $_REQUEST['party'] != ""){
			calculate();	
		}
        function calculate(){
			$a = $_REQUEST['sat'];
			$b = $_REQUEST['hsgpa'];
			$c = $_REQUEST['how'];
			$d = $_REQUEST['youpay'];
			$e = $_REQUEST['parentpay'];
			$f = $_REQUEST['party'];
			
			$h = $_REQUEST['drink'];
			$i = $_REQUEST['workout'];
			$j = $_REQUEST['video'];
			$k = $_REQUEST['socialnetwork'];
			$l = $_REQUEST['aarc'];
	
			$arr = array($a, $b, $c, $d, $e, $f, $h, $i, $j, $k, $l);
			
			foreach ($arr as $element) {
				if (!is_numeric($element)) {
					echo '<script type="text/javascript">
							alert("Your input is not correct! Please try again");
							</script>';
					break;
				}
			}
			
			if($_REQUEST['gpaScale'] == "5"){
				$b = $b / 5 * 4;
			}
			
			$result1 = 1.456 + 0.486 * $a / 1600 + 0.415 * $b - 0.008 * $c - 0.051 / 100 * $d - 0.185 * $e / 100 - 0.062 * $f - 0.007 * $h + 0.023 * $i - 0.01 * $k + 0.033 * $l;
			
			$result2 = 1.456 + 0.486 * $a / 2400 + 0.415 * $b - 0.008 * $c - 0.051 / 100 * $d - 0.185 * $e / 100 - 0.062 * $f - 0.007 * $h + 0.023 * $i - 0.01 * $k + 0.033 * $l;
			
			$result3 = 1.456 + 0.486 * $a / 36 + 0.415 * $b - 0.008 * $c - 0.051 / 100 * $d - 0.185 * $e / 100 - 0.062 * $f - 0.007 * $h + 0.023 * $i - 0.01 * $k + 0.033 * $l;
			
			//echo $result1;
			//echo $result2;
			//echo $result3;
			
			if($_REQUEST['test'] == "sata" && $_REQUEST['score'] == "1600"){
				$gpaRlt = $result1;
				$scoreType = 0;
				
			}
			else if($_REQUEST['test'] == "sata" && $_REQUEST['score'] == "2400"){
				$gpaRlt = $result2;
				$scoreType = 2;
			}
			else if($_REQUEST['test'] == "acta"){
				$gpaRlt = $result3;
				$scoreType = 3;
			}else {
				$gpaRlt = $result1;
				$scoreType = 0;
			}
		if ($gpaRlt > 4){
			$gpaRlt = 4;
			echo number_format($gpaRlt, 2);
		}else{
			echo number_format($gpaRlt, 2);
		}
	
		//connect to database	
		/*
		$con = mysql_connect("forpractice.db.8220756.hostedresource.com","forpractice","Jansen1988");
		if (!$con){
		  die();
		}
		mysql_select_db("forpractice");
		if ($gpaRlt <= 4 && $gpaRlt > 0 && $b <= 4 && $b > 0){//condition of inserting data into database
			mysql_query("INSERT INTO GPA VALUES ($scoreType,$a,$b,$c,$d,$e,$f,$h,$i,$j,$k,$l,$gpaRlt);");
		}else {
			mysql_query("INSERT INTO GPA VALUES (-1,$a,$b,$c,$d,$e,$f,$h,$i,$j,$k,$l,$gpaRlt);");
		}*/

		// echo "<div>Score:";
		// $scoreEnd = $gpaRlt / 4 * 5;
		// if ($scoreEnd > 0){
			// echo number_format($scoreEnd, 2);
			// echo "/5";
		// }
		// echo "</div>";
	}
?>
<br />


</div><br />





</body>
</html>