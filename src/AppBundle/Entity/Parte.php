<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Parte
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @var int
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Alumno", inversedBy="partes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $alumno;

    /**
     * @ORM\ManyToOne(targetEntity="Profesor", inversedBy="partes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $profesor;

    /**
     * @ORM\Column(type="date")
     * @var \DateTime
     */
    private $fechaCreacion;

    /**
     * @ORM\Column(type="boolean")
     * @var bool
     */
    private $avisado;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @var string
     */
    private $observaciones;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set fechaCreacion
     *
     * @param \DateTime $fechaCreacion
     *
     * @return Parte
     */
    public function setFechaCreacion($fechaCreacion)
    {
        $this->fechaCreacion = $fechaCreacion;

        return $this;
    }

    /**
     * Get fechaCreacion
     *
     * @return \DateTime
     */
    public function getFechaCreacion()
    {
        return $this->fechaCreacion;
    }

    /**
     * Set avisado
     *
     * @param boolean $avisado
     *
     * @return Parte
     */
    public function setAvisado($avisado)
    {
        $this->avisado = $avisado;

        return $this;
    }

    /**
     * Get avisado
     *
     * @return boolean
     */
    public function getAvisado()
    {
        return $this->avisado;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     *
     * @return Parte
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;

        return $this;
    }

    /**
     * Get observaciones
     *
     * @return string
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * Set alumno
     *
     * @param Alumno $alumno
     *
     * @return Parte
     */
    public function setAlumno(Alumno $alumno)
    {
        $this->alumno = $alumno;

        return $this;
    }

    /**
     * Get alumno
     *
     * @return Alumno
     */
    public function getAlumno()
    {
        return $this->alumno;
    }

    /**
     * Set profesor
     *
     * @param Profesor $profesor
     *
     * @return Parte
     */
    public function setProfesor(Profesor $profesor)
    {
        $this->profesor = $profesor;

        return $this;
    }

    /**
     * Get profesor
     *
     * @return Profesor
     */
    public function getProfesor()
    {
        return $this->profesor;
    }
}
