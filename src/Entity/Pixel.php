<?php

namespace App\Entity;

use JsonSerializable;
use App\Repository\PixelRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PixelRepository::class)]
class Pixel implements JsonSerializable
{
    #[ORM\Id]
    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $coor_x = null;

    #[ORM\Id]
    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $coor_y = null;

    #[ORM\Column(length: 6)]
    private ?string $hexcolor = null;

    public function getCoorX(): ?int
    {
        return $this->coor_x;
    }

    public function setCoorX(int $coor_x): static
    {
        $this->coor_x = $coor_x;

        return $this;
    }

    public function getCoorY(): ?int
    {
        return $this->coor_y;
    }

    public function setCoorY(int $coor_y): static
    {
        $this->coor_y = $coor_y;

        return $this;
    }

    public function getHexcolor(): ?string
    {
        return $this->hexcolor;
    }

    public function setHexcolor(string $hexcolor): static
    {
        $this->hexcolor = $hexcolor;

        return $this;
    }

    public function jsonSerialize()
    {
        return array(
            'x' => $this->coor_x,
            'y'=> $this->coor_y,
            'hexcolor' => $this->hexcolor
        );
    }
}
