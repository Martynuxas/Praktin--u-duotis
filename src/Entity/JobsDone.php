<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use App\Repository\JobsDoneRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=JobsDoneRepository::class)
 */
class JobsDone
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
    * @ORM\ManyToOne(targetEntity="Roads", inversedBy="doneJobs")
     */
    private $Road;

    /**
    * @ORM\ManyToOne(targetEntity="Jobs", inversedBy="doneJobs")
     */
    private $Cipher;
    /**
    * @ORM\ManyToOne(targetEntity="Roads", inversedBy="doneJobs")
     */
    private $SectionStart;
    /**
    * @ORM\ManyToOne(targetEntity="Roads", inversedBy="doneJobs")
     */
    private $SectionEnd;
    /**
     * @ORM\Column(type="float")
     */
    private $Quantity;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRoad(): ?Roads
    {
        return $this->Road;
    }

    public function setRoad(?Roads $Road): self
    {
        $this->Road = $Road;

        return $this;
    }

    public function getCipher(): ?Jobs
    {
        return $this->Cipher;
    }
    
    public function setCipher(?Jobs $Cipher): self
    {
        $this->Cipher = $Cipher;

        return $this;
    }
    public function getSectionStart(): ?Roads
    {
        return $this->SectionStart;
    }
    
    public function setSectionStart(?Roads $SectionStart): self
    {
        $this->SectionStart = $SectionStart;

        return $this;
    }
    public function getSectionEnd(): ?Roads
    {
        return $this->SectionEnd;
    }
    
    public function setSectionEnd(?Roads $SectionEnd): self
    {
        $this->SectionEnd = $SectionEnd;

        return $this;
    }
    public function getQuantity(): ?float
    {
        return $this->Quantity;
    }

    public function setQuantity(float $Quantity): self
    {
        $this->Quantity = $Quantity;

        return $this;
    }
}
