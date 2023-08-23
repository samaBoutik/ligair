<?php

namespace App\Entity;

use App\Repository\ValIndRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ValIndRepository::class)]
class ValInd
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $val_ind = null;

    #[ORM\Column(length: 63)]
    private ?string $qualificatifs = null;

    #[ORM\OneToMany(mappedBy: 'val_ind', targetEntity: Data::class)]
    private Collection $data;

    public function __construct()
    {
        $this->data = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValInd(): ?int
    {
        return $this->val_ind;
    }

    public function setValInd(int $val_ind): static
    {
        $this->val_ind = $val_ind;

        return $this;
    }

    public function getQualificatifs(): ?string
    {
        return $this->qualificatifs;
    }

    public function setQualificatifs(string $qualificatifs): static
    {
        $this->qualificatifs = $qualificatifs;

        return $this;
    }

    /**
     * @return Collection<int, Data>
     */
    public function getData(): Collection
    {
        return $this->data;
    }

    public function addData(Data $data): static
    {
        if (!$this->data->contains($data)) {
            $this->data->add($data);
            $data->setValInd($this);
        }

        return $this;
    }

    public function removeData(Data $data): static
    {
        if ($this->data->removeElement($data)) {
            // set the owning side to null (unless already changed)
            if ($data->getValInd() === $this) {
                $data->setValInd(null);
            }
        }

        return $this;
    }
}
