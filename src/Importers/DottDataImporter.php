<?php

declare(strict_types=1);

namespace EScooters\Importers;

use Symfony\Component\DomCrawler\Crawler;
use EScooters\Importers\DataSources\HtmlDataSource;

class DottDataImporter extends DataImporter implements HtmlDataSource
{
    protected array $markers = [];
    protected Crawler $sections;

    public function getBackground(): string
    {
        return "#F5C604";
    }

    public function extract(): static
    {
        $html = file_get_contents("https://ridedott.com/ride-with-us/london/");

        $crawler = new Crawler($html);
        $this->sections = $crawler->filter("li.p-small.mb-1");

        return $this;
    }

    public function transform(): static
    {
        foreach ($this->sections as $section)
        {
            $cityName = trim($section->nodeValue);
            $countryName = trim($section->parentNode->previousSibling->previousSibling->nodeValue);

            $country = $this->countries->retrieve($countryName);
            $city = $this->cities->retrieve($cityName, $country);
            $this->provider->addCity($city);

        }

        return $this;
    }

}