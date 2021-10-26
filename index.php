<?php

namespace Index;

use Tripsorter\CardsLoader;
use Tripsorter\CardsSorter;
use Tripsorter\DescriptionGenerator;

include __DIR__ . '/vendor/autoload.php';

$cards = '[
    {"from": "Madrid", "to": "Barcelona", "type": "train", "number": "78A", "seat": "45B"}, 
    {"from": "Gerona", "to": "Stockholm", "type": "plain", "number": "45B", "seat": "3A"}, 
    {"from": "Stockholm", "to": "New York JFK", "type": "plain", "number": "22", "seat": "7B"}, 
    {"from": "Barcelona", "to": "Gerona", "type": "bus"}
]';

/** @var []Card $cardModels */
$cardModels = (new CardsLoader())->load($cards);
/** @var []Card $sortedCards */
$sortedCards = (new CardsSorter())->sort($cardModels);

echo (new DescriptionGenerator())->getText($sortedCards);
