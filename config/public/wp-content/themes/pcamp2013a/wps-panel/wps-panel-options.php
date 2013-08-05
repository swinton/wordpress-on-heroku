<?php
/* ---------------------------------------------------------------------------------------------------

    File: wps-panel-options.php

    Here we will set the options we are going to have in the theme options panel.

--------------------------------------------------------------------------------------------------- */

/* ---------------------------------------------------------------------------------------------------
    Declare vars
--------------------------------------------------------------------------------------------------- */

$shortname = 'wps';
$options = array();
$number_slides = get_option('wps_number_slides');
$number_tabs_team = get_option('wps_number_tabs_team');
$number_tabs_products = get_option('wps_number_tabs_products');

$standard_fonts = array(
                              '0' => 'Select Font',
                              'Arial, Helvetica, sans-serif' => 'Arial, Helvetica, sans-serif',
                              "'Arial Black', Gadget, sans-serif" => "'Arial Black', Gadget, sans-serif",
                              "'Bookman Old Style', serif" => "'Bookman Old Style', serif",
                              "'Comic Sans MS', cursive" => "'Comic Sans MS', cursive",
                              "Courier, monospace" => "Courier, monospace",
                              "Garamond, serif" => "Garamond, serif",
                              "Georgia, serif" => "Georgia, serif",
                              "Impact, Charcoal, sans-serif" => "Impact, Charcoal, sans-serif",
                              "'Lucida Console', Monaco, monospace" => "'Lucida Console', Monaco, monospace",
                              "'Lucida Sans Unicode', 'Lucida Grande', sans-serif" => "'Lucida Sans Unicode', 'Lucida Grande', sans-serif",
                              "'MS Sans Serif', Geneva, sans-serif" => "'MS Sans Serif', Geneva, sans-serif",
                              "'MS Serif', 'New York', sans-serif" => "'MS Serif', 'New York', sans-serif",
                              "'Palatino Linotype', 'Book Antiqua', Palatino, serif" => "'Palatino Linotype', 'Book Antiqua', Palatino, serif",
                              "Tahoma, Geneva, sans-serif" => "Tahoma, Geneva, sans-serif",
                              "'Times New Roman', Times, serif" => "'Times New Roman', Times, serif",
                              "'Trebuchet MS', Helvetica, sans-serif" => "'Trebuchet MS', Helvetica, sans-serif",
                              "Verdana, Geneva, sans-serif" => "Verdana, Geneva, sans-serif"
                         );
$google_fonts = array(
                                   "0" => "Select Font",
                                   "Abel" => "Abel",
                                   "Abril Fatface" => "Abril Fatface",
                                   "Aclonica" => "Aclonica",
                                   "Acme" => "Acme",
                                   "Actor" => "Actor",
                                   "Adamina" => "Adamina",
                                   "Advent Pro" => "Advent Pro",
                                   "Aguafina Script" => "Aguafina Script",
                                   "Aladin" => "Aladin",
                                   "Aldrich" => "Aldrich",
                                   "Alegreya" => "Alegreya",
                                   "Alegreya SC" => "Alegreya SC",
                                   "Alex Brush" => "Alex Brush",
                                   "Alfa Slab One" => "Alfa Slab One",
                                   "Alice" => "Alice",
                                   "Alike" => "Alike",
                                   "Alike Angular" => "Alike Angular",
                                   "Allan" => "Allan",
                                   "Allerta" => "Allerta",
                                   "Allerta Stencil" => "Allerta Stencil",
                                   "Allura" => "Allura",
                                   "Almendra" => "Almendra",
                                   "Almendra SC" => "Almendra SC",
                                   "Amaranth" => "Amaranth",
                                   "Amatic SC" => "Amatic SC",
                                   "Amethysta" => "Amethysta",
                                   "Andada" => "Andada",
                                   "Andika" => "Andika",
                                   "Angkor" => "Angkor",
                                   "Annie Use Your Telescope" => "Annie Use Your Telescope",
                                   "Anonymous Pro" => "Anonymous Pro",
                                   "Antic" => "Antic",
                                   "Antic Didone" => "Antic Didone",
                                   "Antic Slab" => "Antic Slab",
                                   "Anton" => "Anton",
                                   "Arapey" => "Arapey",
                                   "Arbutus" => "Arbutus",
                                   "Architects Daughter" => "Architects Daughter",
                                   "Arimo" => "Arimo",
                                   "Arizonia" => "Arizonia",
                                   "Armata" => "Armata",
                                   "Artifika" => "Artifika",
                                   "Arvo" => "Arvo",
                                   "Asap" => "Asap",
                                   "Asset" => "Asset",
                                   "Astloch" => "Astloch",
                                   "Asul" => "Asul",
                                   "Atomic Age" => "Atomic Age",
                                   "Aubrey" => "Aubrey",
                                   "Audiowide" => "Audiowide",
                                   "Average" => "Average",
                                   "Averia Gruesa Libre" => "Averia Gruesa Libre",
                                   "Averia Libre" => "Averia Libre",
                                   "Averia Sans Libre" => "Averia Sans Libre",
                                   "Averia Serif Libre" => "Averia Serif Libre",
                                   "Bad Script" => "Bad Script",
                                   "Balthazar" => "Balthazar",
                                   "Bangers" => "Bangers",
                                   "Basic" => "Basic",
                                   "Battambang" => "Battambang",
                                   "Baumans" => "Baumans",
                                   "Bayon" => "Bayon",
                                   "Belgrano" => "Belgrano",
                                   "Belleza" => "Belleza",
                                   "Bentham" => "Bentham",
                                   "Berkshire Swash" => "Berkshire Swash",
                                   "Bevan" => "Bevan",
                                   "Bigshot One" => "Bigshot One",
                                   "Bilbo" => "Bilbo",
                                   "Bilbo Swash Caps" => "Bilbo Swash Caps",
                                   "Bitter" => "Bitter",
                                   "Black Ops One" => "Black Ops One",
                                   "Bokor" => "Bokor",
                                   "Bonbon" => "Bonbon",
                                   "Boogaloo" => "Boogaloo",
                                   "Bowlby One" => "Bowlby One",
                                   "Bowlby One SC" => "Bowlby One SC",
                                   "Brawler" => "Brawler",
                                   "Bree Serif" => "Bree Serif",
                                   "Bubblegum Sans" => "Bubblegum Sans",
                                   "Buda" => "Buda",
                                   "Buenard" => "Buenard",
                                   "Butcherman" => "Butcherman",
                                   "Butterfly Kids" => "Butterfly Kids",
                                   "Cabin" => "Cabin",
                                   "Cabin Condensed" => "Cabin Condensed",
                                   "Cabin Sketch" => "Cabin Sketch",
                                   "Caesar Dressing" => "Caesar Dressing",
                                   "Cagliostro" => "Cagliostro",
                                   "Calligraffitti" => "Calligraffitti",
                                   "Cambo" => "Cambo",
                                   "Candal" => "Candal",
                                   "Cantarell" => "Cantarell",
                                   "Cantata One" => "Cantata One",
                                   "Cardo" => "Cardo",
                                   "Carme" => "Carme",
                                   "Carter One" => "Carter One",
                                   "Caudex" => "Caudex",
                                   "Cedarville Cursive" => "Cedarville Cursive",
                                   "Ceviche One" => "Ceviche One",
                                   "Changa One" => "Changa One",
                                   "Chango" => "Chango",
                                   "Chau Philomene One" => "Chau Philomene One",
                                   "Chelsea Market" => "Chelsea Market",
                                   "Chenla" => "Chenla",
                                   "Cherry Cream Soda" => "Cherry Cream Soda",
                                   "Chewy" => "Chewy",
                                   "Chicle" => "Chicle",
                                   "Chivo" => "Chivo",
                                   "Coda" => "Coda",
                                   "Coda Caption" => "Coda Caption",
                                   "Codystar" => "Codystar",
                                   "Comfortaa" => "Comfortaa",
                                   "Coming Soon" => "Coming Soon",
                                   "Concert One" => "Concert One",
                                   "Condiment" => "Condiment",
                                   "Content" => "Content",
                                   "Contrail One" => "Contrail One",
                                   "Convergence" => "Convergence",
                                   "Cookie" => "Cookie",
                                   "Copse" => "Copse",
                                   "Corben" => "Corben",
                                   "Cousine" => "Cousine",
                                   "Coustard" => "Coustard",
                                   "Covered By Your Grace" => "Covered By Your Grace",
                                   "Crafty Girls" => "Crafty Girls",
                                   "Creepster" => "Creepster",
                                   "Crete Round" => "Crete Round",
                                   "Crimson Text" => "Crimson Text",
                                   "Crushed" => "Crushed",
                                   "Cuprum" => "Cuprum",
                                   "Cutive" => "Cutive",
                                   "Damion" => "Damion",
                                   "Dancing Script" => "Dancing Script",
                                   "Dangrek" => "Dangrek",
                                   "Dawning of a New Day" => "Dawning of a New Day",
                                   "Days One" => "Days One",
                                   "Delius" => "Delius",
                                   "Delius Swash Caps" => "Delius Swash Caps",
                                   "Delius Unicase" => "Delius Unicase",
                                   "Della Respira" => "Della Respira",
                                   "Devonshire" => "Devonshire",
                                   "Didact Gothic" => "Didact Gothic",
                                   "Diplomata" => "Diplomata",
                                   "Diplomata SC" => "Diplomata SC",
                                   "Doppio One" => "Doppio One",
                                   "Dorsa" => "Dorsa",
                                   "Dosis" => "Dosis",
                                   "Dr Sugiyama" => "Dr Sugiyama",
                                   "Droid Sans" => "Droid Sans",
                                   "Droid Sans Mono" => "Droid Sans Mono",
                                   "Droid Serif" => "Droid Serif",
                                   "Duru Sans" => "Duru Sans",
                                   "Dynalight" => "Dynalight",
                                   "EB Garamond" => "EB Garamond",
                                   "Eater" => "Eater",
                                   "Economica" => "Economica",
                                   "Electrolize" => "Electrolize",
                                   "Emblema One" => "Emblema One",
                                   "Emilys Candy" => "Emilys Candy",
                                   "Engagement" => "Engagement",
                                   "Enriqueta" => "Enriqueta",
                                   "Erica One" => "Erica One",
                                   "Esteban" => "Esteban",
                                   "Euphoria Script" => "Euphoria Script",
                                   "Ewert" => "Ewert",
                                   "Exo" => "Exo",
                                   "Expletus Sans" => "Expletus Sans",
                                   "Fanwood Text" => "Fanwood Text",
                                   "Fascinate" => "Fascinate",
                                   "Fascinate Inline" => "Fascinate Inline",
                                   "Federant" => "Federant",
                                   "Federo" => "Federo",
                                   "Felipa" => "Felipa",
                                   "Fjord One" => "Fjord One",
                                   "Flamenco" => "Flamenco",
                                   "Flavors" => "Flavors",
                                   "Fondamento" => "Fondamento",
                                   "Fontdiner Swanky" => "Fontdiner Swanky",
                                   "Forum" => "Forum",
                                   "Francois One" => "Francois One",
                                   "Fredericka the Great" => "Fredericka the Great",
                                   "Fredoka One" => "Fredoka One",
                                   "Freehand" => "Freehand",
                                   "Fresca" => "Fresca",
                                   "Frijole" => "Frijole",
                                   "Fugaz One" => "Fugaz One",
                                   "GFS Didot" => "GFS Didot",
                                   "GFS Neohellenic" => "GFS Neohellenic",
                                   "Galdeano" => "Galdeano",
                                   "Gentium Basic" => "Gentium Basic",
                                   "Gentium Book Basic" => "Gentium Book Basic",
                                   "Geo" => "Geo",
                                   "Geostar" => "Geostar",
                                   "Geostar Fill" => "Geostar Fill",
                                   "Germania One" => "Germania One",
                                   "Give You Glory" => "Give You Glory",
                                   "Glass Antiqua" => "Glass Antiqua",
                                   "Glegoo" => "Glegoo",
                                   "Gloria Hallelujah" => "Gloria Hallelujah",
                                   "Goblin One" => "Goblin One",
                                   "Gochi Hand" => "Gochi Hand",
                                   "Gorditas" => "Gorditas",
                                   "Goudy Bookletter 1911" => "Goudy Bookletter 1911",
                                   "Graduate" => "Graduate",
                                   "Gravitas One" => "Gravitas One",
                                   "Great Vibes" => "Great Vibes",
                                   "Gruppo" => "Gruppo",
                                   "Gudea" => "Gudea",
                                   "Habibi" => "Habibi",
                                   "Hammersmith One" => "Hammersmith One",
                                   "Handlee" => "Handlee",
                                   "Hanuman" => "Hanuman",
                                   "Happy Monkey" => "Happy Monkey",
                                   "Henny Penny" => "Henny Penny",
                                   "Herr Von Muellerhoff" => "Herr Von Muellerhoff",
                                   "Holtwood One SC" => "Holtwood One SC",
                                   "Homemade Apple" => "Homemade Apple",
                                   "Homenaje" => "Homenaje",
                                   "IM Fell DW Pica" => "IM Fell DW Pica",
                                   "IM Fell DW Pica SC" => "IM Fell DW Pica SC",
                                   "IM Fell Double Pica" => "IM Fell Double Pica",
                                   "IM Fell Double Pica SC" => "IM Fell Double Pica SC",
                                   "IM Fell English" => "IM Fell English",
                                   "IM Fell English SC" => "IM Fell English SC",
                                   "IM Fell French Canon" => "IM Fell French Canon",
                                   "IM Fell French Canon SC" => "IM Fell French Canon SC",
                                   "IM Fell Great Primer" => "IM Fell Great Primer",
                                   "IM Fell Great Primer SC" => "IM Fell Great Primer SC",
                                   "Iceberg" => "Iceberg",
                                   "Iceland" => "Iceland",
                                   "Imprima" => "Imprima",
                                   "Inconsolata" => "Inconsolata",
                                   "Inder" => "Inder",
                                   "Indie Flower" => "Indie Flower",
                                   "Inika" => "Inika",
                                   "Irish Grover" => "Irish Grover",
                                   "Istok Web" => "Istok Web",
                                   "Italiana" => "Italiana",
                                   "Italianno" => "Italianno",
                                   "Jim Nightshade" => "Jim Nightshade",
                                   "Jockey One" => "Jockey One",
                                   "Jolly Lodger" => "Jolly Lodger",
                                   "Josefin Sans" => "Josefin Sans",
                                   "Josefin Slab" => "Josefin Slab",
                                   "Judson" => "Judson",
                                   "Julee" => "Julee",
                                   "Junge" => "Junge",
                                   "Jura" => "Jura",
                                   "Just Another Hand" => "Just Another Hand",
                                   "Just Me Again Down Here" => "Just Me Again Down Here",
                                   "Kameron" => "Kameron",
                                   "Karla" => "Karla",
                                   "Kaushan Script" => "Kaushan Script",
                                   "Kelly Slab" => "Kelly Slab",
                                   "Kenia" => "Kenia",
                                   "Khmer" => "Khmer",
                                   "Knewave" => "Knewave",
                                   "Kotta One" => "Kotta One",
                                   "Koulen" => "Koulen",
                                   "Kranky" => "Kranky",
                                   "Kreon" => "Kreon",
                                   "Kristi" => "Kristi",
                                   "Krona One" => "Krona One",
                                   "La Belle Aurore" => "La Belle Aurore",
                                   "Lancelot" => "Lancelot",
                                   "Lato" => "Lato",
                                   "League Script" => "League Script",
                                   "Leckerli One" => "Leckerli One",
                                   "Ledger" => "Ledger",
                                   "Lekton" => "Lekton",
                                   "Lemon" => "Lemon",
                                   "Lilita One" => "Lilita One",
                                   "Limelight" => "Limelight",
                                   "Linden Hill" => "Linden Hill",
                                   "Lobster" => "Lobster",
                                   "Lobster Two" => "Lobster Two",
                                   "Londrina Outline" => "Londrina Outline",
                                   "Londrina Shadow" => "Londrina Shadow",
                                   "Londrina Sketch" => "Londrina Sketch",
                                   "Londrina Solid" => "Londrina Solid",
                                   "Lora" => "Lora",
                                   "Love Ya Like A Sister" => "Love Ya Like A Sister",
                                   "Loved by the King" => "Loved by the King",
                                   "Lovers Quarrel" => "Lovers Quarrel",
                                   "Luckiest Guy" => "Luckiest Guy",
                                   "Lusitana" => "Lusitana",
                                   "Lustria" => "Lustria",
                                   "Macondo" => "Macondo",
                                   "Macondo Swash Caps" => "Macondo Swash Caps",
                                   "Magra" => "Magra",
                                   "Maiden Orange" => "Maiden Orange",
                                   "Mako" => "Mako",
                                   "Marck Script" => "Marck Script",
                                   "Marko One" => "Marko One",
                                   "Marmelad" => "Marmelad",
                                   "Marvel" => "Marvel",
                                   "Mate" => "Mate",
                                   "Mate SC" => "Mate SC",
                                   "Maven Pro" => "Maven Pro",
                                   "Meddon" => "Meddon",
                                   "MedievalSharp" => "MedievalSharp",
                                   "Medula One" => "Medula One",
                                   "Megrim" => "Megrim",
                                   "Merienda One" => "Merienda One",
                                   "Merriweather" => "Merriweather",
                                   "Metal" => "Metal",
                                   "Metamorphous" => "Metamorphous",
                                   "Metrophobic" => "Metrophobic",
                                   "Michroma" => "Michroma",
                                   "Miltonian" => "Miltonian",
                                   "Miltonian Tattoo" => "Miltonian Tattoo",
                                   "Miniver" => "Miniver",
                                   "Miss Fajardose" => "Miss Fajardose",
                                   "Modern Antiqua" => "Modern Antiqua",
                                   "Molengo" => "Molengo",
                                   "Monofett" => "Monofett",
                                   "Monoton" => "Monoton",
                                   "Monsieur La Doulaise" => "Monsieur La Doulaise",
                                   "Montaga" => "Montaga",
                                   "Montez" => "Montez",
                                   "Montserrat" => "Montserrat",
                                   "Moul" => "Moul",
                                   "Moulpali" => "Moulpali",
                                   "Mountains of Christmas" => "Mountains of Christmas",
                                   "Mr Bedfort" => "Mr Bedfort",
                                   "Mr Dafoe" => "Mr Dafoe",
                                   "Mr De Haviland" => "Mr De Haviland",
                                   "Mrs Saint Delafield" => "Mrs Saint Delafield",
                                   "Mrs Sheppards" => "Mrs Sheppards",
                                   "Muli" => "Muli",
                                   "Mystery Quest" => "Mystery Quest",
                                   "Neucha" => "Neucha",
                                   "Neuton" => "Neuton",
                                   "News Cycle" => "News Cycle",
                                   "Niconne" => "Niconne",
                                   "Nixie One" => "Nixie One",
                                   "Nobile" => "Nobile",
                                   "Nokora" => "Nokora",
                                   "Norican" => "Norican",
                                   "Nosifer" => "Nosifer",
                                   "Nothing You Could Do" => "Nothing You Could Do",
                                   "Noticia Text" => "Noticia Text",
                                   "Nova Cut" => "Nova Cut",
                                   "Nova Flat" => "Nova Flat",
                                   "Nova Mono" => "Nova Mono",
                                   "Nova Oval" => "Nova Oval",
                                   "Nova Round" => "Nova Round",
                                   "Nova Script" => "Nova Script",
                                   "Nova Slim" => "Nova Slim",
                                   "Nova Square" => "Nova Square",
                                   "Numans" => "Numans",
                                   "Nunito" => "Nunito",
                                   "Odor Mean Chey" => "Odor Mean Chey",
                                   "Old Standard TT" => "Old Standard TT",
                                   "Oldenburg" => "Oldenburg",
                                   "Oleo Script" => "Oleo Script",
                                   "Open Sans" => "Open Sans",
                                   "Open Sans Condensed" => "Open Sans Condensed",
                                   "Orbitron" => "Orbitron",
                                   "Original Surfer" => "Original Surfer",
                                   "Oswald" => "Oswald",
                                   "Over the Rainbow" => "Over the Rainbow",
                                   "Overlock" => "Overlock",
                                   "Overlock SC" => "Overlock SC",
                                   "Ovo" => "Ovo",
                                   "Oxygen" => "Oxygen",
                                   "PT Mono" => "PT Mono",
                                   "PT Sans" => "PT Sans",
                                   "PT Sans Caption" => "PT Sans Caption",
                                   "PT Sans Narrow" => "PT Sans Narrow",
                                   "PT Serif" => "PT Serif",
                                   "PT Serif Caption" => "PT Serif Caption",
                                   "Pacifico" => "Pacifico",
                                   "Parisienne" => "Parisienne",
                                   "Passero One" => "Passero One",
                                   "Passion One" => "Passion One",
                                   "Patrick Hand" => "Patrick Hand",
                                   "Patua One" => "Patua One",
                                   "Paytone One" => "Paytone One",
                                   "Permanent Marker" => "Permanent Marker",
                                   "Petrona" => "Petrona",
                                   "Philosopher" => "Philosopher",
                                   "Piedra" => "Piedra",
                                   "Pinyon Script" => "Pinyon Script",
                                   "Plaster" => "Plaster",
                                   "Play" => "Play",
                                   "Playball" => "Playball",
                                   "Playfair Display" => "Playfair Display",
                                   "Podkova" => "Podkova",
                                   "Poiret One" => "Poiret One",
                                   "Poller One" => "Poller One",
                                   "Poly" => "Poly",
                                   "Pompiere" => "Pompiere",
                                   "Pontano Sans" => "Pontano Sans",
                                   "Port Lligat Sans" => "Port Lligat Sans",
                                   "Port Lligat Slab" => "Port Lligat Slab",
                                   "Prata" => "Prata",
                                   "Preahvihear" => "Preahvihear",
                                   "Press Start 2P" => "Press Start 2P",
                                   "Princess Sofia" => "Princess Sofia",
                                   "Prociono" => "Prociono",
                                   "Prosto One" => "Prosto One",
                                   "Puritan" => "Puritan",
                                   "Quantico" => "Quantico",
                                   "Quattrocento" => "Quattrocento",
                                   "Quattrocento Sans" => "Quattrocento Sans",
                                   "Questrial" => "Questrial",
                                   "Quicksand" => "Quicksand",
                                   "Qwigley" => "Qwigley",
                                   "Radley" => "Radley",
                                   "Raleway" => "Raleway",
                                   "Rammetto One" => "Rammetto One",
                                   "Rancho" => "Rancho",
                                   "Rationale" => "Rationale",
                                   "Redressed" => "Redressed",
                                   "Reenie Beanie" => "Reenie Beanie",
                                   "Revalia" => "Revalia",
                                   "Ribeye" => "Ribeye",
                                   "Ribeye Marrow" => "Ribeye Marrow",
                                   "Righteous" => "Righteous",
                                   "Rochester" => "Rochester",
                                   "Rock Salt" => "Rock Salt",
                                   "Rokkitt" => "Rokkitt",
                                   "Ropa Sans" => "Ropa Sans",
                                   "Rosario" => "Rosario",
                                   "Rosarivo" => "Rosarivo",
                                   "Rouge Script" => "Rouge Script",
                                   "Ruda" => "Ruda",
                                   "Ruge Boogie" => "Ruge Boogie",
                                   "Ruluko" => "Ruluko",
                                   "Ruslan Display" => "Ruslan Display",
                                   "Russo One" => "Russo One",
                                   "Ruthie" => "Ruthie",
                                   "Sail" => "Sail",
                                   "Salsa" => "Salsa",
                                   "Sancreek" => "Sancreek",
                                   "Sansita One" => "Sansita One",
                                   "Sarina" => "Sarina",
                                   "Satisfy" => "Satisfy",
                                   "Schoolbell" => "Schoolbell",
                                   "Seaweed Script" => "Seaweed Script",
                                   "Sevillana" => "Sevillana",
                                   "Shadows Into Light" => "Shadows Into Light",
                                   "Shadows Into Light Two" => "Shadows Into Light Two",
                                   "Shanti" => "Shanti",
                                   "Share" => "Share",
                                   "Shojumaru" => "Shojumaru",
                                   "Short Stack" => "Short Stack",
                                   "Siemreap" => "Siemreap",
                                   "Sigmar One" => "Sigmar One",
                                   "Signika" => "Signika",
                                   "Signika Negative" => "Signika Negative",
                                   "Simonetta" => "Simonetta",
                                   "Sirin Stencil" => "Sirin Stencil",
                                   "Six Caps" => "Six Caps",
                                   "Slackey" => "Slackey",
                                   "Smokum" => "Smokum",
                                   "Smythe" => "Smythe",
                                   "Sniglet" => "Sniglet",
                                   "Snippet" => "Snippet",
                                   "Sofia" => "Sofia",
                                   "Sonsie One" => "Sonsie One",
                                   "Sorts Mill Goudy" => "Sorts Mill Goudy",
                                   "Special Elite" => "Special Elite",
                                   "Spicy Rice" => "Spicy Rice",
                                   "Spinnaker" => "Spinnaker",
                                   "Spirax" => "Spirax",
                                   "Squada One" => "Squada One",
                                   "Stardos Stencil" => "Stardos Stencil",
                                   "Stint Ultra Condensed" => "Stint Ultra Condensed",
                                   "Stint Ultra Expanded" => "Stint Ultra Expanded",
                                   "Stoke" => "Stoke",
                                   "Sue Ellen Francisco" => "Sue Ellen Francisco",
                                   "Sunshiney" => "Sunshiney",
                                   "Supermercado One" => "Supermercado One",
                                   "Suwannaphum" => "Suwannaphum",
                                   "Swanky and Moo Moo" => "Swanky and Moo Moo",
                                   "Syncopate" => "Syncopate",
                                   "Tangerine" => "Tangerine",
                                   "Taprom" => "Taprom",
                                   "Telex" => "Telex",
                                   "Tenor Sans" => "Tenor Sans",
                                   "The Girl Next Door" => "The Girl Next Door",
                                   "Tienne" => "Tienne",
                                   "Tinos" => "Tinos",
                                   "Titan One" => "Titan One",
                                   "Trade Winds" => "Trade Winds",
                                   "Trocchi" => "Trocchi",
                                   "Trochut" => "Trochut",
                                   "Trykker" => "Trykker",
                                   "Tulpen One" => "Tulpen One",
                                   "Ubuntu" => "Ubuntu",
                                   "Ubuntu Condensed" => "Ubuntu Condensed",
                                   "Ubuntu Mono" => "Ubuntu Mono",
                                   "Ultra" => "Ultra",
                                   "Uncial Antiqua" => "Uncial Antiqua",
                                   "UnifrakturCook" => "UnifrakturCook",
                                   "UnifrakturMaguntia" => "UnifrakturMaguntia",
                                   "Unkempt" => "Unkempt",
                                   "Unlock" => "Unlock",
                                   "Unna" => "Unna",
                                   "VT323" => "VT323",
                                   "Varela" => "Varela",
                                   "Varela Round" => "Varela Round",
                                   "Vast Shadow" => "Vast Shadow",
                                   "Vibur" => "Vibur",
                                   "Vidaloka" => "Vidaloka",
                                   "Viga" => "Viga",
                                   "Voces" => "Voces",
                                   "Volkhov" => "Volkhov",
                                   "Vollkorn" => "Vollkorn",
                                   "Voltaire" => "Voltaire",
                                   "Waiting for the Sunrise" => "Waiting for the Sunrise",
                                   "Wallpoet" => "Wallpoet",
                                   "Walter Turncoat" => "Walter Turncoat",
                                   "Wellfleet" => "Wellfleet",
                                   "Wire One" => "Wire One",
                                   "Yanone Kaffeesatz" => "Yanone Kaffeesatz",
                                   "Yellowtail" => "Yellowtail",
                                   "Yeseva One" => "Yeseva One",
                                   "Yesteryear" => "Yesteryear",
                                   "Zeyada" => "Zeyada",
                              );

/* ---------------------------------------------------------------------------------------------------
    GENERAL SETTINGS
--------------------------------------------------------------------------------------------------- */

$options[] = array( 'title' => 'General',
                    'image' => '<img class="retina" src="'.get_bloginfo("template_directory").'/wps-panel/images/General.png" width="26">',
                    'type'  => 'open',
                    'desc'  => 'Here goes the description for this section');

$options[] = array( 'title'   =>   '<h1>General settings</h1><br><hr>',
                    'type'    =>   'title' );

$options[] = array( 'title'   =>   '<h2>Brand</h2>',
                    'type'    =>   'sub_title' );

$options[] = array( 'title'   =>   'Upload logo',
                    'id'      =>   $shortname.'_general_logo',
                    'std'     =>   '',
                    'type'    =>   'upload_text_img' );

$options[] = array( 'title'   =>   '',
                    'id'      =>   $shortname.'_general_logo_@2x',
                    'std'     =>   '',
                    'class'   =>   'retinaupload',
                    'type'    =>   'sub_upload_text_img' );

$options[] = array( 'title'   =>   'Favicon',
                    'id'      =>   $shortname.'_general_favicon',
                    'std'     =>   '',
                    'type'    =>   'upload_text_img' );

$options[] = array( 'title'   =>   '',
                    'id'      =>   $shortname.'_general_favicon_@2x',
                    'std'     =>   '',
                    'class'   =>   'retinaupload',
                    'type'    =>   'sub_upload_text_img' );

$options[] = array( 'title'   =>   'Name of blog',
                    'id'      =>   $shortname.'_general_name',
                    'std'     =>   'K.',
                    'type'    =>   'text' );

$options[] = array( 'title'   =>   'Description of blog',
                    'id'      =>   $shortname.'_general_description',
                    'std'     =>   'A blog based on K. theme',
                    'type'    =>   'text' );

$options[] = array( 'title'   =>   'Footer Copyright',
                    'id'      =>   $shortname.'_general_footer_copyright',
                    'std'     =>   'copyright AgenceMe 2013',
                    'type'    =>   'text' );

$options[] = array( 'title'   =>   'Google Analytics',
                    'id'      =>   $shortname.'_general_google_analytics',
                    'type'    =>   'textarea' );

$options[] = array( 'title'   =>   '<hr><h2>Top Bar</h2>',
                    'type'    =>   'sub_title' );

$options[] = array( 'title'   =>   'Top Bar Height',
                    'id'      =>   $shortname.'_general_top_bar_height',
                    'std'     =>   '40',
                    'type'    =>   'text' );

$options[] = array( 'title'   =>   'Twitter account',
                    'id'      =>   $shortname.'_general_twitter_top',
                    'std'     =>   '',
                    'type'    =>   'text' );

$options[] = array( 'title'   =>   'Name Fan page Facebook',
                    'id'      =>   $shortname.'_general_facebook_name',
                    'std'     =>   '',
                    'type'    =>   'text' );

$options[] = array( 'title'   =>   'ID Fan page Facebook',
                    'id'      =>   $shortname.'_general_facebook_id',
                    'std'     =>   '',
                    'type'    =>   'text' );

$options[] = array( 'title'   =>   '<hr><h2>Footer</h2>',
                    'type'    =>   'sub_title' );

$options[] = array( 'title'   =>   'Facebook',
                    'id'      =>   $shortname.'_general_facebook',
                    'std'     =>   '',
                    'plh'     =>   'http://www.facebook.com/',
                    'type'    =>   'text' );

$options[] = array( 'title'   =>   'Twitter',
                    'id'      =>   $shortname.'_general_twitter',
                    'plh'     =>   'https://www.twitter.com/',
                    'std'     =>   '',
                    'type'    =>   'text' );

$options[] = array( 'title'   =>   'Google+',
                    'id'      =>   $shortname.'_general_gplus',
                    'plh'     =>   'https://plus.google.com/',
                    'std'     =>   '',
                    'type'    =>   'text' );

$options[] = array( 'title'   =>   'Dribbble',
                    'id'      =>   $shortname.'_general_dribbble',
                    'plh'     =>   'http://dribbble.com/',
                    'std'     =>   '',
                    'type'    =>   'text' );

$options[] = array( 'title'   =>   'Flickr',
                    'id'      =>   $shortname.'_general_flickr',
                    'plh'     =>   'http://www.flickr.com/',
                    'std'     =>   '',
                    'type'    =>   'text' );

$options[] = array( 'title'   =>   'Instagram',
                    'id'      =>   $shortname.'_general_instagram',
                    'plh'     =>   'http://instagram.com/',
                    'std'     =>   '',
                    'type'    =>   'text' );

$options[] = array( 'title'   =>   'Skype',
                    'id'      =>   $shortname.'_general_skype',
                    'plh'     =>   'http://www.skype.com/fr/',
                    'std'     =>   '',
                    'type'    =>   'text' );

$options[] = array( 'title'   =>   'Github',
                    'id'      =>   $shortname.'_general_github',
                    'plh'     =>   'https://github.com/',
                    'std'     =>   '',
                    'type'    =>   'text' );

$options[] = array( 'title'   =>   'Vimeo',
                    'id'      =>   $shortname.'_general_vimeo',
                    'plh'     =>   'http://vimeo.com/',
                    'std'     =>   '',
                    'type'    =>   'text' );

$options[] = array( 'title'   =>   'Youtube',
                    'id'      =>   $shortname.'_general_youtube',
                    'plh'     =>   'http://www.youtube.com/user/',
                    'std'     =>   '',
                    'type'    =>   'text' );



$options[] = array( 'type'  => 'close' );

/* ---------------------------------------------------------------------------------------------------
    SLIDER HEADER SETTINGS
--------------------------------------------------------------------------------------------------- */

$options[] = array( 'title' => 'Home',
                    'image' => '<img class="retina" src="'.get_bloginfo("template_directory").'/wps-panel/images/home_page.png" width="18">',
                    'id'    => $shortname.'_active_slider_header_notif',
                    'type'  => 'open_check',
                    'desc'  => 'Here goes the description for this section');

$options[] = array( 'title' => '<h1>Home Page</h1>',
                    'id'    => $shortname.'_active_slider_header',
                    'opts'  => array( 'Visible' => 'checked' ),
                    'std'   => '',
                    'type'  => 'checkbox_show_cat' );

$options[] = array( 'type'  => 'open_slider_header' );

$options[] = array( 'title'   =>   '<h2>Slideshow</h2>',
                    'image' => '<img class="retina" src="'.get_bloginfo("template_directory").'/wps-panel/images/slideshow.png" width="21">',
                    'type'    =>   'title_img' );

$options[] = array( 'title'   =>   'Transition speed (ms)',
                    'id'      =>   $shortname.'_interval_header_slide',
                    'std'     =>   '5000',
                    'type'    =>   'text' );

$options[] = array( 'title' => 'Show arrow',
                    'id'    => $shortname.'_arrow_header_slide',
                    'class' => 'styled-checkbox',
                    'std'   => '',
                    'type'  => 'checkbox' );

$options[] = array( 'title' => 'Automatique',
                    'id'    => $shortname.'_auto_header_slide',
                    'class' => 'styled-checkbox',
                    'std'   => '',
                    'type'  => 'checkbox' );

$options[] = array( 'title'   =>   'Name for Mobile Responsive',
                    'id'      =>   $shortname.'_header_name_mobile',
                    'std'     =>   'the Home',
                    'type'    =>   'text' );

$options[] = array( 'title'   =>   'Button text',
                    'id'      =>   $shortname.'_header_button_text',
                    'std'     =>   'DISCOVER',
                    'type'    =>   'text' );

$options[] = array( 'title' => 'Autoplay Videos',
                    'id'    => $shortname.'_header_slide_video_autoplay',
                    'class' => 'styled-checkbox',
                    'std'   => '',
                    'type'  => 'checkbox' );

$options[] = array( 'title'   =>   '<h2>Title</h2>',
                    'type'    =>   'title' );

$options[] = array( 'title'   =>   'Title color',
                    'id'      =>   $shortname.'_header_h1_color',
                    'std'     =>   '#fff',
                    'type'    =>   'color_choice' );

$options[] = array( 'title'   =>   'Title font size',
                    'id'      =>   $shortname.'_header_h1_size',
                    'std'     =>   '55',
                    'type'    =>   'text' );

$options[] = array( "title" => "Title standard fonts",
                         "id" => $shortname.'_select_stand_font_header_h1',
                         "opts" => $standard_fonts,
                         "std" => "0",
                         "type" => "select_font" );

$options[] = array( "title" => "Title Google fonts",
                         "id" => $shortname.'_select_google_font_header_h1',
                         "opts" => $google_fonts,
                         "std" => "Open Sans",
                         "type" => "select_font" );

$options[] = array( 'title'   =>   '<h2>Description</h2>',
                    'type'    =>   'title' );

$options[] = array( 'title'   =>   'Text color',
                    'id'      =>   $shortname.'_header_text_color',
                    'std'     =>   '#fff',
                    'type'    =>   'color_choice' );

$options[] = array( 'title'   =>   'Text font size',
                    'id'      =>   $shortname.'_header_text_size',
                    'std'     =>   '22',
                    'type'    =>   'text' );

$options[] = array( "title" => "Text standard fonts",
                         "id" => $shortname.'_select_stand_font_header_text',
                         "opts" => $standard_fonts,
                         "std" => "0",
                         "type" => "select_font" );

$options[] = array( "title" => "Text Google fonts",
                         "id" => $shortname.'_select_google_font_header_text',
                         "opts" => $google_fonts,
                         "std" => "Open Sans",
                         "type" => "select_font" );

$options[] = array( 'title' => '<h2>Pictures</h2>',
                    'image' => '<img class="retina" src="'.get_bloginfo("template_directory").'/wps-panel/images/pictures.png" width="18">',
                    'id'    => $shortname.'_number_slides',
                    'class'    => $shortname.'_count',
                    'std'   => '0',
                    'type'  => 'title_text' );

$options[] = array( 'title' => 'Add',
                    'id'    => $shortname.'_add_header_slide',
                    'std'   => '',
                    'type'  => 'add_slide' );

for($i=1; $i<=$number_slides; ++$i){
     $options[] = array( 'title'   =>   ''.$i.'. Picture '.$i.'',
                         'type'    =>   'open_sub_header',
                         'id'      =>   'picture_header_slide_'.$i );

     $options[] = array( 'title'   =>   'Title',
                         'id'      =>   $shortname.'_title_header_slide'.$i.'',
                         'std'     =>   '',
                         'type'    =>   'text' );

     $options[] = array( 'title'   =>   'Description',
                         'id'      =>   $shortname.'_description_header_slide'.$i.'',
                         'std'     =>   ' ',
                         'type'    =>   'textarea' );

     $options[] = array( 'title'   =>   'Photo',
                         'id'      =>   $shortname.'_header_slide_'.$i.'',
                         'std'     =>   '',
                         'type'    =>   'upload_text_img' );

     $options[] = array( 'title' => 'Video source',
                         'id'    => $shortname.'_header_video_source_slide_'.$i,
                         'opts'  => array( 'Youtube' => 'http://www.youtube.com/embed/', 'Vimeo' => 'http://player.vimeo.com/video/', 'Dailymotion' => 'http://www.dailymotion.com/embed/video/' ),
                         'std'   => 'Youtube',
                         'type'  => 'select' );

     $options[] = array( 'title'   =>   'Video ID',
                         'id'      =>   $shortname.'_header_video_id_slide_'.$i.'',
                         'std'     =>   '',
                         'type'    =>   'text' );

     $options[] = array( 'type'  => 'close_sub' );
}

$options[] = array( 'type'  => 'close_sub' );

$options[] = array( 'type'  => 'close' );

/* ---------------------------------------------------------------------------------------------------
    the Story Section
--------------------------------------------------------------------------------------------------- */

$options[] = array( 'title' => 'Timeline',
                    'image' => '<img class="retina" src="'.get_bloginfo("template_directory").'/wps-panel/images/timeline_page.png" width="14">',
                    'id'    => $shortname.'_active_timeline_page_notif',
                    'type'  => 'open_check',
                    'desc'  => 'Here goes the description for this section');

$options[] = array( 'title' => '<h1>Timeline Page</h1>',
                    'id'    => $shortname.'_active_timeline_page',
                    'opts'  => array( 'Visible' => 'checked' ),
                    'std'   => '',
                    'type'  => 'checkbox_show_cat' );

$options[] = array( 'type'  => 'open_timeline_page' );

$options[] = array( 'title' => 'Name menu',
                    'id'    => $shortname.'_title_timeline_page',
                    'std'   => 'the Story',
                    'type'  => 'text' );

$options[] = array( 'title' => 'Title',
                    'id'    => $shortname.'_title_intro_1',
                    'std'   => '',
                    'type'  => 'text' );

$options[] = array( 'title' => 'Introduction',
                    'id'    => $shortname.'_intro_1',
                    'std'   => '',
                    'type'  => 'textarea' );

$options[] = array( 'title'   =>   'Background Color',
                    'id'      =>   $shortname.'_timeline_bg_color',
                    'std'     =>   '#fff',
                    'type'    =>   'color_choice' );

$options[] = array( 'title' => '<h2>Events</h2>',
                    'id'    => $shortname.'_number_events',
                    'class'    => $shortname.'_count',
                    'image' => '<img class="retina" src="'.get_bloginfo("template_directory").'/wps-panel/images/timeline_page.png" width="14">',
                    'std'   => '0',
                    'type'  => 'title_text' );

$options[] = array( 'title' => 'Add',
                    'id'    => $shortname.'_add_event',
                    'std'   => '',
                    'type'  => 'add_slide' );

$number_events = get_option('wps_number_events');

for($i=1; $i<=$number_events; ++$i){
     $options[] = array( 'title'   =>   ''.$i.'. Event '.$i.'',
                         'type'    =>   'open_sub_event',
                         'id'      =>   'event_'.$i );

     $options[] = array( 'title'   =>   'Title',
                         'id'      =>   $shortname.'_event_'.$i.'_title',
                         'std'     =>   '',
                         'type'    =>   'text' );

     $options[] = array( 'title'   =>   'Descritpion',
                         'id'      =>   $shortname.'_event_'.$i.'_description',
                         'std'     =>   '',
                         'type'    =>   'textarea' );

     $options[] = array( 'title'   =>   'Month',
                         'id'      =>   $shortname.'_event_'.$i.'_month',
                         'std'     =>   '',
                         'type'    =>   'text' );

     $options[] = array( 'title'   =>   'Year',
                         'id'      =>   $shortname.'_event_'.$i.'_year',
                         'std'     =>   '',
                         'type'    =>   'text' );

     $options[] = array( 'type'  => 'close_sub' );
}

$options[] = array( 'type'  => 'close_sub' );

$options[] = array( 'type'  => 'close' );

/* ---------------------------------------------------------------------------------------------------
    meet Team Section
--------------------------------------------------------------------------------------------------- */

$options[] = array( 'title' => 'Thumbnail',
                    'image' => '<img class="retina" src="'.get_bloginfo("template_directory").'/wps-panel/images/thumbnail_page.png" width="24">',
                    'id'    => $shortname.'_active_thumbnail_page_notif',
                    'type'  => 'open_check',
                    'desc'  => 'Here goes the description for this section');

$options[] = array( 'title' => '<h1>Thumbnail Page</h1>',
                    'id'    => $shortname.'_active_thumbnail_page',
                    'opts'  => array( 'Visible' => 'checked' ),
                    'std'   => '',
                    'type'  => 'checkbox_show_cat' );

$options[] = array( 'type'  => 'open_thumbnail_page' );

$options[] = array( 'title' => 'Name menu',
                    'id'    => $shortname.'_title_thumbnail_page',
                    'std'   => 'meet Team',
                    'type'  => 'text' );

$options[] = array( 'title' => 'Title',
                    'id'    => $shortname.'_title_intro_2',
                    'std'   => '',
                    'type'  => 'text' );

$options[] = array ( 'title' => 'Text of link',
                     'id'    => $shortname.'_link_text_thumbnail',
                     'std'   => '',
                     'type'  => 'text'  );

$options[] = array( 'title'   =>   'Background Color',
                    'id'      =>   $shortname.'_thumbnail_bg_color',
                    'std'     =>   '#faf9f5',
                    'type'    =>   'color_choice' );

$options[] = array( 'title' => 'Columns',
                    'id'    => $shortname.'_number_cols_thumbnail',
                    'opts'  => array( '2 columns' => 'cols2', '3 columns' => 'cols3' ),
                    'std'   => 'cols2',
                    'type'  => 'radio_text' );

$options[] = array( 'title' => '<h2>Tabs</h2>',
                    'id'    => $shortname.'_number_tabs_team',
                    'class'    => $shortname.'_count',
                    'image' => '<img class="retina" src="'.get_bloginfo("template_directory").'/wps-panel/images/tab.png" width="26">',
                    'std'   => '0',
                    'type'  => 'title_text' );

$options[] = array( 'title' => 'Add',
                    'id'    => $shortname.'_add_tab_team',
                    'std'   => '',
                    'type'  => 'add_product' );

for($i=1; $i<=$number_tabs_team; ++$i){
     $options[] = array( 'title'   =>   ''.$i.'. Tab '.$i.'',
                         'type'    =>   'open_sub_tab_team',
                         'id'      =>   'tab_team_'.$i );

     $options[] = array( 'title'   =>   'Title',
                         'id'      =>   $shortname.'_tab_'.$i.'_team',
                         'std'     =>   '',
                         'type'    =>   'text' );

     $options[] = array( 'type'    =>   'open_sub_sub' );

     $options[] = array( 'title' => '<h3>Members</h3>',
                         'id'    => $shortname.'_number_members_tab_'.$i.'_team',
                         'image' => '<img class="retina" src="'.get_bloginfo("template_directory").'/wps-panel/images/team.png" width="15">',
                         'class' => $shortname.'_count',
                         'std'   => '0',
                         'type'  => 'title_text' );

     $options[] = array( 'title' => 'Add',
                         'id'    => $shortname.'_add_member_tab_'.$i.'_team',
                         'class' => $shortname.'_add_member_tab_team',
                         'std'   => '',
                         'type'  => 'add_slide' );

     $number_members_tab_team = get_option('wps_number_members_tab_'.$i.'_team');

     for($j=1; $j<=$number_members_tab_team; ++$j){
     $options[] = array( 'title'   =>   ''.$j.'. Member '.$j.'',
                         'type'    =>   'open_sub_member_tab_team',
                         'id'      =>   'member_'.$j.'_tab_'.$i.'_team' );

          $options[] = array( 'title'   =>   'Photo',
                         'id'      =>   $shortname.'_tab_'.$i.'_member_'.$j.'_picture',
                         'std'     =>   '',
                         'type'    =>   'upload_text' );

          $options[] = array( 'title'   =>   'Name',
                         'id'      =>   $shortname.'_tab_'.$i.'_name_member_'.$j.'',
                         'std'     =>   '',
                         'type'    =>   'text' );

          $options[] = array( 'title'   =>   'Job',
                         'id'      =>   $shortname.'_tab_'.$i.'_job_member_'.$j.'',
                         'std'     =>   '',
                         'type'    =>   'text' );

          $options[] = array( 'title'   =>   'Description',
                         'id'      =>   $shortname.'_tab_'.$i.'_description_member_'.$j.'',
                         'std'     =>   '',
                         'type'    =>   'textarea' );

          $options[] = array( 'title'   =>   'Mail',
                         'id'      =>   $shortname.'_tab_'.$i.'_mail_member_'.$j.'',
                         'std'     =>   '',
                         'type'    =>   'text' );

          $options[] = array( 'type'  => 'close_sub' );
     }

     $options[] = array( 'type'  => 'close_sub' );

     $options[] = array( 'type'  => 'close_sub' );

}

$options[] = array( 'type'  => 'close_sub' );

$options[] = array( 'type'  => 'close' );

/* ---------------------------------------------------------------------------------------------------
    our Products Section
--------------------------------------------------------------------------------------------------- */

$options[] = array( 'title' => 'Carousel',
                    'image' => '<img class="retina" src="'.get_bloginfo("template_directory").'/wps-panel/images/carousel_page.png" width="24">',
                    'id'    => $shortname.'_active_carousel_page_notif',
                    'type'  => 'open_check',
                    'desc'  => 'Here goes the description for this section');

$options[] = array( 'title' => '<h1>Carousel Page</h1>',
                    'id'    => $shortname.'_active_carousel_page',
                    'opts'  => array( 'Visible' => 'checked' ),
                    'std'   => '',
                    'type'  => 'checkbox_show_cat' );

$options[] = array( 'type'  => 'open_carousel_page' );

$options[] = array( 'title' => 'Name menu',
                    'id'    => $shortname.'_title_carousel_page',
                    'std'   => 'our Products',
                    'type'  => 'text' );

$options[] = array( 'title' => 'Title',
                    'id'    => $shortname.'_title_intro_3',
                    'std'   => '',
                    'type'  => 'text' );

$options[] = array ( 'title' => 'Text of link',
                     'id'    => $shortname.'_link_text_carousel',
                     'std'   => '',
                     'type'  => 'text'  );

$options[] = array( 'title'   =>   'Background Color',
                    'id'      =>   $shortname.'_carousel_bg_color',
                    'std'     =>   '#fff',
                    'type'    =>   'color_choice' );

$options[] = array( 'title'   =>   'Title description color',
                    'id'      =>   $shortname.'_carousel_title_color',
                    'std'     =>   '#fff',
                    'type'    =>   'color_choice' );

$options[] = array( 'title'   =>   'Text description color',
                    'id'      =>   $shortname.'_carousel_text_color',
                    'std'     =>   '#a0a8a9',
                    'type'    =>   'color_choice' );

$options[] = array( 'title' => '<h2>Tabs</h2>',
                    'image' => '<img class="retina" src="'.get_bloginfo("template_directory").'/wps-panel/images/tab.png" width="29">',
                    'id'    => $shortname.'_number_tabs_products',
                    'class' => $shortname.'_count',
                    'std'   => '0',
                    'type'  => 'title_text' );

$options[] = array( 'title' => 'Add',
                    'id'    => $shortname.'_add_tab_product',
                    'std'   => '',
                    'type'  => 'add_product' );

for($k=1; $k<=$number_tabs_products; ++$k){
     $options[] = array( 'title'   =>   ''.$k.'. Tab '.$k.'',
                         'type'    =>   'open_sub_tab_product',
                         'id'      =>   'tab_product_'.$k );

     $options[] = array( 'title' => 'Product',
                         'id'    => $shortname.'_presentation_product_'.$k.'',
                         'opts'  => array( 'iPhone' => 'iphone5', 'Tablet' => 'ipad', 'iMac' => 'imac', 'Classic' => 'null' ),
                         'std'   => 'null',
                         'type'  => 'radio_product' );

     $options[] = array( 'title'   =>   'Name tab',
                         'id'      =>   $shortname.'_tab_'.$k.'_products',
                         'std'     =>   '',
                         'type'    =>   'text' );

     $options[] = array( 'title'   =>   'Title description',
                    'id'      =>   $shortname.'_tab_products_'.$k.'_title',
                    'std'     =>   '',
                    'type'    =>   'text' );

     $options[] = array( 'title'   =>   'Description',
                    'id'      =>   $shortname.'_tab_products_'.$k.'_description',
                    'std'     =>   '',
                    'type'    =>   'textarea' );

     $options[] = array( 'title'   =>   'Link',
                    'id'      =>   $shortname.'_tab_products_'.$k.'_link',
                    'std'     =>   '#',
                    'type'    =>   'text' );

     $options[] = array( 'type'    =>   'open_sub_sub' );

     $options[] = array( 'title' => '<h3>Screenshots</h3>',
                    'id'    => $shortname.'_number_screenshots_tab_'.$k.'_products',
                    'class' => $shortname.'_count',
                    'image' => '<img class="retina" src="'.get_bloginfo("template_directory").'/wps-panel/images/pictures.png" width="18">',
                    'std'   => '0',
                    'type'  => 'title_text' );

     $options[] = array( 'title' => 'Add',
                    'id'    => $shortname.'_add_screen_tab_'.$k.'_product',
                    'class' => $shortname.'_add_screen_tab_product',
                    'std'   => '',
                    'type'  => 'add_slide' );

     $number_members_tab_products = get_option('wps_number_screenshots_tab_'.$k.'_products');

          for($l=1; $l<=$number_members_tab_products; ++$l){
               $options[] = array( 'title'   =>   ''.$l.'. Screenshot '.$l.'',
                         'type'    =>   'open_sub_screen_product',
                         'id'      =>   'screen_'.$l.'_tab_'.$k.'_product' );

               $options[] = array( 'title'   =>   'Screenshot '.$l.'',
                              'id'      =>   $shortname.'_screenshot_'.$l.'_tab_'.$k.'_product',
                              'std'     =>   '',
                              'type'    =>   'upload_text_img' );

               $options[] = array( 'type'  => 'close_sub' );
          }

     $options[] = array( 'type'  => 'close_sub' );

     $options[] = array( 'type'  => 'close_sub' );

}

$options[] = array( 'type'  => 'close_sub' );

$options[] = array( 'type'  => 'close' );

/* ---------------------------------------------------------------------------------------------------
    our Services Section
--------------------------------------------------------------------------------------------------- */

$options[] = array( 'title' => 'Gallery',
                    'image' => '<img class="retina" src="'.get_bloginfo("template_directory").'/wps-panel/images/gallery_page.png" width="13">',
                    'id'    => $shortname.'_active_gallery_page_notif',
                    'type'  => 'open_check',
                    'desc'  => 'Here goes the description for this section');

$options[] = array( 'title' => '<h1>Gallery Page</h1>',
                    'id'    => $shortname.'_active_gallery_page',
                    'opts'  => array( 'Visible' => 'checked' ),
                    'std'   => '',
                    'type'  => 'checkbox_show_cat' );

$options[] = array( 'type'  => 'open_gallery_page' );

$options[] = array( 'title' => 'Name menu',
                    'id'    => $shortname.'_title_gallery_page',
                    'std'   => 'our Services',
                    'type'  => 'text' );

$options[] = array( 'title' => 'Title',
                    'id'    => $shortname.'_title_intro_4',
                    'std'   => '',
                    'type'  => 'text' );

$options[] = array( 'title'   =>   'Background Color',
                    'id'      =>   $shortname.'_gallery_bg_color',
                    'std'     =>   '#fff',
                    'type'    =>   'color_choice' );

$options[] = array( 'title' => 'Max-Height of Images',
                    'id'    => $shortname.'_gallery_height_pict',
                    'std'   => '120',
                    'type'  => 'text' );

$options[] = array( 'title' => '<h2>Services</h2>',
                    'id'    => $shortname.'_number_services',
                    'class' => $shortname.'_count',
                    'image' => '<img class="retina" src="'.get_bloginfo("template_directory").'/wps-panel/images/pictures.png" width="18">',
                    'std'   => '0',
                    'type'  => 'title_text' );

$options[] = array( 'title' => 'Add',
                    'id'    => $shortname.'_add_service',
                    'std'   => '',
                    'type'  => 'add_slide' );

$number_services = get_option('wps_number_services');

for($i=1; $i<=$number_services; ++$i){

     $options[] = array( 'title'   =>   ''.$i.'. Picture '.$i.'',
                         'type'    =>   'open_sub_service',
                         'id'      =>   'service_'.$i );

     $options[] = array( 'title'   =>   'Title',
                         'id'      =>   $shortname.'_service_'.$i.'_title',
                         'std'     =>   '',
                         'type'    =>   'text' );

     $options[] = array( 'title'   =>   'Descritpion',
                         'id'      =>   $shortname.'_service_'.$i.'_description',
                         'std'     =>   '',
                         'type'    =>   'textarea' );

     $options[] = array( 'title'   =>   'Image',
                         'id'      =>   $shortname.'_service_'.$i.'_icon',
                         'std'     =>   '',
                         'type'    =>   'upload_text_img' );

     $options[] = array( 'title'   =>   '',
                         'id'      =>   $shortname.'_service_'.$i.'_icon_2x',
                         'std'     =>   '',
                         'class'   =>   'retinaupload',
                         'type'    =>   'sub_upload_text_img' );

     $options[] = array( 'type'  => 'close_sub' );
}

$options[] = array( 'type'  => 'close_sub' );

$options[] = array( 'type'  => 'close' );

/* ---------------------------------------------------------------------------------------------------
    Text Section
--------------------------------------------------------------------------------------------------- */

$options[] = array( 'title' => 'Text',
                    'image' => '<img class="retina" src="'.get_bloginfo("template_directory").'/wps-panel/images/text_page.png" width="17">',
                    'id'    => $shortname.'_active_text_page_notif',
                    'type'  => 'open_check',
                    'desc'  => 'Here goes the description for this section');

$options[] = array( 'title' => '<h1>Text Page</h1>',
                    'id'    => $shortname.'_active_text_page',
                    'opts'  => array( 'Visible' => 'checked' ),
                    'std'   => '',
                    'type'  => 'checkbox_show_cat' );

$options[] = array( 'type'  => 'open_text_page' );

$options[] = array( 'title' => '<h2>Text Page</h2>',
                    'id'    => $shortname.'_number_text_page',
                    'class' => $shortname.'_count',
                    'image' => '<img class="retina" src="'.get_bloginfo("template_directory").'/wps-panel/images/text_page.png" width="17">',
                    'std'   => '1',
                    'type'  => 'title_text' );

$options[] = array( 'title' => 'Add',
                    'id'    => $shortname.'_add_text_page',
                    'std'   => '',
                    'type'  => 'add_slide' );

$number_text_page = get_option('wps_number_text_page');

for($i=1; $i<=$number_text_page; ++$i){

     $options[] = array( 'title'   =>   ''.$i.'. Text Page '.$i.'',
                         'type'    =>   'open_sub_text_page',
                         'id'      =>   'text_page_'.$i );

     $options[] = array( 'title' => 'Name menu',
                         'id'    => $shortname.'_title_text_page_'.$i.'',
                         'std'   => 'the Theme',
                         'type'  => 'text' );

     $options[] = array( 'title' => 'Title',
                         'id'    => $shortname.'_title_intro_text_'.$i.'',
                         'std'   => '',
                         'type'  => 'text' );

     $options[] = array ( 'title' => 'Title content',
                          'id'    => $shortname.'_title_content_text_'.$i.'',
                          'std'   => '',
                          'type'  => 'text'  );

     $options[] = array ( 'title' => 'Subtitle content',
                          'id'    => $shortname.'_subtitle_content_text_'.$i.'',
                          'std'   => '',
                          'type'  => 'text'  );

     $options[] = array( 'title' => 'Columns',
                         'id'    => $shortname.'_number_cols_text_'.$i.'',
                         'opts'  => array( '1 column' => 'cols1', '2 columns' => 'cols2', '3 columns' => 'cols3', '4 columns' => 'cols4' ),
                         'std'   => 'cols2',
                         'type'  => 'radio_text' );

     $options[] = array ( 'title' => 'Text of link',
                          'id'    => $shortname.'_link_text_content_text_'.$i.'',
                          'std'   => '',
                          'type'  => 'text'  );

     $options[] = array ( 'title' => 'Link',
                          'id'    => $shortname.'_link_content_text_'.$i.'',
                          'std'   => '',
                          'type'  => 'text'  );

     $options[] = array( 'title'   =>   'Background Color',
                         'id'      =>   $shortname.'_text_part_'.$i.'_bg_color',
                         'std'     =>   '#fff',
                         'type'    =>   'color_choice' );

     $options[] = array( 'title' => 'Page content',
                         'id'    => $shortname.'_text_part_'.$i.'_name_page',
                         'std'   => '',
                         'type'  => 'select_text_page' );

     $options[] = array( 'type'  => 'close_sub' );
}

$options[] = array( 'type'  => 'close_sub' );

$options[] = array( 'type'  => 'close' );

/* ---------------------------------------------------------------------------------------------------
    latest Work Section
--------------------------------------------------------------------------------------------------- */

$options[] = array( 'title' => 'Showcase',
                    'image' => '<img class="retina" src="'.get_bloginfo("template_directory").'/wps-panel/images/showcase_page.png" width="15">',
                    'id'    => $shortname.'_active_showcase_page_notif',
                    'type'  => 'open_check',
                    'desc'  => 'Here goes the description for this section');

$options[] = array( 'title' => '<h1>Showcase Page</h1>',
                    'id'    => $shortname.'_active_showcase_page',
                    'opts'  => array( 'Visible' => 'checked' ),
                    'std'   => '',
                    'type'  => 'checkbox_show_cat' );

$options[] = array( 'type'  => 'open_showcase_page' );

$options[] = array( 'title' => 'Name menu',
                    'id'    => $shortname.'_title_showcase_page',
                    'std'   => 'our Work',
                    'type'  => 'text' );

$options[] = array( 'title' => 'Title',
                    'id'    => $shortname.'_title_intro_5',
                    'std'   => '',
                    'type'  => 'text' );

$options[] = array( 'title' => 'Effect',
                    'id'    => $shortname.'_effect_work',
                    'opts'  => array( 'Overlay' => 'overlay', 'Expanding' => 'expanding' ),
                    'std'   => 'overlay',
                    'type'  => 'radio' );

$options[] = array( 'title' => 'Columns',
                    'id'    => $shortname.'_number_cols_showcase',
                    'opts'  => array( '2 columns' => 'cols2', '4 columns' => 'cols4' ),
                    'std'   => 'cols2',
                    'type'  => 'radio_text' );

$options[] = array( 'title'   =>   'Background Color',
                    'id'      =>   $shortname.'_showcase_bg_color',
                    'std'     =>   '#faf9f5',
                    'type'    =>   'color_choice' );

$options[] = array( 'title'   =>   'Title description color',
                    'id'      =>   $shortname.'_showcase_title_color',
                    'std'     =>   '#fff',
                    'type'    =>   'color_choice' );

$options[] = array( 'title'   =>   'Text description color',
                    'id'      =>   $shortname.'_showcase_text_color',
                    'std'     =>   '#a0a8a9',
                    'type'    =>   'color_choice' );

$options[] = array( 'title' => '<h2>Works</h2>',
                    'id'    => $shortname.'_number_works',
                    'class' => $shortname.'_count',
                    'image' => '<img class="retina" src="'.get_bloginfo("template_directory").'/wps-panel/images/pictures.png" width="18">',
                    'std'   => '0',
                    'type'  => 'title_text' );

$effect = get_option('wps_effect_work');

$options[] = array( 'title' => 'Add',
                    'id'    => $shortname.'_add_work_'.$effect.'',
                    'std'   => '',
                    'type'  => 'add_slide' );

$number_works = get_option('wps_number_works');

for($i=1; $i<=$number_works; ++$i){

     $options[] = array( 'title'   =>   ''.$i.'. Work '.$i.'',
                         'type'    =>   'open_sub_work',
                         'id'      =>   'work_'.$i );

     $options[] = array( 'title'   =>   'Title',
                         'id'      =>   $shortname.'_work_'.$i.'_title',
                         'std'     =>   '',
                         'type'    =>   'text' );

     $options[] = array( 'title'   =>   'Descritpion',
                         'id'      =>   $shortname.'_work_'.$i.'_description',
                         'std'     =>   '',
                         'type'    =>   'textarea' );

     if($effect == 'expanding'){
          $options[] = array( 'title'   =>   'Thumb (470x470px)',
                         'id'      =>   $shortname.'_work_'.$i.'_thumb_directory',
                         'std'     =>   '',
                         'type'    =>   'upload_text_img' );
     }

     $options[] = array( 'title'   =>   'Photo',
                         'id'      =>   $shortname.'_work_'.$i.'_directory',
                         'std'     =>   '',
                         'type'    =>   'upload_text_img' );

     $options[] = array( 'type'  => 'close_sub' );
}

$options[] = array( 'type'  => 'close_sub' );

$options[] = array( 'type'  => 'close' );

/* ---------------------------------------------------------------------------------------------------
    Blog Section
--------------------------------------------------------------------------------------------------- */


$options[] = array( 'title' => 'Blog',
                    'image' => '<img class="retina" src="'.get_bloginfo("template_directory").'/wps-panel/images/blog_page.png" width="16">',
                    'id'    => $shortname.'_active_blog_page_notif',
                    'type'  => 'open_check',
                    'desc'  => 'Here goes the description for this section');

$options[] = array( 'title' => '<h1>Blog Page</h1>',
                    'id'    => $shortname.'_active_blog_page',
                    'opts'  => array( 'Visible' => 'checked' ),
                    'std'   => '',
                    'type'  => 'checkbox_show_cat' );

$options[] = array( 'type'  => 'open_blog_page' );

$options[] = array( 'title' => 'Name menu',
                    'id'    => $shortname.'_title_blog_page',
                    'std'   => 'latest News',
                    'type'  => 'text' );

$options[] = array( 'title' => 'Title',
                    'id'    => $shortname.'_title_intro_6',
                    'std'   => '',
                    'type'  => 'text' );

$options[] = array ( 'title' => 'Text of link',
                     'id'    => $shortname.'_link_text_blog',
                     'std'   => '',
                     'type'  => 'text'  );

$options[] = array( 'title'   =>   'Background Color',
                    'id'      =>   $shortname.'_news_bg_color',
                    'std'     =>   '#fff',
                    'type'    =>   'color_choice' );

$options[] = array( 'title' => 'Post number (display)',
                    'id'    => $shortname.'_blog_number_posts',
                    'std'   => '',
                    'type'  => 'text' );

$options[] = array( 'title' => 'Order by',
                    'id'    => $shortname.'_blog_select_order_by',
                    'opts'  => array( 'Date' => 'date', 'Title' => 'title', 'ID' => 'id', 'Author' => 'author', 'Modified' => 'modified', 'Comment count' => 'comment_count' ),
                    'std'   => 'ID',
                    'type'  => 'select' );

$options[] = array( 'title' => 'Order',
                    'id'    => $shortname.'_blog_select_order',
                    'opts'  => array( 'Descending' => 'DESC', 'Ascending' => 'ASC' ),
                    'std'   => 'DESC',
                    'type'  => 'select' );

foreach((get_categories()) as $category) {
     $catslug = $category->slug;
     $catname = $category->cat_name;
     $options[] = array( 'title'   =>   $catname.' icon',
                         'id'      =>   $shortname.'_category_'.$catslug.'_icon',
                         'type'    =>   'upload_text_img' );

     $options[] = array( 'title'   =>   '',
                         'id'      =>   $shortname.'_category_'.$catslug.'_icon_2x',
                         'std'     =>   '',
                         'class'   =>   'retinaupload',
                         'type'    =>   'sub_upload_text_img' );
}

$options[] = array( 'title' => 'Name/ID of archives page',
                    'id'    => $shortname.'_blog_name_archives',
                    'std'   => '',
                    'type'  => 'text' );

$options[] = array( 'type'  => 'close_sub' );

$options[] = array( 'type'  => 'close' );


/* ---------------------------------------------------------------------------------------------------
    Contact Section
--------------------------------------------------------------------------------------------------- */

$options[] = array( 'title' => 'Contact',
                    'image' => '<img class="retina" src="'.get_bloginfo("template_directory").'/wps-panel/images/contact.png" width="11">',
                    'id'    => $shortname.'_active_contact_page_notif',
                    'type'  => 'open_check' );

$options[] = array( 'title' => '<h1>Contact Page</h1>',
                    'id'    => $shortname.'_active_contact_page',
                    'opts'  => array( 'Visible' => 'checked' ),
                    'std'   => '',
                    'type'  => 'checkbox_show_cat' );

$options[] = array( 'type'  => 'open_contact_page' );

$options[] = array( 'title'   =>   'Left Text',
                    'id'      =>   $shortname.'_contact_left_text',
                    'std'     =>   '',
                    'type'    =>   'text' );

$options[] = array( 'title'   =>   'Right Text',
                    'id'      =>   $shortname.'_contact_right_text',
                    'std'     =>   '',
                    'type'    =>   'text' );

$options[] = array( 'title'   =>   'Send to',
                    'id'      =>   $shortname.'_contact_mail_footer',
                    'std'     =>   '',
                    'type'    =>   'text' );

$options[] = array( 'title' => 'Map choice',
                    'id'    => $shortname.'_map_choice',
                    'opts'  => array( 'Google map' => 'gmap', 'Photo' => 'photo' ),
                    'std'   => 'photo',
                    'type'  => 'radio_map' );

$options[] = array( 'title'   =>   'Map address',
                    'id'      =>   $shortname.'_contact_map_address',
                    'std'     =>   '',
                    'type'    =>   'text' );

$options[] = array( 'title'   =>   'Photo',
                    'id'      =>   $shortname.'_contact_map_photo',
                    'type'    =>   'upload_text_img' );

$options[] = array( 'type'  => 'close_sub' );

$options[] = array( 'type'  => 'close' );

/* ---------------------------------------------------------------------------------------------------
    SLIDERS SETTINGS
--------------------------------------------------------------------------------------------------- */

$options[] = array( 'title' => 'Slider Extra',
                    'image' => '<img class="retina" src="'.get_bloginfo("template_directory").'/wps-panel/images/slider extra.png" width="15">',
                    'type'  => 'open',
                    'desc'  => 'Here goes the description for this section');

$options[] = array( 'title' => '<h1>Sliders Photos</h1>',
                    'id'    => $shortname.'_active_slider_photos',
                    'opts'  => array( 'Visible' => 'checked' ),
                    'std'   => '',
                    'type'  => 'checkbox_show_cat' );

$options[] = array( 'type'  => 'open_photo_slide' );

$options[] = array( 'title' => 'Automatique',
                    'id'    => $shortname.'_auto_photo_slide',
                    'class' => 'styled-checkbox',
                    'std'   => '',
                    'type'  => 'checkbox' );

$options[] = array( 'title' => 'Randomize',
                    'id'    => $shortname.'_random_photo_slide',
                    'class' => 'styled-checkbox',
                    'std'   => '',
                    'type'  => 'checkbox' );

$options[] = array( 'title'   =>   'Transition speed (ms)',
                    'id'      =>   $shortname.'_interval_photo_slide',
                    'std'     =>   '7000',
                    'type'    =>   'text' );

$options[] = array( 'title'   =>   'Text color',
                    'id'      =>   $shortname.'_photo_slide_text_color',
                    'std'     =>   '#fff',
                    'type'    =>   'color_choice' );

$options[] = array( 'title' => '<h2>Slides</h2>',
                    'id'    => $shortname.'_number_slides_photo',
                    'class' => $shortname.'_count',
                    'image' => '<img class="retina" src="'.get_bloginfo("template_directory").'/wps-panel/images/pictures.png" width="18">',
                    'std'   => '0',
                    'type'  => 'title_text' );

$options[] = array( 'title' => 'Add',
                    'id'    => $shortname.'_add_photo_slide',
                    'std'   => '',
                    'type'  => 'add_slide' );

$number_slides_photo = get_option('wps_number_slides_photo');
for($i=1; $i<=$number_slides_photo; ++$i){

     $options[] = array( 'title'   =>   ''.$i.'. Slide '.$i.'',
                         'type'    =>   'open_sub_photo_slide',
                         'id'      =>   'photo_slide_'.$i );

     $options[] = array( 'title'   =>   'Photo',
                         'id'      =>   $shortname.'_photo_slide_'.$i.'',
                         'type'    =>   'upload_text_img' );

     $options[] = array( 'title'   =>   'Title',
                         'id'      =>   $shortname.'_title_photo_slide'.$i.'',
                         'std'     =>   '',
                         'type'    =>   'text' );

     $options[] = array( 'type'  => 'close_sub' );
}

$options[] = array( 'type'  => 'close_sub' );


$options[] = array( 'title' => '<h1>Sliders Sentences</h1>',
                    'id'    => $shortname.'_active_slider_sentences',
                    'opts'  => array( 'Visible' => 'checked' ),
                    'std'   => '',
                    'type'  => 'checkbox_show_cat' );

$options[] = array( 'type'  => 'open_sentence_slide' );

$options[] = array( 'title' => 'Automatique',
                    'id'    => $shortname.'_auto_sentences_slide',
                    'class' => 'styled-checkbox',
                    'std'   => '',
                    'type'  => 'checkbox' );

$options[] = array( 'title'   =>   'Transition speed (ms)',
                    'id'      =>   $shortname.'_interval_sentences_slide',
                    'std'     =>   '5000',
                    'type'    =>   'text' );

$options[] = array( 'title'   =>   'Text color',
                    'id'      =>   $shortname.'_sentence_slide_text_color',
                    'std'     =>   '#fff',
                    'type'    =>   'color_choice' );

$options[] = array( 'title' => '<h2>Slides</h2>',
                    'id'    => $shortname.'_number_slides_sentences',
                    'class' => $shortname.'_count',
                    'image' => '<img class="retina" src="'.get_bloginfo("template_directory").'/wps-panel/images/pictures.png" width="18">',
                    'std'   => '3',
                    'type'  => 'title_text' );

$options[] = array( 'title' => 'Add',
                    'id'    => $shortname.'_add_sentence_slide',
                    'std'   => '',
                    'type'  => 'add_slide' );

$number_slides_sentences = get_option('wps_number_slides_sentences');
for($j=1; $j<=$number_slides_sentences; ++$j){

     $options[] = array( 'title'   =>   ''.$j.'. Slide '.$j.'',
                         'type'    =>   'open_sub_sentence_slide',
                         'id'      =>   'sentence_slide_'.$j );

     $options[] = array( 'title'   =>   'Quote',
                         'id'      =>   $shortname.'_quote_slide_'.$j.'',
                         'std'     =>   '',
                         'type'    =>   'text' );

     $options[] = array( 'title'   =>   'Author',
                         'id'      =>   $shortname.'_author_slide_'.$j.'',
                         'std'     =>   '',
                         'type'    =>   'text' );

     $options[] = array( 'title'   =>   'Background Color',
                         'id'      =>   $shortname.'_sentence_slide_'.$j.'_bg_color',
                         'std'     =>   '#42c0fb',
                         'type'    =>   'color_choice' );

     $options[] = array( 'title'   =>   'Background Image',
                         'id'      =>   $shortname.'_sentence_slide_'.$j.'_bg_image',
                         'type'    =>   'upload_text_img' );

     $options[] = array( 'type'  => 'close_sub' );

}

$options[] = array( 'type'  => 'close_sub' );

$options[] = array( 'type'  => 'close' );


/* ---------------------------------------------------------------------------------------------------
    Style Section
--------------------------------------------------------------------------------------------------- */

$options[] = array( 'title' => 'Style',
                    'image' => '<img class="retina" src="'.get_bloginfo("template_directory").'/wps-panel/images/Style.png" width="9">',
                    'type'  => 'open',
                    'desc'  => 'Here goes the description for this section');

$options[] = array( 'title'   =>   '<h1>Style settings</h1><br><hr>',
                    'type'    =>   'title' );

$options[] = array( 'title'   =>   '<h2>Heading</h2>',
                    'type'    =>   'sub_title' );

$options[] = array( 'title'   =>   '<h3>H1</h3>',
                    'type'    =>   'sub_title' );

$options[] = array( 'title'   =>   'Color',
                    'id'      =>   $shortname.'_main_h1_color',
                    'std'     =>   '#475455',
                    'type'    =>   'color_choice' );

$options[] = array( 'title'   =>   'Font size',
                    'id'      =>   $shortname.'_main_h1_size',
                    'std'     =>   '45',
                    'type'    =>   'text' );

$options[] = array( "title" => "Standard Fonts",
                         "id" => $shortname.'_select_stand_font_h1',
                         "opts" => $standard_fonts,
                         "std" => "0",
                         "type" => "select_font" );

$options[] = array( "title" => "Google Fonts",
                         "id" => $shortname.'_select_google_font_h1',
                         "opts" => $google_fonts,
                         "std" => "Open Sans",
                         "type" => "select_font" );

$options[] = array( 'title'   =>   '<h3>H2</h3>',
                    'type'    =>   'sub_title' );

$options[] = array( 'title'   =>   'Color',
                    'id'      =>   $shortname.'_main_h2_color',
                    'std'     =>   '#475455',
                    'type'    =>   'color_choice' );

$options[] = array( 'title'   =>   'Font size',
                    'id'      =>   $shortname.'_main_h2_size',
                    'std'     =>   '22',
                    'type'    =>   'text' );

$options[] = array( "title" => "Standard Fonts",
                         "id" => $shortname.'_select_stand_font_h2',
                         "opts" => $standard_fonts,
                         "std" => "0",
                         "type" => "select_font" );

$options[] = array( "title" => "Google Fonts",
                         "id" => $shortname.'_select_google_font_h2',
                         "opts" => $google_fonts,
                         "std" => "Open Sans",
                         "type" => "select_font" );

$options[] = array( 'title'   =>   '<h3>H3</h3>',
                    'type'    =>   'sub_title' );

$options[] = array( 'title'   =>   'Color',
                    'id'      =>   $shortname.'_main_h3_color',
                    'std'     =>   '#475455',
                    'type'    =>   'color_choice' );

$options[] = array( 'title'   =>   'Font size',
                    'id'      =>   $shortname.'_main_h3_size',
                    'std'     =>   '22',
                    'type'    =>   'text' );

$options[] = array( "title" => "Standard Fonts",
                         "id" => $shortname.'_select_stand_font_h3',
                         "opts" => $standard_fonts,
                         "std" => "0",
                         "type" => "select_font" );

$options[] = array( "title" => "Google Fonts",
                         "id" => $shortname.'_select_google_font_h3',
                         "opts" => $google_fonts,
                         "std" => "Open Sans",
                         "type" => "select_font" );

$options[] = array( 'title'   =>   '<hr><h2>Body</h2>',
                    'type'    =>   'sub_title' );

$options[] = array( 'title'   =>   'Color',
                    'id'      =>   $shortname.'_main_text_color',
                    'std'     =>   '#8a9596',
                    'type'    =>   'color_choice' );

$options[] = array( 'title'   =>   'Font size',
                    'id'      =>   $shortname.'_main_text_size',
                    'std'     =>   '14',
                    'type'    =>   'text' );

$options[] = array( "title" => "Standard Fonts",
                         "id" => $shortname.'_select_stand_font_text',
                         "opts" => $standard_fonts,
                         "std" => "0",
                         "type" => "select_font" );

$options[] = array( "title" => "Google Fonts",
                         "id" => $shortname.'_select_google_font_text',
                         "opts" => $google_fonts,
                         "std" => "Open Sans",
                         "type" => "select_font" );

$options[] = array( 'title'   =>   '<hr><h2>Color Scheme</h2>',
                    'type'    =>   'sub_title' );

$options[] = array( 'title'   =>   'First color',
                    'id'      =>   $shortname.'_first_color',
                    'std'     =>   '#fb5642',
                    'type'    =>   'color_choice' );

$options[] = array( 'title'   =>   'Second color',
                    'id'      =>   $shortname.'_second_color',
                    'std'     =>   '#42c0fb',
                    'type'    =>   'color_choice' );

$options[] = array( 'title'   =>   'Third color',
                    'id'      =>   $shortname.'_third_color',
                    'std'     =>   '#475455',
                    'type'    =>   'color_choice' );

$options[] = array( 'type'  => 'close' );

/* ---------------------------------------------------------------------------------------------------
    Layout Section
--------------------------------------------------------------------------------------------------- */

$options[] = array( 'title' => 'Layout',
                    'image' => '<img class="retina" src="'.get_bloginfo("template_directory").'/wps-panel/images/layout.png" width="15">',
                    'type'  => 'open' );

$options[] = array( 'title' => 'Reset Layout',
                    'type'  => 'reset_layout' );

$options[] = array( 'title' => '<h1>Layout Page</h1><br><hr>',
                    'type'  => 'title' );

$options[] = array( 'title' => '<h2>Choose the order</h2>',
                    'type'  => 'dragdrop-open' );

$options[] = array( 'title' => 'pos-null1',
                    'id'    => 'pos-null1',
                    'std'   => 'Home page',
                    'type'  => 'dragdrop-li' );

$options[] = array( 'title' => 'pos-0',
                    'id'    => 'pos-0',
                    'std'   => 'Timeline page',
                    'type'  => 'dragdrop-li' );

$options[] = array( 'title' => 'pos-1',
                    'id'    => 'pos-1',
                    'std'   => 'Thumbnail page',
                    'type'  => 'dragdrop-li' );

$options[] = array( 'title' => 'pos-2',
                    'id'    => 'pos-2',
                    'std'   => 'Slider photos',
                    'type'  => 'dragdrop-li' );

$options[] = array( 'title' => 'pos-3',
                    'id'    => 'pos-3',
                    'std'   => 'Carousel page',
                    'type'  => 'dragdrop-li' );

$options[] = array( 'title' => 'pos-4',
                    'id'    => 'pos-4',
                    'std'   => 'Gallery page',
                    'type'  => 'dragdrop-li' );

$options[] = array( 'title' => 'pos-5',
                    'id'    => 'pos-5',
                    'std'   => 'Slider sentences',
                    'type'  => 'dragdrop-li' );

$options[] = array( 'title' => 'pos-6',
                    'id'    => 'pos-6',
                    'std'   => 'Showcase page',
                    'type'  => 'dragdrop-li' );

$options[] = array( 'title' => 'pos-7',
                    'id'    => 'pos-7',
                    'std'   => 'Blog page',
                    'type'  => 'dragdrop-li' );

$number_text_page = get_option('wps_number_text_page');
for($i = 1; $i <= $number_text_page ; ++$i){
     $j = $i + 7;
     $options[] = array( 'title' => 'pos-'.$j,
               'id'    => 'pos-'.$j,
               'std'   => 'Text page '.$i,
               'type'  => 'dragdrop-li' );

}

$options[] = array( 'title' => 'pos-null2',
                    'id'    => 'pos-null2',
                    'std'   => 'Contact',
                    'type'  => 'dragdrop-li' );

$options[] = array( 'title' => '',
                    'type'  => 'dragdrop-close' );


$options[] = array( 'type'  => 'close' );