<?php

namespace Test;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\Constraint\IsEqual;
use PHPUnit\Framework\TestCase;

class SecretSaltTest extends TestCase
{

    /** @test */
    public function givenAString_whenExecutingHash_shouldSaltWithEnvValueInOneOfTheEnds(): void
    {
        $this->setSaltingEnvValue("RANDOM_SALT_VALUE");

        $saltedHash = $this->createSaltedHash('ITS A TEST');

        $saltedAtBeginning = new IsEqual('31859a0aa85e1b9729fe00b382f63c90f8ed132a71db8d384668172eb1091708');
        $saltedAtEnd = new IsEqual('5a31e30bb91fb323994058faca20129f3293dfdbc24aab0ea6866b81015410ab');
        $wasProperlySaltedInOneOfTheEnds = Assert::logicalOr($saltedAtBeginning, $saltedAtEnd);
        Assert::assertThat($saltedHash, $wasProperlySaltedInOneOfTheEnds, 'The hash is different from expected! You can salt the given string in the begging or in the end.');
    }

    private function setSaltingEnvValue(string $saltingValue): void
    {
        putenv("HASH_SALTING_VALUE=$saltingValue");
    }

    private function createSaltedHash(string $givenWord): string
    {
        return exec("php -f /var/www/html/secret-salt/index.php '$givenWord'");
    }

    /** @after */
    public function clearSaltingEnvValue(): void
    {
        putenv('HASH_SALTING_VALUE=');
    }
}