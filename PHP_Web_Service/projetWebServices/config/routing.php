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



use App\Action\API\User\User;
use App\Action\Home;
use App\Core\Routing\Route;


//Projet webservice

use App\Action\API\User\Login;
use App\Action\API\User\ValidateLogin;
use App\Action\API\User\Persist as PersistUser;
use App\Action\API\Quizz\Persist as PersistQuizz;
use App\Action\API\User\ListUsers;
use App\Action\API\Theme\ListThemes;
use App\Action\API\Question\ListQuestions;
use App\Action\API\QuestionQuizz\ListQuestionsQuizz;
use App\Action\API\Quizz\Answer;
use App\Action\API\Quizz\Finish;

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

    new Route('/quizz', QuizzList::class, 'GET'),


    //Projet webservice
    // USER
    new Route('/api/user/login', Login::class, ['POST']),
    new Route('/api/user/loggedIn/{token}', ValidateLogin::class, ['GET']),
    new Route('/api/user/inscription', PersistUser::class, ['POST', 'PUT']),
    new Route('/api/user/list/{token}', ListUsers::class, ['GET']),
    new Route('/api/user', User::class, ['GET']),


    // THEMES
    new Route('/api/themes/{token}', ListThemes::class, ['GET']),

    // QUESTIONS
    new Route('/api/questions/{token}', ListQuestions::class, ['GET']),

    // QUIZZ
    new Route('/api/quizz/{token}', PersistQuizz::class, ['POST', 'PUT']),

    new Route('/api/answerQuestion/{token}', Answer::class, ['POST']),

    new Route('/api/finish/{token}', Finish::class, ['PATCH','GET'])
];

