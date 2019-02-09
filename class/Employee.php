<?php
/**
 * Created by PhpStorm.
 * User: Fejbioouuu
 * Date: 04.02.2019
 * Time: 16:32
 */

class Employee
{
    private $id;
    private $vorname;
    private $name;
    private $anstellungsverhaeltnis;
    private $pensum;
    private $Vertragsbeginn;
    private $Vertragsende;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)


    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getVorname()
    {
        return $this->vorname;
    }

    /**
     * @param mixed $vorname
     */
    public function setVorname($vorname)
    {
        $this->vorname = $vorname;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getAnstellungsverhaeltnis()
    {
        return $this->anstellungsverhaeltnis;
    }

    /**
     * @param mixed $anstellungsverhaeltnis
     */
    public function setAnstellungsverhaeltnis($anstellungsverhaeltnis)
    {
        $this->anstellungsverhaeltnis = $anstellungsverhaeltnis;
    }

    /**
     * @return mixed
     */
    public function getPensum()
    {
        return $this->pensum;
    }

    /**
     * @param mixed $pensum
     */
    public function setPensum($pensum)
    {
        $this->pensum = $pensum;
    }

    /**
     * @return mixed
     */
    public function getVertragsbeginn()
    {
        return $this->Vertragsbeginn;
    }

    /**
     * @param mixed $Vertragsbeginn
     */
    public function setVertragsbeginn($Vertragsbeginn)
    {
        $this->Vertragsbeginn = $Vertragsbeginn;
    }

    /**
     * @return mixed
     */
    public function getVertragsende()
    {
        return $this->Vertragsende;
    }

    /**
     * @param mixed $Vertragsende
     */
    public function setVertragsende($Vertragsende)
    {
        $this->Vertragsende = $Vertragsende;
    }


}