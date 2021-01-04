<?php

use App\Action\Admin\DeleteAdmin;
use App\Action\Admin\PersistAdmin;
use App\Action\Admin\Connection as ConnectionAdmin;

use \App\Action\Admin\PersistTheme;
use App\Action\Admin\DeleteTheme;

use \App\Action\Admin\PersistQuestion;
use App\Action\Admin\DeleteQuestion;

use App\Action\Admin\Lists\UserList;
use App\Action\Admin\Lists\AdminList;
use App\Action\Admin\Lists\ThemeList;
use App\Action\Admin\Lists\QuizzList;
use App\Action\Admin\Lists\QuestionList;


use App\Action\Home;
use App\Core\Routing\Route;

return [
    new Route('/', Home::class, 'GET'),

    new Route('/users', UserList::class, 'GET'),

    new Route('/admins', AdminList::class, 'GET'),
    new Route('/connexion-admin', ConnectionAdmin::class, ['GET','POST']),
    new Route('/admin[/{adminId}]', PersistAdmin::class, ['GET', 'POST']),
    new Route('/delete-admin/{adminId}', DeleteAdmin::class, ['GET', 'DELETE']),

    new Route('/themes', ThemeList::class, 'GET'),
    new Route('/theme[/{themeId}]', PersistTheme::class, ['GET', 'POST']),
    new Route('/delete-theme/{themeId}', DeleteTheme::class, ['GET', 'DELETE']),


    new Route('/questions', QuestionList::class, 'GET'),
    new Route('/questions/theme[/{themeID}]', QuestionList::class, 'GET'),
    new Route('/question[/{questionId}]', PersistQuestion::class, ['GET', 'POST']),
    new Route('/delete-question/{questionId}', DeleteQuestion::class, ['GET', 'DELETE']),

    new Route('/quizz', QuizzList::class, 'GET')
];

