<?php
declare(strict_types=1);

echo "Array soring practice.\n";
echo "\n";

$array = [];

// @source http://stackoverflow.com/questions/13246597/how-to-read-a-file-line-by-line-in-php
$handle = fopen("source_data.txt", "r");
if ($handle) {
    while (($line = fgets($handle)) !== false) {
        $lineData = explode(' - ', $line);
        $array[$lineData[0]] = $lineData[1];
        // process the line read.
    }

    fclose($handle);
} else {
    // error opening the file.
} 

print_r($array);
exit(0);

/**
 * 
 */
class processDataSet()
{
    
    /**
     * [__constructor description]
     * @param  string $filename [description]
     * @return [type]           [description]
     */
    public function __constructor($filename = './source_data.txt')
     {
        $this->init($filename);
    }

    /**
     * [parseRow description]
     * @param  [type] $paramData [description]
     * @return [type]            [description]
     */
    private function parseRow(string $paramData) : $arrayName
    {
        $returnData = [];


    }
}