<?php

class Setup
{
  public $configFile = null;

	public function __construct()
	{
    $this->configFile = $_SERVER['DOCUMENT_ROOT'] . '/app/config.php';

    echo "<br>Setting Up API<br>";
    if(!file_exists($this->configFile)) {
      $this->configSetup();
    }
    //.......
    require_once $_SERVER['DOCUMENT_ROOT'] . '/app/config.php';
    $this->dbSetup();

	}

  private function dbSetup()
  {
    $db = DB::getInstance();

		$tableName = "clicks";
		$rows = "id INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
							campaign VARCHAR(30) NOT NULL,
							datetime DATE NOT NULL,
							page VARCHAR(200)";
    $data = $db->createTable($tableName, $rows);

		$tableName = "campaigns";
		$rows = "id INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
							slug VARCHAR(30) NOT NULL,
							name VARCHAR(80) NOT NULL,
							startDate DATE NOT NULL,
							endDate DATE NOT NULL";
		$data = $db->createTable($tableName, $rows);
  }

  private function configSetup()
  {
    echo "<br>Adding Config...<br>";
    $file = $this->configFile;
    $current = file_get_contents($file);
    $current .= $this->configFileSetup();
    file_put_contents($file, $current);
    echo "<br>Config complete.<br>";
  }

  private function configFileSetup()
  {
    $contents = "<?php \$GLOBALS['config'] = array(" .
            "'mysql' => array( " .
    		    "'host' 		=> 'localhost'," .
    		    "'username' 	=> 'root'," .
    		    "'password' 	=> 'root'," .
    		    "'db' 		=> 'stats'" .
    	       ")" .
          ");";
    return $contents;
  }
}
