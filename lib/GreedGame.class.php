<?php

/*
 * GreedGame
 * Initial version of the GrredGame class. This is not fully implemented. Based on the test task requirment 
 * I have defined the required methods. There may be some methods which are not being used right now but
 * will be used in future.
 * 
 * @package    Game
 * @subpackage Greed
 * @author     Asif Ali M
 */

class GreedGame
{
  
  private $_dice = array();
  
  private $_throws;
  
  private $_score = 0;
  
  private $_non_scored_throws;
  
  
  public function __construct( $options = array() )
  {
    extract($options);
    $this->_throws = $throws;
  }
    
  
  
  // set the no of throws in each user turn. Default is 5
  public function setThrows($count = 5)
  {
    $this->_throws = $count;
  }

  // This method is used to throw the n dice based on the $this->throws value and store each outcome 
  // in the $this->dice array; 
  public function throwDice()
  {
    $n = $this->_throws;
    
    while($n>0)
    {
      $this->_dice[] = rand(1,6);
      $n--;
    }  
    
    return $this->_dice;
  }
  
  
  // This method will calculate the score
  // It will first calculate the 
  public function calculateScore()
  {
    $diceValues = $this->calculateTrippleDiceScore();
    
    $diceValues = $this->calculateSingleDiceScore($diceValues);
    
    $this->setNonScoredThrows(count($diceValues));
  
    return $this->getScore();
  }
  
  public function getScore()
  {
    return $this->_score;
  }
  
  
  /*
   * This will calculate the score if there are 3 dice with equal face value
   *   Three 1 => 1000 points
   *   Three 6 =>  600 points
   *   Three 5 =>  500 points
   *   Three 4 =>  400 points
   *   Three 3 =>  300 points
   *   Three 2 =>  200 points
   */
  public function calculateTrippleDiceScore()
  {
    $scores     = array (1 => 1000, 2 => 200, 3 => 300, 4 => 400, 5 => 500, 6 => 600);
    $diceValues = $this->_dice;
    
    foreach($scores as $dice => $score)
    {
      
      $keys  = array_keys($diceValues, $dice);
      $count = count($keys);

      if($count >= 3)
      {
        $totalTriples  = $count/3;
        $round         = floor($totalTriples);
        $this->_score += $round*$scores[$dice];
        
        // Remove the keys which are not part Tripple set
        $keys = array_slice($keys, $count-($round*3));
        
        // Remove the calculated dice from the array
        $diceValues = array_diff_key($diceValues, array_flip($keys));
        
      }
      
      // Stop the calculation when there are less than 3 elements in the dice array.
      if(count($diceValues) <3)
      {
        break;
      }  

      
     }  
    
     return $diceValues;
  }
  
  /*
   * This method will calculate the points based on the dice face value.
   *  If dice face value is 1 then 100 points
   *  if the dice face value if 5 then 50 points.
   *  All other remaining dice elements are treated as non scoring throws. 
   *  
   *  This method will take a array of dice elements and calculate the score.
   *  Return value: this will retun the array of dice elements which are non scoring throws. Based on this value
   *  the next throw will occur.
   */
  
  public function calculateSingleDiceScore($diceValues)
  {
    foreach($diceValues as $key => $dice)
    {
       if (1 == $dice)
       {
          $this->_score += 100;
       }
       if (5 == $dice)
       {
          $this->_score += 50;
       }
       // Remove the dice value from array
       unset($diceValues[$key]);    
    }    
    
    return $diceValues;
    
  }
  
  public function setNonScoredThrows($count = null)
  {
    $this->_non_scored_throws = $count;
  }
  
  public function getNonScoredThrows()
  {
    return $this->_non_scored_throws;
  }
  
  public function getDice()
  {
    return $this->_dice;
  }

  public function getThrows()
  {
    return $this->_throws;
  }
  
  
  public function setDice($dice = array())
  {
    $this->_dice = $dice;
  }
  
  
  
}