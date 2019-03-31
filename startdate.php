<!DOCTYPE html>
<html>
<head>
	<title>Exam Routine</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<style >
		table{
			border-collapse: collapse;
			width: 100%;
			color: #588c7e;
			font-family: monospace;
			font-size: 25px;
			text-align: center;
		}
		th{
			background-color: #588c7e;
			color: white;
			text-align: left;
		}
		tr:nth-child(even){background-color: #f2f2f2}
	</style>
</head>
<body>
	<nav>
	<p>Exam Schedular</p>
		<ul>
		<li><a href="project.html">Home</a></li>
		<li><a href="#">Exam Routine</a>
			 <ul>
			 	  <li><a href="CSE.html">CSE</a></li>
			 	  <li><a href="EEE.html">EEE</a></li>
			 	  <li><a href="CE.html">CE</a></li>

			 	</ul>	
		</li>
		<li><a href="offday.html">Off day</a></li>	
		<li><a href="Welcome page.html">Log out</a></li>
	</ul>
	</nav>
<table>
	<tr>
		<th>Course Id <br>Course Title</th><br>
		
		<th>Date</th>
	</tr>
	<?php
$jan_mx = 31;
$feb_mx = 28;
$mar_mx = 31;
$ap_mx  = 30;
$may_mx = 31;
$Jun_mx = 30;
$jul_mx = 31;
$aug_mx = 31;
$sep_mx = 30;
$oct_mx = 31;
$nov_mx = 30;
$dec_mx = 31;
if (isset($_POST['submit'])) {
    $semister  = $_POST['semister'];
    $month     = $_POST['months'];
    $day       = $_POST['days'];
    $year      = $_POST['years'];
    $date      = $_POST['dates'];
    $dat       = $date;
    $mont      = $month;
    $conn      = mysqli_connect("localhost", "admin", "");
    $db        = mysqli_select_db($conn, "test");
    $query     = mysqli_query($conn, "SELECT DISTINCT(course_registration.courseid),course.coursetitle,course.coursecredit FROM course,course_registration WHERE course.courseid=course_registration.courseid AND course_registration.semister_studying='1'");
    $query_off = mysqli_query($conn, "SELECT dat,month FROM offday WHERE year='$year'");
    for ($i = 1; $i <= 15; $i++) {
        for ($j = 1; $j <= 35; $j++) {
            $ar[$i][$j] = 0;
        }
    }
    // govt holiday
    while ($result = mysqli_fetch_assoc($query_off)) {
        //$ar[$month][$date]
        $a          = $result['month'];
        $b          = $result['dat'];
        $ar[$a][$b] = 1;
        //echo $a;
        //echo $b;
        //echo "<br>";
        # code...
    }
    //echo "bondho";
    //echo $ar[8][15];
    
    
    if (isset($year)) {
        if ($year % 4 == 0) {
            $feb_mx = 29;
        }
    }
    if (isset($day)) {
        if ($day == "Friday") {
            $date              = $date + 0;
            $ar[$month][$date] = 1;
        }
        if ($day == "Saturday") {
            $date              = $date + 6;
            $day               = "Friday";
            $ar[$month][$date] = 1;
            
        }
        if ($day == "Sunday") {
            $date              = $date + 5;
            $day               = "Friday";
            $ar[$month][$date] = 1;
            
        }
        if ($day == "Monday") {
            $date              = $date + 4;
            $day               = "Friday";
            $ar[$month][$date] = 1;
        }
        if ($day == "Tuesday") {
            $date              = $date + 3;
            $day               = "Friday";
            $ar[$month][$date] = 1;
        }
        if ($day == "Wednesday") {
            $date              = $date + 2;
            $day               = "Friday";
            $ar[$month][$date] = 1;
        }
        if ($day == "Thursday") {
            $date              = $date + 1;
            $day               = "Friday";
            $ar[$month][$date] = 1;
        }
    }
    //echo $a[0];
    if (isset($month)) {
        for ($i = 1; $i < 13; $i++) {
            //$query=mysqli_query($conn,"INSERT INTO offday(dat,day,month,year)VALUES ('$date','$day','$month','$year')"); 
            if ($month == 1) {
                if ($date + 7 <= $jan_mx) {
                    $date              = $date + 7;
                    $ar[$month][$date] = 1;
                    
                } else {
                    $month             = 2;
                    $date              = $date + 7 - $jan_mx;
                    $ar[$month][$date] = 1;
                    
                }
            } else if ($month == 2) {
                if ($date + 7 <= $feb_mx) {
                    $date              = $date + 7;
                    $ar[$month][$date] = 1;
                    
                } else {
                    $month             = 3;
                    $date              = $date + 7 - $feb_mx;
                    $ar[$month][$date] = 1;
                    
                }
            } else if ($month == 3) {
                if ($date + 7 <= $mar_mx) {
                    $date              = $date + 7;
                    $ar[$month][$date] = 1;
                    
                } else {
                    $month             = 4;
                    $date              = $date + 7 - $mar_mx;
                    $ar[$month][$date] = 1;
                }
            } else if ($month == 4) {
                if ($date + 7 <= $ap_mx) {
                    $date              = $date + 7;
                    $ar[$month][$date] = 1;
                } else {
                    $month             = 5;
                    $date              = $date + 7 - $ap_mx;
                    $ar[$month][$date] = 1;
                }
            } else if ($month == 5) {
                if ($date + 7 <= $may_mx) {
                    $date              = $date + 7;
                    $ar[$month][$date] = 1;
                } else {
                    $month             = 6;
                    $date              = $date + 7 - $may_mx;
                    $ar[$month][$date] = 1;
                }
            } else if ($month == 6) {
                if ($date + 7 <= $Jun_mx) {
                    $date              = $date + 7;
                    $ar[$month][$date] = 1;
                } else {
                    $month             = 7;
                    $date              = $date + 7 - $Jun_mx;
                    $ar[$month][$date] = 1;
                }
            } else if ($month == 7) {
                if ($date + 7 <= $jul_mx) {
                    $date              = $date + 7;
                    $ar[$month][$date] = 1;
                } else {
                    $month             = 8;
                    $date              = $date + 7 - $jul_mx;
                    $ar[$month][$date] = 1;
                }
            } else if ($month == 8) {
                if ($date + 7 <= $aug_mx) {
                    $date              = $date + 7;
                    $ar[$month][$date] = 1;
                } else {
                    $month             = 9;
                    $date              = $date + 7 - $aug_mx;
                    $ar[$month][$date] = 1;
                }
            }
            
            else if ($month == 9) {
                if ($date + 7 <= $sep_mx) {
                    $date              = $date + 7;
                    $ar[$month][$date] = 1;
                } else {
                    $month             = 10;
                    $date              = $date + 7 - $sep_mx;
                    $ar[$month][$date] = 1;
                }
            } else if ($month == 10) {
                if ($date + 7 <= $oct_mx) {
                    $date              = $date + 7;
                    $ar[$month][$date] = 1;
                } else {
                    $month             = 11;
                    $date              = $date + 7 - $oct_mx;
                    $ar[$month][$date] = 1;
                }
            } else if ($month == 11) {
                if ($date + 7 <= $nov_mx) {
                    $date              = $date + 7;
                    $ar[$month][$date] = 1;
                } else {
                    $month             = 12;
                    $date              = $date + 7 - $nov_mx;
                    $ar[$month][$date] = 1;
                }
            } else if ($month == 12) {
                if ($date + 7 <= $dec_mx) {
                    $date              = $date + 7;
                    $ar[$month][$date] = 1;
                } else {
                    $month             = 1;
                    $date              = $date + 7 - $dec_mx;
                    $ar[$month][$date] = 1;
                }
            }
            //echo $a[$i];
        }
    }
    //foreach ($ar as $key => $value) {
    //foreach ($ar[$key] as $k => $v) {
    //echo $ar[$key][$k];
    //}
    //}

    if (isset($query)) {

        if ($semister == 1) {
        	if($result=mysqli_fetch_assoc($query))
    	{
    		  echo "<tr><td>" . $result["courseid"] . "<br>" . $result["coursetitle"] . "</td>" . "<td>" . $dat . "-" . $mont . "-" . $year . "</td></tr>";
                        
                        $data = $result["courseid"];
                        mysqli_query($conn, "INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
    	}
            while ($result = mysqli_fetch_assoc($query)) {
                
                if ($mont == 1) {
                    if (ceil($dat + $result['coursecredit'] + 1) <= $jan_mx) {
                        $dat = ceil($dat + $result['coursecredit']) + 1;
                        if ($ar[$mont][$dat]) {
                            while ($ar[$mont][$dat]) {
                                # code...
                                $dat = $dat + 1;
                                if ($dat > $jan_mx) {
                                    $dat  = $dat - $jan_mx;
                                    $mont = $mont + 1;
                                }
                                
                            }
                        }
                        echo "<tr><td>" . $result["courseid"] . "<br>" . $result["coursetitle"] . "</td>" . "<td>" . $dat . "-" . $mont . "-" . $year . "</td></tr>";
                        
                        $data = $result["courseid"];
                        mysqli_query($conn, "INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
                    } else {
                        $dat  = ceil($dat + $result['coursecredit'] + 1) - $jan_mx;
                        $mont = $mont + 1;
                        echo "<tr><td>" . $result["courseid"] . "<br>" . $result["coursetitle"] . "</td>" . "<td>" . $dat . "-" . $mont . "-" . $year . "</td></tr>";
                        $data = $result["courseid"];
                        mysqli_query($conn, "INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
                        
                    }
                    
                }
               else if ($mont == 2) {
                    if (ceil($dat + $result['coursecredit'] + 1) <= $feb_mx) {
                        $dat = ceil($dat + $result['coursecredit']) + 1;
                        if ($ar[$mont][$dat]) {
                            while ($ar[$mont][$dat]) {
                                # code...
                                $dat = $dat + 1;
                                if ($dat > $feb_mx) {
                                    $dat  = $dat - $feb_mx;
                                    $mont = $mont + 1;
                                }
                                
                            }
                        }
                        echo "<tr><td>" . $result["courseid"] . "<br>" . $result["coursetitle"] . "</td>" . "<td>" . $dat . "-" . $mont . "-" . $year . "</td></tr>";
                        $data = $result["courseid"];
                        mysqli_query($conn, "INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
                        
                    } else {
                        $dat  = ceil($dat + $result['coursecredit'] + 1) - $feb_mx;
                        $mont = $mont + 1;
                        echo "<tr><td>" . $result["courseid"] . "<br>" . $result["coursetitle"] . "</td>" . "<td>" . $dat . "-" . $mont . "-" . $year . "</td></tr>";
                        $data = $result["courseid"];
                        mysqli_query($conn, "INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
                        
                    }
                    
                }
                //march
               else if ($mont == 3) {
                    if (ceil($dat + $result['coursecredit'] + 1) <= $mar_mx) {
                        $dat = ceil($dat + $result['coursecredit']) + 1;
                        if ($ar[$mont][$dat]) {
                            while ($ar[$mont][$dat]) {
                                # code...
                                $dat = $dat + 1;
                                if ($dat > $mar_mx) {
                                    $dat  = $dat - $mar_mx;
                                    $mont = $mont + 1;
                                }
                                
                            }
                        }
                        echo "<tr><td>" . $result["courseid"] . "<br>" . $result["coursetitle"] . "</td>" . "<td>" . $dat . "-" . $mont . "-" . $year . "</td></tr>";
                        $data = $result["courseid"];
                        mysqli_query($conn, "INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
                        
                    } else {
                        $dat  = ceil($dat + $result['coursecredit'] + 1) - $mar_mx;
                        $mont = $mont + 1;
                        echo "<tr><td>" . $result["courseid"] . "<br>" . $result["coursetitle"] . "</td>" . "<td>" . $dat . "-" . $mont . "-" . $year . "</td></tr>";
                        $data = $result["courseid"];
                        mysqli_query($conn, "INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
                        
                    }
                    
                }
                //april
                else if ($mont == 4) {
                    if (ceil($dat + $result['coursecredit'] + 1) <= $ap_mx) {
                        $dat = ceil($dat + $result['coursecredit']) + 1;
                        if ($ar[$mont][$dat]) {
                            while ($ar[$mont][$dat]) {
                                # code...
                                $dat = $dat + 1;
                                if ($dat > $ap_mx) {
                                    $dat  = $dat - $ap_mx;
                                    $mont = $mont + 1;
                                }
                                
                            }
                        }
                        echo "<tr><td>" . $result["courseid"] . "<br>" . $result["coursetitle"] . "</td>" . "<td>" . $dat . "-" . $mont . "-" . $year . "</td></tr>";
                        $data = $result["courseid"];
                        mysqli_query($conn, "INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
                        
                    } else {
                        $dat  = ceil($dat + $result['coursecredit'] + 1) - $ap_mx;
                        $mont = $mont + 1;
                        echo "<tr><td>" . $result["courseid"] . "<br>" . $result["coursetitle"] . "</td>" . "<td>" . $dat . "-" . $mont . "-" . $year . "</td></tr>";
                        $data = $result["courseid"];
                        mysqli_query($conn, "INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
                        
                    }
                    
                }
                //may
                else if ($mont == 5) {
                    if (ceil($dat + $result['coursecredit'] + 1) <= $may_mx) {
                        $dat = ceil($dat + $result['coursecredit']) + 1;
                        if ($ar[$mont][$dat]) {
                            while ($ar[$mont][$dat]) {
                                # code...
                                $dat = $dat + 1;
                                if ($dat > $may_mx) {
                                    $dat  = $dat - $may_mx;
                                    $mont = $mont + 1;
                                }
                                
                            }
                        }
                        echo "<tr><td>" . $result["courseid"] . "<br>" . $result["coursetitle"] . "</td>" . "<td>" . $dat . "-" . $mont . "-" . $year . "</td></tr>";
                        $data = $result["courseid"];
                        mysqli_query($conn, "INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
                        
                    } else {
                        $dat  = ceil($dat + $result['coursecredit'] + 1) - $may_mx;
                        $mont = $mont + 1;
                        echo "<tr><td>" . $result["courseid"] . "<br>" . $result["coursetitle"] . "</td>" . "<td>" . $dat . "-" . $mont . "-" . $year . "</td></tr>";
                        $data = $result["courseid"];
                        mysqli_query($conn, "INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
                        
                    }
                    
                }
                //june
               else if ($mont == 6) {
                    if (ceil($dat + $result['coursecredit'] + 1) <= $Jun_mx) {
                        $dat = ceil($dat + $result['coursecredit']) + 1;
                        if ($ar[$mont][$dat]) {
                            while ($ar[$mont][$dat]) {
                                # code...
                                $dat = $dat + 1;
                                if ($dat > $jun_mx) {
                                    $dat  = $dat - $jun_mx;
                                    $mont = $mont + 1;
                                }
                                
                            }
                        }
                        echo "<tr><td>" . $result["courseid"] . "<br>" . $result["coursetitle"] . "</td>" . "<td>" . $dat . "-" . $mont . "-" . $year . "</td></tr>";
                        $data = $result["courseid"];
                        mysqli_query($conn, "INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
                        
                    } else {
                        $dat  = ceil($dat + $result['coursecredit'] + 1) - $jun_mx;
                        $mont = $mont + 1;
                        echo "<tr><td>" . $result["courseid"] . "<br>" . $result["coursetitle"] . "</td>" . "<td>" . $dat . "-" . $mont . "-" . $year . "</td></tr>";
                        $data = $result["courseid"];
                        mysqli_query($conn, "INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
                        
                    }
                    
                }
                //july
               else if ($mont == 7) {
                    if (ceil($dat + $result['coursecredit'] + 1) <= $jul_mx) {
                        $dat = ceil($dat + $result['coursecredit']) + 1;
                        if ($ar[$mont][$dat]) {
                            while ($ar[$mont][$dat]) {
                                # code...
                                $dat = $dat + 1;
                                if ($dat > $jul_mx) {
                                    $dat  = $dat - $jul_mx;
                                    $mont = $mont + 1;
                                }
                                
                            }
                        }
                        echo "<tr><td>" . $result["courseid"] . "<br>" . $result["coursetitle"] . "</td>" . "<td>" . $dat . "-" . $mont . "-" . $year . "</td></tr>";
                        $data = $result["courseid"];
                        mysqli_query($conn, "INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
                        
                    } else {
                        $dat  = ceil($dat + $result['coursecredit'] + 1) - $jul_mx;
                        $mont = $mont + 1;
                        echo "<tr><td>" . $result["courseid"] . "<br>" . $result["coursetitle"] . "</td>" . "<td>" . $dat . "-" . $mont . "-" . $year . "</td></tr>";
                        $data = $result["courseid"];
                        mysqli_query($conn, "INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
                        
                    }
                    
                }
                //august
               else if ($mont == 8) {
                    if (ceil($dat + $result['coursecredit'] + 1) <= $aug_mx) {
                        $dat = ceil($dat + $result['coursecredit']) + 1;
                        // echo $ar[8][15];
                        if ($ar[$mont][$dat]) {
                            while ($ar[$mont][$dat]) {
                                # code...
                                $dat = $dat + 1;
                                if ($dat > $aug_mx) {
                                    $dat  = $dat - $aug_mx;
                                    $mont = $mont + 1;
                                }
                                
                            }
                        }
                        echo "<tr><td>" . $result["courseid"] . "<br>" . $result["coursetitle"] . "</td>" . "<td>" . $dat . "-" . $mont . "-" . $year . "</td></tr>";
                        $data = $result["courseid"];
                        mysqli_query($conn, "INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
                        
                    } else {
                        $dat  = ceil($dat + $result['coursecredit'] + 1) - $aug_mx;
                        $mont = $mont + 1;
                        echo "<tr><td>" . $result["courseid"] . "<br>" . $result["coursetitle"] . "</td>" . "<td>" . $dat . "-" . $mont . "-" . $year . "</td></tr>";
                        $data = $result["courseid"];
                        mysqli_query($conn, "INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
                        
                    }
                    
                }
                //september
                else if ($mont == 9) {
                    if (ceil($dat + $result['coursecredit'] + 1) <= $sep_mx) {
                        $dat = ceil($dat + $result['coursecredit']) + 1;
                        if ($ar[$mont][$dat]) {
                            while ($ar[$mont][$dat]) {
                                # code...
                                $dat = $dat + 1;
                                if ($dat > $sep_mx) {
                                    $dat  = $dat - $sep_mx;
                                    $mont = $mont + 1;
                                }
                                
                            }
                        }
                        echo "<tr><td>" . $result["courseid"] . "<br>" . $result["coursetitle"] . "</td>" . "<td>" . $dat . "-" . $mont . "-" . $year . "</td></tr>";
                        $data = $result["courseid"];
                        mysqli_query($conn, "INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
                        
                    } else {
                        $dat  = ceil($dat + $result['coursecredit'] + 1) - $sep_mx;
                        $mont = $mont + 1;
                        echo "<tr><td>" . $result["courseid"] . "<br>" . $result["coursetitle"] . "</td>" . "<td>" . $dat . "-" . $mont . "-" . $year . "</td></tr>";
                        $data = $result["courseid"];
                        mysqli_query($conn, "INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
                        
                    }
                    
                }
                //october
               else if ($mont == 10) {
                    if (ceil($dat + $result['coursecredit'] + 1) <= $oct_mx) {
                        $dat = ceil($dat + $result['coursecredit']) + 1;
                        if ($ar[$mont][$dat]) {
                            while ($ar[$mont][$dat]) {
                                # code...
                                $dat = $dat + 1;
                                if ($dat > $oct_mx) {
                                    $dat  = $dat - $oct_mx;
                                    $mont = $mont + 1;
                                }
                                
                            }
                        }
                        echo "<tr><td>" . $result["courseid"] . "<br>" . $result["coursetitle"] . "</td>" . "<td>" . $dat . "-" . $mont . "-" . $year . "</td></tr>";
                        $data = $result["courseid"];
                        mysqli_query($conn, "INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
                        
                    } else {
                        $dat  = ceil($dat + $result['coursecredit'] + 1) - $oct_mx;
                        $mont = $mont + 1;
                        echo "<tr><td>" . $result["courseid"] . "<br>" . $result["coursetitle"] . "</td>" . "<td>" . $dat . "-" . $mont . "-" . $year . "</td></tr>";
                        $data = $result["courseid"];
                        mysqli_query($conn, "INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
                        
                    }
                    
                }
                //november
               else if ($mont == 11) {
                    if (ceil($dat + $result['coursecredit'] + 1) <= $nov_mx) {
                        $dat = ceil($dat + $result['coursecredit']) + 1;
                        if ($ar[$mont][$dat]) {
                            while ($ar[$mont][$dat]) {
                                # code...
                                $dat = $dat + 1;
                                if ($dat > $nov_mx) {
                                    $dat  = $dat - $nov_mx;
                                    $mont = $mont + 1;
                                }
                                
                            }
                        }
                        echo "<tr><td>" . $result["courseid"] . "<br>" . $result["coursetitle"] . "</td>" . "<td>" . $dat . "-" . $mont . "-" . $year . "</td></tr>";
                        $data = $result["courseid"];
                        mysqli_query($conn, "INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
                        
                    } else {
                        $dat  = ceil($dat + $result['coursecredit'] + 1) - $nov_mx;
                        $mont = $mont + 1;
                        echo "<tr><td>" . $result["courseid"] . "<br>" . $result["coursetitle"] . "</td>" . "<td>" . $dat . "-" . $mont . "-" . $year . "</td></tr>";
                        $data = $result["courseid"];
                        mysqli_query($conn, "INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
                        
                    }
                    
                }
              else  if ($mont == 12) {
                    if (ceil($dat + $result['coursecredit'] + 1) <= $dec_mx) {
                        $dat = ceil($dat + $result['coursecredit']) + 1;
                        if ($ar[$mont][$dat]) {
                            while ($ar[$mont][$dat]) {
                                # code...
                                $dat = $dat + 1;
                                if ($dat > $dec_mx) {
                                    $dat  = $dat - $dec_mx;
                                    $mont = $mont - 12;
                                    $year = $year + 1;
                                }
                                
                            }
                        }
                        echo "<tr><td>" . $result["courseid"] . "<br>" . $result["coursetitle"] . "</td>" . "<td>" . $dat . "-" . $mont . "-" . $year . "</td></tr>";
                        $data = $result["courseid"];
                        mysqli_query($conn, "INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
                        
                    } else {
                        $dat  = ceil($dat + $result['coursecredit'] + 1) - $dec_mx;
                        $mont = $mont - 12;
                        $year = $year + 1;
                        echo "<tr><td>" . $result["courseid"] . "<br>" . $result["coursetitle"] . "</td>" . "<td>" . $dat . "-" . $mont . "-" . $year . "</td></tr>";
                        $data = $result["courseid"];
                        mysqli_query($conn, "INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
                        
                    }
                }
            }
        }
        
    }
    if($semister>1){
  //carry semister er course id
$query_course=mysqli_query($conn,"SELECT DISTINCT(course.courseid) FROM course,course_registration WHERE course_registration.semister_studying='$semister'AND course_registration.semister_studying!=course_registration.semister_exam AND course.semister<'$semister' AND course.courseid=course_registration.courseid ");
if($semister==3){

  for($i=1;$i<=15;$i++)
    {
  for($j=1;$j<=35;$j++)
  {
    
    if($ar[$i][$j]==1)
    {
      $ar3[$i][$j]=1;
    }
    else {
      $ar3[$i][$j]=0;
    }
  }
}
//carry semister er course id ($query_course)
while ($results=mysqli_fetch_assoc($query_course)) {
  
  $datas=$results["courseid"];
       
  $query=mysqli_query($conn,"SELECT exam.dat,exam.month,exam.year FROM exam,course WHERE course.courseid='$datas' AND exam.courseid=course.courseid");

  while ($result=mysqli_fetch_assoc($query))
   {
    # code...
    $b=$result["dat"];
    $a=$result["month"];
    $c=$result["year"];
    if($c==$year)
    {
    $ar3[$a][$b]=1;
  
    }
}
}
// 3rd semister er course details
$query=mysqli_query($conn,"SELECT DISTINCT(course_registration.courseid),course.coursetitle,course.coursecredit FROM course,course_registration WHERE course.courseid=course_registration.courseid AND course_registration.semister_studying='3'AND course_registration.semister_exam='3'");
if(isset($query)){
  if($semister==3){
  	if($result=mysqli_fetch_assoc($query))
  {
        if($mont==1)
  {
    
          if($ar3[$mont][$dat])
          {
              while ($ar3[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$jan_mx)
                {
                  $dat=$dat-$jan_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
       
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
    

  }
  else if($mont==2)
  {
    
           
          if($ar3[$mont][$dat])
          {
              while ($ar3[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$feb_mx)
                {
                  $dat=$dat-$feb_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
    

  }
  //march
  else if($mont==3)
  {
         
          if($ar3[$mont][$dat])
          {
              while ($ar3[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$mar_mx)
                {
                  $dat=$dat-$mar_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
       mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        

  }
  //april
else if($mont==4)
  {
          if($ar3[$mont][$dat])
          {
              while ($ar3[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$ap_mx)
                {
                  $dat=$dat-$ap_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
       mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
       
   

  }
  //may
  else if($mont==5)
  {
          if($ar3[$mont][$dat])
          {
              while ($ar3[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$may_mx)
                {
                  $dat=$dat-$may_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
         mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
  

  }
  //june
  else if($mont==6)
  {
    
          if($ar3[$mont][$dat])
          {
              while ($ar3[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$jun_mx)
                {
                  $dat=$dat-$jun_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
    }
  

  
  //july
 else if($mont==7)
  {
   
          if($ar3[$mont][$dat])
          {
              while ($ar3[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$jul_mx)
                {
                  $dat=$dat-$jul_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
       
    }

  
  //august
 else if($mont==8)
  {
    
          if($ar3[$mont][$dat])
          {
              while ($ar3[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$aug_mx)
                {
                  $dat=$dat-$aug_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
   

  }
  //september
  else if($mont==9)
  {
    
          if($ar3[$mont][$dat])
          {
              while ($ar3[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$sep_mx)
                {
                  $dat=$dat-$sep_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
    
   

  }
  //october
  else if($mont==10)
  {
          if($ar3[$mont][$dat])
          {
              while ($ar3[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$oct_mx)
                {
                  $dat=$dat-$oct_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
   

  }
  //november
 else if($mont==11)
  {

          if($ar3[$mont][$dat])
          {
              while ($ar3[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$nov_mx)
                {
                  $dat=$dat-$nov_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
 

  }
  else if($mont==12)
  {
   
          if($ar3[$mont][$dat])
          {
              while ($ar3[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$dec_mx)
                {
                  $dat=$dat-$dec_mx;
                  $mont=$mont-12;
                  $year=$year+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
       
  
}
   }
while ($result=mysqli_fetch_assoc($query))
{
  
  if($mont==1)
  {
    if(ceil($dat+$result['coursecredit']+1)<=$jan_mx)
    {
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar3[$mont][$dat])
          {
              while ($ar3[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$jan_mx)
                {
                  $dat=$dat-$jan_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
       
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
    }
    else
    {
   $dat=ceil($dat+$result['coursecredit']+1)-$jan_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
          mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
           
    }

  }
 else if($mont==2)
  {
    if(ceil($dat+$result['coursecredit']+1)<=$feb_mx)
    {
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar3[$mont][$dat])
          {
              while ($ar3[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$feb_mx)
                {
                  $dat=$dat-$feb_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
    }
    else
    {
   $dat=ceil($dat+$result['coursecredit']+1)-$feb_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
          mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
           
    }

  }
  //march
  else if($mont==3)
  {
    if(ceil($dat+$result['coursecredit']+1)<=$mar_mx)
    {
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar3[$mont][$dat])
          {
              while ($ar3[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$mar_mx)
                {
                  $dat=$dat-$mar_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
       mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
    }
    else
    {
   $dat=ceil($dat+$result['coursecredit']+1)-$mar_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
          mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
          
    }

  }
  //april
else if($mont==4)
  {
    if(ceil($dat+$result['coursecredit']+1)<=$ap_mx)
    {
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar3[$mont][$dat])
          {
              while ($ar3[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$ap_mx)
                {
                  $dat=$dat-$ap_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
       mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
       
    }
    else
    {
   $dat=ceil($dat+$result['coursecredit']+1)-$ap_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
           mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
          
    }

  }
  //may
  else if($mont==5)
  {
    if(ceil($dat+$result['coursecredit']+1)<=$may_mx)
    {
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar3[$mont][$dat])
          {
              while ($ar3[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$may_mx)
                {
                  $dat=$dat-$may_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
         mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
    }
    else
    {
   $dat=ceil($dat+$result['coursecredit']+1)-$may_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
           mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
          
    }

  }
  //june
  else if($mont==6)
  {
    if(ceil($dat+$result['coursecredit']+1)<=$Jun_mx)
    {
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar3[$mont][$dat])
          {
              while ($ar3[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$jun_mx)
                {
                  $dat=$dat-$jun_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
    }
    else
    {
   $dat=ceil($dat+$result['coursecredit']+1)-$jun_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
           mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
           
    }

  }
  //july
  else if($mont==7)
  {
    if(ceil($dat+$result['coursecredit']+1)<=$jul_mx)
    {
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar3[$mont][$dat])
          {
              while ($ar3[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$jul_mx)
                {
                  $dat=$dat-$jul_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
    }
    else
    {
   $dat=ceil($dat+$result['coursecredit']+1)-$jul_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
           mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
          
    }

  }
  //august
  else if($mont==8)
  {
    if(ceil($dat+$result['coursecredit']+1)<=$aug_mx)
    {
            $dat=ceil($dat+$result['coursecredit'])+1;
           // echo $ar[8][15];
          if($ar3[$mont][$dat])
          {
              while ($ar3[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$aug_mx)
                {
                  $dat=$dat-$aug_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
    }
    else
    {
   $dat=ceil($dat+$result['coursecredit']+1)-$aug_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
           mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
           
    }

  }
  //september
  else if($mont==9)
  {
    if(ceil($dat+$result['coursecredit']+1)<=$sep_mx)
    {
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar3[$mont][$dat])
          {
              while ($ar3[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$sep_mx)
                {
                  $dat=$dat-$sep_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
    }
    else
    {
   $dat=ceil($dat+$result['coursecredit']+1)-$sep_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
           mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
           
    }

  }
  //october
  else if($mont==10)
  {
    if(ceil($dat+$result['coursecredit']+1)<=$oct_mx)
    {
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar3[$mont][$dat])
          {
              while ($ar3[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$oct_mx)
                {
                  $dat=$dat-$oct_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
    }
    else
    {
   $dat=ceil($dat+$result['coursecredit']+1)-$oct_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
           mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
          
    }

  }
  //november
  else if($mont==11)
  {
    if(ceil($dat+$result['coursecredit']+1)<=$nov_mx)
    {
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar3[$mont][$dat])
          {
              while ($ar3[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$nov_mx)
                {
                  $dat=$dat-$nov_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
    }
    else
    {
   $dat=ceil($dat+$result['coursecredit']+1)-$nov_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
           mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
          
    }

  }
  else if($mont==12)
  {
    if(ceil($dat+$result['coursecredit']+1)<=$dec_mx)
    {
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar3[$mont][$dat])
          {
              while ($ar3[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$dec_mx)
                {
                  $dat=$dat-$dec_mx;
                  $mont=$mont-12;
                  $year=$year+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
       
    }
    else
    {
   $dat=ceil($dat+$result['coursecredit']+1)-$dec_mx;
            $mont=$mont-12;
            $year=$year+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
           mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
    }
}
}
}
}
}

if($semister==2){

  for($i=1;$i<=15;$i++)
    {
  for($j=1;$j<=35;$j++)
  {
    
    if($ar[$i][$j]==1)
    {
      $ar2[$i][$j]=1;
    }
    else {
      $ar2[$i][$j]=0;
    }
  }
}
//carry semister er course id ($query_course)
if(isset($query_course)){
while ($results=mysqli_fetch_assoc($query_course)) {
  
  $datas=$results["courseid"];
       
  $query=mysqli_query($conn,"SELECT exam.dat,exam.month,exam.year FROM exam,course WHERE course.courseid='$datas' AND exam.courseid=course.courseid");

  while ($result=mysqli_fetch_assoc($query))
   {
    # code...
    $b=$result["dat"];
    $a=$result["month"];
    $c=$result["year"];
    if($c==$year)
    {
    $ar2[$a][$b]=1;
  
    }
}
}
}
// 3rd semister er course details
$query=mysqli_query($conn,"SELECT DISTINCT(course_registration.courseid),course.coursetitle,course.coursecredit FROM course,course_registration WHERE course.courseid=course_registration.courseid AND course_registration.semister_studying='2'AND course_registration.semister_exam='2'");
if(isset($query)){
  if($semister==2){
  	if($result=mysqli_fetch_assoc($query))
  {
        if($mont==1)
  {
    
          if($ar2[$mont][$dat])
          {
              while ($ar2[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$jan_mx)
                {
                  $dat=$dat-$jan_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
       
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
    

  }
  else if($mont==2)
  {
    
           
          if($ar2[$mont][$dat])
          {
              while ($ar2[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$feb_mx)
                {
                  $dat=$dat-$feb_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
    

  }
  //march
  else if($mont==3)
  {
         
          if($ar2[$mont][$dat])
          {
              while ($ar2[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$mar_mx)
                {
                  $dat=$dat-$mar_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
       mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        

  }
  //april
else if($mont==4)
  {
          if($ar2[$mont][$dat])
          {
              while ($ar2[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$ap_mx)
                {
                  $dat=$dat-$ap_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
       mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
       
   

  }
  //may
  else if($mont==5)
  {
          if($ar2[$mont][$dat])
          {
              while ($ar2[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$may_mx)
                {
                  $dat=$dat-$may_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
         mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
  

  }
  //june
  else if($mont==6)
  {
    
          if($ar2[$mont][$dat])
          {
              while ($ar2[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$jun_mx)
                {
                  $dat=$dat-$jun_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
    }
  

  
  //july
 else if($mont==7)
  {
   
          if($ar2[$mont][$dat])
          {
              while ($ar2[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$jul_mx)
                {
                  $dat=$dat-$jul_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
       
    }

  
  //august
 else if($mont==8)
  {
    
          if($ar2[$mont][$dat])
          {
              while ($ar2[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$aug_mx)
                {
                  $dat=$dat-$aug_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
   

  }
  //september
  else if($mont==9)
  {
    
          if($ar2[$mont][$dat])
          {
              while ($ar2[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$sep_mx)
                {
                  $dat=$dat-$sep_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
    
   

  }
  //october
  else if($mont==10)
  {
          if($ar2[$mont][$dat])
          {
              while ($ar2[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$oct_mx)
                {
                  $dat=$dat-$oct_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
   

  }
  //november
 else if($mont==11)
  {

          if($ar2[$mont][$dat])
          {
              while ($ar2[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$nov_mx)
                {
                  $dat=$dat-$nov_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
 

  }
  else if($mont==12)
  {
   
          if($ar2[$mont][$dat])
          {
              while ($ar2[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$dec_mx)
                {
                  $dat=$dat-$dec_mx;
                  $mont=$mont-12;
                  $year=$year+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
       
  
}
   }
while ($result=mysqli_fetch_assoc($query))
{
  
  if($mont==1)
  {
    if(ceil($dat+$result['coursecredit']+1)<=$jan_mx)
    {
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar2[$mont][$dat])
          {
              while ($ar2[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$jan_mx)
                {
                  $dat=$dat-$jan_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
       
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
    }
    else
    {
   $dat=ceil($dat+$result['coursecredit']+1)-$jan_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
          mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
           
    }

  }
 else if($mont==2)
  {
    if(ceil($dat+$result['coursecredit']+1)<=$feb_mx)
    {
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar2[$mont][$dat])
          {
              while ($ar2[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$feb_mx)
                {
                  $dat=$dat-$feb_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
    }
    else
    {
   $dat=ceil($dat+$result['coursecredit']+1)-$feb_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
          mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
           
    }

  }
  //march
  else if($mont==3)
  {
    if(ceil($dat+$result['coursecredit']+1)<=$mar_mx)
    {
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar2[$mont][$dat])
          {
              while ($ar2[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$mar_mx)
                {
                  $dat=$dat-$mar_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
       mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
    }
    else
    {
   $dat=ceil($dat+$result['coursecredit']+1)-$mar_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
          mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
          
    }

  }
  //april
else if($mont==4)
  {
    if(ceil($dat+$result['coursecredit']+1)<=$ap_mx)
    {
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar2[$mont][$dat])
          {
              while ($ar2[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$ap_mx)
                {
                  $dat=$dat-$ap_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
       mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
       
    }
    else
    {
   $dat=ceil($dat+$result['coursecredit']+1)-$ap_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
           mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
          
    }

  }
  //may
  else if($mont==5)
  {
    if(ceil($dat+$result['coursecredit']+1)<=$may_mx)
    {
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar2[$mont][$dat])
          {
              while ($ar2[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$may_mx)
                {
                  $dat=$dat-$may_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
         mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
    }
    else
    {
   $dat=ceil($dat+$result['coursecredit']+1)-$may_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
           mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
          
    }

  }
  //june
  else if($mont==6)
  {
    if(ceil($dat+$result['coursecredit']+1)<=$Jun_mx)
    {
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar2[$mont][$dat])
          {
              while ($ar3[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$jun_mx)
                {
                  $dat=$dat-$jun_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
    }
    else
    {
   $dat=ceil($dat+$result['coursecredit']+1)-$jun_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
           mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
           
    }

  }
  //july
  else if($mont==7)
  {
    if(ceil($dat+$result['coursecredit']+1)<=$jul_mx)
    {
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar2[$mont][$dat])
          {
              while ($ar2[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$jul_mx)
                {
                  $dat=$dat-$jul_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
    }
    else
    {
   $dat=ceil($dat+$result['coursecredit']+1)-$jul_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
           mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
          
    }

  }
  //august
  else if($mont==8)
  {
    if(ceil($dat+$result['coursecredit']+1)<=$aug_mx)
    {
            $dat=ceil($dat+$result['coursecredit'])+1;
           // echo $ar[8][15];
          if($ar2[$mont][$dat])
          {
              while ($ar2[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$aug_mx)
                {
                  $dat=$dat-$aug_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
    }
    else
    {
   $dat=ceil($dat+$result['coursecredit']+1)-$aug_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
           mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
           
    }

  }
  //september
  else if($mont==9)
  {
    if(ceil($dat+$result['coursecredit']+1)<=$sep_mx)
    {
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar2[$mont][$dat])
          {
              while ($ar2[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$sep_mx)
                {
                  $dat=$dat-$sep_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
    }
    else
    {
   $dat=ceil($dat+$result['coursecredit']+1)-$sep_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
           mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
           
    }

  }
  //october
  else if($mont==10)
  {
    if(ceil($dat+$result['coursecredit']+1)<=$oct_mx)
    {
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar2[$mont][$dat])
          {
              while ($ar2[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$oct_mx)
                {
                  $dat=$dat-$oct_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
    }
    else
    {
   $dat=ceil($dat+$result['coursecredit']+1)-$oct_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
           mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
          
    }

  }
  //november
  else if($mont==11)
  {
    if(ceil($dat+$result['coursecredit']+1)<=$nov_mx)
    {
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar2[$mont][$dat])
          {
              while ($ar2[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$nov_mx)
                {
                  $dat=$dat-$nov_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
    }
    else
    {
   $dat=ceil($dat+$result['coursecredit']+1)-$nov_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
           mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
          
    }

  }
  else if($mont==12)
  {
    if(ceil($dat+$result['coursecredit']+1)<=$dec_mx)
    {
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar2[$mont][$dat])
          {
              while ($ar2[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$dec_mx)
                {
                  $dat=$dat-$dec_mx;
                  $mont=$mont-12;
                  $year=$year+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
       
    }
    else
    {
   $dat=ceil($dat+$result['coursecredit']+1)-$dec_mx;
            $mont=$mont-12;
            $year=$year+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
           mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
    }
}
}
}
}
}
//4 semister
if($semister==4){

  for($i=1;$i<=15;$i++)
    {
  for($j=1;$j<=35;$j++)
  {
    
    if($ar[$i][$j]==1)
    {
      $ar4[$i][$j]=1;
    }
    else {
      $ar4[$i][$j]=0;
    }
  }
}
//carry semister er course id ($query_course)
if(isset($query_course)){
while ($results=mysqli_fetch_assoc($query_course)) {
  
  $datas=$results["courseid"];
       
  $query=mysqli_query($conn,"SELECT exam.dat,exam.month,exam.year FROM exam,course WHERE course.courseid='$datas' AND exam.courseid=course.courseid");

  while ($result=mysqli_fetch_assoc($query))
   {
    # code...
    $b=$result["dat"];
    $a=$result["month"];
    $c=$result["year"];
    if($c==$year)
    {
    $ar4[$a][$b]=1;
  
    }
}
}
}
// 4th semister er course details
$query=mysqli_query($conn,"SELECT DISTINCT(course_registration.courseid),course.coursetitle,course.coursecredit FROM course,course_registration WHERE course.courseid=course_registration.courseid AND course_registration.semister_studying='4'AND course_registration.semister_exam='4'");
if(isset($query)){
  if($semister==4){
  	if($result=mysqli_fetch_assoc($query))
  {
        if($mont==1)
  {
    
          if($ar4[$mont][$dat])
          {
              while ($ar4[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$jan_mx)
                {
                  $dat=$dat-$jan_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
       
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
    

  }
  else if($mont==2)
  {
    
           
          if($ar4[$mont][$dat])
          {
              while ($ar4[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$feb_mx)
                {
                  $dat=$dat-$feb_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
    

  }
  //march
  else if($mont==3)
  {
         
          if($ar4[$mont][$dat])
          {
              while ($ar4[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$mar_mx)
                {
                  $dat=$dat-$mar_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
       mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        

  }
  //april
else if($mont==4)
  {
          if($ar4[$mont][$dat])
          {
              while ($ar4[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$ap_mx)
                {
                  $dat=$dat-$ap_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
       mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
       
   

  }
  //may
  else if($mont==5)
  {
          if($ar4[$mont][$dat])
          {
              while ($ar4[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$may_mx)
                {
                  $dat=$dat-$may_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
         mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
  

  }
  //june
  else if($mont==6)
  {
    
          if($ar4[$mont][$dat])
          {
              while ($ar4[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$jun_mx)
                {
                  $dat=$dat-$jun_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
    }
  

  
  //july
 else if($mont==7)
  {
   
          if($ar4[$mont][$dat])
          {
              while ($ar4[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$jul_mx)
                {
                  $dat=$dat-$jul_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
       
    }

  
  //august
 else if($mont==8)
  {
    
          if($ar4[$mont][$dat])
          {
              while ($ar4[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$aug_mx)
                {
                  $dat=$dat-$aug_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
   

  }
  //september
  else if($mont==9)
  {
    
          if($ar4[$mont][$dat])
          {
              while ($ar4[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$sep_mx)
                {
                  $dat=$dat-$sep_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
    
   

  }
  //october
  else if($mont==10)
  {
          if($ar4[$mont][$dat])
          {
              while ($ar4[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$oct_mx)
                {
                  $dat=$dat-$oct_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
   

  }
  //november
 else if($mont==11)
  {

          if($ar4[$mont][$dat])
          {
              while ($ar4[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$nov_mx)
                {
                  $dat=$dat-$nov_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
 

  }
  else if($mont==12)
  {
   
          if($ar4[$mont][$dat])
          {
              while ($ar4[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$dec_mx)
                {
                  $dat=$dat-$dec_mx;
                  $mont=$mont-12;
                  $year=$year+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
       
  
}
   }
while ($result=mysqli_fetch_assoc($query))
{
  
  if($mont==1)
  {
    if(ceil($dat+$result['coursecredit']+1)<=$jan_mx)
    {
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar4[$mont][$dat])
          {
              while ($ar4[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$jan_mx)
                {
                  $dat=$dat-$jan_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
       
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
    }
    else
    {
   $dat=ceil($dat+$result['coursecredit']+1)-$jan_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
          mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
           
    }

  }
 else if($mont==2)
  {
    if(ceil($dat+$result['coursecredit']+1)<=$feb_mx)
    {
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar4[$mont][$dat])
          {
              while ($ar4[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$feb_mx)
                {
                  $dat=$dat-$feb_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
    }
    else
    {
   $dat=ceil($dat+$result['coursecredit']+1)-$feb_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
          mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
           
    }

  }
  //march
  else if($mont==3)
  {
    if(ceil($dat+$result['coursecredit']+1)<=$mar_mx)
    {
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar4[$mont][$dat])
          {
              while ($ar4[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$mar_mx)
                {
                  $dat=$dat-$mar_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
       mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
    }
    else
    {
   $dat=ceil($dat+$result['coursecredit']+1)-$mar_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
          mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
          
    }

  }
  //april
else if($mont==4)
  {
    if(ceil($dat+$result['coursecredit']+1)<=$ap_mx)
    {
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar4[$mont][$dat])
          {
              while ($ar4[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$ap_mx)
                {
                  $dat=$dat-$ap_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
       mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
       
    }
    else
    {
   $dat=ceil($dat+$result['coursecredit']+1)-$ap_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
           mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
          
    }

  }
  //may
  else if($mont==5)
  {
    if(ceil($dat+$result['coursecredit']+1)<=$may_mx)
    {
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar4[$mont][$dat])
          {
              while ($ar4[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$may_mx)
                {
                  $dat=$dat-$may_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
         mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
    }
    else
    {
   $dat=ceil($dat+$result['coursecredit']+1)-$may_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
           mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
          
    }

  }
  //june
  else if($mont==6)
  {
    if(ceil($dat+$result['coursecredit']+1)<=$Jun_mx)
    {
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar4[$mont][$dat])
          {
              while ($ar4[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$jun_mx)
                {
                  $dat=$dat-$jun_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
    }
    else
    {
   $dat=ceil($dat+$result['coursecredit']+1)-$jun_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
           mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
           
    }

  }
  //july
  else if($mont==7)
  {
    if(ceil($dat+$result['coursecredit']+1)<=$jul_mx)
    {
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar4[$mont][$dat])
          {
              while ($ar4[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$jul_mx)
                {
                  $dat=$dat-$jul_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
    }
    else
    {
   $dat=ceil($dat+$result['coursecredit']+1)-$jul_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
           mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
          
    }

  }
  //august
  else if($mont==8)
  {
    if(ceil($dat+$result['coursecredit']+1)<=$aug_mx)
    {
            $dat=ceil($dat+$result['coursecredit'])+1;
           // echo $ar[8][15];
          if($ar4[$mont][$dat])
          {
              while ($ar4[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$aug_mx)
                {
                  $dat=$dat-$aug_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
    }
    else
    {
   $dat=ceil($dat+$result['coursecredit']+1)-$aug_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
           mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
           
    }

  }
  //september
  else if($mont==9)
  {
    if(ceil($dat+$result['coursecredit']+1)<=$sep_mx)
    {
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar4[$mont][$dat])
          {
              while ($ar4[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$sep_mx)
                {
                  $dat=$dat-$sep_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
    }
    else
    {
   $dat=ceil($dat+$result['coursecredit']+1)-$sep_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
           mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
           
    }

  }
  //october
  else if($mont==10)
  {
    if(ceil($dat+$result['coursecredit']+1)<=$oct_mx)
    {
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar4[$mont][$dat])
          {
              while ($ar4[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$oct_mx)
                {
                  $dat=$dat-$oct_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
    }
    else
    {
   $dat=ceil($dat+$result['coursecredit']+1)-$oct_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
           mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
          
    }

  }
  //november
  else if($mont==11)
  {
    if(ceil($dat+$result['coursecredit']+1)<=$nov_mx)
    {
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar4[$mont][$dat])
          {
              while ($ar4[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$nov_mx)
                {
                  $dat=$dat-$nov_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
    }
    else
    {
   $dat=ceil($dat+$result['coursecredit']+1)-$nov_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
           mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
          
    }

  }
  else if($mont==12)
  {
    if(ceil($dat+$result['coursecredit']+1)<=$dec_mx)
    {
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar4[$mont][$dat])
          {
              while ($ar4[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$dec_mx)
                {
                  $dat=$dat-$dec_mx;
                  $mont=$mont-12;
                  $year=$year+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
       
    }
    else
    {
   $dat=ceil($dat+$result['coursecredit']+1)-$dec_mx;
            $mont=$mont-12;
            $year=$year+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
           mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
    }
}
}
}
}
}


// 5th semister


if($semister==5)
{
	for($i=1;$i<=15;$i++)
    {
	for($j=1;$j<=35;$j++)
	{
		
		if($ar[$i][$j]==1)
		{
			$ar5[$i][$j]=1;
		}
		else {
			$ar5[$i][$j]=0;
		}
	}
}
//carry course er courseid
while ($results=mysqli_fetch_assoc($query_course)) {
	
	$datas=$results["courseid"];
// carry course details
  $query=mysqli_query($conn,"SELECT exam.dat,exam.month,exam.year FROM exam,course WHERE course.courseid='$datas' AND exam.courseid=course.courseid");
  while ($result=mysqli_fetch_assoc($query)) {
  	# code...
  	$b=$result["dat"];
  	$a=$result["month"];
  	$c=$result["year"];
  	if($c==$year){
  	$ar5[$a][$b]=1;}

}

}
//5 th semister course details
$query=mysqli_query($conn,"SELECT DISTINCT(course_registration.courseid),course.coursetitle,course.coursecredit FROM course,course_registration WHERE course.courseid=course_registration.courseid AND course_registration.semister_studying='5'AND course_registration.semister_exam='5'");

if(isset($query)){
	if($semister==5){
		if($result=mysqli_fetch_assoc($query))
  {
        if($mont==1)
  {
    
          if($ar5[$mont][$dat])
          {
              while ($ar5[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$jan_mx)
                {
                  $dat=$dat-$jan_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
       
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
    

  }
  else if($mont==2)
  {
    
           
          if($ar5[$mont][$dat])
          {
              while ($ar5[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$feb_mx)
                {
                  $dat=$dat-$feb_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
    

  }
  //march
 else  if($mont==3)
  {
         
          if($ar5[$mont][$dat])
          {
              while ($ar5[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$mar_mx)
                {
                  $dat=$dat-$mar_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
       mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        

  }
  //april
else if($mont==4)
  {
          if($ar5[$mont][$dat])
          {
              while ($ar5[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$ap_mx)
                {
                  $dat=$dat-$ap_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
       mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
       
   

  }
  //may
  else if($mont==5)
  {
          if($ar5[$mont][$dat])
          {
              while ($ar5[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$may_mx)
                {
                  $dat=$dat-$may_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
         mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
  

  }
  //june
  else if($mont==6)
  {
    
          if($ar5[$mont][$dat])
          {
              while ($ar5[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$jun_mx)
                {
                  $dat=$dat-$jun_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
    }
  

  
  //july
  else if($mont==7)
  {
   
          if($ar5[$mont][$dat])
          {
              while ($ar5[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$jul_mx)
                {
                  $dat=$dat-$jul_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
       
    }

  
  //august
  else if($mont==8)
  {
    
          if($ar5[$mont][$dat])
          {
              while ($ar5[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$aug_mx)
                {
                  $dat=$dat-$aug_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
   

  }
  //september
  else if($mont==9)
  {
    
          if($ar5[$mont][$dat])
          {
              while ($ar5[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$sep_mx)
                {
                  $dat=$dat-$sep_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
    
   

  }
  //october
  else if($mont==10)
  {
          if($ar5[$mont][$dat])
          {
              while ($ar5[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$oct_mx)
                {
                  $dat=$dat-$oct_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
   

  }
  //november
  else if($mont==11)
  {

          if($ar5[$mont][$dat])
          {
              while ($ar5[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$nov_mx)
                {
                  $dat=$dat-$nov_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
 

  }
  else if($mont==12)
  {
   
          if($ar5[$mont][$dat])
          {
              while ($ar5[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$dec_mx)
                {
                  $dat=$dat-$dec_mx;
                  $mont=$mont-12;
                  $year=$year+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
       
  
}
   }
while ($result=mysqli_fetch_assoc($query))
{
	
	if($mont==1)
	{
		if(ceil($dat+$result['coursecredit']+1)<=$jan_mx)
		{
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar5[$mont][$dat])
          {
              while ($ar5[$mont][$dat]) {
              	# code...
              	$dat=$dat+1;
              	if($dat>$jan_mx)
              	{
              		$dat=$dat-$jan_mx;
              		$mont=$mont+1;
              	}
              	
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
       
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
		}
		else
		{
   $dat=ceil($dat+$result['coursecredit']+1)-$jan_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
          mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
           
		}

	}
	else if($mont==2)
	{
		if(ceil($dat+$result['coursecredit']+1)<=$feb_mx)
		{
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar5[$mont][$dat])
          {
              while ($ar5[$mont][$dat]) {
              	# code...
              	$dat=$dat+1;
              	if($dat>$feb_mx)
              	{
              		$dat=$dat-$feb_mx;
              		$mont=$mont+1;
              	}
              	
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
		}
		else
		{
   $dat=ceil($dat+$result['coursecredit']+1)-$feb_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
          mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
           
		}

	}
	//march
	else if($mont==3)
	{
		if(ceil($dat+$result['coursecredit']+1)<=$mar_mx)
		{
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar5[$mont][$dat])
          {
              while ($a5r[$mont][$dat]) {
              	# code...
              	$dat=$dat+1;
              	if($dat>$mar_mx)
              	{
              		$dat=$dat-$mar_mx;
              		$mont=$mont+1;
              	}
              	
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
       mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
		}
		else
		{
   $dat=ceil($dat+$result['coursecredit']+1)-$mar_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
          mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
          
		}

	}
	//april
else if($mont==4)
	{
		if(ceil($dat+$result['coursecredit']+1)<=$ap_mx)
		{
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar5[$mont][$dat])
          {
              while ($ar5[$mont][$dat]) {
              	# code...
              	$dat=$dat+1;
              	if($dat>$ap_mx)
              	{
              		$dat=$dat-$ap_mx;
              		$mont=$mont+1;
              	}
              	
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
       mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
       
		}
		else
		{
   $dat=ceil($dat+$result['coursecredit']+1)-$ap_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
           mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
          
		}

	}
	//may
	else if($mont==5)
	{
		if(ceil($dat+$result['coursecredit']+1)<=$may_mx)
		{
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar5[$mont][$dat])
          {
              while ($ar5[$mont][$dat]) {
              	# code...
              	$dat=$dat+1;
              	if($dat>$may_mx)
              	{
              		$dat=$dat-$may_mx;
              		$mont=$mont+1;
              	}
              	
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
         mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
		}
		else
		{
   $dat=ceil($dat+$result['coursecredit']+1)-$may_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
           mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
          
		}

	}
	//june
	else if($mont==6)
	{
		if(ceil($dat+$result['coursecredit']+1)<=$Jun_mx)
		{
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar5[$mont][$dat])
          {
              while ($ar5[$mont][$dat]) {
              	# code...
              	$dat=$dat+1;
              	if($dat>$jun_mx)
              	{
              		$dat=$dat-$jun_mx;
              		$mont=$mont+1;
              	}
              	
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
		}
		else
		{
   $dat=ceil($dat+$result['coursecredit']+1)-$jun_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
           mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
           
		}

	}
	else if($mont==7)
	{
		if(ceil($dat+$result['coursecredit']+1)<=$jul_mx)
		{
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar5[$mont][$dat])
          {
              while ($ar5[$mont][$dat]) {
              	# code...
              	$dat=$dat+1;
              	if($dat>$jul_mx)
              	{
              		$dat=$dat-$jul_mx;
              		$mont=$mont+1;
              	}
              	
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
		}
		else
		{
   $dat=ceil($dat+$result['coursecredit']+1)-$jul_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
           mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
          
		}

	}
	//august
	else if($mont==8)
	{
		if(ceil($dat+$result['coursecredit']+1)<=$aug_mx)
		{
            $dat=ceil($dat+$result['coursecredit'])+1;
           // echo $ar[8][15];
          if($ar5[$mont][$dat])
          {
              while ($ar5[$mont][$dat]) {
              	# code...
              	$dat=$dat+1;
              	if($dat>$aug_mx)
              	{
              		$dat=$dat-$aug_mx;
              		$mont=$mont+1;
              	}
              	
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
		}
		else
		{
   $dat=ceil($dat+$result['coursecredit']+1)-$aug_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
           mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
           
		}

	}
	//september
	else if($mont==9)
	{
		if(ceil($dat+$result['coursecredit']+1)<=$sep_mx)
		{
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar5[$mont][$dat])
          {
              while ($ar5[$mont][$dat]) {
              	# code...
              	$dat=$dat+1;
              	if($dat>$sep_mx)
              	{
              		$dat=$dat-$sep_mx;
              		$mont=$mont+1;
              	}
              	
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
		}
		else
		{
   $dat=ceil($dat+$result['coursecredit']+1)-$sep_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
           mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
           
		}

	}
	//october
	else if($mont==10)
	{
		if(ceil($dat+$result['coursecredit']+1)<=$oct_mx)
		{
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar5[$mont][$dat])
          {
              while ($ar5[$mont][$dat]) {
              	# code...
              	$dat=$dat+1;
              	if($dat>$oct_mx)
              	{
              		$dat=$dat-$oct_mx;
              		$mont=$mont+1;
              	}
              	
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
		}
		else
		{
   $dat=ceil($dat+$result['coursecredit']+1)-$oct_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
           mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
          
		}

	}
	//november
	else if($mont==11)
	{
		if(ceil($dat+$result['coursecredit']+1)<=$nov_mx)
		{
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar5[$mont][$dat])
          {
              while ($ar5[$mont][$dat]) {
              	# code...
              	$dat=$dat+1;
              	if($dat>$nov_mx)
              	{
              		$dat=$dat-$nov_mx;
              		$mont=$mont+1;
              	}
              	
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
		}
		else
		{
   $dat=ceil($dat+$result['coursecredit']+1)-$nov_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
           mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
          
		}

	}
	else if($mont==12)
	{
		if(ceil($dat+$result['coursecredit']+1)<=$dec_mx)
		{
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar5[$mont][$dat])
          {
              while ($ar5[$mont][$dat]) {
              	# code...
              	$dat=$dat+1;
              	if($dat>$dec_mx)
              	{
              		$dat=$dat-$dec_mx;
              		$mont=$mont-12;
              		$year=$year+1;
              	}
              	
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
       
		}
		else
		{
   $dat=ceil($dat+$result['coursecredit']+1)-$dec_mx;
            $mont=$mont-12;
            $year=$year+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
           mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
		}
}
}
}
}

}
//6th semister
if($semister==6){

  for($i=1;$i<=15;$i++)
    {
  for($j=1;$j<=35;$j++)
  {
    
    if($ar[$i][$j]==1)
    {
      $ar6[$i][$j]=1;
    }
    else {
      $ar6[$i][$j]=0;
    }
  }
}
//carry semister er course id ($query_course)
while ($results=mysqli_fetch_assoc($query_course)) {
  
  $datas=$results["courseid"];
       
  $query=mysqli_query($conn,"SELECT exam.dat,exam.month,exam.year FROM exam,course WHERE course.courseid='$datas' AND exam.courseid=course.courseid");

  while ($result=mysqli_fetch_assoc($query))
   {
    # code...
    $b=$result["dat"];
    $a=$result["month"];
    $c=$result["year"];
    if($c==$year)
    {
    $ar6[$a][$b]=1;
  
    }
}
}
// 3rd semister er course details
$query=mysqli_query($conn,"SELECT DISTINCT(course_registration.courseid),course.coursetitle,course.coursecredit FROM course,course_registration WHERE course.courseid=course_registration.courseid AND course_registration.semister_studying='6'AND course_registration.semister_exam='6'");
if(isset($query)){
  if($semister==6){
  	if($result=mysqli_fetch_assoc($query))
  {
        if($mont==1)
  {
    
          if($ar6[$mont][$dat])
          {
              while ($ar6[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$jan_mx)
                {
                  $dat=$dat-$jan_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
       
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
    

  }
  else if($mont==2)
  {
    
           
          if($ar6[$mont][$dat])
          {
              while ($ar6[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$feb_mx)
                {
                  $dat=$dat-$feb_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
    

  }
  //march
  else if($mont==3)
  {
         
          if($ar6[$mont][$dat])
          {
              while ($ar6[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$mar_mx)
                {
                  $dat=$dat-$mar_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
       mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        

  }
  //april
else if($mont==4)
  {
          if($ar6[$mont][$dat])
          {
              while ($ar6[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$ap_mx)
                {
                  $dat=$dat-$ap_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
       mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
       
   

  }
  //may
  else if($mont==5)
  {
          if($ar6[$mont][$dat])
          {
              while ($ar6[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$may_mx)
                {
                  $dat=$dat-$may_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
         mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
  

  }
  //june
  else if($mont==6)
  {
    
          if($ar6[$mont][$dat])
          {
              while ($ar6[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$jun_mx)
                {
                  $dat=$dat-$jun_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
    }
  

  
  //july
 else if($mont==7)
  {
   
          if($ar6[$mont][$dat])
          {
              while ($ar6[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$jul_mx)
                {
                  $dat=$dat-$jul_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
       
    }

  
  //august
 else if($mont==8)
  {
    
          if($ar6[$mont][$dat])
          {
              while ($ar6[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$aug_mx)
                {
                  $dat=$dat-$aug_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
   

  }
  //september
  else if($mont==9)
  {
    
          if($ar6[$mont][$dat])
          {
              while ($ar6[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$sep_mx)
                {
                  $dat=$dat-$sep_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
    
   

  }
  //october
  else if($mont==10)
  {
          if($ar6[$mont][$dat])
          {
              while ($ar6[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$oct_mx)
                {
                  $dat=$dat-$oct_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
   

  }
  //november
 else if($mont==11)
  {

          if($ar6[$mont][$dat])
          {
              while ($ar6[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$nov_mx)
                {
                  $dat=$dat-$nov_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
 

  }
  else if($mont==12)
  {
   
          if($ar3[$mont][$dat])
          {
              while ($ar3[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$dec_mx)
                {
                  $dat=$dat-$dec_mx;
                  $mont=$mont-12;
                  $year=$year+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
       
  
}
   }
while ($result=mysqli_fetch_assoc($query))
{
  
  if($mont==1)
  {
    if(ceil($dat+$result['coursecredit']+1)<=$jan_mx)
    {
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar6[$mont][$dat])
          {
              while ($ar6[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$jan_mx)
                {
                  $dat=$dat-$jan_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
       
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
    }
    else
    {
   $dat=ceil($dat+$result['coursecredit']+1)-$jan_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
          mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
           
    }

  }
 else if($mont==2)
  {
    if(ceil($dat+$result['coursecredit']+1)<=$feb_mx)
    {
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar6[$mont][$dat])
          {
              while ($ar6[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$feb_mx)
                {
                  $dat=$dat-$feb_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
    }
    else
    {
   $dat=ceil($dat+$result['coursecredit']+1)-$feb_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
          mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
           
    }

  }
  //march
  else if($mont==3)
  {
    if(ceil($dat+$result['coursecredit']+1)<=$mar_mx)
    {
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar6[$mont][$dat])
          {
              while ($ar6[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$mar_mx)
                {
                  $dat=$dat-$mar_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
       mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
    }
    else
    {
   $dat=ceil($dat+$result['coursecredit']+1)-$mar_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
          mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
          
    }

  }
  //april
else if($mont==4)
  {
    if(ceil($dat+$result['coursecredit']+1)<=$ap_mx)
    {
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar6[$mont][$dat])
          {
              while ($ar6[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$ap_mx)
                {
                  $dat=$dat-$ap_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
       mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
       
    }
    else
    {
   $dat=ceil($dat+$result['coursecredit']+1)-$ap_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
           mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
          
    }

  }
  //may
  else if($mont==5)
  {
    if(ceil($dat+$result['coursecredit']+1)<=$may_mx)
    {
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar6[$mont][$dat])
          {
              while ($ar6[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$may_mx)
                {
                  $dat=$dat-$may_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
         mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
    }
    else
    {
   $dat=ceil($dat+$result['coursecredit']+1)-$may_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
           mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
          
    }

  }
  //june
  else if($mont==6)
  {
    if(ceil($dat+$result['coursecredit']+1)<=$Jun_mx)
    {
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar6[$mont][$dat])
          {
              while ($ar6[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$jun_mx)
                {
                  $dat=$dat-$jun_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
    }
    else
    {
   $dat=ceil($dat+$result['coursecredit']+1)-$jun_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
           mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
           
    }

  }
  //july
  else if($mont==7)
  {
    if(ceil($dat+$result['coursecredit']+1)<=$jul_mx)
    {
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar6[$mont][$dat])
          {
              while ($ar6[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$jul_mx)
                {
                  $dat=$dat-$jul_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
    }
    else
    {
   $dat=ceil($dat+$result['coursecredit']+1)-$jul_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
           mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
          
    }

  }
  //august
  else if($mont==8)
  {
    if(ceil($dat+$result['coursecredit']+1)<=$aug_mx)
    {
            $dat=ceil($dat+$result['coursecredit'])+1;
           // echo $ar[8][15];
          if($ar6[$mont][$dat])
          {
              while ($ar6[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$aug_mx)
                {
                  $dat=$dat-$aug_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
    }
    else
    {
   $dat=ceil($dat+$result['coursecredit']+1)-$aug_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
           mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
           
    }

  }
  //september
  else if($mont==9)
  {
    if(ceil($dat+$result['coursecredit']+1)<=$sep_mx)
    {
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar6[$mont][$dat])
          {
              while ($ar6[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$sep_mx)
                {
                  $dat=$dat-$sep_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
    }
    else
    {
   $dat=ceil($dat+$result['coursecredit']+1)-$sep_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
           mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
           
    }

  }
  //october
  else if($mont==10)
  {
    if(ceil($dat+$result['coursecredit']+1)<=$oct_mx)
    {
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar6[$mont][$dat])
          {
              while ($ar6[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$oct_mx)
                {
                  $dat=$dat-$oct_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
    }
    else
    {
   $dat=ceil($dat+$result['coursecredit']+1)-$oct_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
           mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
          
    }

  }
  //november
  else if($mont==11)
  {
    if(ceil($dat+$result['coursecredit']+1)<=$nov_mx)
    {
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar6[$mont][$dat])
          {
              while ($ar6[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$nov_mx)
                {
                  $dat=$dat-$nov_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
    }
    else
    {
   $dat=ceil($dat+$result['coursecredit']+1)-$nov_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
           mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
          
    }

  }
  else if($mont==12)
  {
    if(ceil($dat+$result['coursecredit']+1)<=$dec_mx)
    {
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar6[$mont][$dat])
          {
              while ($ar6[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$dec_mx)
                {
                  $dat=$dat-$dec_mx;
                  $mont=$mont-12;
                  $year=$year+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
       
    }
    else
    {
   $dat=ceil($dat+$result['coursecredit']+1)-$dec_mx;
            $mont=$mont-12;
            $year=$year+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
           mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
    }
}
}
}
}
}
//8th semister
if($semister==8){

  for($i=1;$i<=15;$i++)
    {
  for($j=1;$j<=35;$j++)
  {
    
    if($ar[$i][$j]==1)
    {
      $ar8[$i][$j]=1;
    }
    else {
      $ar8[$i][$j]=0;
    }
  }
}
//carry semister er course id ($query_course)
while ($results=mysqli_fetch_assoc($query_course)) {
  
  $datas=$results["courseid"];
       
  $query=mysqli_query($conn,"SELECT exam.dat,exam.month,exam.year FROM exam,course WHERE course.courseid='$datas' AND exam.courseid=course.courseid");

  while ($result=mysqli_fetch_assoc($query))
   {
    # code...
    $b=$result["dat"];
    $a=$result["month"];
    $c=$result["year"];
    if($c==$year)
    {
    $ar8[$a][$b]=1;
  
    }
}
}
// 8th semister er course details
$query=mysqli_query($conn,"SELECT DISTINCT(course_registration.courseid),course.coursetitle,course.coursecredit FROM course,course_registration WHERE course.courseid=course_registration.courseid AND course_registration.semister_studying='8'AND course_registration.semister_exam='8'");
if(isset($query)){
  if($semister==8){
  	if($result=mysqli_fetch_assoc($query))
  {
        if($mont==1)
  {
    
          if($ar8[$mont][$dat])
          {
              while ($ar8[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$jan_mx)
                {
                  $dat=$dat-$jan_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
       
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
    

  }
  else if($mont==2)
  {
    
           
          if($ar8[$mont][$dat])
          {
              while ($ar8[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$feb_mx)
                {
                  $dat=$dat-$feb_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
    

  }
  //march
  else if($mont==3)
  {
         
          if($ar8[$mont][$dat])
          {
              while ($ar8[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$mar_mx)
                {
                  $dat=$dat-$mar_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
       mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        

  }
  //april
else if($mont==4)
  {
          if($ar8[$mont][$dat])
          {
              while ($ar8[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$ap_mx)
                {
                  $dat=$dat-$ap_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
       mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
       
   

  }
  //may
  else if($mont==5)
  {
          if($ar8[$mont][$dat])
          {
              while ($ar8[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$may_mx)
                {
                  $dat=$dat-$may_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
         mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
  

  }
  //june
  else if($mont==6)
  {
    
          if($ar8[$mont][$dat])
          {
              while ($ar8[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$jun_mx)
                {
                  $dat=$dat-$jun_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
    }
  

  
  //july
 else if($mont==7)
  {
   
          if($ar8[$mont][$dat])
          {
              while ($ar8[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$jul_mx)
                {
                  $dat=$dat-$jul_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
       
    }

  
  //august
 else if($mont==8)
  {
    
          if($ar8[$mont][$dat])
          {
              while ($ar8[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$aug_mx)
                {
                  $dat=$dat-$aug_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
   

  }
  //september
  else if($mont==9)
  {
    
          if($ar8[$mont][$dat])
          {
              while ($ar8[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$sep_mx)
                {
                  $dat=$dat-$sep_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
    
   

  }
  //october
  else if($mont==10)
  {
          if($ar8[$mont][$dat])
          {
              while ($ar8[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$oct_mx)
                {
                  $dat=$dat-$oct_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
   

  }
  //november
 else if($mont==11)
  {

          if($ar8[$mont][$dat])
          {
              while ($ar8[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$nov_mx)
                {
                  $dat=$dat-$nov_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
 

  }
  else if($mont==12)
  {
   
          if($ar8[$mont][$dat])
          {
              while ($ar8[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$dec_mx)
                {
                  $dat=$dat-$dec_mx;
                  $mont=$mont-12;
                  $year=$year+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
       
  
}
   }
while ($result=mysqli_fetch_assoc($query))
{
  
  if($mont==1)
  {
    if(ceil($dat+$result['coursecredit']+1)<=$jan_mx)
    {
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar8[$mont][$dat])
          {
              while ($ar8[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$jan_mx)
                {
                  $dat=$dat-$jan_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
       
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
    }
    else
    {
   $dat=ceil($dat+$result['coursecredit']+1)-$jan_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
          mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
           
    }

  }
 else if($mont==2)
  {
    if(ceil($dat+$result['coursecredit']+1)<=$feb_mx)
    {
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar8[$mont][$dat])
          {
              while ($ar8[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$feb_mx)
                {
                  $dat=$dat-$feb_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
    }
    else
    {
   $dat=ceil($dat+$result['coursecredit']+1)-$feb_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
          mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
           
    }

  }
  //march
  else if($mont==3)
  {
    if(ceil($dat+$result['coursecredit']+1)<=$mar_mx)
    {
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar8[$mont][$dat])
          {
              while ($ar8[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$mar_mx)
                {
                  $dat=$dat-$mar_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
       mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
    }
    else
    {
   $dat=ceil($dat+$result['coursecredit']+1)-$mar_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
          mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
          
    }

  }
  //april
else if($mont==4)
  {
    if(ceil($dat+$result['coursecredit']+1)<=$ap_mx)
    {
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar8[$mont][$dat])
          {
              while ($ar8[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$ap_mx)
                {
                  $dat=$dat-$ap_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
       mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
       
    }
    else
    {
   $dat=ceil($dat+$result['coursecredit']+1)-$ap_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
           mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
          
    }

  }
  //may
  else if($mont==5)
  {
    if(ceil($dat+$result['coursecredit']+1)<=$may_mx)
    {
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar8[$mont][$dat])
          {
              while ($ar8[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$may_mx)
                {
                  $dat=$dat-$may_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
         mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
    }
    else
    {
   $dat=ceil($dat+$result['coursecredit']+1)-$may_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
           mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
          
    }

  }
  //june
  else if($mont==6)
  {
    if(ceil($dat+$result['coursecredit']+1)<=$Jun_mx)
    {
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar8[$mont][$dat])
          {
              while ($ar8[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$jun_mx)
                {
                  $dat=$dat-$jun_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
    }
    else
    {
   $dat=ceil($dat+$result['coursecredit']+1)-$jun_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
           mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
           
    }

  }
  //july
  else if($mont==7)
  {
    if(ceil($dat+$result['coursecredit']+1)<=$jul_mx)
    {
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar8[$mont][$dat])
          {
              while ($ar8[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$jul_mx)
                {
                  $dat=$dat-$jul_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
    }
    else
    {
   $dat=ceil($dat+$result['coursecredit']+1)-$jul_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
           mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
          
    }

  }
  //august
  else if($mont==8)
  {
    if(ceil($dat+$result['coursecredit']+1)<=$aug_mx)
    {
            $dat=ceil($dat+$result['coursecredit'])+1;
           // echo $ar[8][15];
          if($ar8[$mont][$dat])
          {
              while ($ar8[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$aug_mx)
                {
                  $dat=$dat-$aug_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
    }
    else
    {
   $dat=ceil($dat+$result['coursecredit']+1)-$aug_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
           mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
           
    }

  }
  //september
  else if($mont==9)
  {
    if(ceil($dat+$result['coursecredit']+1)<=$sep_mx)
    {
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar8[$mont][$dat])
          {
              while ($ar8[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$sep_mx)
                {
                  $dat=$dat-$sep_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
    }
    else
    {
   $dat=ceil($dat+$result['coursecredit']+1)-$sep_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
           mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
           
    }

  }
  //october
  else if($mont==10)
  {
    if(ceil($dat+$result['coursecredit']+1)<=$oct_mx)
    {
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar8[$mont][$dat])
          {
              while ($ar8[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$oct_mx)
                {
                  $dat=$dat-$oct_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
    }
    else
    {
   $dat=ceil($dat+$result['coursecredit']+1)-$oct_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
           mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
          
    }

  }
  //november
  else if($mont==11)
  {
    if(ceil($dat+$result['coursecredit']+1)<=$nov_mx)
    {
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar8[$mont][$dat])
          {
              while ($ar8[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$nov_mx)
                {
                  $dat=$dat-$nov_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
    }
    else
    {
   $dat=ceil($dat+$result['coursecredit']+1)-$nov_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
           mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
          
    }

  }
  else if($mont==12)
  {
    if(ceil($dat+$result['coursecredit']+1)<=$dec_mx)
    {
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar8[$mont][$dat])
          {
              while ($ar8[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$dec_mx)
                {
                  $dat=$dat-$dec_mx;
                  $mont=$mont-12;
                  $year=$year+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
       
    }
    else
    {
   $dat=ceil($dat+$result['coursecredit']+1)-$dec_mx;
            $mont=$mont-12;
            $year=$year+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
           mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
    }
}
}
}
}
}


//7th semister
if($semister==7)
{
	for($i=1;$i<=15;$i++)
    {
	for($j=1;$j<=35;$j++)
	{
		
		if($ar[$i][$j]==1)
		{
			$ar7[$i][$j]=1;
		}
		else {
			$ar7[$i][$j]=0;
		}
	}
}
while ($results=mysqli_fetch_assoc($query_course)) {
	
	$datas=$results["courseid"];
// carry course details
  $query=mysqli_query($conn,"SELECT exam.dat,exam.month,exam.year FROM exam,course WHERE course.courseid='$datas' AND exam.courseid=course.courseid");
  while ($result=mysqli_fetch_assoc($query)) {
  	# code...
  	$b=$result["dat"];
  	$a=$result["month"];
  	$c=$result["year"];
  	if($c==$year){
  	$ar7[$a][$b]=1;}

}

}
//7 th semister course details
$query=mysqli_query($conn,"SELECT DISTINCT(course_registration.courseid),course.coursetitle,course.coursecredit FROM course,course_registration WHERE course.courseid=course_registration.courseid AND course_registration.semister_studying='7'AND course_registration.semister_exam='7'");



if(isset($query)){
	if($semister==7){
		if($result=mysqli_fetch_assoc($query))
  {
        if($mont==1)
  {
    
          if($ar7[$mont][$dat])
          {
          	
              while ($ar7[$mont][$dat]) {
                # code...
                $dat=$dat+1;
              
                if($dat>$jan_mx)
                {
                  $dat=$dat-$jan_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
       
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
    

  }
}
  else if($mont==2)
  {
    
           
          if($ar7[$mont][$dat])
          {
              while ($ar7[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$feb_mx)
                {
                  $dat=$dat-$feb_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
    

  }
  //march
 else if($mont==3)
  {
  //	echo $ar7[3][29];
         
          if($ar7[$mont][$dat])
          {
          //	echo $dat;
              while ($ar7[$mont][$dat]) {
                # code...
                $dat=$dat+1;
               //echo $dat;
                if($dat>$mar_mx)
                {
                  $dat=$dat-$mar_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
       mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        

  }
  //april
else if($mont==4)
  {
          if($ar7[$mont][$dat])
          {
              while ($ar7[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$ap_mx)
                {
                  $dat=$dat-$ap_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
       mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
       
   

  }
  //may
  else if($mont==5)
  {
          if($ar7[$mont][$dat])
          {
              while ($ar7[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$may_mx)
                {
                  $dat=$dat-$may_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
         mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
  

  }
  //june
  else if($mont==6)
  {
    
          if($ar7[$mont][$dat])
          {
              while ($ar7[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$jun_mx)
                {
                  $dat=$dat-$jun_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
    }
  

  
  //july
  else if($mont==7)
  {
   
          if($ar7[$mont][$dat])
          {
              while ($ar7[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$jul_mx)
                {
                  $dat=$dat-$jul_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
       
    }

  
  //august
  else if($mont==8)
  {
    
          if($ar7[$mont][$dat])
          {
              while ($ar7[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$aug_mx)
                {
                  $dat=$dat-$aug_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
   

  }
  //september
  else if($mont==9)
  {
    
          if($ar7[$mont][$dat])
          {
              while ($ar7[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$sep_mx)
                {
                  $dat=$dat-$sep_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
    
   

  }
  //october
  else if($mont==10)
  {
          if($ar7[$mont][$dat])
          {
              while ($ar7[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$oct_mx)
                {
                  $dat=$dat-$oct_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
   

  }
  //november
 else if($mont==11)
  {

          if($ar7[$mont][$dat])
          {
              while ($ar7[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$nov_mx)
                {
                  $dat=$dat-$nov_mx;
                  $mont=$mont+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
 

  }
  else if($mont==12)
  {
   
          if($ar7[$mont][$dat])
          {
              while ($ar7[$mont][$dat]) {
                # code...
                $dat=$dat+1;
                if($dat>$dec_mx)
                {
                  $dat=$dat-$dec_mx;
                  $mont=$mont-12;
                  $year=$year+1;
                }
                
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
       
  }
}
while ($result=mysqli_fetch_assoc($query))
{
	
	if($mont==1)
	{
		if(ceil($dat+$result['coursecredit']+1)<=$jan_mx)
		{
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar7[$mont][$dat])
          {
              while ($ar7[$mont][$dat]) {
              	# code...
              	$dat=$dat+1;
              	if($dat>$jan_mx)
              	{
              		$dat=$dat-$jan_mx;
              		$mont=$mont+1;
              	}
              	
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
       
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
		}
		else
		{
   $dat=ceil($dat+$result['coursecredit']+1)-$jan_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
          mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
           
		}

	}
	else if($mont==2)
	{
		if(ceil($dat+$result['coursecredit']+1)<=$feb_mx)
		{
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar7[$mont][$dat])
          {
              while ($ar7[$mont][$dat]) {
              	# code...
              	$dat=$dat+1;
              	if($dat>$feb_mx)
              	{
              		$dat=$dat-$feb_mx;
              		$mont=$mont+1;
              	}
              	
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
		}
		else
		{
   $dat=ceil($dat+$result['coursecredit']+1)-$feb_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
          mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
           
		}

	}
	//march
	else if($mont==3)
	{
		if(ceil($dat+$result['coursecredit']+1)<=$mar_mx)
		{
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar7[$mont][$dat])
          {
              while ($a7[$mont][$dat]) {
              	# code...
              	$dat=$dat+1;
              	if($dat>$mar_mx)
              	{
              		$dat=$dat-$mar_mx;
              		$mont=$mont+1;
              	}
              	
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
       mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
		}
		else
		{
   $dat=ceil($dat+$result['coursecredit']+1)-$mar_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
          mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
          
		}

	}
	//april
else if($mont==4)
	{
		if(ceil($dat+$result['coursecredit']+1)<=$ap_mx)
		{
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar7[$mont][$dat])
          {
              while ($ar7[$mont][$dat]) {
              	# code...
              	$dat=$dat+1;
              	if($dat>$ap_mx)
              	{
              		$dat=$dat-$ap_mx;
              		$mont=$mont+1;
              	}
              	
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
       mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
       
		}
		else
		{
   $dat=ceil($dat+$result['coursecredit']+1)-$ap_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
           mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
          
		}

	}
	//may
	else if($mont==5)
	{
		if(ceil($dat+$result['coursecredit']+1)<=$may_mx)
		{
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar7[$mont][$dat])
          {
              while ($ar7[$mont][$dat]) {
              	# code...
              	$dat=$dat+1;
              	if($dat>$may_mx)
              	{
              		$dat=$dat-$may_mx;
              		$mont=$mont+1;
              	}
              	
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
         mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
		}
		else
		{
   $dat=ceil($dat+$result['coursecredit']+1)-$may_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
           mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
          
		}

	}
	//june
	else if($mont==6)
	{
		if(ceil($dat+$result['coursecredit']+1)<=$Jun_mx)
		{
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar7[$mont][$dat])
          {
              while ($ar7[$mont][$dat]) {
              	# code...
              	$dat=$dat+1;
              	if($dat>$jun_mx)
              	{
              		$dat=$dat-$jun_mx;
              		$mont=$mont+1;
              	}
              	
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
		}
		else
		{
   $dat=ceil($dat+$result['coursecredit']+1)-$jun_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
           mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
           
		}

	}
	//july
	else if($mont==7)
	{
		if(ceil($dat+$result['coursecredit']+1)<=$jul_mx)
		{
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar7[$mont][$dat])
          {
              while ($ar7[$mont][$dat]) {
              	# code...
              	$dat=$dat+1;
              	if($dat>$jul_mx)
              	{
              		$dat=$dat-$jul_mx;
              		$mont=$mont+1;
              	}
              	
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
		}
		else
		{
   $dat=ceil($dat+$result['coursecredit']+1)-$jul_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
           mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
          
		}

	}
	//august
	else if($mont==8)
	{
		if(ceil($dat+$result['coursecredit']+1)<=$aug_mx)
		{
            $dat=ceil($dat+$result['coursecredit'])+1;
           // echo $ar[8][15];
          if($ar7[$mont][$dat])
          {
              while ($ar7[$mont][$dat]) {
              	# code...
              	$dat=$dat+1;
              	if($dat>$aug_mx)
              	{
              		$dat=$dat-$aug_mx;
              		$mont=$mont+1;
              	}
              	
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
		}
		else
		{
   $dat=ceil($dat+$result['coursecredit']+1)-$aug_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
           mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
           
		}

	}
	//september
	else if($mont==9)
	{
		if(ceil($dat+$result['coursecredit']+1)<=$sep_mx)
		{
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar7[$mont][$dat])
          {
              while ($ar7[$mont][$dat]) {
              	# code...
              	$dat=$dat+1;
              	if($dat>$sep_mx)
              	{
              		$dat=$dat-$sep_mx;
              		$mont=$mont+1;
              	}
              	
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
		}
		else
		{
   $dat=ceil($dat+$result['coursecredit']+1)-$sep_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
           mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
           
		}

	}
	//october
	else if($mont==10)
	{
		if(ceil($dat+$result['coursecredit']+1)<=$oct_mx)
		{
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar7[$mont][$dat])
          {
              while ($ar7[$mont][$dat]) {
              	# code...
              	$dat=$dat+1;
              	if($dat>$oct_mx)
              	{
              		$dat=$dat-$oct_mx;
              		$mont=$mont+1;
              	}
              	
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
		}
		else
		{
   $dat=ceil($dat+$result['coursecredit']+1)-$oct_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
           mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
          
		}

	}
	//november
	else if($mont==11)
	{
		if(ceil($dat+$result['coursecredit']+1)<=$nov_mx)
		{
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar7[$mont][$dat])
          {
              while ($ar7[$mont][$dat]) {
              	# code...
              	$dat=$dat+1;
              	if($dat>$nov_mx)
              	{
              		$dat=$dat-$nov_mx;
              		$mont=$mont+1;
              	}
              	
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
		}
		else
		{
   $dat=ceil($dat+$result['coursecredit']+1)-$nov_mx;
            $mont=$mont+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
           mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
          
		}

	}
	else if($mont==12)
	{
		if(ceil($dat+$result['coursecredit']+1)<=$dec_mx)
		{
            $dat=ceil($dat+$result['coursecredit'])+1;
          if($ar7[$mont][$dat])
          {
              while ($ar7[$mont][$dat]) {
              	# code...
              	$dat=$dat+1;
              	if($dat>$dec_mx)
              	{
              		$dat=$dat-$dec_mx;
              		$mont=$mont-12;
              		$year=$year+1;
              	}
              	
              }
          }
        echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
        $data=$result["courseid"];
        mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
       
		}
		else
		{
   $dat=ceil($dat+$result['coursecredit']+1)-$dec_mx;
            $mont=$mont-12;
            $year=$year+1;
           echo "<tr><td>".$result["courseid"]."<br>".$result["coursetitle"]."</td>"."<td>".$dat."-".$mont."-".$year."</td></tr>";
           $data=$result["courseid"];
           mysqli_query($conn,"INSERT INTO exam(dat,month,year,semister,courseid)VALUES('$dat','$mont','$year','$semister','$data')");
        
		}
}

}
}
}
}  
    mysqli_close($conn);
}
?> 
</table>
</body>
</html>