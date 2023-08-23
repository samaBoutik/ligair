<?php

namespace App\Controller;

use App\Entity\DateEch;
use App\Entity\DateRun;
use App\Entity\CodeInsee;
use App\Repository\DataRepository;
use App\Entity\GeorefFranceCommune;
use App\Repository\ValIndRepository;
use App\Repository\DateEchRepository;
use App\Repository\DateRunRepository;
use App\Repository\CodeInseeRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\GeorefFranceCommuneRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MainController extends AbstractController
{

    #[Route('/', name: 'app_main')]
    public function index(DateRunRepository $dateRunRepository): Response
    {

        return $this->render('main/index.html.twig', [
            'daterun' => $dateRunRepository->findAll(),
        ]);
    }

    /* Methode qui permet en fonction de la date run de recuperer la liste des date ech correspondante */
    #[Route('/services/lesdates', name: 'date_ech')]
    public function getlistedateech(DateRunRepository $dateRunRepository): Response
    {
        $daterunid = $_POST['daterunid'];
        if (isset($daterunid) && !empty($daterunid)) {

            $daterun = new DateRun();
            $daterun = $dateRunRepository->findOneById($daterunid);


            if ($daterun) {

                $dateech = [];
                foreach ($daterun->getDateEch() as $dateEch) {
                    $dateech[$dateEch->getId()] = $dateEch->getDateEch()->format("Y-m-d");
                }
                return $this->json([
                    "code" => 200,
                    "dateech" => $dateech
                ], 200);
            } else {
                return $this->json([
                    "code" => 400
                ], 200);
            }
        } else {
            return $this->json([
                "code" => 400
            ], 200);
        }
    }

    /* Methode tres importante c'est là qu'on traite les données du formulaire pour la cartographie */
    #[Route('/services/misajour', name: 'misajour')]
    public function misajour(
        DateRunRepository $dateRunRepository,
        DateEchRepository $dateEchRepository,
        GeorefFranceCommuneRepository $geoRefRepo,
        CodeInseeRepository $codeInseeRepo,
        DataRepository $dataRepository,
        ValIndRepository $valindrepository
    ) {
        $choix = $_POST['choix'];
        $daterun = (int)$_POST['daterun'];
        $dateech = (int)$_POST['dateech'];

        if (isset($choix) && !empty($choix) && isset($daterun) && !empty($daterun) && isset($dateech) && !empty($dateech)) {

            $dater = new DateRun();
            $datee = new DateEch();
            $dater = $dateRunRepository->findOneById($daterun);
            $datee = $dateEchRepository->findOneById($dateech);

            $lescouleurs = array();
            $listeInsee = [];
            if ($choix == "val_ind") {

                $data = $dataRepository->findOneData($dater->getDateRun(), $datee->getDateEch());
                $couleur = "";

                $tab_coul = ["green", "yellow", "orange", "crimson", "grey", "#060505"];
                foreach ($data as $un) {
                    if ($un->getValInd()->getId() == 1) {
                        $couleur = $tab_coul[0];
                    } else if ($un->getValInd()->getId() == 2) {
                        $couleur = $tab_coul[1];
                    } else if ($un->getValInd()->getId() == 3) {
                        $couleur = $tab_coul[2];
                    } else if ($un->getValInd()->getId() == 4) {
                        $couleur = $tab_coul[3];
                    } else if ($un->getValInd()->getId() == 5) {
                        $couleur = $tab_coul[4];
                    } else if ($un->getValInd()->getId() == 6) {
                        $couleur = $tab_coul[5];
                    } else {
                        $couleur = "#FFF";
                    }
                    array_push($lescouleurs, $couleur);
                }

                return $this->json([
                    "code" => 200,
                    "couleurs" => $lescouleurs,
                    "content" => $this->renderView('/variables/valInd.html.twig', [
                        "indice" => $valindrepository->findAll(),
                        "couleurs" => $tab_coul

                    ])
                ], 200);
            } else if ($choix == "conc_pm10") {
                $data = $dataRepository->findOneData($dater->getDateRun(), $datee->getDateEch());
                $couleur = "";

                $tab_coul = ["grey", "black", "white", "blue", "yellow", "green", "red"];
                foreach ($data as $un) {
                    if ($un->getConcPm10() <= 8.2) {
                        $couleur = $tab_coul[0];
                    } else if ($un->getConcPm10() > 8.2 && $un->getConcPm10() <= 13) {
                        $couleur = $tab_coul[1];
                    } else if ($un->getConcPm10() > 13 && $un->getConcPm10() <= 16) {
                        $couleur = $tab_coul[2];
                    } else if ($un->getConcPm10() > 16 && $un->getConcPm10() <= 20) {
                        $couleur = $tab_coul[3];
                    } else if ($un->getConcPm10() > 20 && $un->getConcPm10() <= 23) {
                        $couleur = $tab_coul[4];
                    } else if ($un->getConcPm10() > 23 && $un->getConcPm10() <= 26) {
                        $couleur = $tab_coul[5];
                    } else if ($un->getConcPm10() > 26) {
                        $couleur = $tab_coul[6];
                    }
                    array_push($lescouleurs, $couleur);
                }

                $intervalles = [" < 8.2", " entre 8.3 et 13", "entre 13.1 et 16", "entre 16.1 et 20", "entre 20.1 et 23", "entre 23.1 et 26", "> 26"];

                return $this->json([
                    "code" => 200,
                    "couleurs" => $lescouleurs,
                    "content" => $this->renderView('/variables/conc_pm10.html.twig', [
                        "couleurs" => $tab_coul,
                        "intervalles" => $intervalles

                    ])
                ], 200);
            } else if ($choix == "conc_pm25") {
                $data = $dataRepository->findOneData($dater->getDateRun(), $datee->getDateEch());
                $couleur = "";

                $tab_coul = ["#6c452e", "#e78850", "#e7cdbe", "#bfab48", "#080703", "#a3cb31", "#a5a7a2"];
                foreach ($data as $un) {
                    if ($un->getConcPm25() <= 5.2) {
                        $couleur = $tab_coul[0];
                    } else if ($un->getConcPm25() > 5.2 && $un->getConcPm25() <= 7) {
                        $couleur = $tab_coul[1];
                    } else if ($un->getConcPm25() > 7 && $un->getConcPm25() <= 9) {
                        $couleur = $tab_coul[2];
                    } else if ($un->getConcPm25() > 9 && $un->getConcPm25() <= 10.4) {
                        $couleur = $tab_coul[3];
                    } else if ($un->getConcPm25() > 10.4 && $un->getConcPm25() <= 13.8) {
                        $couleur = $tab_coul[4];
                    } else if ($un->getConcPm25() > 13.8 && $un->getConcPm25() <= 15.2) {
                        $couleur = $tab_coul[5];
                    } else if ($un->getConcPm25() > 15.2) {
                        $couleur = $tab_coul[6];
                    }
                    array_push($lescouleurs, $couleur);
                }

                $intervalles = [" < 5.2", " entre 5.2 et 7", "entre 7 et 9", "entre 9 et 10.4", "entre 10.4 et 13.8", "entre 13.8 et 15.2", "> 15.2"];

                return $this->json([
                    "code" => 200,
                    "couleurs" => $lescouleurs,
                    "content" => $this->renderView('/variables/conc_pm25.html.twig', [
                        "couleurs" => $tab_coul,
                        "intervalles" => $intervalles

                    ])
                ], 200);
            } else if ($choix == "conc_no2") {

                $data = $dataRepository->findOneData($dater->getDateRun(), $datee->getDateEch());
                $couleur = "";

                $tab_coul = ["#d8dac1", "#c4cd5a", "#7f853a", "#4b4c3c", "#969696", "#59a8c8", "#3b38a6"];
                foreach ($data as $un) {
                    if ($un->getConcNo2() <= 4.5) {
                        $couleur = $tab_coul[0];
                    } else if ($un->getConcNo2() > 4.5 && $un->getConcNo2() <= 12.5) {
                        $couleur = $tab_coul[1];
                    } else if ($un->getConcNo2() > 12.5 && $un->getConcNo2() <= 20.5) {
                        $couleur = $tab_coul[2];
                    } else if ($un->getConcNo2() > 20.5 && $un->getConcNo2() <= 30) {
                        $couleur = $tab_coul[3];
                    } else if ($un->getConcNo2() > 30 && $un->getConcNo2() <= 36.5) {
                        $couleur = $tab_coul[4];
                    } else if ($un->getConcNo2() > 36.5 && $un->getConcNo2() <= 45.5) {
                        $couleur = $tab_coul[5];
                    } else if ($un->getConcNo2() > 45) {
                        $couleur = $tab_coul[6];
                    }
                    array_push($lescouleurs, $couleur);
                }

                $intervalles = [" < 4.5", " entre 4.51 et 12.5", "entre 12.51 et 20.5", "entre 20.51 et 30", "entre 30.1 et 36.5", "entre 36.51 et 45.5", "> 45.51"];

                return $this->json([
                    "code" => 200,
                    "couleurs" => $lescouleurs,
                    "content" => $this->renderView('/variables/conc_no2.html.twig', [
                        "couleurs" => $tab_coul,
                        "intervalles" => $intervalles

                    ])
                ], 200);
            } else if ($choix == "conc_so2") {
                $lesdatas = $geoRefRepo->findAll();
                foreach ($lesdatas as $datas) {
                    $ref = new GeorefFranceCommune();
                    $ref = $geoRefRepo->findOneByRegName($datas->getREGNAME());
                    $codeInsee = new CodeInsee();
                    $codeInsee = $codeInseeRepo->findOneById($ref->getId());
                    array_push($listeInsee, $codeInsee->getCodeInsee());
                }

                $data = $dataRepository->findOneData($dater->getDateRun(), $datee->getDateEch());
                $couleur = "";

                $tab_coul = ["#aff894", "#42822b", "#374b30", "#8d948a", "#91eecc", "#64b597", "#c1dad0"];
                foreach ($data as $un) {
                    if ($un->getConcSo2() <= 0.2) {
                        $couleur = $tab_coul[0];
                    } else if ($un->getConcSo2() > 0.2 && $un->getConcSo2() <= 0.4) {
                        $couleur = $tab_coul[1];
                    } else if ($un->getConcSo2() > 0.41 && $un->getConcSo2() <= 0.6) {
                        $couleur = $tab_coul[2];
                    } else if ($un->getConcSo2() > 0.61 && $un->getConcSo2() <= 0.8) {
                        $couleur = $tab_coul[3];
                    } else if ($un->getConcSo2() > 0.81 && $un->getConcSo2() <= 0.9) {
                        $couleur = $tab_coul[4];
                    } else if ($un->getConcPm25() > 0.91 && $un->getConcSo2() <= 1) {
                        $couleur = $tab_coul[5];
                    } else if ($un->getConcSo2() > 1) {
                        $couleur = $tab_coul[6];
                    }
                    array_push($lescouleurs, $couleur);
                }

                $intervalles = [
                    " < 0.2",
                    " entre 0.2 et 0.4",
                    "entre 0.41 et 0.6",
                    "entre 0.61 et 0.8",
                    "entre 0.81 et 0.9",
                    "entre 0.91 et 1",
                    "> 1"
                ];

                return $this->json([
                    "code" => 200,
                    "couleurs" => $lescouleurs,
                    "content" => $this->renderView('/variables/conc_so2.html.twig', [
                        "couleurs" => $tab_coul,
                        "intervalles" => $intervalles

                    ])
                ], 200);
            } else if ($choix == "conc_o3") {
                $data = $dataRepository->findOneData($dater->getDateRun(), $datee->getDateEch());
                $couleur = "";

                $tab_coul = ["#ff23ca", "#81366f", "#6c5c68", "#c2a2ba", "#8939c1", "#e0d2e9", "#bd94f8"];
                foreach ($data as $un) {
                    if ($un->getConcO3() <= 110) {
                        $couleur = $tab_coul[0];
                    } else if ($un->getConcO3() > 110 && $un->getConcO3() <= 121) {
                        $couleur = $tab_coul[1];
                    } else if ($un->getConcO3() > 121 && $un->getConcO3() <= 134) {
                        $couleur = $tab_coul[2];
                    } else if ($un->getConcO3() > 134 && $un->getConcO3() <= 152) {
                        $couleur = $tab_coul[3];
                    } else if ($un->getConcO3() > 152 && $un->getConcO3() <= 166) {
                        $couleur = $tab_coul[4];
                    } else if ($un->getConcO3() > 166 && $un->getConcO3() <= 180) {
                        $couleur = $tab_coul[5];
                    } else if ($un->getConcO3() > 180) {
                        $couleur = $tab_coul[6];
                    }
                    array_push($lescouleurs, $couleur);
                }

                $intervalles = [" < 110", " entre 110 et 121", "entre 121.1 et 134", "entre 134.1 et 152", "entre 152.1 et 166", "entre 166.1 et 180", "> 180.1"];

                return $this->json([
                    "code" => 200,
                    "couleurs" => $lescouleurs,
                    "content" => $this->renderView('/variables/conc_o3.html.twig', [
                        "couleurs" => $tab_coul,
                        "intervalles" => $intervalles

                    ])
                ], 200);
            } else {
                return $this->json([
                    "code" => 400
                ], 200);
            }
        } else {
            return $this->json([
                "code" => 400
            ], 200);
        }
    }

    #[Route('/services/datas/commune/{id}', name: 'datas_commune')]
    public function datas_dune_commune(GeorefFranceCommune $georefFranceCommune): Response
    {
        if ($georefFranceCommune) {

            return $this->json([
                "code" => 200,
                "message" => "Super tout fonctionne",
                "content" => $this->renderView('/variables/detail_cc.html.twig', [
                    "commune" => $georefFranceCommune

                ])
            ], 200);
        } else {
            return $this->json([
                "code" => 400,
                "message" => "Erreur !"
            ], 200);
        }
    }
}
