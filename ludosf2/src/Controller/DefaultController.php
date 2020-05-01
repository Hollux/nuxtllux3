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
            //$row = 1;
            while (!feof($csv) ) {

                // if($row == 1) {
                //     $row++;
                //     continue;
                // }
                // $row++;
                // if($row >= 3) {
                //     continue;
                // }
                $ListeJeux = new ListeJeux();
                $arrayCsv = fgetcsv($csv, 10000, '|', '"');

                if($arrayCsv[0] != "'CodeJeu'" ) {
                    dump($arrayCsv);

                    $ListeJeux->setCodeJeu(substr($arrayCsv[0],1,-1));
                    $ListeJeux->setNomJeu(substr($arrayCsv[1],1,-1));
                    $ListeJeux->setSuspendu(substr($arrayCsv[2],1,-1));
                    $ListeJeux->setDateAchat(substr($arrayCsv[3],1,-1));
                    $ListeJeux->setEmplacement(substr($arrayCsv[4],1,-1));
                    $ListeJeux->setMarque(substr($arrayCsv[5],1,-1));
                    $ListeJeux->setAnneeEdition(substr($arrayCsv[6],1,-1));
                    $ListeJeux->setNbJoueurs(substr($arrayCsv[7],1,-1));
                    $ListeJeux->setAgeJoueurs(substr($arrayCsv[8],1,-1));
                    $ListeJeux->setManque(substr($arrayCsv[9],1,-1));
                    $ListeJeux->setTypeJeu(substr($arrayCsv[10],1,-1));
                    $ListeJeux->setNbPieces(substr($arrayCsv[11],1,-1));
                    $ListeJeux->setTempsJeu(substr($arrayCsv[12],1,-1));
                    $ListeJeux->setEtatJeu(substr($arrayCsv[13],1,-1));
                    $ListeJeux->setDescriptif1(substr($arrayCsv[14],1,-1));
                    $ListeJeux->setDescriptif2(substr($arrayCsv[15],1,-1));
                    $ListeJeux->setDescriptif3(substr($arrayCsv[16],1,-1));
                    $ListeJeux->setLienImg(substr($arrayCsv[17],1,-1));
                    $ListeJeux->setCommentaire(substr($arrayCsv[18],1,-1));
                    $ListeJeux->setNbPoints(substr($arrayCsv[19],1,-1));
                    $ListeJeux->setNiveauJeu(substr($arrayCsv[20],1,-1));
                    $ListeJeux->setClassification(substr($arrayCsv[21],1,-1));
                    $ListeJeux->setPrixEstimÈ(substr($arrayCsv[22],1,-1));
                    $ListeJeux->setAuteur(substr($arrayCsv[23],1,-1));
                    $ListeJeux->setIllustrateur(substr($arrayCsv[24],1,-1));
                    $ListeJeux->setSurPlace(substr($arrayCsv[25],1,-1));
                    $ListeJeux->setContenu1(substr($arrayCsv[26],1,-1));
                    if(isset($arrayCsv[27])){
                        $ListeJeux->setContenu2(substr($arrayCsv[27],1,-1));
                    }

                    $entityManager = $this->getDoctrine()->getManager();
                    $entityManager->persist($ListeJeux);
                    //$entityManager->flush();
                }
                
                // $line[] = fgetcsv($csv, 1024, '|');
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