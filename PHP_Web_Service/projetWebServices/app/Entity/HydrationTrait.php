<?php

namespace App\Entity;

use App\Service\QuestionManager;
use App\Service\ThemeManager;
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
                    if($value !== null) {
                        $userManager = new UserManager();
                        $value = $userManager->findOneById($value);
                    }
                }
                if ($setterName==="setQuestion"){
                    $questionManager = new QuestionManager();
                    $value = $questionManager->findOneById($value);
                }
                if ($setterName==="setTheme"){
                    $themeManager = new ThemeManager();
                    $value = $themeManager->findOneById($value);
                }
                $this->$setterName($value);
            }
        }

        return $this;
    }
}
