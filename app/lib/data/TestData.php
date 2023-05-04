<?php

namespace lib\data;

use JetBrains\PhpStorm\ArrayShape;

class TestData
{
    public const FIRST_NAME = [
        'Alice',
        'Andrew',
        'Ava',
        'Austin',
        'Amelia',
        'Aaron',
        'Abigail',
        'Adam',
        'Adrian',
        'Alex',
        'Brooke',
        'Benjamin',
        'Bailey',
        'Brandon',
        'Brianna',
        'Brian',
        'Bella',
        'Brendan',
        'Bryan',
        'Beth',
        'Cameron',
        'Christopher',
        'Caroline',
        'Caleb',
        'Chloe',
        'Caitlyn',
        'Colton',
        'Catherine',
        'Connor',
        'Charlotte',
        'Daniel',
        'David',
        'Dylan',
        'Destiny',
        'Derek',
        'Dalton',
        'Dominic',
        'Diana',
        'Dustin',
        'Daisy',
        'Elizabeth',
        'Ethan',
        'Emily',
        'Elijah',
        'Emma',
        'Ella',
        'Eric',
        'Erin',
        'Evan',
        'Edward',
        'Faith',
        'Frank',
        'Fiona',
        'Finn',
        'Felicity',
        'Fernando',
        'Francesca',
        'Fred',
        'Freya',
        'Flora',
        'Gabriel',
        'Grace',
        'George',
        'Giselle',
        'Gianna',
        'Gavin',
        'Genevieve',
        'Grant',
        'Gwendolyn',
        'Graham',
        'Haley',
        'Henry',
        'Hannah',
        'Hayden',
        'Heidi',
        'Harold',
        'Hazel',
        'Hope',
        'Hunter',
        'Harrison',
        'Isabella',
        'Isaac',
        'Isabelle',
        'Ivan',
        'Ivy',
        'Ian',
        'Iris',
        'Isaiah',
        'Isla',
        'Irene',
        'Jacob',
        'Jonathan',
        'Jessica',
        'Jordan',
        'Julia',
        'Jackson',
        'Jasmine',
        'Joshua',
        'Jayden',
        'Jenna',
        'John',
        'Kaitlyn',
        'Kevin',
        'Katherine',
        'Kyle',
        'Kayla',
        'Kenneth',
        'Kimberly',
        'Kaleb',
        'Kiera',
        'Kai',
        'Landon',
        'Lila',
        'Liam',
        'Leah',
        'Lucas',
        'Lily',
        'Logan',
        'Lauren',
        'Luke',
        'Lena',
        'Mia',
        'Matthew',
        'Madison',
        'Michael',
        'Makayla',
        'Mason',
        'Maria',
        'Miles',
        'Megan',
        'Max',
        'Natalie',
        'Nathan',
        'Nora',
        'Nicholas',
        'Naomi',
        'Noah',
        'Nina',
        'Nolan',
        'Nadia',
        'Nate',
        'Olivia',
        'Owen',
        'Oliver',
        'Ophelia',
        'Oscar',
        'Odessa',
        'Octavia',
        'Otis',
        'Orlando',
        'Olive',
        'Paige',
        'Peter',
        'Penelope',
        'Paul',
        'Peyton',
        'Parker',
        'Phoebe',
        'Patrick',
        'Piper',
        'Porter',
        'Quinn',
        'Quincy',
        'Queenie',
        'Quentin',
        'Quiana',
        'Qiana',
        'Qadir',
        'Qasim',
        'Qiao',
        'Qiana',
        'Riley',
        'Ryan',
        'Rebecca',
        'Robert',
        'Riley',
        'Richard',
        'Rachel',
        'Rose',
        'Ronald',
        'Ryder',
        'Sophia',
        'Samuel',
        'Samantha',
        'Sebastian',
        'Scarlett',
        'Seth',
        'Sienna',
        'Skyler',
        'Stella',
        'Stephen',
        'Theodore',
        'Trinity',
        'Thomas',
        'Trevor',
        'Taylor',
        'Tucker',
        'Tessa',
        'Tyler',
        'Tiana',
        'Tabitha',
        'Uma',
        'Uriah',
        'Ulrich',
        'Ulysses',
        'Una',
        'Ugo',
        'Umberto',
        'Ursula',
        'Ula',
        'Unity',
        'Victoria',
        'Vincent',
        'Valerie',
        'Vanessa',
        'Violet',
        'Vance',
        'Vivienne',
        'Victor',
        'Vera',
        'Veronica',
        'William',
        'Wyatt',
        'Wesley',
        'Willow',
        'Walter',
        'Wren',
        'Wendy',
        'Wayne',
        'Wilson',
        'Wendell',
        'Xander',
        'Ximena',
        'Xiomara',
        'Xzavier',
        'Xandra',
        'Xenon',
        'Xenia',
        'Xavion',
        'Xaviera',
        'Xena',
        'Yasmine',
        'Yusuf',
        'Yvette',
        'Yvonne',
        'Yara',
        'Yosef',
        'Yahir',
        'Yamila',
        'Yelena',
        'Yoko',
        'Zachary',
        'Zoe',
        'Zachariah',
        'Zara',
        'Zander',
        'Zion',
        'Zara',
        'Zoey',
        'Zeke',
        'Zelda',
    ];

    public const LAST_NAME = [
        'Adams',
        'Anderson',
        'Allen',
        'Armstrong',
        'Avery',
        'Austin',
        'Aguilar',
        'Alvarez',
        'Abraham',
        'Arnold',
        'Ali',
        'Aziz',
        'Brown',
        'Baker',
        'Bennett',
        'Brooks',
        'Bryant',
        'Barnes',
        'Baldwin',
        'Ballard',
        'Black',
        'Blake',
        'Berg',
        'Bianchi',
        'Clark',
        'Carter',
        'Cook',
        'Cox',
        'Collins',
        'Campbell',
        'Cameron',
        'Cruz',
        'Chapman',
        'Cohen',
        'Cobb',
        'Castro',
        'Davis',
        'Diaz',
        'Dixon',
        'Duncan',
        'Dunn',
        'Daniels',
        'Douglas',
        'Davenport',
        'Duke',
        'Dalton',
        'Dang',
        'Dong',
        'Edwards',
        'Evans',
        'Ellis',
        'Elliott',
        'Erickson',
        'Espinoza',
        'Estrada',
        'Ewing',
        'Eaton',
        'Eze',
        'Ekpo',
        'El-Sayed',
        'Fisher',
        'Ford',
        'Foster',
        'Freeman',
        'Ferguson',
        'Francis',
        'Frazier',
        'Fleming',
        'Flynn',
        'Fletcher',
        'Ferrari',
        'Fuentes',
        'Garcia',
        'Green',
        'Gonzalez',
        'Gray',
        'Gomez',
        'Gutierrez',
        'Grant',
        'Griffith',
        'Glover',
        'Goodman',
        'Gibson',
        'Gao',
        'Harris',
        'Hall',
        'Hernandez',
        'Hill',
        'Howard',
        'Hamilton',
        'Hayes',
        'Hunt',
        'Harvey',
        'Horton',
        'Ho',
        'Hussain',
        'Jackson',
        'Johnson',
        'Jones',
        'Jordan',
        'James',
        'Jefferson',
        'Jennings',
        'Jimenez',
        'Jiang',
        'Joseph',
        'Jansen',
        'Jacobs',
        'King',
        'Kelly',
        'Kim',
        'Knight',
        'Kennedy',
        'Keller',
        'Kumar',
        'Klein',
        'Kaur',
        'Kuo',
        'Kang',
        'Kumar',
        'Lee',
        'Lewis',
        'Lopez',
        'Long',
        'Lucas',
        'Lane',
        'Lawrence',
        'Luna',
        'Larson',
        'Liu',
        'Lin',
        'Lam',
        'Miller',
        'Martin',
        'Moore',
        'Mitchell',
        'Murphy',
        'Morgan',
        'Matthews',
        'Marshall',
        'Mendoza',
        'Murray',
        'Mehta',
        'Mao',
        'Nelson',
        'Nguyen',
        'Nash',
        'Newman',
        'Newton',
        'Nichols',
        'Nunez',
        'Nolan',
        'Naim',
        'Noel',
        'Nakamura',
        'Nair',
        'Olson',
        'Ortega',
        'Owen',
        'Ochoa',
        'Owens',
        'O\'Brien',
        'Osborne',
        'O\'Neill',
        'Omar',
        'Ong',
        'Obi',
        'Okoro',
        'Parker',
        'Perez',
        'Phillips',
        'Powell',
        'Price',
        'Porter',
        'Patterson',
        'Padilla',
        'Perkins',
        'Pace',
        'Peng',
        'Pereira',
        'Quinn',
        'Quick',
        'Quintana',
        'Queen',
        'Quigley',
        'Quackenbush',
        'Quattlebaum',
        'Quan',
        'Quintero',
        'Qureshi',
        'Quintal',
        'Qin',
        'Reed',
        'Robinson',
        'Ross',
        'Ramirez',
        'Reyes',
        'Richards',
        'Robertson',
        'Rogers',
        'Riley',
        'Rice',
        'Rose',
        'Ramos',
        'Smith',
        'Scott',
        'Stewart',
        'Sanchez',
        'Sullivan',
        'Simpson',
        'Sanders',
        'Schmidt',
        'Sharp',
        'Stone',
        'Soto',
        'Sandoval',
        'Thompson',
        'Taylor',
        'Thomas',
        'Torres',
        'Turner',
        'Tucker',
        'Terry',
        'Tran',
        'Tate',
        'Tyler',
        'Trevino',
        'Tang',
        'Underwood',
        'Upton',
        'Uribe',
        'Ullah',
        'Unger',
        'Upchurch',
        'Ulloa',
        'Urquhart',
        'Uddin',
        'Umana',
        'Umana',
        'Udoh',
        'Valdez',
        'Vargas',
        'Vasquez',
        'Vega',
        'Villarreal',
        'Vaughn',
        'Vincent',
        'Velez',
        'Vann',
        'Vuong',
        'Vickers',
        'Vineyard',
        'Williams',
        'Wilson',
        'Walker',
        'White',
        'Wright',
        'Wood',
        'Watson',
        'Ward',
        'Wells',
        'West',
        'Washington',
        'Wu',
        'Xiong',
        'Xiao',
        'Xu',
        'Xie',
        'Xu',
        'Xiao',
        'Xiong',
        'Xavier',
        'Xin',
        'Xiang',
        'Xu',
        'Xiong',
        'Young',
        'Yang',
        'Yoder',
        'Yates',
        'Yanez',
        'Yi',
        'Yoon',
        'Ybarra',
        'Yeager',
        'Yu',
        'Yoder',
        'Yin',
        'Zimmerman',
        'Zimmer',
        'Zhang',
        'Zavala',
        'Zamora',
        'Zambrano',
        'Ziegler',
        'Zamudio',
        'Zhang',
        'Zeng',
        'Zamudio',
        'Zelaya',
    ];

    public const EMAIL_DOMAINS = [
        0 => 'gmail.com',
        1 => 'outlook.com',
        2 => 'yahoo.com',
        3 => 'icloud.com',
        4 => 'aol.com',
        5 => 'hotmail.com',
        6 => 'protonmail.com',
        7 => 'live.com',
    ];

    public const FAKE_COMPANY_NAMES = [
        'Acme Corporation',
        'Beta Industries',
        'Cascade Solutions',
        'Dynamic Ventures',
        'Elite Enterprises',
        'First-rate Innovations',
        'Global Visionary Group',
        'Horizon Enterprises',
        'Innovative Ventures Inc.',
        'Jupiter Holdings',
        'Keystone Corporation',
        'Lionheart Industries',
        'Maximus Ventures',
        'Nimble Solutions',
        'Omega Group',
        'Pinnacle Innovations',
        'Quantum Enterprises',
        'Redwood Industries',
        'Supreme Solutions',
        'Titan Holdings',
        'United Industries Inc.',
        'Vanguard Enterprises',
        'Worldwide Ventures',
        'Zenith Corporation',
        'Apex Industries',
        'Bright Ideas Corporation',
        'Champion Holdings',
        'Delta Innovations',
        'Endeavor Enterprises',
        'First Choice Industries',
        'Global Enterprises Group',
        'Harmony Corporation',
        'Innovative Ideas Inc.',
        'Jasper Holdings',
        'Knight Enterprises',
        'Lighthouse Industries',
        'Magnus Ventures',
        'Nova Solutions',
        'Optima Group',
        'Pioneer Innovations',
        'Quantum Ventures',
        'Rapid Enterprises',
        'Starlight Industries',
        'Trinity Innovations',
        'Ultimate Holdings',
        'Valiant Ventures',
        'Worldwide Innovations',
        'Zephyr Corporation',
        'Aegis Industries',
        'Bright Start Corporation',
        'Crystal Holdings',
        'Dynamic Innovations',
        'Endurance Enterprises',
        'First Class Industries',
        'Global Impact Group',
        'Harvest Corporation',
        'Innovative Solutions Inc.',
        'Journey Holdings',
        'Kingsway Enterprises',
        'Lightning Industries',
        'Majestic Ventures',
        'North Star Solutions',
        'Optimum Group',
        'Prime Innovations',
        'Quantum Dynamics',
        'Renaissance Enterprises',
        'Sunrise Industries',
        'Tru Innovations',
        'Ultimate Solutions',
        'Vantage Ventures',
        'Xenon Corporation',
        'Bold Industries',
        'Capital Holdings',
        'Diamond Innovations',
        'Elevate Enterprises',
        'First-rate Holdings',
        'Global Networks Group',
        'Heritage Corporation',
        'Innovative Technologies Inc.',
        'Jet Enterprises',
        'Krypton Holdings',
        'Lucky Star Industries',
        'Marvel Ventures',
        'Olympus Solutions',
        'Premier Group',
        'Quantum Leap Ventures',
        'Resilience Enterprises',
        'Sunshine Industries',
        'Trust Innovations',
        'Universal Holdings',
        'Vital Ventures',
        'Xtreme Corporation',
        'Bliss Industries',
        'Challenger Holdings',
        'Dynamic Solutions',
        'Empire Enterprises',
        'First Wave Industries',
        'Golden Opportunities Group',
        'Highlander Corporation',
        'Innovative Creations Inc.',
        'Jupiter Enterprises',
        'Knight Rider Holdings',
        'Luxury Industries',
        'Miracle Ventures',
        'Oasis Solutions',
        'Premium Innovations',
        'Quantum Success Ventures',
        'Radiant Enterprises',
        'Skyline Industries',
        'Timeless Innovations',
        'Unicorn Holdings',
        'Visionary Ventures',
        'Xtra Corporation',
        'Northbridge Industries',
        'Amberdale Associates',
        'Pinnacle Management Group',
        'Maplewood Holdings',
        'Seaside Solutions',
        'Redwood Ventures',
        'Summit Consulting Services',
        'Midland Enterprises',
        'Meadowbrook Corporation',
        'Cascade Partners',
        'Greenleaf Industries',
        'Acorn Strategies',
        'Woodland Enterprises',
        'Springfield Consulting Group',
        'Blue Ocean Ventures',
        'Ridgeview Holdings',
        'Evergreen Solutions',
        'Lakeview Management',
        'Brighton Consulting Services',
        'Summitcrest Partners',
        'Sagebrush Industries',
        'Crestwood Corporation',
        'Hickory Management Group',
        'Redwood Enterprises',
        'Midtown Consulting Services',
        'Maplewood Ventures',
        'Oceanview Holdings',
        'Eaglecrest Partners',
        'Aspen Strategies',
        'Seaside Industries',
        'Pineview Corporation',
        'Prairie Management Group',
        'Redstone Enterprises',
        'Rivercrest Ventures',
        'Bayside Solutions',
        'Midwest Holdings',
        'Evergreen Consulting Services',
        'Peak Partners',
        'Greenview Industries',
        'Cedarwood Corporation',
        'Lakewood Management Group',
        'Highland Enterprises',
        'Bluegrass Consulting Services',
        'Lakefront Ventures',
        'Meadowview Holdings',
        'Summitcrest Partners',
        'Valley Strategies',
        'Birchcrest Industries',
        'Lakeview Corporation',
        'Redrock Management Group',
        'Mountainview Enterprises',
        'Riverfront Ventures',
        'Sunrise Solutions',
        'Woodcrest Holdings',
        'Beachfront Partners',
        'Amberwood Industries',
        'Pinewood Corporation',
        'Briarcrest Consulting Services',
        'Northshore Ventures',
        'Piedmont Management Group',
        'Whitewater Enterprises',
        'Springfield Consulting Services',
        'Lakeland Ventures',
        'Maplecrest Holdings',
        'Redwood Partners',
        'Cedarcrest Strategies',
        'Aspen Industries',
        'Beacon Corporation',
        'Midland Management Group',
        'Lakeview Enterprises',
        'Summit Consulting Services',
        'Meadowlark Ventures',
        'Redstone Holdings',
        'Riverbend Partners',
        'Greenview Industries',
        'Oakwood Corporation',
        'Cypress Management Group',
        'Lakefront Enterprises',
        'Evergreen Solutions',
        'Summitcrest Partners',
        'Bridgewater Strategies',
        'Redwood Industries',
        'Meadowview Corporation',
        'Oakcrest Consulting Services',
        'Seaside Ventures',
        'Prairie Holdings',
        'Mountainview Partners',
        'Lakefront Industries',
        'Woodcrest Corporation',
        'Riverfront Management Group',
        'Redwood Enterprises',
        'Seaview Ventures',
        'Bluegrass Holdings',
        'Aspencrest Partners',
        'Summit Strategies',
        'Greenwood Industries',
        'Lakeview Corporation',
        'Riverstone Management Group',
        'Midwest Enterprises',
        'Pinecrest Ventures',
        'Sunset Solutions',
        'Woodcrest Holdings',
        'Bayside Partners',
        'Amberwood Industries',
        'Pineview Corporation',
        'Briarcrest Consulting Services',
        'Northshore Ventures',
        'Piedmont Management Group',
        'Whitewater Enterprises',
        'Aquila Consulting',
        'Aurora Enterprises',
        'Beyond Horizons',
        'Blue Ribbon Inc.',
        'Bright Minds Co.',
        'Catalyst Consulting',
        'Celestial Co.',
        'Citadel Group',
        'Clear Horizon Inc.',
        'Coastal Ventures',
        'Crystal Inc.',
        'Dawn Enterprises',
        'Destiny Corporation',
        'Dynamic Ventures',
        'Eagle Eye Inc.',
        'Elevate Consulting',
        'Empire Enterprises',
        'Endeavor Group',
        'Envision Co.',
        'Evergreen Enterprises',
        'Excel Solutions',
        'Explorer Group',
        'Falcon Co.',
        'First Impressions',
        'Fortitude Consulting',
        'Fusion Co.',
        'Galaxy Enterprises',
        'Gateway Group',
        'Global Horizons',
        'Gold Standard Inc.',
        'Grand Enterprises',
        'Harbor Group',
        'Harmony Consulting',
        'Horizon Ventures',
        'Infinite Solutions',
        'Inspire Co.',
        'Integrity Enterprises',
        'Intricate Solutions',
        'Jupiter Enterprises',
        'Keystone Co.',
        'Latitude Group',
        'Leading Edge Inc.',
        'Legend Group',
        'Liberty Enterprises',
        'Lighthouse Co.',
        'Majestic Ventures',
        'Masterpiece Consulting',
        'Meridian Co.',
        'Mission Enterprises',
        'Nebula Group',
        'Nexus Enterprises',
        'Noble Horizons',
        'North Star Inc.',
        'Nova Consulting',
        'Oasis Enterprises',
        'Odyssey Co.',
        'Onyx Group',
        'Opal Enterprises',
        'Oracle Consulting',
        'Orbit Co.',
        'Pacific Ventures',
        'Peak Performance',
        'Pinnacle Group',
        'Platinum Enterprises',
        'Prism Co.',
        'Prospect Group',
        'Quantum Enterprises',
        'Radiance Consulting',
        'Redwood Ventures',
        'Regal Enterprises',
        'Resolute Group',
        'Sapphire Co.',
        'Seabreeze Enterprises',
        'Serene Solutions',
        'Silver Horizon Inc.',
        'Skyline Enterprises',
        'Solar Group',
        'Spectrum Consulting',
        'Stargazer Co.',
        'Summit Ventures',
        'Sunrise Enterprises',
        'Sunset Group',
        'Supreme Solutions',
        'Synergy Enterprises',
        'Titan Group',
        'Trailblazer Inc.',
        'Transcend Consulting',
        'Triumph Enterprises',
        'Unity Group',
        'Vanguard Ventures',
        'Venus Co.',
        'Venture Solutions',
        'Vibrant Enterprises',
        'Vision Group',
        'Voyage Enterprises',
        'Waves Consulting',
        'West Coast Ventures',
        'Wilderness Co.',
        'Windsor Enterprises',
        'Zenith Group',
    ];

    #[ArrayShape([
        'firstName' => "string",
        'lastName' => "string",
        'email' => "string",
        'company' => "string",
        'phone' => "string",
        'age' => "int",
    ])] public static function createFakeContact(array $contact = []): array
    {
        $firstName = $contact['firstName'] ?? self::getRandomFirstName();
        $lastName = $contact['lastName'] ?? self::getRandomLastName();
        $companyName = $contact['company'] ?? self::getRandomCompany();
        return [
            'firstName' => $firstName,
            'lastName' => $lastName,
            'email' => self::generateFakeEmail($firstName, $lastName, $companyName),
            'company' => $companyName,
            'phone' => self::generatePhoneNumber(),
            'age' => rand(18, 109),
        ];
    }

    public static function generateFakeEmail(string $firstName = null, string $lastName = null, string $companyName = null): string
    {
        $companyName ??= self::getRandomCompany();
        $emailExtension = match (rand(0, 10)) {
            0, 1, 2, 3, 4 => "com",
            5, 6, 7 => "net",
            8, 9, 10 => "org",
        };
        $useCompanyEmail = !rand(0, 1);
        $emailDomain = match ($useCompanyEmail) {
            true => strtolower(filter_var($companyName, FILTER_SANITIZE_EMAIL)) . '.' . $emailExtension,
            false => self::getRandomEmailDomain(),
        };

        $firstLetterFirstName = $firstName[0] ?? '';

        $randomNumbers = !$useCompanyEmail ? (string)ceil(rand(0, 100000) / 10000) : '';

        return strtolower(
            match (rand(0, 10)) {
                0 => "$firstName.$lastName",
                1 => "$firstLetterFirstName$lastName",
                2 => "$firstName$lastName",
                3 => "$firstName$lastName$randomNumbers",
                4 => "$firstLetterFirstName$lastName$randomNumbers",
                5 => "$firstName",
                6 => "$firstName$randomNumbers",
                7 => "$firstLetterFirstName.$lastName",
                8 => "$lastName.$firstName",
                9 => "$lastName$firstLetterFirstName",
                10 => "$firstLetterFirstName.$lastName$randomNumbers",
            } . '@' . $emailDomain
        );
    }

    public static function getRandomCompany(): string
    {
        return self::FAKE_COMPANY_NAMES[rand(0, count(self::FAKE_COMPANY_NAMES) - 1)];
    }

    public static function getRandomEmailDomain(): string
    {
        return self::EMAIL_DOMAINS[rand(0, count(self::EMAIL_DOMAINS) - 1)];
    }

    public static function getRandomFirstName(): string
    {
        return self::FIRST_NAME[rand(0, count(self::FIRST_NAME) - 1)];
    }

    public static function getRandomLastName(): string
    {
        return self::LAST_NAME[rand(0, count(self::LAST_NAME) - 1)];
    }

    public static function generatePhoneNumber(): string
    {
        $areaCode = strval(rand(201, 999));
        $prefix = strval(rand(201, 999));
        $lineNumber = strval(rand(1000, 9999));
        return '(' . $areaCode . ') ' . $prefix . '-' . $lineNumber;
    }
}
