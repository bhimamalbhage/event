<?php
/*
 * Function requested by Ajax
 */
if(isset($_POST['func']) && !empty($_POST['func'])){
	switch($_POST['func']){
		case 'getCalender':
			getCalender($_POST['year'],$_POST['month'],$_POST['x']);
			break;
		case 'getEvents':
			getEvents($_POST['date'],$_POST['l']);
			break;
		default:
			break;
	}
}

/*
 * Get calendar full HTML format
 */
function getCalender($year = '',$month = '',$x)
 { 

 		$_SESSION['lang']=$x;
	include '../connect.php';
    $sql = "SELECT * FROM language WHERE lang='$x'";
$result = $conn->query($sql);

    if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {

  $dl=$row["daylist"];
   $d=explode(",",$dl);
    
    }
  
  }

  $_SESSION['days']=$d;
	  
  if ($x == "en") {
  	$_SESSION['l']="events";
  }else{
  	$_SESSION['l']=$x."events";
 	}

 	
 	// date('y') returns current year,date('m') for month and date('n') for days it returns 1-7
 	// Example 1 for monday and 7 for sunday
 	// Visit https://www.w3schools.com/php/func_date_date.asp for date formats

	$dateYear = ($year != '')?$year:date("Y"); 
	/* ? this is ternary operator it works as example ->   $x = expr1 ? expr2 : expr3
	then it Returns the value of $x.The value of $x is expr2 if expr1 = TRUE.The value of $x is expr3 if expr1 = FALSE
	*/
	
	$dateMonth = ($month != '')?$month:date("m");
	
	$date = $dateYear.'-'.$dateMonth.'-01';
	
	$currentMonthFirstDay = date("N",strtotime($date));// returns the day month is starting from
	//strtotime() transfers date into UNIX timestamp which is standard format in computers
	
	$totalDaysOfMonth = cal_days_in_month(CAL_GREGORIAN,$dateMonth,$dateYear);// Inbuilt functions to calculate days in months just pass  month and year

	$totalDaysOfMonthDisplay = ($currentMonthFirstDay == 7)?($totalDaysOfMonth):($totalDaysOfMonth + $currentMonthFirstDay);
	/*If month starts form sunday means 7 then continously print all dates other wise we have to add more boxes i.e.$totalDaysOfMonth + $currentMonthFirstDay */
	
	$boxDisplay = ($totalDaysOfMonthDisplay <= 35)?35:42; //box to display 
	
?>
	<div id="calender_section">
		<h2>
			<!--Below is code for << sep 2019 >> for selecting moth and year by clicking << or >> i.e previous or next button getCalendar() function is called -->
       <a href="javascript:void(0);" onclick="getCalendar('calendar_div','<?php echo date("Y",strtotime($date.' - 1 Month')); ?>','<?php echo date("m",strtotime($date.' - 1 Month')); ?>','<?php echo $_SESSION["lang"]; ?>');">&lt;&lt;</a>
            <select name="month_dropdown" class="month_dropdown dropdown"><?php echo getAllMonths($dateMonth); ?></select>
			<select name="year_dropdown" class="year_dropdown dropdown"><?php echo getYearList($dateYear); ?></select>
            <a href="javascript:void(0);" onclick="getCalendar('calendar_div','<?php echo date("Y",strtotime($date.' + 1 Month')); ?>','<?php echo date("m",strtotime($date.' + 1 Month')); ?>','<?php echo $_SESSION["lang"]; ?>');">&gt;&gt;</a>
        </h2>
		<div id="event_list" class="none">
		</div>
		<div id="calender_section_top">
			<ul>
			<!-- 	<li>Sun</li>
				<li>Mon</li>
				<li>Tue</li>
				<li>Wed</li>
				<li>Thu</li>
				<li>Fri</li>
				<li>Sat</li> -->

							 <li><?php echo $_SESSION['days'][0];?></li>
				<li><?php echo $_SESSION['days'][1];?></li>
				<li><?php echo $_SESSION['days'][2];?></li>
				<li><?php echo $_SESSION['days'][3];?></li>
				<li><?php echo $_SESSION['days'][4];?></li>
				<li><?php echo $_SESSION['days'][5];?></li>
				<li><?php echo $_SESSION['days'][6];?></li> 

			</ul>
		</div>
		<div id="calender_section_bot">
			<ul>
			<?php 
				$dayCount = 1;

				for($cb=1;$cb<=$boxDisplay;$cb++){
					if(($cb >= $currentMonthFirstDay+1 || $currentMonthFirstDay == 7) && $cb <= ($totalDaysOfMonthDisplay)){
						//Current date
						$currentDate = $dateYear.'-'.$dateMonth.'-'.$dayCount;
						$eventNum = 0;
						include '../connect.php';
						//Get number of events based on the current date
						$l=$_SESSION['l'];
						$result = $conn->query("SELECT title FROM $l WHERE date = '".$currentDate."' AND status = 1");
						$eventNum = $result->num_rows;
						//Define date cell color
						if(strtotime($currentDate) == strtotime(date("Y-m-d"))){
							echo '<li date="'.$currentDate.'" class="grey date_cell">';
						}elseif($eventNum > 0){
							echo '<li date="'.$currentDate.'" class="light_sky date_cell">';
						}else{
							echo '<li date="'.$currentDate.'" class="date_cell">';
						}
						//Date cell
						echo '<span>';
						echo $dayCount;
						echo '</span>';
						
						//Hover event popup
						if($eventNum>0)
						{
						echo '<div id="date_popup_'.$currentDate.'" class="date_popup_wrap none">';
						echo '<div class="date_window" style="background-color:white;">';
						echo '<div class="popup_event">Events ('.$eventNum.')</div>';
						echo ($eventNum > 0)?'<a href="javascript:;" onclick="getEvents(\''.$currentDate.'\',\''.$_SESSION["l"].'\');">view events</a>':'';
						echo '</div></div>';
						}

						echo '</li>';
						$dayCount++;	
			?>
			<?php }else{ ?>
				<li><span>&nbsp;</span></li>
			<?php } } ?>
			</ul>
		</div>
	</div>

	<script type="text/javascript">

		function getCalendar(target_div,year,month,x){
			$.ajax({
				type:'POST',
				url:'functions.php',
				data:'func=getCalender&year='+year+'&month='+month+'&x='+x,
				success:function(html){
					$('#'+target_div).html(html);
				}
			});
		}
		
		function getEvents(date,l){
			
			$.ajax({
				type:'POST',
				url:'functions.php',
				data:'func=getEvents&date='+date+'&l='+l,
				success:function(html){
					$('#event_list').html(html);
					$('#event_list').slideDown('slow');
				}
			});
		}
		/* Below functions are of jquery when mouse is entered in date cell popup arrives for event and when mouse leaves popup disappears*/ 
		$(document).ready(function(){
			$('.date_cell').mouseenter(function(){
				date = $(this).attr('date');
				$(".date_popup_wrap").fadeOut();
				$("#date_popup_"+date).fadeIn();	
			});
			$('.date_cell').mouseleave(function(){
				$(".date_popup_wrap").fadeOut();		
			});
			//Below functions are for changing months and years it calls getCalender() function after changing month or year
			$('.month_dropdown').on('change',function(){
				getCalendar('calendar_div',$('.year_dropdown').val(),$('.month_dropdown').val());
			});
			$('.year_dropdown').on('change',function(){
				getCalendar('calendar_div',$('.year_dropdown').val(),$('.month_dropdown').val());
			});
			//Below is one for when even is slided down then if u click anywhere in screen then it disappears
			// $(document).click(function(){
			// 	$('#event_list').slideUp('slow');
			// });
		});
		

		/* this function is to jump event which is clicked*/
		function other(value){
			var id="#".concat(value);
			
			 $('html, body').animate({
        scrollTop: $(id).offset().top
    }, 800);
  $( id ).css({"background-color":"skyblue","transition": "background-color 2s"});
  setInterval(function(){ $( id ).css("background-color", "white");  }, 2000);
   }

	</script>
<?php
}

/*
 * Get months options list.
 */
function getAllMonths($selected = ''){
	$options = '';
	for($i=1;$i<=12;$i++)
	{
		$value = ($i < 10)?'0'.$i:$i;
		$selectedOpt = ($value == $selected)?'selected':'';
		$options .= '<option value="'.$value.'" '.$selectedOpt.' >'.date("F", mktime(0, 0, 0, $i+1, 0, 0)).'</option>';
	}
	return $options;
}

/*  * Get years options list.  */ function getYearList($selected = ''){
$options = '';     for($i=2015;$i<=2025;$i++)     {         $selectedOpt = ($i
== $selected)?'selected':'';         $options .= '<option value="'.$i.'"
'.$selectedOpt.' >'.$i.'</option>';     }     return $options; }

/*
 * Get events by date
 */
function getEvents($date = '',$l){
	
	$eventListHTML = '';
	$date = $date?$date:date("Y-m-d");
	//Get events based on the current date
	include '../connect.php';

	$result = $conn->query("SELECT id,title FROM $l WHERE date = '".$date."' AND status = 1");
	if($result->num_rows > 0){
		$eventListHTML = '<h2>Events on '.date("l, d M Y",strtotime($date)).'</h2>';
		$eventListHTML .= '<ul>';
		while($row = $result->fetch_assoc()){ 
			$id=$row['id'];
            $eventListHTML .= '<li onclick='.'other('.$id.') >'.$row['title'].'</li>';

        }
		$eventListHTML .= '</ul>';
	}
	echo $eventListHTML;
}
?>