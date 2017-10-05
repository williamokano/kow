<?php

namespace Katapoka\Kow\App\Kernel;

use Doctrine\DBAL\DBALException;
use Exception;
use PDOException;
use Symfony\Component\HttpFoundation\Response;

class ExceptionHandler
{
    /**
     * @param Exception $e
     * @return Response
     */
    public static function handler(Exception $e)
    {
        if ($e instanceof PDOException || $e instanceof DBALException) {
            return new Response(sprintf('Database encountered some problems and returned %s', $e->getCode()), 500);
        }

        return new Response($e->getMessage(), 500);
    }
}
