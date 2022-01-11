<?php

namespace App\Entity;

use App\Repository\RoadsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RoadsRepository::class)
 */
class Roads
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", name="id")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Road_Number;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Road_Name;

    /**
     * @ORM\Column(type="float")
     */
    private $Section_Start;

    /**
     * @ORM\Column(type="float")
     */
    private $Section_End;

    /**
     * @ORM\Column(type="integer")
     */
    private $Road_Level;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Road_Type;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRoadNumber(): ?string
    {
        return $this->Road_Number;
    }

    public function setRoadNumber(string $Road_Number): self
    {
        $this->Road_Number = $Road_Number;

        return $this;
    }

    public function getRoadName(): ?string
    {
        return $this->Road_Name;
    }

    public function setRoadName(string $Road_Name): self
    {
        $this->Road_Name = $Road_Name;

        return $this;
    }

    public function getSectionStart(): ?float
    {
        return $this->Section_Start;
    }

    public function setSectionStart(float $Section_Start): self
    {
        $this->Section_Start = $Section_Start;

        return $this;
    }

    public function getSectionEnd(): ?float
    {
        return $this->Section_End;
    }

    public function setSectionEnd(float $Section_End): self
    {
        $this->Section_End = $Section_End;

        return $this;
    }

    public function getRoadLevel(): ?int
    {
        return $this->Road_Level;
    }

    public function setRoadLevel(int $Road_Level): self
    {
        $this->Road_Level = $Road_Level;

        return $this;
    }

    public function getRoadType(): ?string
    {
        return $this->Road_Type;
    }

    public function setRoadType(string $Road_Type): self
    {
        $this->Road_Type = $Road_Type;

        return $this;
    }
}
