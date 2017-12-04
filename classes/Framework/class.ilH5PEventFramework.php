<?php

require_once "Customizing/global/plugins/Services/Repository/RepositoryObject/H5P/classes/H5P/class.ilH5P.php";

/**
 * H5P event
 */
class ilH5PEventFramework extends H5PEventBase {

	/**
	 * Adds event type, h5p library and timestamp to event before saving it.
	 *
	 * Common event types with sub type:
	 *  content, <none> – content view
	 *           embed – viewed through embed code
	 *           shortcode – viewed through internal shortcode
	 *           edit – opened in editor
	 *           delete – deleted
	 *           create – created through editor
	 *           create upload – created through upload
	 *           update – updated through editor
	 *           update upload – updated through upload
	 *           upgrade – upgraded
	 *
	 *  results, <none> – view own results
	 *           content – view results for content
	 *           set – new results inserted or updated
	 *
	 *  settings, <none> – settings page loaded
	 *
	 *  library, <none> – loaded in editor
	 *           create – new library installed
	 *           update – old library updated
	 *
	 * @param string $type
	 *  Name of event type
	 * @param string $sub_type
	 *  Name of event sub type
	 * @param string $content_id
	 *  Identifier for content affected by the event
	 * @param string $content_title
	 *  Content title (makes it easier to know which content was deleted etc.)
	 * @param string $library_name
	 *  Name of the library affected by the event
	 * @param string $library_version
	 *  Library version
	 */
	function __construct($type, $sub_type = NULL, $content_id = NULL, $content_title = NULL, $library_name = NULL, $library_version = NULL) { parent::__construct($type, $sub_type, $content_id, $content_title, $library_name, $library_version); }


	/**
	 * Stores the event data in the database.
	 *
	 * Must be overridden by plugin.
	 */
	protected function save() {
		$h5p_event = new ilH5PEvent();

		$h5p_event->setType($this->type);

		if ($this->sub_type != NULL) {
			$h5p_event->setSubType($this->sub_type);
		}

		if ($this->content_id != NULL) {
			$h5p_event->setContentId($this->content_id);
		}

		if ($this->content_title != NULL) {
			$h5p_event->setContentTitle($this->content_title);
		}

		if ($this->library_name != NULL) {
			$h5p_event->setLibraryName($this->library_name);
		}

		if ($this->library_version != NULL) {
			$h5p_event->setLibraryVersion($this->library_version);
		}

		$h5p_event->create();
	}


	/**
	 * Add current event data to statistics counter.
	 *
	 * Must be overridden by plugin.
	 */
	protected function saveStats() {
		$h5p_counter = ilH5PCounter::getCounterByLibrary($this->type, $this->library_name, $this->library_version);

		if ($h5p_counter !== NULL) {
			$new = false;
		} else {
			$new = true;

			$h5p_counter = new ilH5PCounter();

			$h5p_counter->setType($this->type);
		}

		$h5p_counter->addNum();

		$h5p_counter->setLibraryName($this->library_name);

		$h5p_counter->setLibraryVersion($this->library_version);

		if ($new) {
			$h5p_counter->create();
		} else {
			$h5p_counter->update();
		}
	}
}