<?php

require_once('../vendor/autoload.php');

# 1. Initialize the parser
$parser = new \Sprain\NewsParser\Parser\Parser();

# 2. Optional - set the cache folder
$parser->getCache()->setCacheDir('./cache');

# 3. Define your platform. The key is country - platform name
$parser->setPlatform('ch-nzz');

# 4. Display the platform's favicon
print '<img src="'.$parser->getIconUrl().'">';

# 5. Get articles
var_dump($parser->getRecommendedArticles(5));

# Options: Clear the cache
# $parser->getCache()->clear();

# Options: Disable cache
# $parser->getCache()->disable();

/*
 * The output will be something like this:
 *
 * array (size=3)
 *   0 =>
 *     array (size=2)
 *       'url' => string 'http://www.nzz.ch/schweiz/schweizerdeutsch-ist-nicht-minderwertig-1.18352630' (length=76)
 *       'title' => string 'Â«Schweizerdeutsch ist nicht minderwertigÂ»' (length=43)
 *   1 =>
 *     array (size=2)
 *       'url' => string 'http://www.nzz.ch/meinung/debatte/der-neue-nationalismus-1.18353294' (length=67)
 *       'title' => string 'Der neue Nationalismus' (length=22)
 *   2 => 
 *     array (size=2)
 *       'url' => string 'http://www.nzz.ch/feuilleton/islamisten-linke-und-neonazis-bilden-allianzen-1.18351849' (length=86)
 *       'title' => string 'Islamisten, Linke und Neonazis bilden Allianzen' (length=47)
 */