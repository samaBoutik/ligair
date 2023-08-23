<?php

namespace App\Entity;

use App\Repository\CodeInseeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CodeInseeRepository::class)]
class CodeInsee
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $code_insee = null;

    #[ORM\OneToMany(mappedBy: 'code_insee', targetEntity: Data::class, orphanRemoval: true)]
    private Collection $data;

    public function __construct()
    {
        $this->data = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeInsee(): ?int
    {
        return $this->code_insee;
    }

    public function setCodeInsee(int $code_insee): static
    {
        $this->code_insee = $code_insee;

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
            $data->setCodeInsee($this);
        }

        return $this;
    }

    public function removeData(Data $data): static
    {
        if ($this->data->removeElement($data)) {
            // set the owning side to null (unless already changed)
            if ($data->getCodeInsee() === $this) {
                $data->setCodeInsee(null);
            }
        }

        return $this;
    }
}
