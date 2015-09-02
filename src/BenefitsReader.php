<?php

/**
 * BenefitsReader
 *
 * The BenefitsReader reads from an Excel sheet and creates a map of zip codes
 * to available benefits based on that data. Note that this class expects the
 * Composer autoload to be included in the file that creates this class, and is
 * dependant on phpoffice/phpexcel package.
 *
 * The flow of this class is as follows:
 *
 * 1. Construct the class and pass the path of the spreadsheet as an argument.
 * 2. Call the getExcelArray() method to get the raw array of data
 *
 *    OR
 *
 *    Call the getBenefitsMap() method to get an intelligent mapping of zip
 *    codes to benefits.
 *
 * The spreadsheet has some gnarly formatting so the getBenefitsMap() does its
 * best job of properly constructing a valid map of the data as it was intended
 * to represent.
 *
 * @author Sam Rapaport <[rapaport.sam7@gmail.com]>
 */

namespace SCAN\Src;

class BenefitsReader
{
    /**
     * The file path of the spreadsheet.
     * @var String
     */
    protected $sheet;

    /**
     * The array generated from the Excel data
     * @var Array
     */
    protected $excelArray;

    /**
     * Save the path to the spreadsheet.
     *
     * @param String $sheet
     */
    public function __construct($sheet)
    {
        $this->sheet = $sheet;
    }

    /**
     * Use PHPExcel to get an array containing the data from the spreadsheet.
     *
     * @param  boolean $strip_first Whether or not to strip the first element.
     *                              This would be desirable if the first row in
     *                              the spreadsheet is just the column names and
     *                              not actual values
     * @return Array the excel array
     */
    public function getExcelArray($strip_first = false)
    {
        $excelReader = \PHPExcel_IOFactory::createReaderForFile($this->sheet);
        $excelObj = $excelReader->load($this->sheet);
        $this->excelArray = $excelObj->getActiveSheet()->toArray();

        return $this->excelArray;
    }

    /**
     * Map zip codes to the proper benefits/county
     *
     * @return Array $map
     */
    public function getBenefitsMap()
    {
        if ($this->excelArray == null) {
            $this->excelArray = $this->getExcelArray(true);
        }

        $map = [];
        $currCounty = $currZips = null;
        foreach ($this->excelArray as $row => $columns) {
            // We require at least one column to be filled in order for the data
            // to be valid
            if ($columns[0] || $columns[1] || $columns[2]) {
                $county = (empty($columns[0])) ? $currCounty : $columns[0];
                $currCounty = $county;

                $zipcodes = (empty($columns[2])) ? $currZips : $this->getZipArray($columns[2]);
                $currZips = $zipcodes;

                $benefit = $columns[1];

                foreach ($zipcodes as $zip) {
                    // Make sure zip is numeric (not an empty value or newline)
                    if (is_numeric($zip)) {
                        // Each benefit is its own array within the 2D-array
                        $map[$zip][] = [
                            'county' => $county,
                            'benefit' => $benefit
                        ];
                    }
                }
            }
        }
        return $map;
    }

    /**
     * Split a string of zip codes into an array with each element representing
     * one zip code.
     *
     * @param  string $zipString
     * @return Array
     */
    protected function getZipArray($zipString)
    {
        // Unfortunately the format is inconsistent and the deliminter
        // is either a space or a semicolon+space combo
        if (strpos($zipString, ';') !== false) {
            $zipArray = explode(';', $zipString);

        } else {
            $zipArray = explode(' ', $zipString);
        }

        return $zipArray;
    }
}
