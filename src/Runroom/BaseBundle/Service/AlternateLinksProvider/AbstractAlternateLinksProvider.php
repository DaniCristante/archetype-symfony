<?php

namespace Runroom\BaseBundle\Service\AlternateLinksProvider;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Routing\RouterInterface;

abstract class AbstractAlternateLinksProvider implements AlternateLinksProviderInterface
{
    protected static $routes = [];
    protected $router;
    protected $requestStack;
    protected $locales;

    public function __construct(RouterInterface $router, RequestStack $requestStack, array $locales)
    {
        $this->router = $router;
        $this->requestStack = $requestStack;
        $this->locales = $locales;
    }

    public function providesAlternateLinks(string $route): bool
    {
        return in_array($route, static::$routes);
    }

    public function findAlternateLinksFor(string $route, $model): array
    {
        $alternateLinks = [];

        try {
            foreach ($this->locales as $locale) {
                $alternateLinks[$locale] = $this->router->generate(
                    $route . '.' . $locale,
                    array_merge(
                        $this->getRouteParameters($model, $locale),
                        $this->getQueryParameters()
                    ),
                    RouterInterface::ABSOLUTE_URL
                );
            }
        } catch (\Exception $e) {
        }

        return $alternateLinks;
    }

    abstract public function getRouteParameters($model, string $locale): array;

    private function getQueryParameters(): array
    {
        return $this->requestStack->getCurrentRequest()->query->all();
    }
}
