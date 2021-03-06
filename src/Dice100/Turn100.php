<?php

namespace Seb\Dice100;

/**
 * Dice, a class supporting the game through GET, POST and SESSION.
 */
class Turn100
{
    /**
     * @var int $turnValue      Total value of turn.
     * @var array $serie        Serie
     */
    private $turnValue;
    private $serie;

    /**
     * Constructor to initiate the object with current game settings,
     * if available.
     *
     * @param int $turnValue        Value of the turn.
     */
    public function __construct()
    {
        $this->turnValue = 0;
        $this->serie = [];
    }

    /**
     * Take turn
     *
     * @return void
     */
    public function throwHand()
    {
        $hand = new Hand100();

        $hand->throwHand();
        //$this->serie += $hand->getSerie();
        $this->serie = array_merge($this->serie, $hand->getSerie());
        if ($hand->getHandValue() == 0) {
            $this->turnValue = 0;
        } else {
            $this->turnValue += $hand->getHandValue();
        }
    }

    /**
     * Return the turn value.
     *
     * @return int
     */
    public function getTurnValue()
    {
        return $this->turnValue;
    }

    /**
     * Return the turn value.
     *
     * @return void
     */
    public function resetTurn()
    {
        $this->turnValue = 0;
    }

    /**
     * Return the serie.
     *
     * @return array
     */
    public function getSerie()
    {
        return $this->serie;
    }
}
