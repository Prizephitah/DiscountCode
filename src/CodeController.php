<?php

namespace Prizephitah\DiscountCode;

use Prizephitah\DiscountCode\Database\DatabaseInterface;

class CodeController
{
    private DatabaseInterface $database;

    public function __construct(DatabaseInterface $database) {
        $this->database = $database;
    }

    public function getCode(string $slug, $userInfo) {
        $statement = $this->database->prepare('
            SELECT "id", "name", "code"
            FROM "discount_codes"
            INNER JOIN "brands"
                ON "brands"."id" = "discount_codes"."brand_id"
            WHERE "brands"."slug" = :slug
        ');
        $statement->bindValue('slug', $slug);
        $statement->execute();
        $dbResult = $statement->fetch();

        return DiscountCode::fromArray($dbResult);
    }
}