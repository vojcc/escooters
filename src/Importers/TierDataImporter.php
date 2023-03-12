<?php

declare(strict_types=1);

namespace EScooters\Importers;

use DOMElement;
use EScooters\Exceptions\CityNotAssignedToAnyCountryException;
use EScooters\Importers\DataSources\HtmlDataSource;
use EScooters\Utils\HardcodedCitiesToCountriesAssigner;
use Symfony\Component\DomCrawler\Crawler;

class TierDataImporter extends DataImporter implements HtmlDataSource
{
    protected Crawler $sections;

    public function getBackground(): string
    {
        return "#0E1A50";
    }

    public function extract(): static
    {
        $html = file_get_contents("https://www.tier.app/en/where-to-find-us");
        $crawler = new Crawler($html);
        $this->sections = $crawler->filter("div.mx-auto > section > li > div");

        return $this;
    }

    public function transform(): static
    {
        /** @var DOMElement $section */
        foreach ($this->sections as $section) {
            $country = null;

            foreach ($section->childNodes as $div) {
                foreach ($div->childNodes as $node) {
                    if ($node->nodeName === "#text") {
                        $countryName = preg_replace('/\d+$/', '', $node->nodeValue);
                    }

                    elseif ($node->nodeName === "div")  {
                        $value = trim($node->nodeValue);
                        if ($value) {
                            $country = $this->countries->retrieve($countryName);
                            $city = $this->cities->retrieve($value, $country);
                            $this->provider->addCity($city);
                        }
                    }
                }
            }
        }

        return $this;
    }
}
