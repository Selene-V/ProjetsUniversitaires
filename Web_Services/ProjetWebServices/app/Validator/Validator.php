<?php

namespace App\Validator;

use App\Core\Config\Config;

class Validator
{
    protected array $errors = [];

    public function validate(object $entity): bool
    {
        $this->errors = [];

        $rules = require Config::config('validation_rules_path');

        $className = get_class($entity);
        if (isset($rules[$className])) {
            $rules = $rules[$className];

            foreach ($rules as $property => $propertyRules) {
                foreach ($propertyRules as $rule) {
                    $value = $this->getValue($property, $entity);

                    if ($this->checkValue($value, $rule) === false) {
                        $this->errors[$property][] = $rule['message'];
                    }
                }
            }

        }

        return $this->isValid();
    }

    public function isValid(): bool
    {
        return count($this->errors) === 0;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    protected function checkValue($value, array $rule)
    {
        switch ($rule['rule']) {
            case 'not_blank':
                return !empty($value);
                break;
            case 'no_space':
                return strpos($value, ' ') === false;
                break;
            case 'email':
                return filter_var($value, FILTER_VALIDATE_EMAIL);
                break;
            case 'length':
                if (isset($rule['min']) && strlen($value) < $rule['min']) {
                    return false;
                }

                if (isset($rule['max']) && strlen($value) > $rule['max']) {
                    return false;
                }
                return true;
                break;

            default:
                throw new \Exception('Unknown rule ' . $rule['rule']);
                break;
        }
        echo '<pre>';print_r($rule);die;
    }

    protected function getValue(string $property, object $entity)
    {
        $reflectionClass = new \ReflectionClass($entity);
        if ($reflectionClass->hasProperty($property)) {
            $reflectionProperty = $reflectionClass->getProperty($property);
            $reflectionProperty->setAccessible(true);

            return $reflectionProperty->getValue($entity);
        }

        throw new \Exception('Property does not exists');
    }

    public function nameTaken(string $username, $connection): bool{
        $sql = 'select * from admins WHERE username=?';

        $statement = $connection->prepare($sql);
        $statement->execute([$username]);

        $admin = $statement->fetch(\PDO::FETCH_ASSOC);

        if(!$admin){
            return false;
        }

        return true;
    }

    public function validPassword(string $password): array{
        $isValid = true;
        $alert = '';

        if(empty($password) || $password === null){
            $alert = "Le mot de passe ne peut pas être vide";
            $isValid = true;
            return [
                'valid'=>$isValid,
                'alert'=> $alert
            ];
        }
        if (strlen($password) < 8 || strlen($password) > 255) {
            $alert = "Le mot de passe doit comporter entre 8 et 255 caractères";
            $isValid = false;
            return [
                'valid'=>$isValid,
                'alert'=> $alert
            ];
        }

        return [
            'valid'=>$isValid,
            'alert'=> $alert
        ];

    }
}
