<?php
/**
 * Created by PhpStorm.
 * User: alfrednutile
 * Date: 11/28/14
 * Time: 9:48 PM
 */

namespace AlfredNutileInc\Fixturizer;


class Reader extends BaseParser {

    protected $content_array;

    /**
     *
     * Shortcut to use class with Facade
     * @param bool $file_name
     * @param bool $path
     * @return mixed
     * @throws MissingFileException
     * @throws \Exception
     */
    public function getFixture($file_name = false, $path = false)
    {
        ($file_name != false) ? $this->setName($file_name) : false;
        ($path != false) ? $this->setBaseFixtureStoragePath($path) : false;
        $this->convertYmlToArray();
        return $this->getContentArray();
    }

    public function convertYmlToArray()
    {
        if(!$this->getFilesystem()->exists($this->getBaseFixtureStoragePath() . $this->getName()))
            throw new MissingFileException("Please Make sure the folder or file exists");

        try
        {
            $results = $this->getYmlParser()->parse($this->getBaseFixtureStoragePath() . $this->getName());
            $this->setContentArray($results);
            return $this;
        } catch(\Exception $e)
        {
            throw new \Exception(sprintf("Error making array from yml data message %s", $e->getMessage()));
        }
    }

    /**
     * @return mixed
     */
    public function getContentArray()
    {
        return $this->content_array;
    }

    /**
     * @param mixed $content_array
     */
    public function setContentArray($content_array)
    {
        $this->content_array = $content_array;
    }


}