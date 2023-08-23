<?php

namespace App\Entity;

use App\Repository\DataRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DataRepository::class)]
class Data
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'data')]
    #[ORM\JoinColumn(nullable: false)]
    private ?CodeInsee $code_insee = null;

    #[ORM\ManyToOne(inversedBy: 'data')]
    #[ORM\JoinColumn(nullable: false)]
    private ?ValInd $val_ind = null;

    #[ORM\Column(nullable: true)]
    private ?float $conc_pm10 = null;

    #[ORM\Column(nullable: true)]
    private ?float $conc_pm25 = null;

    #[ORM\Column(nullable: true)]
    private ?float $conc_no2 = null;

    #[ORM\Column(nullable: true)]
    private ?float $conc_so2 = null;

    #[ORM\Column(nullable: true)]
    private ?float $conc_o3 = null;

    #[ORM\ManyToOne(inversedBy: 'data')]
    #[ORM\JoinColumn(nullable: false)]
    private ?PollResp $poll_resp = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_run = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_ech = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeInsee(): ?CodeInsee
    {
        return $this->code_insee;
    }

    public function setCodeInsee(?CodeInsee $code_insee)
    {
        $this->code_insee = $code_insee;

        return $this;
    }

    public function getValInd(): ?ValInd
    {
        return $this->val_ind;
    }

    public function setValInd(?ValInd $val_ind): static
    {
        $this->val_ind = $val_ind;

        return $this;
    }

    public function getConcPm10(): ?float
    {
        return $this->conc_pm10;
    }

    public function setConcPm10(?float $conc_pm10): static
    {
        $this->conc_pm10 = $conc_pm10;

        return $this;
    }

    public function getConcPm25(): ?float
    {
        return $this->conc_pm25;
    }

    public function setConcPm25(?float $conc_pm25): static
    {
        $this->conc_pm25 = $conc_pm25;

        return $this;
    }

    public function getConcNo2(): ?float
    {
        return $this->conc_no2;
    }

    public function setConcNo2(?float $conc_no2): static
    {
        $this->conc_no2 = $conc_no2;

        return $this;
    }

    public function getConcSo2(): ?float
    {
        return $this->conc_so2;
    }

    public function setConcSo2(?float $conc_so2): static
    {
        $this->conc_so2 = $conc_so2;

        return $this;
    }

    public function getConcO3(): ?float
    {
        return $this->conc_o3;
    }

    public function setConcO3(?float $conc_o3): static
    {
        $this->conc_o3 = $conc_o3;

        return $this;
    }

    public function getPollResp(): ?PollResp
    {
        return $this->poll_resp;
    }

    public function setPollResp(?PollResp $poll_resp): static
    {
        $this->poll_resp = $poll_resp;

        return $this;
    }

    public function getDateRun(): ?\DateTimeInterface
    {
        return $this->date_run;
    }

    public function setDateRun(\DateTimeInterface $date_run): static
    {
        $this->date_run = $date_run;

        return $this;
    }

    public function getDateEch(): ?\DateTimeInterface
    {
        return $this->date_ech;
    }

    public function setDateEch(\DateTimeInterface $date_ech): static
    {
        $this->date_ech = $date_ech;

        return $this;
    }
}
