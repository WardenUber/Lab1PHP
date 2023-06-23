<?php
namespace Classes;

use AllowDynamicProperties;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Constraints as Assert;


#[AllowDynamicProperties] class User
{
    public function checkValidationVar($val): bool
    {
        if (count($val) !== 0) {
            $ok = false;
            foreach ($val as $var) {
                echo $var->getMessage()."\r\n";
            }
        }
        else $ok = true;
        return $ok;
    }

    function __construct(int $id, string $name, string $email, string $password){

        $validator = Validation::createValidator();

        $val = $validator->validate($id, [
            new Assert\NotBlank(),
            new Assert\Positive(),
        ]);
        $validationStatus1 = $this->checkValidationVar($val);


        $val = $validator->validate($name, [
            new Assert\NotBlank(),
        ]);
        $validationStatus2 = $this->checkValidationVar($val);


        $val = $validator->validate($email, [
            new Assert\Email(),
        ]);
        $validationStatus3 = $this->checkValidationVar($val);


        $val = $validator->validate($password, [
            new Assert\Length(['max' => 64]),
            new Assert\Length(['min' => 4]),
        ]);
        $validationStatus4 = $this->checkValidationVar($val);


        if ($validationStatus1 && $validationStatus2 && $validationStatus3 && $validationStatus4){
            $this->id = $id;
            $this->name = $name;
            $this->email = $email;
            $this->password= $password;
            $this->dateCreate = date('d/m/Y h:i:s a', time());
        }
    }

    public function printInfo(): void
    {

        echo $this->id. "\r\n";
        echo $this->name. "\r\n";
        echo $this->email. "\r\n";
        echo $this->password. "\r\n";
    }

    public function getDateCreate(): string
    {
        return $this->dateCreate;
    }
}


