<?php



class Log
{
	protected $filename;
	private $handle;


	function __construct($prefix = "log")
	{
		$this->filename = $prefix ."-". date('Y-m-d') . ".log";
		$this->handle = fopen($this->filename, "a+");
	}


	function __destruct()
	{
		echo "Destruction complete";
		fclose($this->handle);
	}


	function logMessage($logLevel, $message)
	{
	    $dateTime = date('Y-m-d h:i:s');
	    $contents = fwrite($this->handle, $dateTime . " [" . $logLevel . "] " . $message . PHP_EOL);
	}


	function logInfo($message)
	{
		$this->logMessage("INFO", $message);
	}


	function logError($message)
	{	
		$this->logMessage("ERROR", $message);

	}

	protected function setFilename($filename)
	{
		$this->filename = trim($filename);
	}
}