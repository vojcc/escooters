<?php

declare(strict_types=1);

namespace EScooters\Importers;

use DOMElement;
use EScooters\Importers\DataSources\HtmlDataSource;
use Symfony\Component\DomCrawler\Crawler;

class BitMobilityDataImporter extends DataImporter implements HtmlDataSource
{
    protected const FIXED_COUNTRY = "Italy";
    protected Crawler $sections;

    public function getBackground(): string
    {
        return "#5D81D7";
    }

    public function extract(): static
    {
        $html = file_get_contents("https://bitmobility.it/dove-siamo/");

        $crawler = new Crawler($html);
        $this->sections = $crawler->filter(".wpb_content_element > .wpb_wrapper > p > a");

        return $this;
    }

    public function transform(): static
    {
        $country = $this->countries->retrieve(static::FIXED_COUNTRY);

        /** @var DOMElement $section */
        foreach ($this->sections as $section) {
            $normalizedCityName = ucwords(strtolower($section->nodeValue));

            $city = $this->cities->retrieve($normalizedCityName, $country);
            $this->provider->addCity($city);
        }

        return $this;
    }
}