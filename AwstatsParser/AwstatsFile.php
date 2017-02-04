<?php

/**
 * Abstract class that allows generalization of Awstats files.
 */
abstract class AwstatsFile
{
	protected $data = array();

	public function getFileContents()
	{
		$contents = "AWSTATS DATA FILE 6.9 (build 1.925)\n\n";
		foreach ($this->data as $section_name => $rows)
		{
			$contents .= 'BEGIN_' . $section_name . ' ' . count($rows) . "\n";
			foreach ($rows as $key => $row)
				$contents .= $key . ' ' . implode(' ', $row) . "\n";
			$contents .= 'END_' . $section_name . "\n\n";
		}

		return $contents;
	}

	public function writeFileContents($filename)
	{
		file_put_contents($filename, $this->getFileContents());
	}
}