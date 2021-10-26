<?php

namespace Tripsorter\Models;

final class BusCard extends Card
{
    public function getDescription(): string
    {
        $description = "Take the airport bus {$this->vehicleNumber} {$this->seat} from {$this->from} to {$this->to} Airport.";
        if (empty($this->vehicleNumber) || empty($this->seat)) {
            $description .= " No seat assignment.";
        }

        return $description;
    }
}