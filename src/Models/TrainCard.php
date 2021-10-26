<?php

namespace Tripsorter\Models;

final class TrainCard extends Card
{
    public function getDescription(): string
    {
        return "Take train {$this->vehicleNumber} from {$this->from} to {$this->to}. Sit in seat {$this->seat}.";
    }
}