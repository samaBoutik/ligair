<?php

namespace App\Entity;

use App\Repository\DateEchRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DateEchRepository::class)]
class DateEch
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateEch = null;

    #[ORM\ManyToMany(targetEntity: DateRun::class, mappedBy: 'dateEch')]
    private Collection $dateRuns;

    public function __construct()
    {
        $this->dateRuns = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateEch(): ?\DateTimeInterface
    {
        return $this->dateEch;
    }

    public function setDateEch(\DateTimeInterface $dateEch): static
    {
        $this->dateEch = $dateEch;

        return $this;
    }

    /**
     * @return Collection<int, DateRun>
     */
    public function getDateRuns(): Collection
    {
        return $this->dateRuns;
    }

    public function addDateRun(DateRun $dateRun): static
    {
        if (!$this->dateRuns->contains($dateRun)) {
            $this->dateRuns->add($dateRun);
            $dateRun->addDateEch($this);
        }

        return $this;
    }

    public function removeDateRun(DateRun $dateRun): static
    {
        if ($this->dateRuns->removeElement($dateRun)) {
            $dateRun->removeDateEch($this);
        }

        return $this;
    }
}
