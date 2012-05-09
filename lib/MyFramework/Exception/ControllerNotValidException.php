<?php
namespace MyFramework\Exception;
/**
 * Description of ControllerNotValidException
 *
 * @author goofys
 */
class ControllerNotValidException extends PageNotFoundException {

	public function __construct($message="", $code=0, \Exception $previous=NULL) {
		parent::__construct('Controller name "' . $message . '" is not valid.', $code, $previous);
	}
}