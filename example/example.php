<?php

require_once('../vendor/autoload.php');

# 1. Choose your parser
$nzzParser = new \Sprain\NewsParser\Parser\Platforms\CH\NzzParser();

# 2. Enable cache by defining a cache folder
$nzzParser->getCache()->setCacheDir('./cache');

# 3. Get data
var_dump($nzzParser->getMostReadArticles(5));

# Options: Clear the cache
# $nzzParser->getCache()->clear();

/*
 * The output will be something like this:
 *
 * array (size=5)
 *   0 =>
 *     array (size=2)
 *       'url' => string '/international/amerika/gerichtsklage-gegen-praesident-obama-1.18354759' (length=70)
 *       'text' => string 'Klage gegen Präsident Obama' (length=28)
 *   1 =>
 *     array (size=2)
 *       'url' => string '/mehr/luftfahrt/ungewisse-zukunft-der-boeing-747-1.18354052' (length=59)
 *       'text' => string 'Ungewisse Zukunft der Boeing 747' (length=32)
 *   2 =>
 *     array (size=2)
 *       'url' => string '/zuerich/das-andere-elektrovelo-aus-wiedikon-1.18354123' (length=55)
 *       'text' => string 'Das andere Elektrovelo aus Wiedikon' (length=35)
 *   3 =>
 *     array (size=2)
 *       'url' => string '/startseite/xxx-1.18354853' (length=26)
 *       'text' => string '«Die Welt geht weiter»' (length=24)
 *   4 =>
 *     array (size=2)
 *       'url' => string '/international/gibt-putin-politisches-asyl-1.18354735' (length=53)
 *       'text' => string 'Gibt Putin politisches Asyl?' (length=28)
 */