<?php

namespace MyApp\Models;

use Phalcon\Mvc\Model;
use Phalcon\Validation\Validator\Uniqueness as UniquenessValidator;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation;
// use Phalcon\Messages\Message;

class Patients extends Model
{
    public $id;
    public $name;
    public $sex;
    public $religion;
    public $phone;
    public $address;
    public $nik;

    public function validation()
    {
        $validator = new Validation();

        $validator->add(
            'name',
            new PresenceOf(
                [
                    "field" => "name",
                    "message" => "The name is required"
                ]
            )
        );

        $validator->add(
            'sex',
            new PresenceOf(
                [
                    "field" => "sex",
                    "message" => "Sex is required"
                ]
            )
        );

        $validator->add(
            'religion',
            new PresenceOf(
                [
                    "field" => "religion",
                    "message" => "Religion is required"
                ]
            )
        );

        $validator->add(
            'phone',
            new PresenceOf(
                [
                    "field" => "phone",
                    "message" => "Phone is required"
                ]
            )
        );

        $validator->add(
            'address',
            new PresenceOf(
                [
                    "field" => "address",
                    "message" => "Address is required"
                ]
            )
        );

        $validator->add(
            'nik',
            new PresenceOf(
                [
                    "field" => "nik",
                    "message" => "NIK is required"
                ]
            )
        );

        $validator->add(
            'nik',
            new UniquenessValidator(
                [
                    "field" => "nik",
                    "message" => "Sorry, the nik is already registered"
                ]
            )
        );

        return $this->validate($validator);
    }
}
