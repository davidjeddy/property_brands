<?php
declare(strict_types=1);

/**
 * Process provided data set from text file.
 */
class processDataSet
{
    /**
     * [$filename description]
     * @var string
     */
    private $filename = './source_data.txt';

    /**
     * [$seperators description]
     * @var [type]
     */
    public $seperators = [' - ', ' – '];

    /**
     * @param  [type] $paramData [description]
     * @return [type]            [description]
     */
    public function __construct($paramData = null)
     {

        $this->exec( ($paramData ?: $this->filename) );
    }

    /**
     * @param  string $paramData [description]
     * @return [type]            [description]
     */
    private function exec(string $paramData)
    {
        $returnData = [];

        $handle = fopen($paramData, "r");
        if ($handle !== null) {

            // read each line of the data source text file
            while (($line = fgets($handle)) !== false) {

                foreach ($this->seperators as $sepOption) {
                    // does the string have an allowable seperator string?
                    if (strpos($line, $sepOption) > 0) {
                        // explode string and push onto return array
                        $tmp = explode($sepOption, $line);
                        $returnData[$tmp[0]] = $tmp[1];
                    }
                }
            }

            // close the file resource
            fclose($handle);
        } else {
            // error opening the file.
        } 

        // sort lines
        $returnData = $this->sortArray($returnData);

        // output now sorted data
        $this->output($returnData);
    }

    /**
     * @param  array  $paramData [description]
     * @return [type]            [description]
     */
    private function sortArray(array $paramData) : array
    {
        array_multisort(array_keys($paramData), SORT_NATURAL, $paramData);

        return $paramData;
    }

    /**
     * @param  array  $paramData [description]
     * @return [type]            [description]
     */
    private function output(array $paramData) : bool
    {
        return (bool)fwrite(STDOUT, implode("\n", $output) . "\n");
    }
}

$data = new processDataSet();
