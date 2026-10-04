<?php

if (!defined('ABSPATH')) {
    exit();
}

function zn_default_events(): array
{
    return [
        [
            'imageSrc' =>
                'https://i0.wp.com/adiberj.com.br/wp-content/uploads/2021/08/louvor-adoracao.jpg?resize=696%2C464&ssl=1',
            'imageAlt' => 'Spotkanie modlitewne',
            'title' => 'Spotkanie modlitewne',
            'date' => '2024-08-05',
            'dateText' => '5 sierpnia 2024',
            'location' => 'ul. Jasna 5',
            'locationUrl' => 'https://www.google.com/maps',
            'description' =>
                'Dołącz do nas na wspólne spotkanie modlitewne w naszej misji.',
            'link' => '#',
        ],
        [
            'imageSrc' => 'https://ichtis.info/images/stories/_nik6871.jpg',
            'imageAlt' => 'Warsztaty ewangelizacyjne',
            'title' => 'Warsztaty ewangelizacyjne',
            'date' => '2024-07-15',
            'dateText' => '15 lipca 2024',
            'location' => 'ul. Kwiatowa 10',
            'locationUrl' => 'https://www.google.com/maps',
            'description' =>
                'Naucz się skutecznych metod ewangelizacji podczas naszych warsztatów.',
            'link' => '#',
        ],
        [
            'imageSrc' =>
                'https://www.targikielce.pl/storage/image/core_files/2025/9/23/f1ec2b4d5dd2ce6e64b4bb425cb7ecca/default/preview/koncert-charytatywny-2025-plakat.jpg',
            'imageAlt' => 'Koncert charytatywny',
            'title' => 'Koncert charytatywny',
            'date' => '2024-06-20',
            'dateText' => '20 czerwca 2024',
            'location' => 'ul. Słoneczna 3',
            'locationUrl' => 'https://www.google.com/maps',
            'description' =>
                'Wspieraj naszą misję poprzez udział w koncercie charytatywnym.',
            'link' => '#',
            'isHappened' => true,
        ],
    ];
}

function zn_default_articles(): array
{
    return [
        [
            'title' => 'Ewangelizacja w miejskich przestrzeniach',
            'excerpt' =>
                'Dowiedz się, jak nasza misja dociera do ludzi na ulicach Radomia, niosąc przesłanie nadziei i miłości.',
            'imageUrl' =>
                'https://www.radiomaryja.pl/wp-content/uploads/2021/08/Ewangelizacja-w-Beskidach-3-1030x687.jpg',
            'imageAlt' => 'Ewangelizacja uliczna',
            'link' => '#',
            'date' => '2024-03-14',
            'dateText' => '14 marca 2024',
        ],
        [
            'title' => 'Wsparcie więźniów poprzez wiarę',
            'excerpt' =>
                'Poznaj historie przemiany życia więźniów, którzy odnaleźli siłę i nadzieję dzięki naszej misji.',
            'imageUrl' =>
                'https://www.churchofjesuschrist.org/imgs/6243814b0ca5f6af118731e74ce5719a7bd3c3a8/full/%21500%2C/0/default',
            'imageAlt' => 'Wsparcie więźniów',
            'link' => '#',
            'date' => '2024-02-28',
            'dateText' => '28 lutego 2024',
        ],
        [
            'title' => 'Jak możesz pomóc naszej misji?',
            'excerpt' =>
                'Zobacz, w jaki sposób możesz zaangażować się i wspierać naszą chrześcijańską misję ewangelizacyjną.',
            'imageUrl' =>
                'https://ocdn.eu/images/pulscms/MTE7MDA_/7d3211fdbf9bbc90b0aeb45bc81d94a7.jpg',
            'imageAlt' => 'Wolontariat w misji',
            'link' => '#',
            'date' => '2024-02-15',
            'dateText' => '15 lutego 2024',
        ],
    ];
}

function zn_default_videos(): array
{
    return [
        [
            'youtubeId' => 'dQw4w9WgXcQ',
            'title' => 'Inspirujący film 1',
            'duration' => '3:33',
            'label' => 'Motywacja',
        ],
        [
            'youtubeId' => '3JZ_D3ELwOQ',
            'title' => 'Inspirujący film 2',
            'duration' => '4:20',
            'label' => 'Edukacja',
            'isHD' => false,
        ],
        [
            'youtubeId' => 'L_jWHffIx5E',
            'title' => 'Inspirujący film 3',
            'duration' => '2:45',
            'label' => 'Rozrywka',
        ],
        [
            'youtubeId' => 'M3r2XDceM6A',
            'title' => 'Inspirujący film 4',
            'duration' => '5:10',
            'label' => 'Nauka',
            'isHD' => false,
        ],
    ];
}

function zn_default_gallery(): array
{
    return [
        [
            'src' =>
                'https://campusministry.georgetown.edu/wp-content/uploads/sites/500/2024/02/53131181838_9beee9620b_k.jpg',
            'caption' => 'Ewangelizacja uliczna',
        ],
        [
            'src' =>
                'https://www.luxmed.pl/assets/media/Grupa%20wsparcia.jpeg%3Ffm=webp&q=90&lossless=0',
            'caption' => 'Warsztaty ewangelizacyjne',
        ],
        [
            'src' =>
                'https://powiatzgorzelecki.pl/wp-content/uploads/2023/08/MK3_2941-scaled.jpg',
            'caption' => 'Spotkanie ewangelizacyjne',
        ],
    ];
}

function zn_default_books(): array
{
    return [
        [
            'title' => 'Książka 1',
            'description' => 'Opis książki 1',
            'image' => [
                'url' => 'https://via.placeholder.com/300x400',
                'alt' => 'Książka 1',
            ],
            'link' => ['url' => 'https://example.com/book1'],
        ],
        [
            'title' => 'Książka 2',
            'description' => 'Opis książki 2',
            'image' => [
                'url' => 'https://via.placeholder.com/300x400',
                'alt' => 'Książka 2',
            ],
            'link' => ['url' => 'https://example.com/book2'],
        ],
        [
            'title' => 'Książka 3',
            'description' => 'Opis książki 3',
            'image' => [
                'url' => 'https://via.placeholder.com/300x400',
                'alt' => 'Książka 3',
            ],
            'link' => ['url' => 'https://example.com/book3'],
        ],
    ];
}

function zn_default_meetings(): array
{
    return [
        [
            'imageSrc' =>
                'https://www.luxmed.pl/assets/media/Grupa%20wsparcia.jpeg%3Ffm=webp&q=90&lossless=0',
            'imageAlt' => 'Spotkanie grupy wsparcia i studium biblijne',
            'iconId' => 'bible',
            'title' => 'Grupa wsparcia i Studium Biblijne',
            'text' =>
                'Spotykamy się w każdą środę na Studium Biblijnym oraz grupie wsparcia przy ul. 25 Czerwca 41, w godzinach <time datetime="16:00">16:00</time> - <time datetime="18:00">18:00</time>.',
            'href' => 'https://maps.app.goo.gl/ubpt2wxhCGNE9J2G8',
            'btnText' => 'Jak dojechać',
            'isOpenInNewTab' => true,
        ],
        [
            'imageSrc' =>
                'https://powiatzgorzelecki.pl/wp-content/uploads/2023/08/MK3_2941-scaled.jpg',
            'imageAlt' => 'Spotkanie młodzieżowe',
            'iconId' => 'girl',
            'title' => 'Spotkania młodzieżowe',
            'text' =>
                'W soboty prowadzimy spotkania młodzieżowe w Domu Ojca na ul. Głównej 12, w godzinach <time datetime="16:00">16:00</time> - <time datetime="19:00">19:00</time>.',
            'href' => 'https://maps.app.goo.gl/jDeH9SSvDxnCShxy9',
            'btnText' => 'Jak dojechać',
            'isOpenInNewTab' => true,
        ],
    ];
}

function zn_default_faq(string $page): array
{
    $items = [
        'index' => [
            [
                'question' =>
                    'Kim jesteśmy i czym jest misja „Zwyczajnie Niezwyczajni”?',
                'answerHtml' =>
                    '<p>Misja „Zwyczajnie Niezwyczajni” to wspólnota chrześcijan, którzy doświadczyli Bożej łaski i miłości, a dzięki temu przemiany swojego życia – wolności od grzechu i uzależnień.</p><p>Dziś dzielimy się tym, co sami otrzymaliśmy: Ewangelią, czyli Dobrą Nowiną o Jezusie Chrystusie, oraz osobistym świadectwem zmienionego życia.</p><p>Prowadzimy spotkania ewangelizacyjne w więzieniach, na ulicach i w szkołach, a także cotygodniową grupę wsparcia – otwartą dla każdego, kto potrzebuje pomocy lub rozmowy.</p>',
            ],
            [
                'question' =>
                    'Do jakiego nurtu chrześcijaństwa należy wasza misja?',
                'answerHtml' =>
                    '<p>Istnieje wiele nurtów, kościołów i denominacji. Gdy jednak sięgniemy do Dziejów Apostolskich – księgi opisującej narodziny pierwszego Kościoła – czytamy:</p><blockquote><p>W Antiochii też po raz pierwszy uczniów nazwano chrześcijanami.</p><p><a href=\"https://www.bible.com/pl/bible/138/act.11.26\">Dzieje Apostolskie 11, 26</a></p></blockquote><p>Dla nas chrześcijanin to przede wszystkim uczeń i naśladowca Jezusa Chrystusa – i tak właśnie siebie postrzegamy.</p><p>Od momentu naszego nawrócenia i nowego narodzenia uczymy się żyć w relacji z Jezusem, poznając Go przez Słowo Boże i modlitwę.</p>',
            ],
            [
                'question' => 'Kto stoi za inicjatywą i kto ją prowadzi?',
                'answerHtml' =>
                    '<p>Pomysłodawcą i założycielem misji jest Grzegorz Gzik. Warto jednak podkreślić, że misja to wspólne dzieło wielu osób, które na równi angażują się w głoszenie Ewangelii i pomoc innym.</p>',
            ],
            [
                'question' => 'Jak wyglądają wasze spotkania?',
                'answerHtml' =>
                    '<p>Nasze spotkania odbywają się w różnych miejscach – z młodzieżą, na ulicach czy w zakładach karnych. Choć mają różną formę, zawsze przyświeca im ten sam cel.</p><p>Skupiamy się na relacji, rozmowie i dzieleniu się wiarą oraz osobistymi doświadczeniami. Czytamy Pismo Święte, rozważamy je i zachęcamy do osobistego poznania Jezusa.</p><p>Odpowiadamy na pytania, rozmawiamy o wątpliwościach, oferujemy wsparcie i modlitwę. Fundamentem każdego z spotkań jest Jezus Chrystus.</p>',
            ],
            [
                'question' =>
                    'Czy mogę przyjść, jeśli nie jestem osobą wierzącą lub dopiero szukam?',
                'answerHtml' =>
                    '<p>Tak, oczywiście. Nasze spotkania są otwarte dla wszystkich – niezależnie od przekonań religijnych czy etapu duchowej drogi.</p><p>Jedyną zasadą jest wzajemny szacunek. Zależy nam, aby każdy uczestnik czuł się bezpiecznie i komfortowo.</p><p>Jeśli przychodzisz z otwartością i gotowością do spokojnej rozmowy – jesteś u nas mile widziany.</p>',
                'buttons' => [
                    [
                        'type' => 'link',
                        'href' => '#meetings',
                        'label' => 'Zobacz nasze spotkania',
                        'classes' => 'btn--primary',
                    ],
                ],
            ],
        ],
        'about' => [
            [
                'question' => 'Jak długo istnieje wasza misja?',
                'answerHtml' =>
                    '<p>Nasze działania ewangelizacyjne prowadzimy od kilku lat. Około 2019 roku zarejestrowaliśmy się jako stowarzyszenie, co umożliwiło nam formalną współpracę z więzieniami, szkołami i innymi instytucjami.</p>',
            ],
            [
                'question' =>
                    'Jak mogę dołączyć do was lub wesprzeć wasze działania?',
                'answerHtml' =>
                    '<p>Skontaktuj się z nami. Chętnie porozmawiamy o możliwościach współpracy i zaangażowania.</p>',
                'buttons' => [
                    ['type' => 'contact', 'classes' => 'btn--primary'],
                ],
            ],
            [
                'question' =>
                    'Czy prowadzicie działania w szkołach lub innych instytucjach?',
                'answerHtml' =>
                    '<p>Tak. Prowadzimy spotkania w szkołach, więzieniach oraz innych miejscach, do których zostajemy zaproszeni. Jesteśmy otwarci na współpracę z każdą instytucją zainteresowaną takimi działaniami.</p>',
                'buttons' => [
                    [
                        'type' => 'contact',
                        'classes' => 'btn--primary',
                    ],
                ],
            ],
            [
                'question' => 'Dlaczego głosicie Ewangelię na ulicach?',
                'answerHtml' =>
                    '<p>Traktujemy poważnie misyjne wezwanie Jezusa i chcemy rozmawiać z ludźmi o żywej relacji z Bogiem.</p>',
                'video' => [
                    'youtubeId' => '5SOEigurjtk',
                    'title' => 'Dlaczego głosimy Ewangelię na ulicach?',
                    'isShowTitle' => false,
                ],
            ],
            [
                'question' =>
                    'Jak zrobić pierwsze kroki w wierze i czytaniu Biblii?',
                'answerHtml' =>
                    '<p>Jeśli dopiero zaczynasz swoją drogę wiary lub chcesz lepiej poznać Jezusa i Biblię, nie jesteś sam. Wielu z nas przechodziło przez te same pytania i wątpliwości.</p><p>Zachęcamy do rozpoczęcia od Ewangelii, regularnej modlitwy i tzw. „cichego czasu” z Bogiem. Ważne jest także, aby wzrastać we wspólnocie – tam, gdzie Biblia jest czytana i traktowana jako autorytet.</p><p>Chętnie pomożemy Ci postawić pierwsze kroki, odpowiedzieć na pytania i towarzyszyć w dalszej drodze wiary.</p>',
                'buttons' => [
                    [
                        'type' => 'link',
                        'href' => 'articles/bla-bla-bla',
                        'label' => 'Zobacz więcej porad',
                        'classes' => 'btn--primary',
                    ],
                    [
                        'type' => 'contact',
                        'classes' => 'btn--secondary',
                    ],
                ],
            ],
        ],
    ];

    return $items[$page] ?? $items['index'];
}
