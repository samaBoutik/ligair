<?php

namespace App\Entity;

use App\Repository\GeorefFranceCommuneRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GeorefFranceCommuneRepository::class)]
class GeorefFranceCommune
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $year = null;

    #[ORM\Column(length: 255)]
    private ?string $regCode = null;

    #[ORM\Column(length: 255)]
    private ?string $regName = null;

    #[ORM\Column(length: 255)]
    private ?string $depCode = null;

    #[ORM\Column(length: 255)]
    private ?string $depName = null;

    #[ORM\Column(length: 255)]
    private ?string $arrdepCod = null;

    #[ORM\Column(length: 255)]
    private ?string $arrdepNam = null;

    #[ORM\Column(length: 255)]
    private ?string $ze2020Cod = null;

    #[ORM\Column(length: 255)]
    private ?string $ze2020Nam = null;

    #[ORM\Column(length: 255)]
    private ?string $bv2012Cod = null;

    #[ORM\Column(length: 255)]
    private ?string $bv2012Nam = null;

    #[ORM\Column(length: 255)]
    private ?string $epciCode = null;

    #[ORM\Column(length: 255)]
    private ?string $epciName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $eptCode = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $eptName = null;

    #[ORM\Column(length: 255)]
    private ?string $comCode = null;

    #[ORM\Column(length: 255)]
    private ?string $comCurren = null;

    #[ORM\Column(length: 255)]
    private ?string $comName = null;

    #[ORM\Column(length: 255)]
    private ?string $comNameU = null;

    #[ORM\Column(length: 255)]
    private ?string $comNameL = null;

    #[ORM\Column(length: 255)]
    private ?string $comAreaC = null;

    #[ORM\Column(length: 255)]
    private ?string $comType = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ze2010Nam = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ze2010Cod = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $comCataeu = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $comCatae2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $comUu2010 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $comUu2012 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $comAu2010 = null;

    #[ORM\Column(length: 255)]
    private ?string $comCateaa = null;

    #[ORM\Column(length: 255)]
    private ?string $comCatea2 = null;

    #[ORM\Column(length: 255)]
    private ?string $comUu2020 = null;

    #[ORM\Column(length: 255)]
    private ?string $comUu2022 = null;

    #[ORM\Column(length: 255)]
    private ?string $comAav202 = null;

    #[ORM\Column(length: 255)]
    private ?string $comCvCod = null;

    #[ORM\Column(length: 255)]
    private ?string $comInCtu = null;

    #[ORM\Column(length: 255)]
    private ?string $comSiren_ = null;

    #[ORM\Column(length: 255)]
    private ?string $comIsMou = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getYEAR(): ?string
    {
        return $this->year;
    }

    public function setYEAR(string $YEAR): static
    {
        $this->year = $YEAR;

        return $this;
    }

    public function getREGCODE(): ?string
    {
        return $this->regCode;
    }

    public function setREGCODE(string $REG_CODE): static
    {
        $this->regCode = $REG_CODE;

        return $this;
    }

    public function getREGNAME(): ?string
    {
        return $this->regName;
    }

    public function setREGNAME(string $REG_NAME): static
    {
        $this->regName = $REG_NAME;

        return $this;
    }

    public function getDEPCODE(): ?string
    {
        return $this->depCode;
    }

    public function setDEPCODE(string $DEP_CODE): static
    {
        $this->depCode = $DEP_CODE;

        return $this;
    }

    public function getDEPNAME(): ?string
    {
        return $this->depName;
    }

    public function setDEPNAME(string $DEP_NAME): static
    {
        $this->depName = $DEP_NAME;

        return $this;
    }

    public function getARRDEPCODE(): ?string
    {
        return $this->arrdepCod;
    }

    public function setARRDEPCODE(string $ARRDEP_CODE): static
    {
        $this->arrdepCod = $ARRDEP_CODE;

        return $this;
    }

    public function getARRDEPNAM(): ?string
    {
        return $this->arrdepNam;
    }

    public function setARRDEPNAM(string $ARRDEP_NAM): static
    {
        $this->arrdepNam = $ARRDEP_NAM;

        return $this;
    }

    public function getZE2020COD(): ?string
    {
        return $this->ze2020Cod;
    }

    public function setZE2020COD(string $ZE2020_COD): static
    {
        $this->ze2020Cod = $ZE2020_COD;

        return $this;
    }

    public function getZE2020NAM(): ?string
    {
        return $this->ze2020Nam;
    }

    public function setZE2020NAM(string $ZE2020_NAM): static
    {
        $this->ze2020Nam = $ZE2020_NAM;

        return $this;
    }

    public function getBV2012COD(): ?string
    {
        return $this->bv2012Cod;
    }

    public function setBV2012COD(string $BV2012_COD): static
    {
        $this->bv2012Cod = $BV2012_COD;

        return $this;
    }

    public function getBV2012NAM(): ?string
    {
        return $this->bv2012Nam;
    }

    public function setBV2012NAM(string $BV2012_NAM): static
    {
        $this->bv2012Nam = $BV2012_NAM;

        return $this;
    }

    public function getEPCICODE(): ?string
    {
        return $this->epciCode;
    }

    public function setEPCICODE(string $EPCI_CODE): static
    {
        $this->epciCode = $EPCI_CODE;

        return $this;
    }

    public function getEPCINAME(): ?string
    {
        return $this->epciName;
    }

    public function setEPCINAME(string $EPCI_NAME): static
    {
        $this->epciName = $EPCI_NAME;

        return $this;
    }

    public function getEPTCODE(): ?string
    {
        return $this->eptCode;
    }

    public function setEPTCODE(?string $EPT_CODE): static
    {
        $this->eptCode = $EPT_CODE;

        return $this;
    }

    public function getEPTNAME(): ?string
    {
        return $this->eptName;
    }

    public function setEPTNAME(?string $EPT_NAME): static
    {
        $this->eptName = $EPT_NAME;

        return $this;
    }

    public function getCOMCODE(): ?string
    {
        return $this->comCode;
    }

    public function setCOMCODE(string $COM_CODE): static
    {
        $this->comCode = $COM_CODE;

        return $this;
    }

    public function getCOMCURREN(): ?string
    {
        return $this->comCurren;
    }

    public function setCOMCURREN(string $COM_CURREN): static
    {
        $this->comCurren = $COM_CURREN;

        return $this;
    }

    public function getCOMNAME(): ?string
    {
        return $this->comName;
    }

    public function setCOMNAME(string $COM_NAME): static
    {
        $this->comName = $COM_NAME;

        return $this;
    }

    public function getCOMNAMEU(): ?string
    {
        return $this->comNameU;
    }

    public function setCOMNAMEU(string $COM_NAME_U): static
    {
        $this->comNameU = $COM_NAME_U;

        return $this;
    }

    public function getCOMNAMEL(): ?string
    {
        return $this->comNameL;
    }

    public function setCOMNAMEL(string $COM_NAME_L): static
    {
        $this->comNameL = $COM_NAME_L;

        return $this;
    }

    public function getCOMAREAC(): ?string
    {
        return $this->comAreaC;
    }

    public function setCOMAREAC(string $COM_AREA_C): static
    {
        $this->comAreaC = $COM_AREA_C;

        return $this;
    }

    public function getCOMTYPE(): ?string
    {
        return $this->comType;
    }

    public function setCOMTYPE(string $COM_TYPE): static
    {
        $this->comType = $COM_TYPE;

        return $this;
    }

    public function getZE2010NAM(): ?string
    {
        return $this->ze2010Nam;
    }

    public function setZE2010NAM(?string $ZE2010_NAM): static
    {
        $this->ze2010Nam = $ZE2010_NAM;

        return $this;
    }

    public function getZE2010COD(): ?string
    {
        return $this->ze2010Cod;
    }

    public function setZE2010COD(?string $ZE2010_COD): static
    {
        $this->ze2010Cod = $ZE2010_COD;

        return $this;
    }

    public function getCOMCATAEU(): ?string
    {
        return $this->comCataeu;
    }

    public function setCOMCATAEU(?string $COM_CATAEU): static
    {
        $this->comCataeu = $COM_CATAEU;

        return $this;
    }

    public function getCOMCATAE2(): ?string
    {
        return $this->comCatae2;
    }

    public function setCOMCATAE2(?string $COM_CATAE2): static
    {
        $this->comCatae2 = $COM_CATAE2;

        return $this;
    }

    public function getCOMUU2010(): ?string
    {
        return $this->comUu2010;
    }

    public function setCOMUU2010(?string $COM_UU2010): static
    {
        $this->comUu2010 = $COM_UU2010;

        return $this;
    }

    public function getCOMUU2012(): ?string
    {
        return $this->comUu2012;
    }

    public function setCOMUU2012(?string $COM_UU2012): static
    {
        $this->comUu2012 = $COM_UU2012;

        return $this;
    }

    public function getCOMAU2010(): ?string
    {
        return $this->comAu2010;
    }

    public function setCOMAU2010(?string $COM_AU2010): static
    {
        $this->comAu2010 = $COM_AU2010;

        return $this;
    }

    public function getCOMCATEAA(): ?string
    {
        return $this->comCateaa;
    }

    public function setCOMCATEAA(string $COM_CATEAA): static
    {
        $this->comCateaa = $COM_CATEAA;

        return $this;
    }

    public function getCOMCATEA2(): ?string
    {
        return $this->comCatea2;
    }

    public function setCOMCATEA2(string $COM_CATEA2): static
    {
        $this->comCatea2 = $COM_CATEA2;

        return $this;
    }

    public function getCOMUU2020(): ?string
    {
        return $this->comUu2020;
    }

    public function setCOMUU2020(string $COM_UU2020): static
    {
        $this->comUu2020 = $COM_UU2020;

        return $this;
    }

    public function getCOMUU2022(): ?string
    {
        return $this->comUu2022;
    }

    public function setCOMUU2022(string $COM_UU2022): static
    {
        $this->comUu2022 = $COM_UU2022;

        return $this;
    }

    public function getCOMAAV202(): ?string
    {
        return $this->comAav202;
    }

    public function setCOMAAV202(string $COM_AAV202): static
    {
        $this->comAav202 = $COM_AAV202;

        return $this;
    }

    public function getCOMCVCOD(): ?string
    {
        return $this->comCvCod;
    }

    public function setCOMCVCOD(string $COM_CV_COD): static
    {
        $this->comCvCod = $COM_CV_COD;

        return $this;
    }

    public function getCOMINCTU(): ?string
    {
        return $this->comInCtu;
    }

    public function setCOMINCTU(string $COM_IN_CTU): static
    {
        $this->comInCtu = $COM_IN_CTU;

        return $this;
    }

    public function getCOMSIREN(): ?string
    {
        return $this->comSiren_;
    }

    public function setCOMSIREN(string $COM_SIREN_): static
    {
        $this->comSiren_ = $COM_SIREN_;

        return $this;
    }

    public function getCOMISMOU(): ?string
    {
        return $this->comIsMou;
    }

    public function setCOMISMOU(string $COM_IS_MOU): static
    {
        $this->comIsMou = $COM_IS_MOU;

        return $this;
    }
}
