<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_EMAIL', fields: ['email'])]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $firstName = null;

    #[ORM\Column(length: 255)]
    private ?string $lastName = null;

    #[ORM\Column]
    private array $roles = [];

    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $telephone = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $no_voie_user = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $voie_user = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $type_voie_user = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $code_postal_user = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $country = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $commune_user = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $code_departement_user = null;

    #[ORM\Column(nullable: true)]
    private ?bool $is_active = null;

    #[ORM\OneToMany(targetEntity: ParisValeurFonciere::class, mappedBy: 'user')]
    private Collection $parisValeurFoncieres;

    public function __construct()
    {
        $this->parisValeurFoncieres = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): static
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): static
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    public function getRoles(): array
    {
        $roles = $this->roles;
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getNoVoieUser(): ?string
    {
        return $this->no_voie_user;
    }

    public function setNoVoieUser(string $no_voie_user): static
    {
        $this->no_voie_user = $no_voie_user;

        return $this;
    }

    public function getVoieUser(): ?string
    {
        return $this->voie_user;
    }

    public function setVoieUser(string $voie_user): static
    {
        $this->voie_user = $voie_user;

        return $this;
    }

    public function getTypeVoieUser(): ?string
    {
        return $this->type_voie_user;
    }

    public function setTypeVoieUser(string $type_voie_user): static
    {
        $this->type_voie_user = $type_voie_user;

        return $this;
    }

    public function getCodePostalUser(): ?string
    {
        return $this->code_postal_user;
    }

    public function setCodePostalUser(string $code_postal_user): static
    {
        $this->code_postal_user = $code_postal_user;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): static
    {
        $this->country = $country;

        return $this;
    }

    public function getCommuneUser(): ?string
    {
        return $this->commune_user;
    }

    public function setCommuneUser(?string $commune_user): static
    {
        $this->commune_user = $commune_user;

        return $this;
    }

    public function getCodeDepartementUser(): ?string
    {
        return $this->code_departement_user;
    }

    public function setCodeDepartementUser(?string $code_departement_user): static
    {
        $this->code_departement_user = $code_departement_user;

        return $this;
    }

    public function isActive(): ?bool
    {
        return $this->is_active;
    }

    public function setActive(bool $is_active): static
    {
        $this->is_active = $is_active;

        return $this;
    }

    public function getParisValeurFoncieres(): Collection
    {
        return $this->parisValeurFoncieres;
    }

    public function addParisValeurFonciere(ParisValeurFonciere $parisValeurFonciere): static
    {
        if (!$this->parisValeurFoncieres->contains($parisValeurFonciere)) {
            $this->parisValeurFoncieres->add($parisValeurFonciere);
            $parisValeurFonciere->setUser($this);
        }

        return $this;
    }

    public function removeParisValeurFonciere(ParisValeurFonciere $parisValeurFonciere): static
    {
        if ($this->parisValeurFoncieres->removeElement($parisValeurFonciere)) {
            if ($parisValeurFonciere->getUser() === $this) {
                $parisValeurFonciere->setUser(null);
            }
        }

        return $this;
    }
}
