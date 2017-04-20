<?php
declare(strict_types=1);

/**
 * Process provided data set from text file.

 */
class processDataSet()
{
    /**
     * [$filename description]
     * @var string
     */
    private $filename = './source_data.txt';

    /**
     * [__constructor description]
     * @param  [type] $paramData [description]
     * @return [type]            [description]
     */
    public function __constructor($paramData)
     {
        $this->init( ($paramData ?: $this->filename) );
    }

    /**
     * [init description]
     * @param  string $paramData [description]
     * @return [type]            [description]
     */
    private function init(string $paramData)
    {
    	// @source http://stackoverflow.com/questions/13246597/how-to-read-a-file-line-by-line-in-php
		$handle = fopen($paramData, "r");
        $returnData = [];

		if ($handle !== null) {

            // read each line of the data source text file
		    while (($line = fgets($handle)) !== false) {
                // parse each line
                $returnData[] = $this->parseRow($line)
		    }

            // close the file resource
		    fclose($handle);
		} else {
		    // error opening the file.
		} 

        // sort lines
        
        // output now sorted data
    }

    private function parseRow(string $paramData) : array
    {
        $seperators = [' - ', ' – '];
        $returnData = [];

        foreach ($seperators as $sepVal) {
            if (stristr($paramData, ' - ') > 0) {
                $returnData[] = explode(' - ', $paramData);
            }
        }
        
        return $returnData;
    }

    private function sortArray(array $paramData) : array
    {
        $returnData = [];
        return $returnData;
    }

    /**
     * Send the sorted array to STDOUT
     * 
     * @param  string $paramData [description]
     * @return [type]            [description]
     */
    private function output(string $paramData) : void
    {
        foreach($paramData as $key => $value) {
            fwrite(STDOUT, implode(' - ', $output) . "\n");
        }
        
        return
    }
}

new \processDataSet();
