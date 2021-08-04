<?php
include("./variables/variable.php");

use PHPUnit\Framework\TestCase;

/**
 * @covers Variable
 */
class VariableTest extends TestCase
{
  private $var;

  protected function setUp(): void
  {
    $this->var = new Variable();    
  }

  /**
   * @testWith ["A", "$escudeiro", true]
   *           ["B", "$1mestre", false]
   *           ["C", "$_cavaleiro", true]
   *           ["D", "$__codigo", true]
   *           ["E", "$mestre@codigo", false]
   *           ["F", "$mestre1", true]
   *           ["G", "$escudeiro-1", false]
   *           ["H", "$mestreDosCodigos", true]
   *           ["I", "$db1_", true]
   *           ["J", "$this", false]
   *           ["K", "minhaVariavel", false]
   */
  public function testValidateName(string $questionLetter, string $questionValue, bool $questionExpectedValue): void
  {
    $nameValid = $this->var->validateName($questionValue);

    self::assertEquals($questionExpectedValue, $nameValid, "Test Fail in question $questionLetter.");
  }
}
?>