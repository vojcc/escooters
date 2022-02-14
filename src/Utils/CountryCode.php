<?php

declare(strict_types=1);

namespace EScooters\Utils;

class CountryCode
{
    public const NAMES_TO_CODES = [
        "Afghanistan" => "af",
        "Aland Islands" => "ax",
        "Albania" => "al",
        "Algeria" => "dz",
        "American Samoa" => "as",
        "Andorra" => "ad",
        "Angola" => "ao",
        "Anguilla" => "ai",
        "Antarctica" => "aq",
        "Antigua and Barbuda" => "ag",
        "Argentina" => "ar",
        "Armenia" => "am",
        "Aruba" => "aw",
        "Australia" => "au",
        "Austria" => "at",
        "Azerbaijan" => "az",
        "Bahamas" => "bs",
        "Bahrain" => "bh",
        "Bangladesh" => "bd",
        "Barbados" => "bb",
        "Belarus" => "by",
        "Belgium" => "be",
        "Belize" => "bz",
        "Benin" => "bj",
        "Bermuda" => "bm",
        "Bhutan" => "bt",
        "Bolivia" => "bo",
        "Bosnia and Herzegovina" => "ba",
        "Botswana" => "bw",
        "Bouvet Island" => "bv",
        "Brazil" => "br",
        "British Indian Ocean Territory" => "io",
        "Brunei" => "bn",
        "Bulgaria" => "bg",
        "Burkina Faso" => "bf",
        "Burundi" => "bi",
        "Cambodia" => "kh",
        "Cameroon" => "cm",
        "Canada" => "ca",
        "Cape Verde" => "cv",
        "Cayman Islands" => "ky",
        "Central African Republic" => "cf",
        "Chad" => "td",
        "Chile" => "cl",
        "China" => "cn",
        "Christmas Island" => "cx",
        "Cocos (Keeling) Islands" => "cc",
        "Colombia" => "co",
        "Comoros" => "km",
        "Congo" => "cg",
        "Democratic Republic of the Congo" => "cd",
        "Cook Islands" => "ck",
        "Costa Rica" => "cr",
        "Ivory Coast" => "ci",
        "Croatia" => "hr",
        "Cuba" => "cu",
        "Cyprus" => "cy",
        "Czechia" => "cz",
        "Denmark" => "dk",
        "Djibouti" => "dj",
        "Dominica" => "dm",
        "Dominican Republic" => "do",
        "Ecuador" => "ec",
        "Egypt" => "eg",
        "El Salvador" => "sv",
        "Equatorial Guinea" => "gq",
        "Eritrea" => "er",
        "Estonia" => "ee",
        "Ethiopia" => "et",
        "Falkland Islands" => "fk",
        "Faroe Islands" => "fo",
        "Fiji" => "fj",
        "Finland" => "fi",
        "France" => "fr",
        "French Guiana" => "gf",
        "French Polynesia" => "pf",
        "French Southern Territories" => "tf",
        "Gabon" => "ga",
        "Gambia" => "gm",
        "Georgia" => "ge",
        "Germany" => "de",
        "Ghana" => "gh",
        "Gibraltar" => "gi",
        "Greece" => "gr",
        "Greenland" => "gl",
        "Grenada" => "gd",
        "Guadeloupe" => "gp",
        "Guam" => "gu",
        "Guatemala" => "gt",
        "Guernsey" => "gg",
        "Guinea" => "gn",
        "Guinea-Bissau" => "gw",
        "Guyana" => "gy",
        "Haiti" => "ht",
        "Heard Island & Mcdonald Islands" => "hm",
        "HVatican" => "va",
        "Honduras" => "hn",
        "Hong Kong" => "hk",
        "Hungary" => "hu",
        "Iceland" => "is",
        "India" => "in",
        "Indonesia" => "id",
        "Iran" => "ir",
        "Iraq" => "iq",
        "Ireland" => "ie",
        "Isle of Man" => "im",
        "Israel" => "il",
        "Italy" => "it",
        "Jamaica" => "jm",
        "Japan" => "jp",
        "Jersey" => "je",
        "Jordan" => "jo",
        "Kazakhstan" => "kz",
        "Kenya" => "ke",
        "Kiribati" => "ki",
        "South Korea" => "kr",
        "Kuwait" => "kw",
        "Kyrgyzstan" => "kg",
        "Laos" => "la",
        "Latvia" => "lv",
        "Lebanon" => "lb",
        "Lesotho" => "ls",
        "Liberia" => "lr",
        "Libya" => "ly",
        "Liechtenstein" => "li",
        "Lithuania" => "lt",
        "Luxembourg" => "lu",
        "Macao" => "mo",
        "Macedonia" => "mk",
        "Madagascar" => "mg",
        "Malawi" => "mw",
        "Malaysia" => "my",
        "Maldives" => "mv",
        "Mali" => "ml",
        "Malta" => "mt",
        "Marshall Islands" => "mh",
        "Martinique" => "mq",
        "Mauritania" => "mr",
        "Mauritius" => "mu",
        "Mayotte" => "yt",
        "Mexico" => "mx",
        "Micronesia" => "fm",
        "Moldova" => "md",
        "Monaco" => "mc",
        "Mongolia" => "mn",
        "Montenegro" => "me",
        "Montserrat" => "ms",
        "Morocco" => "ma",
        "Mozambique" => "mz",
        "Myanmar" => "mm",
        "Namibia" => "na",
        "Nauru" => "nr",
        "Nepal" => "np",
        "Netherlands Antilles" => "an",
        "Netherlands" => "nl",
        "New Caledonia" => "nc",
        "New Zealand" => "nz",
        "Nicaragua" => "ni",
        "Niger" => "ne",
        "Nigeria" => "ng",
        "Niue" => "nu",
        "Norfolk Island" => "nf",
        "Northern Mariana Islands" => "mp",
        "Norway" => "no",
        "Oman" => "om",
        "Pakistan" => "pk",
        "Palau" => "pw",
        "Palestinian Territory" => "ps",
        "Panama" => "pa",
        "Papua New Guinea" => "pg",
        "Paraguay" => "py",
        "Peru" => "pe",
        "Philippines" => "ph",
        "Pitcairn" => "pn",
        "Poland" => "pl",
        "Portugal" => "pt",
        "Puerto Rico" => "pr",
        "Qatar" => "qa",
        "Reunion" => "re",
        "Romania" => "ro",
        "Russia" => "ru",
        "Rwanda" => "rw",
        "Saint Barthelemy" => "bl",
        "Saint Helena" => "sh",
        "Saint Kitts and Nevis" => "kn",
        "Saint Lucia" => "lc",
        "Saint Martin" => "mf",
        "Saint Pierre and Miquelon" => "pm",
        "Saint Vincent and Grenadines" => "vc",
        "Samoa" => "ws",
        "San Marino" => "sm",
        "Sao Tome and Principe" => "st",
        "Saudi Arabia" => "sa",
        "Senegal" => "sn",
        "Serbia" => "rs",
        "Seychelles" => "sc",
        "Sierra Leone" => "sl",
        "Singapore" => "sg",
        "Slovakia" => "sk",
        "Slovenia" => "si",
        "Solomon Islands" => "sb",
        "Somalia" => "so",
        "South Africa" => "za",
        "South Georgia and the Sandwich Islands" => "gs",
        "Spain" => "es",
        "Sri Lanka" => "lk",
        "Sudan" => "sd",
        "Suriname" => "sr",
        "Svalbard and Jan Mayen" => "sj",
        "Eswatini" => "sz",
        "Sweden" => "se",
        "Switzerland" => "ch",
        "Syria" => "sy",
        "Taiwan" => "tw",
        "Tajikistan" => "tj",
        "Tanzania" => "tz",
        "Thailand" => "th",
        "East Timor" => "tl",
        "Togo" => "tg",
        "Tokelau" => "tk",
        "Tonga" => "to",
        "Trinidad and Tobago" => "tt",
        "Tunisia" => "tn",
        "Turkey" => "tr",
        "Turkmenistan" => "tm",
        "Turks and Caicos" => "tc",
        "Tuvalu" => "tv",
        "Uganda" => "ug",
        "Ukraine" => "ua",
        "United Arab Emirates" => "ae",
        "United Kingdom" => "gb",
        "United States Outlying Islands" => "um",
        "United States" => "us",
        "Uruguay" => "uy",
        "Uzbekistan" => "uz",
        "Vanuatu" => "vu",
        "Venezuela" => "ve",
        "Vietnam" => "vn",
        "British Virgin Islands" => "vg",
        "United States Virgin Islands" => "vi",
        "Wallis and Futuna" => "wf",
        "Western Sahara" => "eh",
        "Yemen" => "ye",
        "Zambia" => "zm",
        "Zimbabwe" => "zw",
    ];
}
