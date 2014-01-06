<?php
/**
 * Class CCalender
 * 
 */
class CCalender {
  
  private $date;
  private $day;
  private $month;
  private $year;

  /**
   * Constructor
   *
   */
  public function __construct() {
  	$this->date = time ();
  	$this->day = date('d', $this->date);
  	$this->month = date('m', $this->date);
  	$this->year = date('Y', $this->date);	
  	
  }
  
    /**
   * Destructor
   *
   */
  public function __destruct() {

  }
  
  // Function fetches and returns the current date as a Unix timestamp
  public function getDate(){	
  	return $this->date;	
  }
  
  // Returns the current day
  public function getDay(){
  	return $this->day;
  	
  }
  
  // Returns the current month
  public function getMonth(){
  	return $this->month;
  	
  }
  
    // Sets the month to show
  public function setMonth($month){
  	$this->month = $month;
  	
  }
  
  // Returns the current year
  public function getYear(){
  	return $this->year;
  	
  }
  
    // Sets the year to show
  public function setYear($year){
  	$this->year = $year;
  	
  }

  // Returns the first day in the month
  private function getFirstDayMonth(){
  	return mktime(0,0,0,$this->month, 1, $this->year);
  }
 
  // Returns the real swedish month name
  public function getFirstMonthName(){
  	$monthName = date('F', $this->getFirstDayMonth()) ;	
  
	switch($monthName){ 
  	 	case "January": $monthName = "Januari"; return $monthName; break; 
  	 	case "February": $monthName = "Februari"; return $monthName; break; 
  	 	case "March": $monthName = "Mars"; return $monthName; break; 
  	 	case "April": $monthName = "April"; return $monthName; break; 
  	 	case  "May": $monthName = "Maj"; return $monthName; break; 
  	 	case "June": $monthName = "Juni"; return $monthName; break; 
  	 	case "July": $monthName = "Juli"; return $monthName; break; 
  	 	case "August": $monthName = "Augusti"; return $monthName; break; 
  	 	case "September": $monthName = "September"; return $monthName; break; 
  	 	case "October": $monthName = "Oktober"; return $monthName; break; 
  	 	case "November": $monthName = "November"; return $monthName; break; 
  	 	case "December": $monthName = "December"; return $monthName; break; 	 	  	  	  	  	  	  
  	 }	
  }

  // Returns representation of first weekday in month 
  public function getFirstWeekday(){
  	return date('D', $this->getFirstDayMonth()) ;
  	
  }  
  
  // Returns number of days in month
  public function getDaysInMonth(){
  	return cal_days_in_month(0, $this->month, $this->year);
  	
  }  
  
  // Returns number of blank days before first day in month
  public function getBlanks($day){
  	 switch($day){ 
 
  	 	case "Mon": $blank = 0; return $blank; break; 
  	 	case "Tue": $blank = 1; return $blank;  break; 
  	 	case "Wed": $blank = 2; return $blank;  break; 
  	 	case "Thu": $blank = 3; return $blank;  break; 
  	 	case "Fri": $blank = 4; return $blank;  break; 
  	 	case "Sat": $blank = 5; return $blank;  break;
  	 	case "Sun": $blank = 6; return $blank;  break;
  	 }
  	}
  	
  	  // 
  public function nextMonth(){
  	$this->month = date('n') % 12 + 1;
  }
  	
}
