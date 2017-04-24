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
    public $data = [];

    /**
     * 
     */
    public function __construct()
    {
        $handle = fopen($this->filename, "r");

        if ($handle == false) {
            return false;
        }

        // read each line of the data source text file
        while (($line = fgets($handle)) !== false) {
            $this->data[] = $line;
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
        return natsort($this->data);
    }

    /**
     *
     */
    private function output()
    {
        fwrite(STDOUT, implode("\n", $this->data));

        exit(0);
    }
}

$data = new processDataSet();
