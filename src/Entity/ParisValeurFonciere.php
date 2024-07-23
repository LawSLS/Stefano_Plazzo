<?php

namespace App\Entity;

use App\Repository\ParisValeurFonciereRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ParisValeurFonciereRepository::class)]
class ParisValeurFonciere
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nature_mutation = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $no_voie = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $b_t_q = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $type_voie = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $code_voie = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $voie = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $code_postal = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $commune = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $section = null;

    #[ORM\Column(nullable: true)]
    private ?int $nb_lots = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $code_type_local = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $surface_reelle_bati = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nb_pieces = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $surface_terrain = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $d_p_e = null;

    #[ORM\Column(nullable: true)]
    private ?float $prix_vente = null;

    #[ORM\Column(type: Types::JSON, nullable: true)]
    private ?array $images = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_creation_annonce = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_desactivation_annonce = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $date_mutation = null;

    #[ORM\ManyToOne(inversedBy: 'parisValeurFoncieres')]
    #[ORM\JoinColumn(nullable: true)]
    private ?User $user = null;

    #[ORM\Column(nullable: true)]
    private ?float $valeur_fonciere = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $code_departement = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $code_commune = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $type_local = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNatureMutation(): ?string
    {
        return $this->nature_mutation;
    }

    public function setNatureMutation(?string $nature_mutation): static
    {
        $this->nature_mutation = $nature_mutation;

        return $this;
    }

    public function getNoVoie(): ?string
    {
        return $this->no_voie;
    }

    public function setNoVoie(string $no_voie): static
    {
        $this->no_voie = $no_voie;

        return $this;
    }

    public function getBTQ(): ?string
    {
        return $this->b_t_q;
    }

    public function setBTQ(?string $b_t_q): static
    {
        $this->b_t_q = $b_t_q;

        return $this;
    }

    public function getTypeVoie(): ?string
    {
        return $this->type_voie;
    }

    public function setTypeVoie(string $type_voie): static
    {
        $this->type_voie = $type_voie;

        return $this;
    }

    public function getCodeVoie(): ?string
    {
        return $this->code_voie;
    }

    public function setCodeVoie(string $code_voie): static
    {
        $this->code_voie = $code_voie;

        return $this;
    }

    public function getVoie(): ?string
    {
        return $this->voie;
    }

    public function setVoie(string $voie): static
    {
        $this->voie = $voie;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->code_postal;
    }

    public function setCodePostal(string $code_postal): static
    {
        $this->code_postal = $code_postal;

        return $this;
    }

    public function getCommune(): ?string
    {
        return $this->commune;
    }

    public function setCommune(string $commune): static
    {
        $this->commune = $commune;

        return $this;
    }

    public function getSection(): ?string
    {
        return $this->section;
    }

    public function setSection(string $section): static
    {
        $this->section = $section;

        return $this;
    }

    public function getNbLots(): ?int
    {
        return $this->nb_lots;
    }

    public function setNbLots(int $nb_lots): static
    {
        $this->nb_lots = $nb_lots;

        return $this;
    }

    public function getCodeTypeLocal(): ?string
    {
        return $this->code_type_local;
    }

    public function setCodeTypeLocal(string $code_type_local): static
    {
        $this->code_type_local = $code_type_local;

        return $this;
    }

    public function getSurfaceReelleBati(): ?string
    {
        return $this->surface_reelle_bati;
    }

    public function setSurfaceReelleBati(string $surface_reelle_bati): static
    {
        $this->surface_reelle_bati = $surface_reelle_bati;

        return $this;
    }

    public function getNbPieces(): ?string
    {
        return $this->nb_pieces;
    }

    public function setNbPieces(string $nb_pieces): static
    {
        $this->nb_pieces = $nb_pieces;

        return $this;
    }

    public function getSurfaceTerrain(): ?string
    {
        return $this->surface_terrain;
    }

    public function setSurfaceTerrain(?string $surface_terrain): static
    {
        $this->surface_terrain = $surface_terrain;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getDPE(): ?string
    {
        return $this->d_p_e;
    }

    public function setDPE(?string $d_p_e): static
    {
        $this->d_p_e = $d_p_e;

        return $this;
    }

    public function getPrixVente(): ?float
    {
        return $this->prix_vente;
    }

    public function setPrixVente(float $prix_vente): static
    {
        $this->prix_vente = $prix_vente;

        return $this;
    }

    public function getImages(): ?array
    {
        return $this->images;
    }

    public function setImages(?array $images): static
    {
        $this->images = $images;

        return $this;
    }

    public function getDateCreationAnnonce(): ?\DateTimeInterface
    {
        return $this->date_creation_annonce;
    }

    public function setDateCreationAnnonce(\DateTimeInterface $date_creation_annonce): static
    {
        $this->date_creation_annonce = $date_creation_annonce;

        return $this;
    }

    public function getDateDesactivationAnnonce(): ?\DateTimeInterface
    {
        return $this->date_desactivation_annonce;
    }

    public function setDateDesactivationAnnonce(?\DateTimeInterface $date_desactivation_annonce): static
    {
        $this->date_desactivation_annonce = $date_desactivation_annonce;

        return $this;
    }

    public function getDateMutation(): ?string
    {
        return $this->date_mutation;
    }

    public function setDateMutation(?string $date_mutation): static
    {
        $this->date_mutation = $date_mutation;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getValeurFonciere(): ?float
    {
        return $this->valeur_fonciere;
    }

    public function setValeurFonciere(?float $valeur_fonciere): static
    {
        $this->valeur_fonciere = $valeur_fonciere;

        return $this;
    }

    public function getCodeDepartement(): ?string
    {
        return $this->code_departement;
    }

    public function setCodeDepartement(?string $code_departement): static
    {
        $this->code_departement = $code_departement;

        return $this;
    }

    public function getCodeCommune(): ?string
    {
        return $this->code_commune;
    }

    public function setCodeCommune(?string $code_commune): static
    {
        $this->code_commune = $code_commune;

        return $this;
    }

    public function getTypeLocal(): ?string
    {
        return $this->type_local;
    }

    public function setTypeLocal(?string $type_local): static
    {
        $this->type_local = $type_local;

        return $this;
    }
}
