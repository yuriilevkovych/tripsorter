<?php

namespace Tripsorter;

class CardsSorter
{

    /**
     * Sorts special array of Card models
     *
     * @param array $cardModels
     * @return array
     */
    public function sort(array $cardModels): array
    {
        $size = $this->getSizeOfArray($cardModels);
        do {
            for ($i = $size; $i >= 0; $i--) {
                if (isset($cardModels[$i - 1]) && ($cardModels[$i]->from != $cardModels[$i - 1]->to)) {
                    $cardModels = $this->replaceCurWithPrev($cardModels, $i);
                }
            }
        } while ($this->isWrongSortedArray($cardModels));
        
        return $cardModels;
    }

    /**
     * From $cardModels array replace values with key and key + 1
     *
     * @param array $cardModels
     * @param $i
     * @return array
     */
    private function replaceCurWithPrev(array $cardModels, $i)
    {
        $tmp = $cardModels[$i - 1];
        $cardModels[$i - 1] = $cardModels[$i];
        $cardModels[$i] = $tmp;

        return $cardModels;
    }

    /**
     * Checks array for write sorted data in it. Returns false if it sorted
     *
     * @param array $cardModels
     * @return bool
     */
    private function isWrongSortedArray(array $cardModels): bool
    {
        foreach ($cardModels as $key => $cardModel) {
            if (isset($cardModels[$key + 1]) && ($cardModels[$key]->to != $cardModels[$key + 1]->from)) {
                return true;
            }
        }

        return false;
    }

    /**
     * returns Size of array
     *
     * @param array $array
     * @return int
     */
    private function getSizeOfArray(array $array): int
    {
        return sizeof($array) - 1;
    }
}