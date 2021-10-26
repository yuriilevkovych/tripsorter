<?php

namespace Tripsorter;

use Tripsorter\Models\Card;

class DescriptionGenerator
{
    public function getText(array $sortedCards)
    {
        $text = '';
        /** @var Card $card */
        foreach ($sortedCards as $card) {
            $text .= $card->getDescription();
        }

        $text .= "You have arrived to your final destination";

        return $text;
    }
}