<?php

function getDatabaseConfig(): array
{
    return [
        "database" => [
            "mysql" => [
                "dev" => [
                    "url" => "mysql:host=localhost:3306;dbname=belajar_oop_dev",
                    "username" => "root",
                    "password" => ""
                ],
                "prod" => [
                    "url" => "mysql:host=localhost:3306;dbname=belajar_oop",
                    "username" => "root",
                    "password" => ""
                ],
            ],
            "sqlsrv" => [
                "dev" => [
                    "dev" => [
                        "url" => "sqlsrv:server=120.0.0.1\\MSSQLSERVER,1422; Database=belajar_oop_dev",
                        "username" => "sa",
                        "password" => ""
                    ],
                ],
                "prod" => [
                    "dev" => [
                        "url" => "sqlsrv:server=120.0.0.1\\MSSQLSERVER,1422; Database=belajar_oop",
                        "username" => "sa",
                        "password" => ""
                    ],
                ],
            ]
        ]
    ];
}
