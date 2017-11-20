<?php

require_once "Customizing/global/plugins/Services/Repository/RepositoryObject/H5P/classes/H5P/class.ilH5P.php";

/**
 * H5P editor storage
 */
class ilH5PEditorStorage implements H5peditorStorage {

	/**
	 * @var \ILIAS\DI\Container
	 */
	protected $dic;
	/**
	 * @var ilH5P
	 */
	protected $h5p;
	/**
	 * @var ilH5PPlugin
	 */
	protected $pl;


	/**
	 * @param ilH5P $h5p
	 */
	public function __construct(ilH5P $h5p) {
		global $DIC;

		$this->h5p = $h5p;

		$this->dic = $DIC;

		$this->pl = ilH5PPlugin::getInstance();
	}


	/**
	 * Load language file(JSON) from database.
	 * This is used to translate the editor fields(title, description etc.)
	 *
	 * @param string $name  The machine readable name of the library(content type)
	 * @param int    $major Major part of version number
	 * @param int    $minor Minor part of version number
	 * @param string $lang  Language code
	 *
	 * @return string Translation in JSON format
	 */
	public function getLanguage($machineName, $majorVersion, $minorVersion, $language) {

	}


	/**
	 * "Callback" for mark the given file as a permanent file.
	 * Used when saving content that has new uploaded files.
	 *
	 * @param int $fileId
	 */
	public function keepFile($fileId) {

	}


	/**
	 * Decides which content types the editor should have.
	 *
	 * Two usecases:
	 * 1. No input, will list all the available content types.
	 * 2. Libraries supported are specified, load additional data and verify
	 * that the content types are available. Used by e.g. the Presentation Tool
	 * Editor that already knows which content types are supported in its
	 * slides.
	 *
	 * @param array $libraries List of library names + version to load info for
	 *
	 * @return array List of all libraries loaded
	 */
	public function getLibraries($libraries = NULL) {

	}


	/**
	 * Alter styles and scripts
	 *
	 * @param array $files
	 *  List of files as objects with path and version as properties
	 * @param array $libraries
	 *  List of libraries indexed by machineName with objects as values. The objects
	 *  have majorVersion and minorVersion as properties.
	 */
	public function alterLibraryFiles(&$files, $libraries) {

	}


	/**
	 * Saves a file or moves it temporarily. This is often necessary in order to
	 * validate and store uploaded or fetched H5Ps.
	 *
	 * @param string  $data      Uri of data that should be saved as a temporary file
	 * @param boolean $move_file Can be set to TRUE to move the data instead of saving it
	 *
	 * @return bool|object Returns false if saving failed or the path to the file
	 *  if saving succeeded
	 */
	public static function saveFileTemporarily($data, $move_file) {

	}


	/**
	 * Marks a file for later cleanup, useful when files are not instantly cleaned
	 * up. E.g. for files that are uploaded through the editor.
	 *
	 * @param H5peditorFile
	 * @param $content_id
	 */
	public static function markFileForCleanup($file, $content_id) {

	}


	/**
	 * Clean up temporary files
	 *
	 * @param string $filePath Path to file or directory
	 */
	public static function removeTemporarilySavedFiles($filePath) {

	}
}
