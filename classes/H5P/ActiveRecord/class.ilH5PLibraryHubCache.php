<?php

require_once "Services/ActiveRecord/class.ActiveRecord.php";
require_once "Customizing/global/plugins/Services/Repository/RepositoryObject/H5P/classes/H5P/Framework/class.ilH5PFramework.php";

/**
 * H5P library hub cache active record
 */
class ilH5PLibraryHubCache extends ActiveRecord {

	const TABLE_NAME = "rep_robj_xhfp_lib_hub";


	/**
	 * @return string
	 */
	static function returnDbTableName() {
		return self::TABLE_NAME;
	}


	/**
	 * @return ilH5PLibraryHubCache[]
	 */
	static function getLibraryHubCache() {
		/**
		 * @var $library_hub_caches ilH5PLibraryHubCache[]
		 */

		$library_hub_caches = self::get();

		return $library_hub_caches;
	}


	/**
	 * @var int
	 *
	 * @con_has_field    true
	 * @con_fieldtype    integer
	 * @con_length       8
	 * @con_is_notnull   true
	 * @con_is_primary   true
	 * @con_sequence     true
	 */
	protected $id;
	/**
	 * @var string
	 *
	 * @con_has_field    true
	 * @con_fieldtype    text
	 * @con_is_notnull   true
	 * @__con_index      true machine_name
	 */
	protected $machine_name = "";
	/**
	 * @var int
	 *
	 * @con_has_field    true
	 * @con_fieldtype    integer
	 * @con_length       8
	 * @con_is_notnull   true
	 */
	protected $major_version;
	/**
	 * @var int
	 *
	 * @con_has_field    true
	 * @con_fieldtype    integer
	 * @con_length       8
	 * @con_is_notnull   true
	 */
	protected $minor_version = 0;
	/**
	 * @var int
	 *
	 * @con_has_field    true
	 * @con_fieldtype    integer
	 * @con_length       8
	 * @con_is_notnull   true
	 */
	protected $patch_version = 0;
	/**
	 * @var int
	 *
	 * @con_has_field    true
	 * @con_fieldtype    integer
	 * @con_length       8
	 * @con_is_notnull   true
	 */
	protected $h5p_major_version;
	/**
	 * @var int
	 *
	 * @con_has_field    true
	 * @con_fieldtype    integer
	 * @con_length       8
	 * @con_is_notnull   true
	 */
	protected $h5p_minor_version = 0;
	/**
	 * @var string
	 *
	 * @con_has_field   true
	 * @con_fieldtype   text
	 * @con_is_notnull  true
	 */
	protected $title = "";
	/**
	 * @var string
	 *
	 * @con_has_field   true
	 * @con_fieldtype   text
	 * @con_is_notnull  true
	 */
	protected $summary = "";
	/**
	 * @var string
	 *
	 * @con_has_field   true
	 * @con_fieldtype   text
	 * @con_is_notnull  true
	 */
	protected $description = "";
	/**
	 * @var string
	 *
	 * @con_has_field   true
	 * @con_fieldtype   text
	 * @con_is_notnull  true
	 */
	protected $icon = "";
	/**
	 * @var int
	 *
	 * @con_has_field    true
	 * @con_fieldtype    integer
	 * @con_length       8
	 * @con_is_notnull   true
	 */
	protected $created_at = - 1;
	/**
	 * @var int
	 *
	 * @con_has_field    true
	 * @con_fieldtype    integer
	 * @con_length       8
	 * @con_is_notnull   true
	 */
	protected $updated_at = - 1;
	/**
	 * @var bool
	 *
	 * @con_has_field    true
	 * @con_fieldtype    integer
	 * @con_length       1
	 * @con_is_notnull   true
	 */
	protected $is_recommended = true;
	/**
	 * @var int
	 *
	 * @con_has_field    true
	 * @con_fieldtype    integer
	 * @con_length       8
	 * @con_is_notnull   true
	 */
	protected $popularity = 0;
	/**
	 * @var string
	 *
	 * @con_has_field   true
	 * @con_fieldtype   text
	 * @con_is_notnull  true
	 */
	protected $screenshots = "[]";
	/**
	 * @var string
	 *
	 * @con_has_field   true
	 * @con_fieldtype   text
	 * @con_is_notnull  true
	 */
	protected $license = "[]";
	/**
	 * @var string
	 *
	 * @con_has_field   true
	 * @con_fieldtype   text
	 * @con_is_notnull  true
	 */
	protected $example = "";
	/**
	 * @var string
	 *
	 * @con_has_field   true
	 * @con_fieldtype   text
	 * @con_is_notnull  true
	 */
	protected $tutorial = "";
	/**
	 * @var string
	 *
	 * @con_has_field   true
	 * @con_fieldtype   text
	 * @con_is_notnull  true
	 */
	protected $keywords = "[]";
	/**
	 * @var string
	 *
	 * @con_has_field   true
	 * @con_fieldtype   text
	 * @con_is_notnull  true
	 */
	protected $categories = "[]";
	/**
	 * @var string
	 *
	 * @con_has_field   true
	 * @con_fieldtype   text
	 * @con_is_notnull  true
	 */
	protected $owner = "";


	/**
	 * @return array
	 */
	public function getScreenshotsArray() {
		return ilH5PFramework::stringToJson($this->screenshots);
	}


	/**
	 * @param array $screenshots
	 */
	public function setScreenshotsArray(array $screenshots) {
		$this->screenshots = ilH5PFramework::jsonToString($screenshots);
	}


	/**
	 * @return array
	 */
	public function getLicenseArray() {
		return ilH5PFramework::stringToJson($this->license);
	}


	/**
	 * @param array $screenshots
	 */
	public function setLicenseArray(array $license) {
		$this->license = ilH5PFramework::jsonToString($license);
	}


	/**
	 * @return array
	 */
	public function getKeywordsArray() {
		return ilH5PFramework::stringToJson($this->keywords);
	}


	/**
	 * @param array $keywords
	 */
	public function setKeywordsArray(array $keywords) {
		$this->keywords = ilH5PFramework::jsonToString($keywords);
	}


	/**
	 * @return array
	 */
	public function getCategoriesArray() {
		return ilH5PFramework::stringToJson($this->categories);
	}


	/**
	 * @param array $categories
	 */
	public function setCategoriesArray(array $categories) {
		$this->categories = ilH5PFramework::jsonToString($categories);
	}


	/**
	 * @return int
	 */
	public function getId() {
		return $this->id;
	}


	/**
	 * @param int $id
	 */
	public function setId($id) {
		$this->id = $id;
	}


	/**
	 * @return string
	 */
	public function getMachineName() {
		return $this->machine_name;
	}


	/**
	 * @param string $machine_name
	 */
	public function setMachineName($machine_name) {
		$this->machine_name = $machine_name;
	}


	/**
	 * @return int
	 */
	public function getMajorVersion() {
		return $this->major_version;
	}


	/**
	 * @param int $major_version
	 */
	public function setMajorVersion($major_version) {
		$this->major_version = $major_version;
	}


	/**
	 * @return int
	 */
	public function getMinorVersion() {
		return $this->minor_version;
	}


	/**
	 * @param int $minor_version
	 */
	public function setMinorVersion($minor_version) {
		$this->minor_version = $minor_version;
	}


	/**
	 * @return int
	 */
	public function getPatchVersion() {
		return $this->patch_version;
	}


	/**
	 * @param int $patch_version
	 */
	public function setPatchVersion($patch_version) {
		$this->patch_version = $patch_version;
	}


	/**
	 * @return int
	 */
	public function getH5pMajorVersion() {
		return $this->h5p_major_version;
	}


	/**
	 * @param int $h5p_major_version
	 */
	public function setH5pMajorVersion($h5p_major_version) {
		$this->h5p_major_version = $h5p_major_version;
	}


	/**
	 * @return int
	 */
	public function getH5pMinorVersion() {
		return $this->h5p_minor_version;
	}


	/**
	 * @param int $h5p_minor_version
	 */
	public function setH5pMinorVersion($h5p_minor_version) {
		$this->h5p_minor_version = $h5p_minor_version;
	}


	/**
	 * @return string
	 */
	public function getTitle() {
		return $this->title;
	}


	/**
	 * @param string $title
	 */
	public function setTitle($title) {
		$this->title = $title;
	}


	/**
	 * @return string
	 */
	public function getSummary() {
		return $this->summary;
	}


	/**
	 * @param string $summary
	 */
	public function setSummary($summary) {
		$this->summary = $summary;
	}


	/**
	 * @return string
	 */
	public function getDescription() {
		return $this->description;
	}


	/**
	 * @param string $description
	 */
	public function setDescription($description) {
		$this->description = $description;
	}


	/**
	 * @return string
	 */
	public function getIcon() {
		return $this->icon;
	}


	/**
	 * @param string $icon
	 */
	public function setIcon($icon) {
		$this->icon = $icon;
	}


	/**
	 * @return int
	 */
	public function getCreatedAt() {
		return $this->created_at;
	}


	/**
	 * @param int $created_at
	 */
	public function setCreatedAt($created_at) {
		$this->created_at = $created_at;
	}


	/**
	 * @return int
	 */
	public function getUpdatedAt() {
		return $this->updated_at;
	}


	/**
	 * @param int $updated_at
	 */
	public function setUpdatedAt($updated_at) {
		$this->updated_at = $updated_at;
	}


	/**
	 * @return bool
	 */
	public function isRecommended() {
		return $this->is_recommended;
	}


	/**
	 * @param bool $is_recommended
	 */
	public function setIsRecommended($is_recommended) {
		$this->is_recommended = $is_recommended;
	}


	/**
	 * @return int
	 */
	public function getPopularity() {
		return $this->popularity;
	}


	/**
	 * @param int $popularity
	 */
	public function setPopularity($popularity) {
		$this->popularity = $popularity;
	}


	/**
	 * @return string
	 */
	public function getScreenshots() {
		return $this->screenshots;
	}


	/**
	 * @param string $screenshots
	 */
	public function setScreenshots($screenshots) {
		$this->screenshots = $screenshots;
	}


	/**
	 * @return string
	 */
	public function getLicense() {
		return $this->license;
	}


	/**
	 * @param string $license
	 */
	public function setLicense($license) {
		$this->license = $license;
	}


	/**
	 * @return string
	 */
	public function getExample() {
		return $this->example;
	}


	/**
	 * @param string $example
	 */
	public function setExample($example) {
		$this->example = $example;
	}


	/**
	 * @return string
	 */
	public function getTutorial() {
		return $this->tutorial;
	}


	/**
	 * @param string $tutorial
	 */
	public function setTutorial($tutorial) {
		$this->tutorial = $tutorial;
	}


	/**
	 * @return string
	 */
	public function getKeywords() {
		return $this->keywords;
	}


	/**
	 * @param string $keywords
	 */
	public function setKeywords($keywords) {
		$this->keywords = $keywords;
	}


	/**
	 * @return string
	 */
	public function getCategories() {
		return $this->categories;
	}


	/**
	 * @param string $categories
	 */
	public function setCategories($categories) {
		$this->categories = $categories;
	}


	/**
	 * @return string
	 */
	public function getOwner() {
		return $this->owner;
	}


	/**
	 * @param string $owner
	 */
	public function setOwner($owner) {
		$this->owner = $owner;
	}
}
