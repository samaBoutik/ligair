<?php

namespace App\Entity;

use App\Repository\DateRunRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DateRunRepository::class)]
class DateRun
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateRun = null;

    #[ORM\ManyToMany(targetEntity: DateEch::class, inversedBy: 'dateRuns')]
    private Collection $dateEch;

    public function __construct()
    {
        $this->dateEch = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateRun(): ?\DateTimeInterface
    {
        return $this->dateRun;
    }

    public function setDateRun(\DateTimeInterface $dateRun): static
    {
        $this->dateRun = $dateRun;

        return $this;
    }

    /**
     * @return Collection<int, DateEch>
     */
    public function getDateEch(): Collection
    {
        return $this->dateEch;
    }

    public function addDateEch(DateEch $dateEch): static
    {
        if (!$this->dateEch->contains($dateEch)) {
            $this->dateEch->add($dateEch);
        }

        return $this;
    }

    public function removeDateEch(DateEch $dateEch): static
    {
        $this->dateEch->removeElement($dateEch);

        return $this;
    }
}
