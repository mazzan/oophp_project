<?php
/**
 * A hand of dices, with graphical representation, to roll.
 *
 */
class CDiceHand {

  /**
   * Properties
   *
   */
  private $dices;
  private $numDices;
  private $rolls;
  private $sum;
  private $sumRound;
  private $sumTotal;
  private $highScore;


  /**
   * Constructor
   *
   * @param int $numDices the number of dices in the hand, defaults to six dices. 
   */
  public function __construct($numDices = 5) {
    for($i=0; $i < $numDices; $i++) {
      $this->dices[] = new CDiceImage();
    }
    $this->numDices = $numDices;
    $this->rolls = 0;
    $this->sum = 0;
    $this->sumRound = 0;
    $this->sumTotal = 0;
    $this->highScore = 0;
  }


  /**
   * Roll all dices in the hand.
   *
   */
  public function Roll() {
    $this->sum = 0;
    for($i=0; $i < $this->numDices; $i++) {
      $roll = $this->dices[$i]->Roll(1);
      $this->rolls ++;
      $this->sum += $roll;
      if ($this->sumRound <= 99){
      	$this->sumRound += $roll;
      } else{
      	$this->sumRound -= $roll;
      }
      
    }
  }
  
    /**
   * Get number of rolls made.
   *
   * @return int as number of rolls made.
   */
  public function GetRolls() {
    return $this->rolls;
  }

  /**
   * Get the sum of the last roll.
   *
   * @return int as a sum of the last roll, or 0 if no roll has been made.
   */
  public function GetTotal() {
   return $this->sum;

  }
  
    /**
   * Sets the current Highscore
   *
   * 
   */
  public function setHighScore() {
  	$this->highScore = $this->rolls;
  }
  
      /**
   * Get the current highscore
   *
   * 
   */
  public function getHighScore() {
  	return $this->highScore;
  }

  /**
   * Init the round.
   *
   */
  public function InitRound() {
  	$this->rolls = 0;
    $this->sumRound = 0;
  }
  
    /**
   * Set sum to zero when rolling a 1
   *
   */
  public function zeroRound() {
    $this->sumRound = 0;
  }


  /**
   * Get the accumulated sum of the round.
   *
   * @return int as a sum of the round, or 0 if no roll has been made.
   */
  public function GetRoundTotal() {
    return $this->sumRound;
  }
  
      /**
   * Set the total sum when user save round
   *
   */
  public function setTotalSum() {
    $this->sumTotal += $this->sumRound;
  }
  
        /**
   * Ruturns the total sum
   *
   */
  public function getTotalSum() {
    return $this->sumTotal;
  }

  /**
   * Get the rolls as a serie of images.
   *
   * @return string as the html representation of the last roll.
   */
  public function GetRollsAsImageList() {
    $html = "\n<p><ul class='dice'>";
    foreach($this->dices as $dice) {
      $val = $dice->GetLastRoll();
      $html .= "<li class='dice-{$val}'></li>";
    }
    $html .= "</ul></p>";
    return $html;
  }
}
