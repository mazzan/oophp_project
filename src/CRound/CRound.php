<?php

/**
 * CRound contains properties and methods of the round.
 *
 */
class CRound {
 
 /**
   * Properties
   *
   */
  private $rounds;
  private $scores;
  private $total;
  private $success;
  
  /**
   * Constructor
   *
   */
  public function __construct() {
    $this->rounds=0;
    $this->scores=0;
    $this->total=0;
    $this->success=0;
 
  }
   /**
   * Mehod that gets the score of the current round
   *
   */
  public function GetScores(){
        return $this->scores;
  }
   /**
   * Method that gets the number of rounds played
   *
   */
  public function GetRounds(){
        return $this->rounds;
  }
   /**
   * Method that gets the total number of points saved
   *
   */
   public function GetTotal(){
        return $this->total;
  }
  
     /**
   * Method that gets the total number of successful attempts
   *
   */
   public function GetSuccess(){
        return $this->success;
  }
  
   /**
   * Method that increases $rounds with 1
   *
   */
  public function IncreaseRounds(){
      $this->rounds++;
  }
   /**
   * Method that increases score with a given number
   *
   */
  public function IncreaseScores($number){
      $this->scores+=$number;
  }
  
   /**
   * Method that increases the total saved number of points
   * with the current score.
   *
   */
  public function IncreaseTotal(){
      $this->total+=$this->scores;
  }
  
     /**
   * Method that increases successful attempts
   *
   */
  public function IncreaseSuccess(){
      $this->success++;
  }
  
  
  
   /**
   * Method that resets the score to 0
   *
   */
  public function ResetScore(){
      $this->scores=0;
     
  }
   /**
   * Method that resets the total to 0
   *
   */
   public function ResetTotal(){
      $this->total=0;
  }
  
     /**
   * Method that resets the successful attempts to 0
   *
   */
  public function ResetSuccess(){
      $this->success=0;
     
  }
  
     /**
   * Method that resets the rounds to 0
   *
   */
   public function ResetRounds(){
      $this->rounds=0;
  }
  
       /**
   * Method that resets all parameters
   *
   */
   public function ResetAll(){
    $this->rounds=0;
    $this->scores=0;
    $this->total=0;
    $this->success=0;
  }

  	/**
   * Check if the values are same
   *
   */
  public function CheckRound($values) {
  	
    if (($values[0] == $values[1]) && ($values[1] == $values[2])){
    	return true;
    }
   return false;  
  } 
}