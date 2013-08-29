<?php
namespace kjung;

/**
* PHP wrapper class for the webkit2png application.
*
* @author Kevin Jung
* 
*/
class webkit2png {	
	/**
	 * Set options for webkit2png and contains the default directory path.
	 * @var array
	 */
	private $options = array(
		'dir' => 'images/',
	);

	/**
	 * Set flags for the options.
	 * @var array
	 */
	private $flags = array(
		'url'            => null,
		'width'          => '-W',
		'height'         => '-H',
		'zoom'           => '-z',
		'fullsize'       => '-F',
		'thumb'          => '-T',
		'clipped'        => '-C',
		'clipped-width'  => '--clipwidth',
		'clipped-height' => '--clipheight',
		'scale'          => '-s',
		'dir'            => '-D',
		'filename'       => '-o',
		'md5'            => '-m',
		'datestamp'      => '-d',
		'delay'          => '--delay',
		'js'             => '--js',
		'no-images'      => '--no-images',
		'no-js'          => '--no-js',
		'transparent'    => '--transparent',
		'user-agent'     => '--user-agent',
	);

	/**
	 * Set webki2png query to be executed.
	 * @var string
	 */
	private $query = 'webkit2png ';

	/**
	 * Initialize the class
	 * @param string $url Provied URL
	 */
	public function __construct($url)
	{	
		// Set the environment path so you have access to webkit2png within PHP.
		// If you installed webkit2png via homebrew, include the following path.
		putenv("PATH=" . $_env["path"] .':/usr/local/bin');
		$webkit2png = trim(shell_exec('type -P webkit2png'));

		try 
		{	if (empty($webkit2png)){
			throw new \Exception('Unable to find webkit2png. Please check your environment paths to ensure that PHP has access to the webkit2png binary.');
			}
		}

		catch (\Exception $e) 
		{
			die($e->getMessage());
		}

		$this->url = $url;
		$this->setUrl();
	}	

	/**
	 * Set the $url variable
	 * @param string $url Provied URL
	 */
	private function setUrl()
	{	
		$this->options['url'] = $this->url;
	}

	/**
	 * Set the $options variable
	 * @param array $options Provied options
	 */
	public function setOptions($options = null)
	{
		$this->options = array_merge($this->options, $options);	
		array_walk($this->options, function(&$value){
			if ($value === true) {
				$value = null;
			}
		});
	}

	/**
	 * Generate the image
	 */
	public function getImage()
	{	
		$this->setQuery();
		return shell_exec(trim($this->query));	
	}

	/**
	 * Generate and return the generated query
	 */
	public function getQuery()
	{	
		$this->setQuery();
		return $this->query;
	}

	/**
	 * Set the query based on the provided URL and options
	 */
	private function setQuery()
	{	
		$this->options = array_merge_recursive($this->flags, $this->options);
		$this->options = array_diff($this->options, $this->flags);
		$this->options = array_intersect_key($this->options, $this->flags);

		foreach ($this->options as $key => $option) {
			$this->query .= $option[0] . ' ' . $option[1] . ' ';
			$this->query = $string = str_replace('  ', ' ', $this->query);
		}
	}

}