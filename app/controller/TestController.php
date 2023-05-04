<?php

namespace controller;

use Exception;
use JetBrains\PhpStorm\ArrayShape;
use lib\components\Table;
use lib\data\TestData;
use lib\documentation\Documentation;
use lib\model\Query;
use model\UserModel;
use src\controllers\AppController;
use src\lib\events\Event;
use src\lib\events\EventType;
use src\lib\Helper;

/** @noinspection PhpUnused */

class TestController extends AppController
{
    public function __construct()
    {
        parent::__construct();
    }

    /** @noinspection PhpUnused */
    public function index(): void
    {
        $UserModel = new UserModel();
        if (false) {
            for ($x = 0; $x < 1000; $x++) {
                $contact = TestData::createFakeContact();
                $UserModel->insertRow([
                    'first_name' => $contact['firstName'],
                    'last_name' => $contact['lastName'],
                    'email' => $contact['email'],
                    'company' => $contact['company'],
                    'phone' => $contact['phone'],
                ]);
            }
        }
        try {
            $users = $UserModel->fetch([
                Query::FIELDS => [
                    'first_name',
                    'last_name',
                    'email',
                    'age',
                ],
                Query::WHERE => [
                    'first_name' => [
                        'jacob',
                        'john',
                    ],
                    'age >' => 30,
                    'age <' => 39,
                    'last_name LIKE' => '%An%',
                ],
                Query::ORDER_BY => [
                    'first_name' => Query::ASC,
                    'last_name' => Query::DESC,
                ],
                Query::LIMIT => 3,
            ]);

            $users = $UserModel->fetch([
                Query::FIELDS => [
                    'first_name',
                    'last_name',
                    'email',
                    'age',
                ],
                Query::WHERE => [
                    'first_name LIKE' => '%A%',
                ],
                Query::ORDER_BY => [
                    'first_name' => Query::ASC,
                    'last_name' => Query::DESC,
                ],
                Query::LIMIT => 50,
            ]);
            $this->table($users);


            $numberUsersSharingSameFirstAndLastName = $UserModel->fetch([
                Query::FIELDS => [
                    'first_name',
                    'last_name',
                    'count(*) as count',
                    'MAX(age) as max_age',
                ],
                Query::GROUP_BY => [
                    'first_name',
                    'last_name',
                ],
                Query::ORDER_BY => [
                    'count' => Query::DESC,
                ],
                Query::LIMIT => 2,
            ]);

            $result = $UserModel->update([
                Query::UPDATE => [
                    'age' => 102,
                ],
                Query::WHERE => [
                    'id' => 292,
                ],
                Query::LIMIT => 2,
            ]);
            if (!$result) {
                echo 'error';
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }

    #[ArrayShape(['colors' => "string[]", 'currentColorSelection' => "null|string"])] public function form(): array
    {
        return [
            'colors' => [
                '' => 'No color selected',
                'red' => 'Red',
                'green' => 'Green',
                'blue' => 'Blue',
            ],
            'currentColorSelection' => Helper::clean($this->request->post('color-picker')),
        ];
    }

    public function model(): array
    {
        $testFirstName = 'Mike';
        $testLastName = 'Smith_test';

        $UserModel = new UserModel();
        $result = $UserModel->delete([
            Query::WHERE => [
                'first_name' => $testFirstName,
                'last_name' => $testLastName,
            ],
        ]);

        if (!$result) {
            return [
                'success' => false,
                'message' => 'Failed to delete existing records from model',
            ];
        }

        $contact1 = TestData::createFakeContact(['firstName' => $testFirstName, 'lastName' => $testLastName]);
        $contact2 = TestData::createFakeContact(['firstName' => $testFirstName, 'lastName' => $testLastName]);

        $result = $UserModel->insertRows([
            [
                'first_name' => $contact1['firstName'],
                'last_name' => $contact1['lastName'],
                'email' => $contact1['email'],
                'company' => $contact1['company'],
                'phone' => $contact1['phone'],
                'age' => $contact1['age'],
            ],
            [
                'first_name' => $contact2['firstName'],
                'last_name' => $contact2['lastName'],
                'email' => $contact2['email'],
                'company' => $contact2['company'],
                'phone' => $contact2['phone'],
                'age' => $contact2['age'],
            ],
        ]);

        if (!$result) {
            return [
                'success' => false,
                'message' => 'Failed to create new records for user model',
            ];
        }

        $users = $UserModel->fetch([
            Query::WHERE => [
                'first_name' => [
                    $testFirstName,
                ],
                'last_name' => [
                    $testLastName,
                ],
            ],
        ]);

        return count($users) == 2 ? [
            'success' => true,
            'message' => 'Successfully inserted and fetched two records into user model',
            'table' => Table::create($users),
        ] : [
            'success' => false,
            'message' => 'Failed to fetch two records from user model',
        ];
    }

    public function input(): void
    {
    }

    public function events(): void
    {
        $this->addEventListener(EventType::ROUTE, function (Event $event) {
            /* put callback here */
            /* the "$this" accessed inside this closure will refer to the $this of what ever dispatched the event */
            /* @var Documentation $this */
        });

        $this->dispatchEvent(EventType::ROUTE);
    }
}
