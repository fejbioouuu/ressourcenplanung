<?php
/**
 * Created by PhpStorm.
 * User: Fabio
 * Date: 18.02.2019
 * Time: 15:0012
 */

class Absencetype
{
private $id;
private $absence_name;
private $absence_type;

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
    public function getAbsenceName()
    {
        return $this->absence_name;
    }

    /**
     * @param mixed $absence_name
     */
    public function setAbsenceName($absence_name)
    {
        $this->absence_name = $absence_name;
    }

    /**
     * @return mixed
     */
    public function getAbsenceType()
    {
        return $this->absence_type;
    }

    /**
     * @param mixed $absence_type
     */
    public function setAbsenceType($absence_type)
    {
        $this->absence_type = $absence_type;
    }

}