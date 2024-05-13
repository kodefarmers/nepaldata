<?php

namespace KodeFarmers\NepalData;

/**
 * Class NepalData
 *
 * Provides methods to access Nepal-related data such as provinces and districts.
 *
 * @package KodeFarmers\NepalData
 * @property bool $withDistricts Indicates if provinces should include districts.
 * @property bool $withLocalBodies Indicates if districts should include localbodies.
 *
 * @method array all(string $lang = 'english') Get all data.
 * @method array provinces(string $lang = 'english') Get provinces.
 * @method array districts(string $lang = 'english') Get districts.
 **/
class NepalData
{
    /**
     * Indicates if provinces should include districts.
     *
     * @var bool
     */
    protected $withDistricts = false;

    /**
     * Indicates if districts should include localbodies.
     *
     * @var bool
     */
    protected $withLocalBodies = false;

    /**
     * Indicates if only administration should be included with districts.
     *
     * @var bool
     */
    protected $onlyAdministrations = false;

    /**
     * Get all data.
     *
     * @param string $lang Language (english, nepali, devanagari).
     * @return array All data.
     */
    public function all($lang = 'english'): array
    {
        if($lang == 'nepali' || $lang == 'devanagari') {
            return $this->getAllDataInDevanagari();
        }

        return $this->getAllData();
    }

    /**
     * Get provinces.
     *
     * @param string $lang Language (english, nepali, devanagari).
     * @return array Provinces data.
     */
    public function provinces($lang = 'english'): array
    {
        if($this->withDistricts){
            if($lang == 'nepali' || $lang == 'devanagari') {
                return $this->getProvincesWithDistrictsInDevanagari();
            }
            return $this->getProvincesWithDistricts();
        }

        if($lang == 'nepali' || $lang == 'devanagari') {
            return $this->getProvincesInDevanagari();
        }

        return $this->getProvinces();
    }

    /**
     * Get districts.
     *
     * @param string $lang Language (english, nepali, devanagari).
     * @return array Districts data.
     */
    public function districts($lang = 'english'): array
    {
        if($this->withLocalBodies){
            if($lang == 'nepali' || $lang == 'devanagari') {
                return $this->getDistrictsWithLocalBodiesInDevanagari($this->onlyAdministrations);
            }
            return $this->getDistrictsWithLocalBodies($this->onlyAdministrations);
        }

        if($lang == 'nepali' || $lang == 'devanagari') {
            return $this->getDistrictsInDevanagari();
        }

        return $this->getDistricts();
    }

    /**
     * Specify the data to include (district or localbody).
     *
     * @param string $with Data to include ('district', 'localbody').
     * @return NepalData
     */
    public function with(string $with): NepalData
    {
        if($with == 'districts' || $with == 'district') {
            $this->withDistricts = true;
        } else if($with == 'localbodies' || $with == 'localbody') {
            $this->withLocalBodies = true;
        }

        return $this;
    }

    public function only(string $only): NepalData
    {
        if($only == 'administrations' || $only == 'administration') {
            $this->onlyAdministrations = true;
        }

        return $this;
    }

    /**
     * Get all data.
     *
     * @return array All data.
     */
    public function getAllData(): array
    {
        require 'Datas/allData.php';

        return $allData;
    }

    /**
     * Get all data in devanagari.
     *
     * @return array All data.
     */
    public function getAllDataInDevanagari(): array
    {
        require 'Datas/allData.php';

        return $allDataInDevanagari;
    }

    /**
     * Get provinces data.
     *
     * @return array Provinces data.
     */
    private function getProvinces(): array
    {
        require 'Datas/provinces.php';
        return $provinces;
    }

    /**
     * Get provinces data in devanagari.
     *
     * @return array Provinces data.
     */
    private function getProvincesInDevanagari(): array
    {
        require 'Datas/provinces.php';
        return $provincesInDevanagari;
    }

    /**
     * Get provinces with districts data.
     *
     * @return array Provinces data.
     */
    private function getProvincesWithDistricts(): array
    {
        require 'Datas/provincesWithDistricts.php';
        return $provincesWithDistricts;
    }

    /**
     * Get provinces with districts data in devanagari.
     *
     * @return array Provinces data.
     */
    private function getProvincesWithDistrictsInDevanagari(): array
    {
        require 'Datas/provincesWithDistricts.php';
        return $provincesWithDistrictsInDevanagari;
    }

    /**
     * Get districts data.
     *
     * @return array Provinces data.
     */
    private function getDistricts(): array
    {
        require 'Datas/districts.php';
        return $districts;
    }

    /**
     * Get provinces data in devanagari.
     *
     * @return array Provinces data.
     */
    private function getDistrictsInDevanagari(): array
    {
        require 'Datas/districts.php';
        return $districtsInDevanagari;
    }

    /**
     * Get the topmost parent key with the leafnodes values.
     *
     * @param array $array.
     * @return array.
     */
    private function getLeafNodes($array): array
    {
        $province = [];

        $ma = 'Ma.Na.Pa.';
        $upa = 'Upa.Ma.';
        $na = 'Na.Pa.';
        $ga = 'Ga.Pa.';

        foreach ($array as $key => $value) {
            $province[$key] = [];

            array_push($province[$key], ...$value[$ma]);
            array_push($province[$key], ...$value[$upa]);
            array_push($province[$key], ...$value[$na]);
            array_push($province[$key], ...$value[$ga]);

        }

        return $province;
    }

    /**
     * Get districts with localbodies data.
     *
     * @param boolean $onlyAdministrations.
     * @return array Provinces data.
     */
    private function getDistrictsWithLocalBodies($onlyAdministrations = false): array
    {
        require 'Datas/districtsWithLocalBodies.php';

        if($onlyAdministrations){
            return $this->getLeafNodes($districtsWithLocalBodies);
        }

        return $districtsWithLocalBodies;
    }

    /**
     * Get districts with localbodies data in devanagari.
     *
     * @param boolean $onlyAdministrations.
     * @return array Provinces data.
     */
    private function getDistrictsWithLocalBodiesInDevanagari($onlyAdministrations = false): array
    {
        require 'Datas/districtsWithLocalBodies.php';

        if($onlyAdministrations){
            return $this->getLeafNodes($districtsWithLocalBodiesInDevanagari);
        }

        return $districtsWithLocalBodiesInDevanagari;
    }
}
