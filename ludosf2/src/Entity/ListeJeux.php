<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ListeJeuxRepository")
 */
class ListeJeux
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=54)
     */
    private $CodeJeu;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $NomJeu;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Suspendu;

    /**
     * @ORM\Column(type="string", length=55, nullable=true)
     */
    private $DateAchat;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Emplacement;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Marque;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Annee_Edition;

    /**
     * @ORM\Column(type="string", length=55, nullable=true)
     */
    private $NbJoueurs;

    /**
     * @ORM\Column(type="string", length=55, nullable=true)
     */
    private $AgeJoueurs;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Manque;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $TypeJeu;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $NbPieces;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $TempsJeu;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $EtatJeu;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Descriptif1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Descriptif2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Descriptif3;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $LienImg;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Commentaire;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $NbPoints;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $NiveauJeu;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Classification;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $PrixEstimÈ;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Auteur;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Illustrateur;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $SurPlace;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Contenu1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Contenu2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $hlx;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeJeu(): ?string
    {
        return $this->CodeJeu;
    }

    public function setCodeJeu(string $CodeJeu): self
    {
        $this->CodeJeu = $CodeJeu;

        return $this;
    }

    public function getNomJeu(): ?string
    {
        return $this->NomJeu;
    }

    public function setNomJeu(string $NomJeu): self
    {
        $this->NomJeu = $NomJeu;

        return $this;
    }

    public function getSuspendu(): ?string
    {
        return $this->Suspendu;
    }

    public function setSuspendu(string $Suspendu): self
    {
        $this->Suspendu = $Suspendu;

        return $this;
    }

    public function getDateAchat(): ?string
    {
        return $this->DateAchat;
    }

    public function setDateAchat(?string $DateAchat): self
    {
        $this->DateAchat = $DateAchat;

        return $this;
    }

    public function getEmplacement(): ?string
    {
        return $this->Emplacement;
    }

    public function setEmplacement(?string $Emplacement): self
    {
        $this->Emplacement = $Emplacement;

        return $this;
    }

    public function getMarque(): ?string
    {
        return $this->Marque;
    }

    public function setMarque(?string $Marque): self
    {
        $this->Marque = $Marque;

        return $this;
    }

    public function getAnneeEdition(): ?string
    {
        return $this->Annee_Edition;
    }

    public function setAnneeEdition(?string $Annee_Edition): self
    {
        $this->Annee_Edition = $Annee_Edition;

        return $this;
    }

    public function getNbJoueurs(): ?string
    {
        return $this->NbJoueurs;
    }

    public function setNbJoueurs(?string $NbJoueurs): self
    {
        $this->NbJoueurs = $NbJoueurs;

        return $this;
    }

    public function getAgeJoueurs(): ?string
    {
        return $this->AgeJoueurs;
    }

    public function setAgeJoueurs(?string $AgeJoueurs): self
    {
        $this->AgeJoueurs = $AgeJoueurs;

        return $this;
    }

    public function getManque(): ?string
    {
        return $this->Manque;
    }

    public function setManque(?string $Manque): self
    {
        $this->Manque = $Manque;

        return $this;
    }

    public function getTypeJeu(): ?string
    {
        return $this->TypeJeu;
    }

    public function setTypeJeu(?string $TypeJeu): self
    {
        $this->TypeJeu = $TypeJeu;

        return $this;
    }

    public function getNbPieces(): ?string
    {
        return $this->NbPieces;
    }

    public function setNbPieces(?string $NbPieces): self
    {
        $this->NbPieces = $NbPieces;

        return $this;
    }

    public function getTempsJeu(): ?string
    {
        return $this->TempsJeu;
    }

    public function setTempsJeu(?string $TempsJeu): self
    {
        $this->TempsJeu = $TempsJeu;

        return $this;
    }

    public function getEtatJeu(): ?string
    {
        return $this->EtatJeu;
    }

    public function setEtatJeu(?string $EtatJeu): self
    {
        $this->EtatJeu = $EtatJeu;

        return $this;
    }

    public function getDescriptif1(): ?string
    {
        return $this->Descriptif1;
    }

    public function setDescriptif1(?string $Descriptif1): self
    {
        $this->Descriptif1 = $Descriptif1;

        return $this;
    }

    public function getDescriptif2(): ?string
    {
        return $this->Descriptif2;
    }

    public function setDescriptif2(?string $Descriptif2): self
    {
        $this->Descriptif2 = $Descriptif2;

        return $this;
    }

    public function getDescriptif3(): ?string
    {
        return $this->Descriptif3;
    }

    public function setDescriptif3(?string $Descriptif3): self
    {
        $this->Descriptif3 = $Descriptif3;

        return $this;
    }

    public function getLienImg(): ?string
    {
        return $this->LienImg;
    }

    public function setLienImg(?string $LienImg): self
    {
        $this->LienImg = $LienImg;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->Commentaire;
    }

    public function setCommentaire(?string $Commentaire): self
    {
        $this->Commentaire = $Commentaire;

        return $this;
    }

    public function getNbPoints(): ?string
    {
        return $this->NbPoints;
    }

    public function setNbPoints(?string $NbPoints): self
    {
        $this->NbPoints = $NbPoints;

        return $this;
    }

    public function getNiveauJeu(): ?string
    {
        return $this->NiveauJeu;
    }

    public function setNiveauJeu(?string $NiveauJeu): self
    {
        $this->NiveauJeu = $NiveauJeu;

        return $this;
    }

    public function getClassification(): ?string
    {
        return $this->Classification;
    }

    public function setClassification(?string $Classification): self
    {
        $this->Classification = $Classification;

        return $this;
    }

    public function getPrixEstimÈ(): ?string
    {
        return $this->PrixEstimÈ;
    }

    public function setPrixEstimÈ(?string $PrixEstimÈ): self
    {
        $this->PrixEstimÈ = $PrixEstimÈ;

        return $this;
    }

    public function getAuteur(): ?string
    {
        return $this->Auteur;
    }

    public function setAuteur(?string $Auteur): self
    {
        $this->Auteur = $Auteur;

        return $this;
    }

    public function getIllustrateur(): ?string
    {
        return $this->Illustrateur;
    }

    public function setIllustrateur(?string $Illustrateur): self
    {
        $this->Illustrateur = $Illustrateur;

        return $this;
    }

    public function getSurPlace(): ?string
    {
        return $this->SurPlace;
    }

    public function setSurPlace(?string $SurPlace): self
    {
        $this->SurPlace = $SurPlace;

        return $this;
    }

    public function getContenu1(): ?string
    {
        return $this->Contenu1;
    }

    public function setContenu1(?string $Contenu1): self
    {
        $this->Contenu1 = $Contenu1;

        return $this;
    }

    public function getContenu2(): ?string
    {
        return $this->Contenu2;
    }

    public function setContenu2(?string $Contenu2): self
    {
        $this->Contenu2 = $Contenu2;

        return $this;
    }

    public function getHlx(): ?string
    {
        return $this->hlx;
    }

    public function setHlx(?string $hlx): self
    {
        $this->hlx = $hlx;

        return $this;
    }
}
