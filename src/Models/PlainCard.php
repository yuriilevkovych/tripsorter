<?php

namespace Tripsorter\Models;

final class PlainCard extends Card
{
    public function getDescription(): string
    {
        return "From {$this->from} Airport, take flight to {$this->to}. Gate {$this->vehicleNumber}, seat {$this->seat}.";
    }
}
