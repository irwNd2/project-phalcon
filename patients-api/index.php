<?php

use Phalcon\Loader;
use Phalcon\Mvc\Micro;
use Phalcon\Di\FactoryDefault;
use Phalcon\Db\Adapter\Pdo\Mysql as PdoMysql;

// Use Loader() to autoload our model
$loader = new Loader();

$loader->registerNamespaces(
    [
        'MyApp\Models' => __DIR__ . '/models/',
    ]
);

$loader->register();

$di = new FactoryDefault();

// Set up the database service
$di->set(
    'db',
    function () {
        return new PdoMysql(
            [
                'host'     => 'localhost',
                'username' => 'root',
                'password' => 'root',
                'dbname'   => 'phalcon-practice',
            ]
        );
    }
);

$app = new Micro($di);

// Retrieves all patients
$app->get(
    '/patients',
    function () use ($app) {
        $phql = 'SELECT * FROM MyApp\Models\Patients ORDER BY name';

        $patients = $app->modelsManager->executeQuery($phql);

        $response = new Phalcon\Http\Response();

        $data = [];

        foreach ($patients as $patient) {
            $data[] = [
                'id'   => $patient->id,
                'name' => $patient->name,
                'sex' => $patient->sex,
                'religion' => $patient->religion,
                'phone' => $patient->phone,
                'address' => $patient->address,
            ];
        };

        $status = array("code" => 200, "response" => "success", "message" => "Success get all patients");
        $response->setStatusCode(200, "OK");
        $response->setJsonContent(array("status" => $status, "result" => $data));

        return $response;
    }
);

// Retrieves patient based on primary key
$app->get(
    '/patients/{id:[0-9]+}',
    function ($id) use ($app) {
        // Operation to fetch robot with id $id
        $phql = 'SELECT * FROM MyApp\Models\Patients WHERE id = :id:';
        $patient = $app->modelsManager->executeQuery(
            $phql,
            [
                'id' => $id,
            ]
        )->getFirst();

        // Create a response
        $response = new Phalcon\Http\Response();

        if ($patient === null) {
            $status = array("code" => 404, "response" => "error", "message" => "Patient not found");
            $response->setStatusCode(404, "Not Found");
            $response->setJsonContent(array("status" => $status));
        } else {
            $status = array("code" => 200, "response" => "success", "message" => "Success get patient");
            $response->setStatusCode(200, "OK");
            $response->setJsonContent(array("status" => $status, "result" => $patient));
        }

        return $response;
    }
);

// Searches for patients with $nik
$app->get(
    '/patients/search/{nik}',
    function ($nik) use ($app) {

        $phql = 'SELECT * FROM MyApp\Models\Patients WHERE nik = :nik:';
        $patient = $app->modelsManager->executeQuery(
            $phql,
            [
                'nik' => $nik,
            ]
        )->getFirst();

        // Create a response
        $response = new Phalcon\Http\Response();

        if ($patient === null) {
            $status = array("code" => 404, "response" => "error", "message" => "Patient not found");
            $response->setStatusCode(404, "Not Found");
            $response->setJsonContent(array("status" => $status));
        } else {
            $status = array("code" => 200, "response" => "success", "message" => "Success get patient by nik");
            $response->setStatusCode(200, "OK");
            $response->setJsonContent(array("status" => $status, "result" => $patient));
        }

        return $response;
    }
);

// Adds a new patient
$app->post(
    '/patients',
    function () use ($app) {
        $patient = $app->request->getJsonRawBody();
        $phql = 'INSERT INTO MyApp\Models\Patients (name, sex, religion, phone, address, nik) VALUES (:name:, :sex:, :religion:, :phone:, :address:, :nik:)';
        $values = array(
            'name'      => $patient->name,
            'sex'       => $patient->sex,
            'religion'  => $patient->religion,
            'phone'     => $patient->phone,
            'address'   => $patient->address,
            'nik'       => $patient->nik,

        );

        $result = $app->modelsManager->executeQuery(
            $phql,
            $values
        );

        $response = new Phalcon\Http\Response();

        if ($result->success() === true) {
            $status = array("code" => 201, "response" => "success", "message" => "Patient was created successfully");
            $response->setStatusCode(201, "Created");

            $patient = $result->getModel();
            $response->setJsonContent(array("status" => $status, "result" => $patient));

        } else {
            $response->setStatusCode(409, "Conflict");
            $errors = [];
            foreach ($result->getMessages() as $message) {
                $errors[] = $message->getMessage();
            }

            $status = array("code" => 409, "response" => "error", "message" => $errors);
            $response->setJsonContent(array("status" => $status, "result" => ''));
        }

        return $response;
    }
);

// Updates patient based on primary key
$app->put(
    '/patients/{id:[0-9]+}',
    function ($id) use ($app) {
        $phql = 'UPDATE MyApp\Models\Patients SET name = :name:, sex = :sex:, religion = :religion:, phone = :phone:, address = :address:, nik = :nik: WHERE id = :id:';

        $updatedPatient = $app->request->getJsonRawBody();
        $values = array(
            'id'        => $id,
            'name'      => $updatedPatient->name,
            'sex'       => $updatedPatient->sex,
            'religion'  => $updatedPatient->religion,
            'phone'     => $updatedPatient->phone,
            'address'   => $updatedPatient->address,
            'nik'       => $updatedPatient->nik,

        );

        $result = $app->modelsManager->executeQuery(
            $phql,
            $values
        );
        $response = new Phalcon\Http\Response();

        if ($result->success() === true) {
            $status = array("code" => 200, "response" => "success", "message" => "Patient was updated successfully");
            $response->setStatusCode(200, "OK");
            $id = $result->getModel()->id;
            $response->setJsonContent(array("status" => $status, "result" => $id));
        } else {
            $response->setStatusCode(409, "Conflict");
            $errors = [];
            foreach ($result->getMessages() as $message) {
                $errors[] = $message->getMessage();
            }

            $status = array("code" => 409, "response" => "error", "message" => $errors);
            $response->setJsonContent(array("status" => $status, "result" => $id));
        }

        return $response;
    }
);

// Deletes patient based on primary key
$app->delete(
    '/patients/{id:[0-9]+}',
    function ($id) use ($app) {
        $phql = 'DELETE FROM MyApp\Models\Patients WHERE id = :id:';

        $result = $app->modelsManager->executeQuery(
            $phql,
            [
                'id' => $id,
            ]
        );

        $response = new Phalcon\Http\Response();

        if ($result->success() === true) {
            $status = array("code" => 200, "response" => "success", "message" => "Patient was deleted successfully");
            $response->setStatusCode(200, "OK");
            $response->setJsonContent(array("status" => $status, "result" => $id));
        } else {
            $response->setStatusCode(409, "Conflict");
            $errors = [];
            foreach ($result->getMessages() as $message) {
                $errors[] = $message->getMessage();
            }

            $status = array("code" => 409, "response" => "error", "message" => $errors);
            $response->setJsonContent(array("status" => $status, "result" => $id));
        }

        return $response;
         
    }
);

$app->notFound(
    function () use ($app) {
        $app->response->setStatusCode(404, "Not Found")->sendHeaders();
        $app->response->setJsonContent(array("status" => array("code" => 404, "response" => "error", "message" => "API Route is Not Found")));
        $app->response->send();
    }
);

$app->handle(isset($_GET['_url']) ? $_GET['_url'] : '');
