<?php

namespace App\Entity;

use App\Repository\PollRespRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PollRespRepository::class)]
class PollResp
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 7)]
    private ?string $poll_resp = null;

    #[ORM\Column(length: 255)]
    private ?string $libelle = null;

    #[ORM\OneToMany(mappedBy: 'poll_resp', targetEntity: Data::class, orphanRemoval: true)]
    private Collection $data;

    public function __construct()
    {
        $this->data = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPollResp(): ?string
    {
        return $this->poll_resp;
    }

    public function setPollResp(string $poll_resp): static
    {
        $this->poll_resp = $poll_resp;

        return $this;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): static
    {
        $this->libelle = $libelle;

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
            $data->setPollResp($this);
        }

        return $this;
    }

    public function removeData(Data $data): static
    {
        if ($this->data->removeElement($data)) {
            // set the owning side to null (unless already changed)
            if ($data->getPollResp() === $this) {
                $data->setPollResp(null);
            }
        }

        return $this;
    }
}
