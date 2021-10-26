<?php

namespace TripSorter;

use Tripsorter\Models\Card;

class CardsLoader
{
    public function load($jsonCards): array
    {
        $arrayModelCards = [];
        foreach ($this->getArray($jsonCards) as $arrayCard) {
            $cardModel = $this->createTypedCardModel($arrayCard);
            $arrayModelCards[] = $cardModel;
        }
        
        return $arrayModelCards;
    }

    /**
     * Returs array from json string
     *
     * @param string $jsonCards
     * @return array
     */
    private function getArray(string $jsonCards): array
    {
        $arrayCards = json_decode($jsonCards, true);
        if (is_null($arrayCards)) {
            throw new \InvalidArgumentException('Please, input valid json format...');
        }

        return $arrayCards;
    }

    /**
     * Creates and returns object of class if it isset, based on card type
     *
     * @param array $arrayCard
     * @return Card
     * @throws \Exception
     */
    private function createTypedCardModel(array $arrayCard)
    {
        if (empty($arrayCard['type'])) {
            throw new \InvalidArgumentException('Card haven\'t type specification. Please add it to all cards.');
        }

        $type = $arrayCard['type'];

        $class = "\Tripsorter\Models\\" . lcfirst($type) . "Card";
        if(!class_exists($class)){
            throw new \Exception("Type: $type doesn't exist yet... For adding, You have to create Class extended from Card");
        }

        /** @var Card $cardModel */
        $cardModel = new $class();
        $cardModel = $this->loadCardData($cardModel, $arrayCard);

        return $cardModel;
    }

    /**
     * Loads array to Cart object and returns it
     *
     * @param Card $cardModel
     * @param array $arrayCard
     * @return Card
     */
    private function loadCardData(Card $cardModel, array $arrayCard): Card
    {
        if (empty($arrayCard['from']) || empty($arrayCard['to'])) {
            throw new \InvalidArgumentException('Please, specify fields: from and to for each card...');
        }

        $cardModel->from = $arrayCard['from'];
        $cardModel->to = $arrayCard['to'];
        $cardModel->vehicleNumber = $arrayCard['number'] ?? '';
        $cardModel->seat = $arrayCard['seat'] ?? '';

        return $cardModel;
    }
}