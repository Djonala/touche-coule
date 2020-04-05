<?php


namespace App\Model;


class Gameboard
{
private $id;
private $plateau;

    /**
     * Gameboard constructor.
     * @param array $plateau
     */
    public function __construct()
    {


    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return array
     */
    public function getPlateau(): array
    {
        return $this->plateau;
    }

    /**
     * @param array $plateau
     */
    public function setPlateau(array $plateau): void
    {
        $this->plateau = $plateau;
    }


}
