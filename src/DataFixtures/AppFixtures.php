<?php

namespace App\DataFixtures;

use App\Entity\Product\Product;
use App\Entity\User\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $products = [
            0 => [
                'name' => 'Snickers Peanut Butter Crunchy Spread 225g',
                'info' => 'Znasz kogoś kto nigdy nie słyszał o Snickersie? My o takiej osobie jeszcze nie słyszeliśmy! Jest to najchętniej kupowany baton na świecie, dlatego nie można przejść obojętnie obok każdego produktu z logiem tej marki!
                           Nie inaczej jest z tym SZTOSEM! Masło orzechowe z kawałkami orzechów oraz mlecznej czekolady Snickers! Pozycja obowiązkowa dla każdego fana batoników Snickers.
                           Szczególnie polecany dla osób, które będąc głodne strasznie gwiazdorzą ;)',
                'price' => 15.99
            ],
            1 => [
                'name' => 'Samyang Hot Chicken Flavour Ramen',
                'info' => "Udało nam się zdobyć najbardziej popularne dania instant, chodzi o koreańskie dania firmy Samyang! Gruby, aromatyczny makaron zanurzony jest w bardzo aromatycznym i pikantnym sosie.
                           Wielu zagranicznych youtuber'ów podejmuje challenge z tymi daniami! Ta wersja o smaku kurczaka w pikantnym sosie serowym,z pewnością mile zaskoczy fanów pikantnego jedzenia :)
                           Sposób przygotowania: Zagotuj 550ml wody, dodaj makaron i gotuj przez ok 3 minut. Odlewając makaron, zostaw 8 łyżek wody, dodaj do niej saszetki z sosem i serem.
                           Mieszaj przez ok 30 sekund. Zmieszaj sos z makaronem gotowe :)
                           Samyang to firma z wielką historią. Została założona 15 września 1961 roku przez Jeon Jung Yoon. Ich debiut był niezwykle udany i rewolucyjny.
                           To właśnie oni wprowadzili na rynek pierwszą zupkę instant w Korei Południowej w 1963 roku! W latach 80-tych do swojej ofety wprowadzili produkty mleczne, przekąski i sosy.
                           Dzisiaj są jednym z największych producentów dań instant na świecie, a mianem legendy można uznać ich serię ramenów instant Hot Chicken Flavour Ramen!",
                'price' => 5.99
            ],
            2 => [
                'name' => 'Vanilla Marshmallow Fluff',
                'info' => 'Wszyscy znamy kultowe amerykańskie pianki, ale czy wiedziałeś że można je dostać w postaci kremu na kanapki! Tak jest Vanilla Fluff to nic innego jak piankowy krem do smarowania,
                           który idealnie smakuje na ciepłym toście, zwykłej kanapce i w wielu innych wspaniałych formach jakie sobie tylko można wymyślić. Ten krem o smaku waniliowych marshmallows umili Ci każde śniadanie!',
                'price' => 12.99
            ],
            3 => [
                'name' => 'Large Tapioca Pearls White',
                'info' => "Perły z Tapioki są wykorzystywane do deserów, dań oraz napoju Bubble Tea. Po namoczeniu ich w wodzie czy mleku, 'perełki' pęcznieją i dają efekt przezroczystych kuleczek,
                           które dają frajdę w przegryzaniu ich.
                           Produkt bezglutenowy.Sposób przygotowania tapioki do deseru: Zagotuj mleko, wsyp perełki z tapioki, możesz dodatkowo posłodzi je według uznania. Gotuj przez ok. 20 min,
                           co jakiś czas mieszając do momentu uzyskania przezroczystych kuleczek",
                'price' => 11.99
            ],
            4 => [
                'name' => 'Nissin Soba Chilli',
                'info' => 'Nissin Soba Chilli to pikantne danie instant z makaronem. Umożliwia szybkie i łatwe przygotowanie dania w biurze czy domu.
                           Japońska firma Nissin to niekwestionowana legenda zup instant. To właśnie oni wynaleźli ten produkt i zaczęli sprzedawać go jako pierwsi.
                           Założycielem firmy i jednocześnie wynalazcą był Momofuku Ando. Swoim dziełem chciał rozwiązać problem niedożywienia w Japonii spowodowanym II Wojną Światową.
                           W 1958 roku na rynku pojawiła się jego pierwsza zupa instant o smaku drobiowego ramenu. Co ciekawe na początku produkt był drogi i uznawany za luksusowy.
                           Z biegiem lat był coraz bardziej znany i powszechny. Tak zwana zupka chińska już zaledwie po kilku latach stała się na tyle popularna, że szybko inne firmy zaczęły naśladować
                           Nissin wprowadzając swoje wersje ramenów. Mimo tego Nissin nadal jest wiodącą marką, nie tylko na japońskim, ale także i światowym rynku.',
                'price' => 4.99
            ],
            5 => [
                'name' => 'Kelloggs Rice Krispie Square Totally Chocolateley',
                'info' => "Rice Krispies to popularne płatki śniadaniowe firmy Kellogg's produkowane od 1928 roku. Są bardzo odżywcze, a ich głównym składnikiem (99%) jest ryż.
                           Teraz w formie słodkiej i jakże chrupiącej przekąsce Squares! Składa się ona oczywiście z prażonego ryżu i kawałków mlecznej czekolady.
                           Całość zaś została otulona dodatkową polewą czekoladową. Rice Krispies nie musi Ci towarzyszyć tylko przy śniadaniu. Wrzuć je do torebki i delektuj się ich smakiem przy każdej słodkiej okazji. :)",
                'price' => 3.99
            ],
            6 => [
                'name' => "Post Oreo O's Cereal",
                'info' => "Twoje marzenie o idealnym śniadaniu właśnie zostało spełnione!
                           Post Oreo Cereal to nowość na rynku USA! To idealna kombinacja chrupiących, czekoladowych płatek śniadaniowych z kawałkami ciasteczek oreo.
                           Dodatkowo zawierają one mnóstwo witamin i minerałów :) Śniadanie to najważniejszy posiłek w ciągu dnia, dlatego warto zadbać aby było pełnowartościowe oraz smaczne :)",
                'price' => 36.99
            ],
            7 => [
                'name' => 'Mutti Pizza Sauce',
                'info' => "Marzysz o idealnej pizzy? Dzięki włoskiej marce Mutti będziesz blisko ideału :) W puszce znajdziesz 400g wspaniałego, pysznego sosu pomidorowego prosto z Włoch!
                           Pomidory zostały wzbogacone bazylią oraz oregano.
                           Posmaruj nim swoje ciasto i delektuj się włoskimi smakami. :)",
                'price' => 5.99
            ],
            8 => [
                'name' => 'Mama Noodles Chicken',
                'info' => "Znudziły Ci się 'chińskie zupki' od których roi się na półkach sklepowych? Mamy wspaniała alternatywę prosto z gorącej Tajlandi, znanej wszystkim ze wspaniałego street food'u!
                           Mama Noodles Chciken to przepyszna zupka z torebki z bulionem o smaku kurczaka. :) Wystarczą 3 minuty aby przygotować wspaniałą zupkę rodem z tajskiego street food'u :)",
                'price' => 2.99
            ],
            9 => [
                'name' => "Pop Tarts Froot Loops Limited Edition",
                'info' => "Dwa klasyki z USA w jednym produkcie! Pop tarts i froot loops połączyły swoje siły i stworzyły pyszniutkie, słodkie chlebki z nadzieniem truskawkowym oraz polewą o smaku owocowych chrupek Froot Loops.
                           <3 Wesoły design tościków urozmaici Twój poranek, możesz trafić na 6 unikatowych projektów!
                           Można jeść je zimne, albo odgrzać w tosterze lub mikrofalówce. Kiedy je podgrzejesz ich nadzienie cudownie się rozpłynie na Twoim podniebieniu.
                           Nie ważne jaką opcję wybierzesz zawsze są pyszne! W opakowaniu znajduje się 8 sztuk chlebków. Weź je ze sobą na przerwę śniadaniową. :)
                           Zrób sobie śniadanie w prawdziwie amerykańskim stylu!",
                'price' => 25.99
            ],
            10 => [
                'name' => "Stammibene Crema al Pistacchio",
                'info' => "Zawartość tego słoiczka 'powali' każdego, zawiera aż 45% pistacji z Bronte! Aksamitny, gładki krem pistacjowy dosłownie rozpływa się w ustach.
                           Sycylia jest ogromnym producentem pistacji, są one najlepsze na świecie. Szczególnie wyjątkowe są te z Bronte dzięki temu, że rosną na wulkanicznej,
                           żyznej glebie u stóp Etny! Pistacje są typowym składnikiem wielu deserów na słonecznej wyspie. Sprowadź więc cząstkę Sycylii do swojego domu
                           wraz z kremem pistacjowym i poczuj się jak na włoskich wakacjach! Dodaj go do naleśników, na chałkę czy innych deserów.",
                'price' => 25.99
            ],
            11 => [
                'name' => "Flying Goose Sriracha with Wasabi",
                'info' => "Tego sosu nie powinno zabraknąć w każdej kuchni! To prawdziwa legenda, używają go najlepsi kucharze na świecie w wykwintnych restauracjach,
                           oraz barach szybkiej obsługi. Kochają go wszyscy! Mowa o tajskim sosie Sriracha. Oryginalny, pikantny sos, którego głównym składnikiem są
                           przetarte papryczki chili oraz dodatek japońskiego chrzanu Wasabi od firmy Flying Goose. Nazwa pochodzi od jednej z tajskich miejscowości
                           Si Racha gdzie serwowano go w lokalnych restauracjach. Podbił on podniebienia ludzi na całym świecie, ale znany najbardziej jest z kuchni azjatyckiej.
                           Idealny jest on do potraw z woka doprawianych ostrością, do przekąsek, zup oraz sałatek... a kanapkę z pasztetem i ogórkiem polaną sosem Sriracha pokochacie od pierwszego zjedzenia :D",
                'price' => 11.99
            ],
            12 => [
                'name' => "Nongshim Seafood Ramyun",
                'info' => "Znudziły Ci się 'złote kurczaki' od których roi się na półkach sklepowych?
                           Mamy wspaniała alternatywę od firmy Nongshim! Seafood & Spicy Neoguri to przepyszna, pikantna zupka z torebki o smaku owoców morza:)
                           Sposób przygotowania: Zagotuj 550 ml wody, dodaj makaron oraz wszystkie dołączone przyprawy. Gotuj wszystko 3-4 minuty. Gotowe! :)
                           Koreańskie zupki instant od Nongshim z pewnością Cię nie zawiodą. Ich efekt jest o dużo lepszy niż w przypadku zupek błyskawicznych, które wystarczy zalać wrzątkiem.
                           Makaron jest grubszy, a przyprawy dużo smaczniejsze :) Nie czekaj i spróbuj ich jak najszybciej! :)",
                'price' => 39.99
            ],
            13 => [
                'name' => "M&M's Spread",
                'info' => "W Scrummy pojawił się HIT- M&M's krem! Czy jest coś lepszego niż znane i lubiane przez wszystkich cukierki m&m's w formie kremu?
                           W szklanym słoiczku jest on wymieszany z kolorowymi chrupkami- po prostu PYCHAAA :D
                           Krem możecie dodawać do kanapek, naleśników, tostów, gofrów, albo jeść go bezpośrednio ze słoiczka ;)",
                'price' => 11.99
            ],
            14 => [
                'name' => "Acecook Mi Lau Thai Chicken",
                'info' => "Zgłodniałeś? Raptem kilka minut dzieli Cię od orientalnego bulionu o smaku kurczaka. Lau Thai czyli propozycja błyskawicznej zupki instant z Wietnamu.
                           A kto nie lepiej jak Azjaci znają się na sławnych na cały świat 'zupkach chińskich'? :)",
                'price' => 4.99
            ],
            15 => [
                'name' => "Maggi Hollandaise Instant Sauce",
                'info' => "Stwórz doskonały, francuski sos holenderski od Maggi. Z wyjątkowo, kremową konsystencją dodadzą niepowtarzalnego smaku Twoim potrawom!
                           Jego sposób przygotowania jest bardzo prosty! Wystarczy że zawartość opakowania wsypiesz do 500 ml gorącego mleka i wymieszasz dopóki sos nie zrobi się gęstszy. :)
                           Polej nim swoje dania i delektuj się jego smakiem. :)",
                'price' => 16.99
            ],
            16 => [
                'name' => "Lindt Nocciole Spread",
                'info' => "Doskonałość czekolady Lindt, poczujesz również w kremie do smarowania, który został zamknięty w szklanym słoiczku.
                           Krem ​​do smarowania z orzechami laskowymi Lindt to idealne połączenie włoskich orzechów laskowych i delikatnego kakao, któremu nie można się oprzeć.
                           Był rok 1879, kiedy to Rudolphe Lindt pragnął stworzyć czekoladę, którą cechowałaby miękkość, przyjemność i zmysłowość.
                           Niestety w tamtych czasach czekolada była twarda: ciężko było ją wyprodukować i zjeść. Wszystkie te określenia dalekie były od rzeczywistości,
                           aż do pewnego przełomowego wydarzenia… Rudolphe Lindt, znany z bycia lekkoduchem, opuścił fabrykę, nie kończąc swojej pracy i co więcej,
                           nie wyłączając maszyn. Maszyny pracowały nieprzerwanie przez cały weekend. Kiedy Rudolphe Lindt wrócił do fabryki w poniedziałkowy poranek,
                           doznał początkowo szoku.
                           W mieszalniku znalazł twardą, spaloną masę czekoladową, która lśniła i wspaniale pachniała. Spróbował jak smakuje i po raz pierwszy poczuł,
                           jak czekolada rozpuszcza się w ustach. Był w siódmym niebie.
                           Od ponad 150 lat wytwórcy czekolady zarówno w Szwajcarii, jak i na całym świecie, próbują odkryć tajemnicę rodzinnej receptury czekolad Lindt.
                           Do tej pory nikomu się to nie udało. Rozpływająca się w ustach czekolada Rudolphe’a Lindta pozostaje nie tylko synonimem znanej na całym świecie szwajcarskiej czekolady,
                           ale też symbolem innowacyjności i wynalazczego talentu wziętych przedsiębiorców z tego małego kraju w sercu Europy: z ojczyzny czekolady Lindt.",
                'price' => 25.99
            ],
            17 => [
                'name' => "Tufo Co Vietnamese Rice Paper 16cm",
                'info' => "W opakowaniu znajdziesz aż 340g cieniutkich arkuszy papieru ryżowego o średnicy 16 cm.
                           Idealne do przygotowania sajgonek lub spring rolls'ów we własnym domu :)
                           Wystarczy tylko zanurzyć arkusz na 2 sekundy w wodzie i zawijać swoje ulubione składniki w zgrabny rulonik :)
                           Opakowanie zawiera ok. 150 szt arkuszy.",
                'price' => 2.99
            ],
            18 => [
                'name' => "Tapioca Perełki Małe",
                'info' => "Perły z Tapioki są wykorzystywane do deserów, dań oraz napoju Bubble Tea.
                           Po namoczeniu ich w wodzie czy mleku, 'perełki' pęcznieją i dają efekt przezroczystych kuleczek, które dają frajdę w przegryzaniu ich.
                           Produkt bezglutenowy.
                           Sposób przygotowania tapioki do deseru: Zagotuj mleko, wsyp perełki z tapioki, możesz dodatkowo posłodzi je według uznania.
                           Gotuj przez ok. 20 min, co jakiś czas mieszając do momentu uzyskania 'przezroczystych kuleczek'.",
                'price' => 6.99
            ],
            19 => [
                'name' => "Lobo Panang Curry Cooking Kit",
                'info' => "Penang Curry to rodzaj curry, które jest suszone i bardziej słodsze, kremowe niż inne popularne tajskie curry.
                           Nazwa pochodzi od zachodniego wybrzeża Malezyjskiej wyspy Panang. Z tego powodu Curry Panang są najbardziej popularne wśród Tajów na południu kraju.
                           Lobo Penang Curry Cooking Kit to zestaw starannie dobranych składników, dzięki któremu z łatwością przyrządzisz autentyczne danie kuchni tajskiej we własnym domu.
                           W środku znajduje się wszystko, co potrzebne: penang pasta curry, trawa cytrynowa, suszone papryczki chili, liście limonki kaffir oraz orzeszki ziemne i instrukcja,
                           jak ugotować znakomite Penang Curry. :)",
                'price' => 16.99
            ],
        ];
        foreach ($products as $key => $product) {
            $productObj = new Product();
            $productObj->setName($product['name']);
            $productObj->setInfo($product['info']);
            $productObj->setPublicDate(new \DateTime());
            $productObj->setPrice((float)$product['price']);
            $manager->persist($productObj);
        }
        $manager->flush();


        $users = [
            0 => [
                'login' => 'Mike Ryan',
                'state' => 'Louisiana'
            ],
            1 => [
                'login' => 'Shawna Posy Elliott',
                'state' => 'Vermont'
            ],
            2 => [
                'login' => 'Nicholas Alvarez',
                'state' => 'Texas'
            ],
            3 => [
                'login' => 'Emmanuella Blaese',
                'state' => 'Iowa'
            ],
            4 => [
                'login' => "Maurisa O'Gallagher",
                'state' => 'Massachusetts'
            ],
            5 => [
                'login' => 'Wilhelm Mark Sanders',
                'state' => 'Pennsylvania'
            ],
            6 => [
                'login' => 'Marc Mills',
                'state' => 'Rhode Island'
            ],
            7 => [
                'login' => 'Brian Garcia',
                'state' => 'Maryland'
            ],
            8 => [
                'login' => 'Joseph Wagner',
                'state' => 'New Mexico'
            ],
            9 => [
                'login' => 'Aniela Holmes',
                'state' => 'Idaho'
            ],
            10 => [
                'login' => 'Angelo White',
                'state' => 'Virginia'
            ],
            11 => [
                'login' => 'Sophie Rivera',
                'state' => 'Louisiana'
            ],
            12 => [
                'login' => 'Claudius Lane',
                'state' => 'Michigan'
            ],
            13 => [
                'login' => 'Judith Eugina Grant',
                'state' => 'Illinois'
            ],
            14 => [
                'login' => 'James Payne',
                'state' => 'Maryland'
            ],
            15 => [
                'login' => "Sandra O'Connor",
                'state' => 'Massachusetts'
            ],
            16 => [
                'login' => 'Charlize Jimenez',
                'state' => 'Arizona'
            ],
            17 => [
                'login' => "Bronislaw O'Reilly",
                'state' => 'Virginia'
            ],
            18 => [
                'login' => 'Gulia Ramos',
                'state' => 'Ohio'
            ],
            19 => [
                'login' => 'Amanda T. Chapman',
                'state' => 'Florida'
            ],
        ];

        foreach ($users as $user) {
            $userObj = new User();
            $userObj->setLogin($user['login']);
            $userObj->setState($user['state']);
            $manager->persist($userObj);
        }
        $manager->flush();
    }
}