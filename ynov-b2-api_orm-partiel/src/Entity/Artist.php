<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use Symfony\Component\Serializer\Annotation\Groups;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 * normalizationContext={"groups"={"artist_read"}}
 * )
 * @ApiFilter(SearchFilter::class, properties={"id": "exact", "name": "ipartial"})
 * @ORM\Entity(repositoryClass="App\Repository\ArtistRepository")
 */
class Artist
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups("artist_read")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"album_read", "artist_read"})
     */
    private $name;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $startYear;

    /**
     * @ORM\Column(type="date", nullable=true)
     * @Groups("artist_read")
     */
    private $created;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Style", mappedBy="artists")
     * @Groups("artist_read")
     */
    private $styles;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Album", inversedBy="artist")
     */
    private $albums;

    public function __construct()
    {
        $this->styles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getStartYear(): ?int
    {
        return $this->startYear;
    }

    public function setStartYear(?int $startYear): self
    {
        $this->startYear = $startYear;

        return $this;
    }

    public function getCreated(): ?\DateTimeInterface
    {
        return $this->created;
    }

    public function setCreated(?\DateTimeInterface $created): self
    {
        $this->created = $created;

        return $this;
    }

    /**
     * @return Collection|Style[]
     */
    public function getStyles(): Collection
    {
        return $this->styles;
    }

    public function addStyle(Style $style): self
    {
        if (!$this->styles->contains($style)) {
            $this->styles[] = $style;
            $style->addArtist($this);
        }

        return $this;
    }

    public function removeStyle(Style $style): self
    {
        if ($this->styles->contains($style)) {
            $this->styles->removeElement($style);
            $style->removeArtist($this);
        }

        return $this;
    }

    public function getAlbums(): ?Album
    {
        return $this->albums;
    }

    public function setAlbums(?Album $albums): self
    {
        $this->albums = $albums;

        return $this;
    }
}
