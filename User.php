<?php
//namespace Lab1;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\Email;


class User{

    private $id;
    private $name;
    private $email;
    private $password;
    private $dateTime;

    public function __construct($id, $name, $email, $password){
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->date_time = date("Y-m-d H:i:s");

        $validator = Validation::createValidator();

        $violations = $validator->validate($this->id, [
            new NotBlank(),
            new Length(['min' => 3]),
        ]);
        if (count($violations) > 0){
            echo 'Incorrect Id'.'<br>';
            foreach ($violations as $violation) {
                echo $violation->getMessage().'<br>';
            }
        }


        $violations = $validator->validate($this->name, [
            new NotBlank(),
            new Length(['min' => 2]),
            new Regex(['pattern' => '/^[A-Z][a-z]*$/']),
        ]);
        if (count($violations) > 0){
            echo 'Incorrect Name'.'<br>';
            foreach ($violations as $violation) {
                echo $violation->getMessage().'<br>';
            }
        }

        $violations = $validator->validate($this->email, [
            new Email(),
            new NotBlank(),
        ]);
        if (count($violations) > 0){
            echo 'Incorrect Email'.'<br>';
            foreach ($violations as $violation) {
                echo $violation->getMessage().'<br>';
            }
        }
 
        $violations = $validator->validate($this->password, [
            new NotBlank(),
            new Length(['min' => 8])
        ]);
        if (count($violations) > 0){
            echo 'Incorrect Password'.'<br>';
            foreach ($violations as $violation) {
                echo $violation->getMessage().'<br>';
            }
        }
    }

    public function dateTimeCreation(){
        return $this->dateTime;
    }
}
?>  