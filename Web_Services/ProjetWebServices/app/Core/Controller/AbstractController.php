<?php

namespace App\Core\Controller;

use App\Core\Connection\Connection;
use App\Core\Template\TemplateEngine;
use PDO;
use Psr\Http\Message\ServerRequestInterface;

abstract class AbstractController
{
    protected ServerRequestInterface $request;

    protected function render(string $templatePath, array $params = []): string
    {
        $engine = TemplateEngine::instance();

        return $engine->render($templatePath, $params);
    }

    protected function getConnection(): PDO
    {
        return Connection::getInstance();
    }

    public function getRequest(): ServerRequestInterface
    {
        return $this->request;
    }

    public function setRequest(ServerRequestInterface $request): AbstractController
    {
        $this->request = $request;

        return $this;
    }

    public function addHeader(string $name, string $value)
    {
        header(sprintf('%s: %s', $name, $value));
    }

    public function getUser(): ?User
    {
        $request = $this->getRequest();

        if ($request->hasHeader('Authorization')) {
            $token = $request->getHeader('Authorization')[0];
            $data = (new TokenManager())->decode($token);

            if ($data['exp'] > time()) {
                return (new UserManager())->findOneByEmail($data['email']);
            } else {
                throw new \LogicException('Token Expiré!');
            }
        }

        return null;
    }
}
