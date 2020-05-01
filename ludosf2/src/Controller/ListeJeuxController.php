<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\ListeJeux;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;



class ListeJeuxController extends AbstractController
{
    /**
     * @Route("/jsonlistejeux", name="jsonlistejeux")
     */
    public function jsonlistejeux()
    {
        $listJeux = $this->getDoctrine()
        ->getRepository(ListeJeux::class)
        ->findAllWithoutDouble();

        $encoders = [new XmlEncoder(), new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);

        $response = new Response();
        $response->setContent(
            $serializer->serialize($listJeux, 'json')
        );

        return $response;
    }

    /**
     * @Route("/jsonlistejeu/{id}", name="jsonlistejeu")
     */
    public function jsonlistejeu($id)
    {
        $listJeu = $this->getDoctrine()
        ->getRepository(ListeJeux::class)
        ->find($id);

        $encoders = [new XmlEncoder(), new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);

        $response = new Response();
        $response->setContent(
            $serializer->serialize($listJeu, 'json'));
        // $response->setContent(json_encode([
        //     $listJeu
        // ]));

        return $response;
    }
}

    