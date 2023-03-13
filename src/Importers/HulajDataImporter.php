<?php

declare(strict_types=1);

namespace EScooters\Importers;

use DOMElement;
use EScooters\Importers\DataSources\HtmlDataSource;
use Symfony\Component\DomCrawler\Crawler;

class HulajDataImporter extends DataImporter implements HtmlDataSource
{
    protected const FIXED_COUNTRY = "Poland";

    protected Crawler $sections;

    public function getBackground(): string
    {
        return "#AD364A";
    }

    public function extract(): static
    {
        $html = file_get_contents("https://hulaj.eu/miasta/");

        $crawler = new Crawler($html);
        $this->sections = $crawler->filter(".wp-block-media-text > .wp-block-media-text__content > h2");

        return $this;
    }

    public function transform(): static
    {
        $country = $this->countries->retrieve(static::FIXED_COUNTRY);

        /** @var DOMElement $section */
        foreach ($this->sections as $section) {
            if (!str_contains($section->nodeValue, "przerwa")) {
                $city = $this->cities->retrieve($section->nodeValue, $country);
                $this->provider->addCity($city);
            }
        }

        return $this;
    }
}