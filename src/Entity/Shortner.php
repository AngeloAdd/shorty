<?php

namespace App\Entity;

use App\Repository\ShortnerRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ShortnerRepository::class)
 */
class Shortner
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $url;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $shorty_url;

    /**
     * @ORM\Column(type="boolean")
     */
    private $valid;

    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('url', new Assert\Url([
            'protocols' => ['http', 'https', 'ftp'],
            'message' => "L'url {{ value }} non è valido"
        ]));
        $metadata->addPropertyConstraint('url', new Assert\NotBlank([
            'message' => "L'url {{ value }} non è valido"
        ]));
        $metadata->addPropertyConstraint('url', new Assert\NotNull([
            'message' => "L'url {{ value }} non è valido"
        ]));
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getShortyUrl(): ?string
    {
        return $this->shorty_url;
    }

    public function setShortyUrl(string $shorty_url): self
    {
        $this->shorty_url = $shorty_url;

        return $this;
    }

    public function getValid(): ?bool
    {
        return $this->valid;
    }

    public function setValid(bool $valid): self
    {
        $this->valid = $valid;

        return $this;
    }
}
