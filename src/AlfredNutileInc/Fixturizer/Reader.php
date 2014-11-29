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
    protected $source_folder_and_file_name;

    public function setSourceFolderAndFileName($path_filename)
    {
        $this->source_folder_and_file_name = $path_filename;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSourceFolderAndFileName()
    {
        return $this->source_folder_and_file_name;
    }

    public function convertYmlToArray()
    {
        if(!$this->getFilesystem()->exists($this->getSourceFolderAndFileName()))
            throw new MissingFileException("Please Make sure the folder or file exists");

        try
        {
            $results = $this->getYmlParser()->parse($this->source_folder_and_file_name);
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