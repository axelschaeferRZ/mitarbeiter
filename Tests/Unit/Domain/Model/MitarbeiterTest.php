<?php
namespace AxelSchaefer\Mitarbeiter\Tests\Unit\Domain\Model;

/**
 * Test case.
 */
class MitarbeiterTest extends \TYPO3\TestingFramework\Core\Unit\UnitTestCase
{
    /**
     * @var \AxelSchaefer\Mitarbeiter\Domain\Model\Mitarbeiter
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \AxelSchaefer\Mitarbeiter\Domain\Model\Mitarbeiter();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getVornameReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getVorname()
        );
    }

    /**
     * @test
     */
    public function setVornameForStringSetsVorname()
    {
        $this->subject->setVorname('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'vorname',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getNachnameReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getNachname()
        );
    }

    /**
     * @test
     */
    public function setNachnameForStringSetsNachname()
    {
        $this->subject->setNachname('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'nachname',
            $this->subject
        );
    }

    /**
     * @test
     */
    public function getGehaltReturnsInitialValueForString()
    {
        self::assertSame(
            '',
            $this->subject->getGehalt()
        );
    }

    /**
     * @test
     */
    public function setGehaltForStringSetsGehalt()
    {
        $this->subject->setGehalt('Conceived at T3CON10');

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'gehalt',
            $this->subject
        );
    }
}
