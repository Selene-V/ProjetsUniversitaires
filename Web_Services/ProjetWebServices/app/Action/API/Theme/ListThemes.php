<?php

namespace App\Action\API\Theme;

use App\Core\Controller\AbstractController;
use App\Entity\Theme;
use App\Serializer\ObjectSerializer;
use App\Service\LoginTokenManager;
use App\Service\ThemeManager;
use App\Service\TokenManager;


class ListThemes extends AbstractController
{
    public function __invoke(string $token)
    {
        $verifyLogin = new LoginTokenManager();

        $isLoggedIn = isset($token)? $verifyLogin($token) : false;

        $request= $this->getRequest();
        $data = $request->getQueryParams();

        $idTheme = isset($data['themeID'])? (int)$data['themeID'] : null;
        $tName = isset($data['themeName'])? (string)$data['themeName'] : null;


        $this->addHeader('Content-Type', 'application/json');

        if($isLoggedIn){
            $themeManager = new ThemeManager();
            $serializer = new ObjectSerializer();


            if ($idTheme === null) {

                if ($tName === null) {

                    $themes = $themeManager->findAll();

                    $themes = array_map(function ($theme) use ($serializer) {
                        return $serializer->toJson($theme, false);
                    }, $themes);

                    return json_encode($themes);

                } else {
                    $theme = $themeManager->findOneByName($tName);
                    return $serializer->toJson($theme);
                }
            } else {
                $theme = $themeManager->findOneById($idTheme);
                return $serializer->toJson($theme);
            }
        }else{
            return json_encode([
                'tokenValidity' => false
            ]);
        }
    }
}
