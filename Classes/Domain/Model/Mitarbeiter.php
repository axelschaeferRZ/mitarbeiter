<?php
namespace AxelSchaefer\Mitarbeiter\Domain\Model;


/***
 *
 * This file is part of the "mitarbeiter" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2020 
 *
 ***/
/**
 * Mitarbeiter
 */
class Mitarbeiter extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * vorname
     * 
     * @var string
     */
    protected $vorname = '';

    /**
     * nachname
     * 
     * @var string
     */
    protected $nachname = '';

    /**
     * gehalt
     * 
     * @var string
     */
    protected $gehalt = '';

    /**
     * Returns the vorname
     * 
     * @return string $vorname
     */
    public function getVorname()
    {
        return $this->vorname;
    }

    /**
     * Sets the vorname
     * 
     * @param string $vorname
     * @return void
     */
    public function setVorname($vorname)
    {
        $this->vorname = $vorname;
    }

    /**
     * Returns the nachname
     * 
     * @return string $nachname
     */
    public function getNachname()
    {
        return $this->nachname;
    }

    /**
     * Sets the nachname
     * 
     * @param string $nachname
     * @return void
     */
    public function setNachname($nachname)
    {
        $this->nachname = $nachname;
    }

    /**
     * Returns the gehalt
     * 
     * @return string $gehalt
     */
    public function getGehalt()
    {
        return $this->gehalt;
    }

    /**
     * Sets the gehalt
     * 
     * @param string $gehalt
     * @return void
     */
    public function setGehalt($gehalt)
    {
        $this->gehalt = $gehalt;
    }
}
