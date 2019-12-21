<?php

declare(strict_types=1);

namespace App\Application;

use App\Domain\Manager;

class ManagerSerializer
{
    public function serialize(Manager $manager): array {
        return [
            'id' => (string)$manager->id(),
            'firstName' => (string)$manager->firstName(),
            'lastName' => (string)$manager->lastName()
        ];
    }
}