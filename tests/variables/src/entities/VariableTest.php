<?php

namespace Test\variables\src\entities;

use App\variables\src\entities\Variable;
use App\variables\src\exceptions\InvalidVariableNameException;
use PHPUnit\Framework\TestCase;

class VariableTest extends TestCase
{
    /**
     * @param string $variableName
     * @throws InvalidVariableNameException
     * @dataProvider provideInvalidVariableNames
     */
    public function test_VariableInstance_ShouldThrowException_WhenGivenAnInvalidVariableName(string $variableName): void
    {
        self::expectException(InvalidVariableNameException::class);
        self::expectExceptionMessage("Invalid Variable name: $variableName");
        $variable = new Variable($variableName);
    }

    /**
     * @param string $variableName
     * @dataProvider provideValidVariableNames
     * @throws InvalidVariableNameException
     */
    public function test_VariableInstance_ShouldCreateInstance_WhenGivenAValidVariableName(string $variableName): void
    {
        $variable = new Variable($variableName);
        self::assertEquals($variableName, $variable->getVariableName());
    }

    /**
     * @return iterable
     */
    public static function provideInvalidVariableNames(): iterable
    {
        yield '$4' => ['$4'];
        yield '' => [''];
        yield '$$' => ['$$'];
        yield '$.' => ['$.test'];
        yield 'test' => ['test'];
        yield '123_test' => ['123_test'];
        yield '123-test' => ['123-test'];
        yield '$-test' => ['$-test'];
        yield '$' => ['$'];
        yield '$1mestre' => ['$1mestre'];
        yield '$mestre@codigo' => ['$mestre@codigo'];
        yield ['$escudeiro-1'];
    }

    public static function provideValidVariableNames(): iterable
    {
        yield ['$this'];
        yield ['$escudeiro_1'];
        yield ['$escudeiro1'];
        yield ['$_cavaleiro'];
        yield ['$__codigo'];
        yield ['$mestre1'];
        yield ['$mestreDosCodigos'];
        yield ['$db1_'];
        yield ['$_SERVER'];
    }
}
