<?php

namespace Tripsorter\Models;

 abstract class Card
{
    public string $from;
    public string $to;
    public string $type;
    public string $vehicleNumber;
    public string $seat;

    abstract function getDescription(): string;
}