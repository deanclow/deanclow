<?php

/* 
 * The chess game model
 * @author    Dean Clow
 * @email     <dclow@blackjackfarm.com>
 * @copyright 2014 Dean Clow
 */

namespace Application\ChessGame;
use \Application\Model\CommonModel;

class ChessGame extends CommonModel
{
    /**
     * Holds white's player name
     * @var string
     */
    protected $whitePlayer = "";
    
    /**
     * Holds black's player name
     * @var string
     */
    protected $blackPlayer = "";
    
    /**
     * Holds black's ELO rating
     * @var string
     */
    protected $blackRating = "Unknown";
    
    /**
     * Holds white's ELO rating
     * @var string
     */
    protected $whiteRating = "Unknown";
    
    /**
     * Holds round number
     * @var string
     */
    protected $roundNumber = "Unknown";
    
    /**
     * Holds the date of the game
     * @var string
     */
    protected $date        = "Unknown";
    
    /**
     * Holds the site (location)
     * @var string
     */
    protected $site        = "Unknown";
    
    /**
     * Holds the pgn string
     * @var type 
     */
    protected $pgnString   = "";
    
    /**
     * Set the pgn string
     * @param  string $pgnString
     * @return \Application\ChessGame\ChessGame
     */
    public function setPgnString($pgnString)
    {
        $this->pgnString = $pgnString;
        return $this;
    }
    
    /**
     * Get the pgn string
     * @return string
     */
    public function getPgnString()
    {
        return $this->pgnString;
    }
    
    /**
     * Set the white player
     * @param  string $player
     * @return \Application\ChessGame\ChessGame
     */
    public function setWhitePlayer($player)
    {
        $this->whitePlayer = $player;
        return $this;
    }
    
    /**
     * Get the white player
     * @return string
     */
    public function getWhitePlayer()
    {
        return $this->whitePlayer;
    }
    
    /**
     * Set the black player
     * @param  string $player
     * @return \Application\ChessGame\ChessGame
     */
    public function setBlackPlayer($player)
    {
        $this->blackPlayer = $player;
        return $this;
    }
    
    /**
     * Get the black player
     * @return string
     */
    public function getBlackPlayer()
    {
        return $this->blackPlayer;
    }
    
    /**
     * Set the round number
     * @param  int $round
     * @return \Application\ChessGame\ChessGame
     */
    public function setRoundNumber($round=1)
    {
        $this->roundNumber = $round;
        return $this;
    }
    
    /**
     * Get the round number
     * @return int
     */
    public function getRoundNumber()
    {
        return (int)$this->roundNumber;
    }
    
    /**
     * Set the date
     * @param  string $date
     * @return \Application\ChessGame\ChessGame
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }
    
    /**
     * Get the date
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }
    
    /**
     * Set the site (location)
     * @param  string $site
     * @return \Application\ChessGame\ChessGame
     */
    public function setSite($site)
    {
        $this->site = $site;
        return $this;
    }
    
    /**
     * Get the site
     * @return string
     */
    public function getSite()
    {
        return $this->site;
    }
}