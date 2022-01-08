<?php

namespace Prizephitah\DiscountCode;

use Prizephitah\DiscountCode\Database\DatabaseException;
use Prizephitah\DiscountCode\Database\DatabaseInterface;

class CodeController
{
    protected DatabaseInterface $database;
    protected CodeValidator $validator;

    public function __construct(DatabaseInterface $database, CodeValidator $validator) {
        $this->database = $database;
        $this->validator = $validator;
    }

    /**
     * @param string $slug
     * @param User $userInfo
     * @throws ValidationException When the available code fails validation.
     * @throws DatabaseException When the database query causes an error.
     * @return DiscountCode
     */
    public function getCode(string $slug, User $userInfo) {
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

        $code = DiscountCode::fromArray($dbResult);
        $this->validator->validate($code);

        //TODO Store user info for brand

        return $code;
    }
}