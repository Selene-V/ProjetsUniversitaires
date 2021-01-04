<?php

namespace App\Entity;

use App\Service\UserManager;

trait HydrationTrait
{
    public function hydrate(array $data): self
    {
        foreach ($data as $propertyName => $value) {
            $parts = explode('_', $propertyName);
            $parts = array_map('ucfirst', $parts);
            $propertyName = implode('', $parts);

            $setterName = 'set' . $propertyName;

            if (method_exists($this, $setterName)) {
                if ($setterName==="setRegisterAt" || $setterName==="setStartAt"){
                    $value = new \DateTime($value);
                }
                if ($setterName==="setUser1" || $setterName==="setUser2" || $setterName==="setWinner"){
                    $userManager = new UserManager();
                    $value = $userManager->findOneById($value);
                }
                $this->$setterName($value);
            }
        }

        return $this;
    }
}
