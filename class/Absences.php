<?php
/**
 * Created by PhpStorm.
 * User: Fejbioouuu
 * Date: 01.04.2019
 * Time: 16:48
 */

class Absences
{
    private $id;
    private $idemployee;
    private $idabsence;
    private $start_date;
    private $end_date;

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
    public function getIdemployee()
    {
        return $this->idemployee;
    }

    /**
     * @param mixed $idemployee
     */
    public function setIdemployee($idemployee)
    {
        $this->idemployee = $idemployee;
    }

    /**
     * @return mixed
     */
    public function getIdabsence()
    {
        return $this->idabsence;
    }

    /**
     * @param mixed $idabsence
     */
    public function setIdabsence($idabsence)
    {
        $this->idabsence = $idabsence;
    }

    /**
     * @return mixed
     */
    public function getStartDate()
    {
        return $this->start_date;
    }

    /**
     * @param mixed $start_date
     */
    public function setStartDate($start_date)
    {
        $this->start_date = $start_date;
    }

    /**
     * @return mixed
     */
    public function getEndDate()
    {
        return $this->end_date;
    }

    /**
     * @param mixed $end_date
     */
    public function setEndDate($end_date)
    {
        $this->end_date = $end_date;
    }




}