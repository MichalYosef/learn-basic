<?php
return [
    'createReservation' => [
        'type' => 2,
        'description' => 'Create a reservation',
    ],
    'updateReservation' => [
        'type' => 2,
        'description' => 'Update reservation',
    ],
    'operator' => [
        'type' => 1,
        'description' => 'operator',
        'children' => [
            'createReservation',
            'createRoom',
            'createCustomer',
        ],
    ],
    'admin' => [
        'type' => 1,
        'description' => 'admin',
        'children' => [
            'updateReservation',
            'operator',
            'createReservation',
        ],
    ],
    'role_createReservation' => [
        'type' => 1,
        'description' => 'Create a reservation',
        'children' => [
            'createReservation',
        ],
    ],
    'role_updateReservation' => [
        'type' => 1,
        'description' => 'Update reservation',
        'children' => [
            'updateReservation',
        ],
    ],
    'deleteReservation' => [
        'type' => 2,
        'description' => 'Delete reservation',
    ],
    'role_deleteReservation' => [
        'type' => 1,
        'description' => 'Delete reservation',
        'children' => [
            'deleteReservation',
        ],
    ],
    'createRoom' => [
        'type' => 2,
        'description' => 'Create a room',
    ],
    'role_createRoom' => [
        'type' => 1,
        'description' => 'Create a room',
        'children' => [
            'createRoom',
        ],
    ],
    'updateRoom' => [
        'type' => 2,
        'description' => 'Update room',
    ],
    'role_updateRoom' => [
        'type' => 1,
        'description' => 'Update room',
        'children' => [
            'updateRoom',
        ],
    ],
    'deleteRoom' => [
        'type' => 2,
        'description' => 'Delete room',
    ],
    'role_deleteRoom' => [
        'type' => 1,
        'description' => 'Delete room',
        'children' => [
            'deleteRoom',
        ],
    ],
    'createCustomer' => [
        'type' => 2,
        'description' => 'Create a customer',
    ],
    'role_createCustomer' => [
        'type' => 1,
        'description' => 'Create a customer',
        'children' => [
            'createCustomer',
        ],
    ],
    'updateCustomer' => [
        'type' => 2,
        'description' => 'Update customer',
    ],
    'role_updateCustomer' => [
        'type' => 1,
        'description' => 'Update customer',
        'children' => [
            'updateCustomer',
        ],
    ],
    'deleteCustomer' => [
        'type' => 2,
        'description' => 'Delete customer',
    ],
    'role_deleteCustomer' => [
        'type' => 1,
        'description' => 'Delete customer',
        'children' => [
            'deleteCustomer',
        ],
    ],
];
