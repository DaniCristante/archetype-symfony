<?php

namespace Runroom\StaticPageBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Contract\Entity\TranslatableInterface;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;
use Runroom\SeoBundle\Behaviors\MetaInformationAware;
use Runroom\StaticPageBundle\Repository\StaticPageRepository;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=StaticPageRepository::class)
 * @ORM\Table(indexes={
 *     @ORM\Index(columns={"publish"}),
 * })
 */
class StaticPage implements TranslatableInterface
{
    use ORMBehaviors\Translatable\TranslatableTrait;
    use MetaInformationAware;

    public const LOCATION_NONE = 'none';
    public const LOCATION_FOOTER = 'footer';

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @Assert\Choice(choices = {
     *     StaticPage::LOCATION_NONE,
     *     StaticPage::LOCATION_FOOTER,
     * })
     * @ORM\Column(type="string")
     */
    protected $location = self::LOCATION_NONE;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $publish;

    public function __toString(): string
    {
        return (string) $this->getTitle();
    }

    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setLocation(?string $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setPublish(?bool $publish): self
    {
        $this->publish = $publish;

        return $this;
    }

    public function getPublish(): ?bool
    {
        return $this->publish;
    }

    public function getTitle(string $locale = null): ?string
    {
        return $this->translate($locale, false)->getTitle();
    }

    public function getSlug(string $locale = null): ?string
    {
        return $this->translate($locale, false)->getSlug();
    }

    public function getContent(string $locale = null): ?string
    {
        return $this->translate($locale, false)->getContent();
    }
}
