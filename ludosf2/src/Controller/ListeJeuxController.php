<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\ListeJeux;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use App\Form\importCsvType;

class ListeJeuxController extends AbstractController
{
    /**
     * @Route("/liste_jeux", name="liste_jeux")
     */
    public function liste_jeux()
    {
        $listJeux = $this->getDoctrine()
        ->getRepository(ListeJeux::class)
        ->findAllWithoutDouble();

        $encoders = [new XmlEncoder(), new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);

        $response = new JsonResponse();
        $response->setContent(
            $serializer->serialize($listJeux, 'json')
        );

        return $response;
    }

    /**
     * @Route("/testlistejeu", name="testlistejeu")
     */
    public function testlistejeu()
    {
        $listJeux = $this->getDoctrine()
        ->getRepository(ListeJeux::class)
        ->findAll();

        dump($listJeux);

        exit;
    }

    /**
     * @Route("/jsonlistejeu/{id}", name="jsonlistejeu")
     */
    public function jsonlistejeu($id)
    {
        $listJeu = $this->getDoctrine()
        ->getRepository(ListeJeux::class)
        ->findBy(["CodeJeu" => $id]);

        $encoders = [new XmlEncoder(), new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);

        $response = new JsonResponse();
        $response->setContent(
            $serializer->serialize($listJeu, 'json'));
        // $response->setContent(json_encode([
        //     $listJeu
        // ]));

        return $response;
    }

    /**
     * @Route("/csvimport", name="csvimport")
     * @IsGranted("ROLE_ADMIN")
     */
    public function csvimport(Request $request)
    {

        $form = $this->createForm(importCsvType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $csv = $form->get('csv')->getData();

            $csv = fopen($csv, 'r');
            while (!feof($csv) ) {

                $ListeJeux = new ListeJeux();
                $arrayCsv = fgetcsv($csv, 10000, ';', '"', '|');

                if(isset($arrayCsv[0]) && $arrayCsv[0] !== "CodeJeu" ) {


                    if($arrayCsv[0][0] == " "){
                        $arrayCsv[0] = substr($arrayCsv[0], 1);
                    }
                    if(strtolower($arrayCsv[0][0]) !== "a" && strtolower($arrayCsv[0][0]) !== "e" && strtolower($arrayCsv[0][0]) !== "s"){
 
                        $ListeJeux->setCodeJeu($arrayCsv[0]);
                        $ListeJeux->setNomJeu($arrayCsv[1]);
                        //$ListeJeux->setSuspendu($arrayCsv[2]);
                        $ListeJeux->setDateAchat($arrayCsv[2]);
                        $ListeJeux->setEmplacement($arrayCsv[3]);
                        $ListeJeux->setMarque($arrayCsv[4]);
                        $ListeJeux->setAnneeEdition($arrayCsv[5]);
                        $ListeJeux->setNbJoueurs($arrayCsv[6]);
                        $ListeJeux->setAgeJoueurs($arrayCsv[7]);
                        $ListeJeux->setManque($arrayCsv[8]);
                        $ListeJeux->setTypeJeu($arrayCsv[9]);
                        $ListeJeux->setNbPieces($arrayCsv[10]);
                        $ListeJeux->setTempsJeu($arrayCsv[11]);
                        $ListeJeux->setEtatJeu($arrayCsv[12]);
                        $ListeJeux->setDescriptif1($arrayCsv[13]);
                        $ListeJeux->setDescriptif2($arrayCsv[14]);
                        $ListeJeux->setDescriptif3($arrayCsv[15]);
                        $ListeJeux->setLienImg($arrayCsv[16]);
                        $ListeJeux->setCommentaire($arrayCsv[17]);
                        $ListeJeux->setNbPoints($arrayCsv[18]);
                        $ListeJeux->setNiveauJeu($arrayCsv[19]);
                        $ListeJeux->setClassification($arrayCsv[20]);
                        $ListeJeux->setPrixEstimÈ($arrayCsv[21]);
                        $ListeJeux->setAuteur($arrayCsv[22]);
                        $ListeJeux->setIllustrateur($arrayCsv[23]);
                        $ListeJeux->setSurPlace($arrayCsv[24]);
                        $ListeJeux->setContenu1($arrayCsv[25]);
                        if(isset($arrayCsv[27])){
                            $ListeJeux->setContenu2(substr($arrayCsv[26],1,-1));
                        }

                        // $ListeJeux->setCodeJeu(substr($arrayCsv[0],1,-1));
                        // $ListeJeux->setNomJeu(substr($arrayCsv[1],1,-1));
                        // $ListeJeux->setSuspendu(substr($arrayCsv[2],1,-1));
                        // $ListeJeux->setDateAchat(substr($arrayCsv[3],1,-1));
                        // $ListeJeux->setEmplacement(substr($arrayCsv[4],1,-1));
                        // $ListeJeux->setMarque(substr($arrayCsv[5],1,-1));
                        // $ListeJeux->setAnneeEdition(substr($arrayCsv[6],1,-1));
                        // $ListeJeux->setNbJoueurs(substr($arrayCsv[7],1,-1));
                        // $ListeJeux->setAgeJoueurs(substr($arrayCsv[8],1,-1));
                        // $ListeJeux->setManque(substr($arrayCsv[9],1,-1));
                        // $ListeJeux->setTypeJeu(substr($arrayCsv[10],1,-1));
                        // $ListeJeux->setNbPieces(substr($arrayCsv[11],1,-1));
                        // $ListeJeux->setTempsJeu(substr($arrayCsv[12],1,-1));
                        // $ListeJeux->setEtatJeu(substr($arrayCsv[13],1,-1));
                        // $ListeJeux->setDescriptif1(substr($arrayCsv[14],1,-1));
                        // $ListeJeux->setDescriptif2(substr($arrayCsv[15],1,-1));
                        // $ListeJeux->setDescriptif3(substr($arrayCsv[16],1,-1));
                        // $ListeJeux->setLienImg(substr($arrayCsv[17],1,-1));
                        // $ListeJeux->setCommentaire(substr($arrayCsv[18],1,-1));
                        // $ListeJeux->setNbPoints(substr($arrayCsv[19],1,-1));
                        // $ListeJeux->setNiveauJeu(substr($arrayCsv[20],1,-1));
                        // $ListeJeux->setClassification(substr($arrayCsv[21],1,-1));
                        // $ListeJeux->setPrixEstimÈ(substr($arrayCsv[22],1,-1));
                        // $ListeJeux->setAuteur(substr($arrayCsv[23],1,-1));
                        // $ListeJeux->setIllustrateur(substr($arrayCsv[24],1,-1));
                        // $ListeJeux->setSurPlace(substr($arrayCsv[25],1,-1));
                        // $ListeJeux->setContenu1(substr($arrayCsv[26],1,-1));
                        // if(isset($arrayCsv[27])){
                        //     $ListeJeux->setContenu2(substr($arrayCsv[27],1,-1));
                        // }

                        $entityManager = $this->getDoctrine()->getManager();
                        $entityManager->persist($ListeJeux);
                        $entityManager->flush();

                    
                    }
                    
                }
                
                // $line[] = fgetcsv($csv, 1024, '|');
            }
            fclose($csv);
        }

        return $this->render('csvImport.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}

    