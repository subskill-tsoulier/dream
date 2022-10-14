<?php

namespace App\Entity;

class JobSearch 
{

    /**
     * @var string|null
     */
    private $profession;

    /**
     * @var string|null
     */
    private $contract;

    /**
     * @var string|null
     */
    private $company;

    /**
     * @var int|null
     */
    private $salaire;

    /**
     * @param string|null
     * @return JobSearch
     */
    public function setProfession(?string $profession): JobSearch
    {
        $this->profession = $profession;
        return $this;
    } 

    /**
     * @return string|null
     */
    public function getProfession(): ?string
    {
        return $this->profession;
    }

    /**
     * @param string|null
     * @return JobSearch
     */
    public function setContract(?string $contract): JobSearch
    {
        $this->contract = $contract;
        return $this;
    } 

    /**
     * @return string|null
     */
    public function getContract(): ?string
    {
        return $this->contract;
    }

    /**
     * @param string|null
     * @return JobSearch
     */
    public function setCompany(?string $company): JobSearch
    {
        $this->company = $company;
        return $this;
    } 

    /**
     * @return string|null
     */
    public function getCompany(): ?string
    {
        return $this->company;
    }

    /**
     * @param int|null
     * @return JobSearch
     */
    public function setSalaire(?int $salaire): JobSearch
    {
        $this->salaire = $salaire;
        return $this;
    } 

    /**
     * @return string|null
     */
    public function getSalaire(): ?int
    {
        return $this->salaire;
    }
}