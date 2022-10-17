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
     * @var string|null
     */
    private $city;

    /**
     * @var string|ASC
     */
    private $filterOrder;

    /**
     * @var string|ASC
     */
    private $filterOrderAlphabetic;

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
     * @param string|null
     * @return JobSearch
     */
    public function setCity(?string $city): JobSearch
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->city;
    }
    
    /**
     * @param string|ASC
     * @return JobSearch
     */
    public function setFilterOrder(?string $filterOrder): JobSearch
    {
        $this->filterOrder = $filterOrder;
        return $this;
    }

    /**
     * @param string|ASC
     */
    public function getFilterOrder(): ?string
    {
        return $this->filterOrder;
    }

    /**
     * @param string|ASC
     * @return JobSearch
     */
    public function setFilterOrderAlphabetic(?string $filterOrderAlphabetic): JobSearch
    {
        $this->filterOrderAlphabetic = $filterOrderAlphabetic;
        return $this;
    }

    /**
     * @param string|ASC
     */
    public function getFilterOrderAlphabetic(): ?string
    {
        return $this->filterOrderAlphabetic;
    }
}