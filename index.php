<?php
declare(strict_types=1);

/**
 * Process provided data set from text file.
 */
class processDataSet
{
    /**
     * @var string
     */
    private $filename = './source_data.txt';

    /**
     * @var array
     */
    public $seperators = [' - ', ' – '];

    /**
     * @var array
     */
    public $data = [];

    /**
     * processDataSet constructor.
     *
     * @param null $paramData
     */
    public function __construct($paramData = null)
     {

        $this->run( ($paramData ?: $this->filename) );
    }

    /**
     * @param string $paramData
     *
     * @return bool
     */
    private function run(string $paramData)
    {
        $handle = fopen($paramData, "r");

        if ($handle == false) {
            return false;
        }

        // read each line of the data source text file
        while (($line = fgets($handle)) !== false) {

            foreach ($this->seperators as $sepOption) {
                // does the string have an allowable separator string?
                if (strpos($line, $sepOption) > 0) {
                    // explode string and push onto return array
                    $tmp = explode($sepOption, $line);
                    var_dump($tmp[1]);
                    $this->data[$tmp[0]] = $this->removeLineBreak($tmp[1]);
                }
            }
        }

        // close the file resource
        fclose($handle);

        // sort lines
         $this->sortArray();

        // output now sorted data
        $this->output();

        return true;
    }

    /**
     * @return bool
     */
    private function sortArray()
    {
        return array_multisort(array_keys($this->data), SORT_NATURAL, $this->data);

    }

    /**
     *
     */
    private function output()
    {
        $output = implode("\n", array_map(
            function ($v, $k) { return sprintf("%s - %s", $k, $v); },
            $this->data,
            array_keys($this->data)
        ));

        fwrite(STDOUT, $output);

        exit(0);
    }

    /**
     * @source http://stackoverflow.com/questions/709669/how-do-i-remove-blank-lines-from-text-in-php
     *
     * @param string $param
     *
     * @return string
     */
    private function removeLineBreak(string $param) : string
    {
        return preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", null, $param);
    }
}

$data = new processDataSet();
