<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\Request;
use App\Form\importCsvType;
use App\Entity\ListeJeux;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        $content = 'page index changement post apache';
        return new Response(
            '<html><body>content: '.$content.'</body></html>'
        );
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
            //dump($listeJeux);


            $csv = fopen($csv, 'r');
            $row = 1;
            while (!feof($csv) ) {

                if($row == 1) {
                    $row++;
                    continue;
                }
                $row++;
                // if($row >= 3) {
                //     continue;
                // }
                $ListeJeux = new ListeJeux();
                $arrayCsv = fgetcsv($csv, 10000, '|', '"', "#");

                dump($arrayCsv);
                
                $ListeJeux->setCodeJeu($arrayCsv[0]);
                $ListeJeux->setNomJeu($arrayCsv[1]);
                $ListeJeux->setSuspendu($arrayCsv[2]);
                $ListeJeux->setDateAchat($arrayCsv[3]);
                $ListeJeux->setEmplacement($arrayCsv[4]);
                $ListeJeux->setMarque($arrayCsv[5]);
                $ListeJeux->setAnneeEdition($arrayCsv[6]);
                $ListeJeux->setNbJoueurs($arrayCsv[7]);
                $ListeJeux->setAgeJoueurs($arrayCsv[8]);
                $ListeJeux->setManque($arrayCsv[9]);
                $ListeJeux->setTypeJeu($arrayCsv[10]);
                $ListeJeux->setNbPieces($arrayCsv[11]);
                $ListeJeux->setTempsJeu($arrayCsv[12]);
                $ListeJeux->setEtatJeu($arrayCsv[13]);
                $ListeJeux->setDescriptif1($arrayCsv[14]);
                $ListeJeux->setDescriptif2($arrayCsv[15]);
                $ListeJeux->setDescriptif3($arrayCsv[16]);
                $ListeJeux->setLienImg($arrayCsv[17]);
                $ListeJeux->setCommentaire($arrayCsv[18]);
                $ListeJeux->setNbPoints($arrayCsv[19]);
                $ListeJeux->setNiveauJeu($arrayCsv[20]);
                $ListeJeux->setClassification($arrayCsv[21]);
                $ListeJeux->setPrixEstimÈ($arrayCsv[22]);
                $ListeJeux->setAuteur($arrayCsv[23]);
                $ListeJeux->setIllustrateur($arrayCsv[24]);
                $ListeJeux->setSurPlace($arrayCsv[25]);
                $ListeJeux->setContenu1($arrayCsv[26]);
                if(isset($arrayCsv[27])){
                    $ListeJeux->setContenu2($arrayCsv[27]);
                }
                

                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($ListeJeux);
                $entityManager->flush();


                // $line[] = fgetcsv($csv, 1024, '|', '"', "#");
            }
            fclose($csv);
        }

        return $this->render('csvImport.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/jsontest", name="jsontest")
     */
    public function jsontest()
    {
        $response = new Response();
        $response->setContent(json_encode([
            'data' => 123,
        ]));

        return $response;
    }
    
}