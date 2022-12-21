<?php


/**
TOTO=lekdzpoekdpzeodkzpeokdzepzeod
TATA=zkldjzeokfpzofkzpeokfpzeokfpzeokf
TUTU=ekdpzeokfpzeokfpzokefpozekfpzokfpo

$fileContentAsArray = [
    'TOTO=lekdzpoekdpzeodkzpeokdzepzeod',
    'TATA=zkldjzeokfpzofkzpeokfpzeokfpzeokf'
];
 */
class FileReader
{
    public function __construct(
        private string $filePath,
    )
    {
//        $this->fileContentAsArray = explode("\n", file_get_contents($this->filePath));
        $this->fileResource = fread($this->filePath, 'r');
    }

    public function readNextLine(): Generator
    {
        while(!feof($this->fileResource)) {
            yield fread($this->fileResource);
        }
    }
}

$configFile = new FileReader('./config.whatever');

foreach($configFile->readNextLine() as $configLine) {

}