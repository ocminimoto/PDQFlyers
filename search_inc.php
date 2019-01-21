<?php
function search($term, $searchRootDir, $page)
{
	$searchClass = "6a208eb0-7404-49f4-900f-4bf6c641f90e"; 
	$numPerPage = 20;
	 
	if ($term == '')
	{
		return "<div class='head" . $searchClass . "'>Please enter a valid search term</div>
";
	}
	if ($page == '')
	{
		$page = 1;
	}
  
	
	$retVal = "<div class='head" . $searchClass . "'>Search results for '" . $term . "'</div>
";
	$matchFound = false;
    
	$files = listallfiles($searchRootDir);
	if ($files)
	{
		$retVal .= "#TOP_OF_RESULTS#";
		$count = 0;
		$bad = array(" the ", " and ", "  "); 
	    $term = str_replace($bad, " ", $term);
		$retVal .= "<div class='resultspage" . $searchClass . "'>";
		foreach ($files as $file)
		{
		if (filesize($file) > 0)
		{
			$a = fopen($file, "r");
			$string = fread($a, filesize($file));
			fclose($a);
            
			if(stristr($string, $term))
			{
				$count++;
				$matchFound = true;
				
				if ($count <= $numPerPage * ($page-1))
				{
					continue;
				}

				if ($count > $numPerPage * $page)
				{
					break;
				}
				
				$out = explode("
", $string);

				$title = $out[0];
				$url = $out[1];
				$desc = $out[2];
                
				$retVal .= "<div class='result" . $searchClass . "'><a class='result" . $searchClass . "' href='" . $url;
				$retVal .= "'>" . $title . "</a></div>
";
				if ($desc != null && $desc != '')
				{
					$retVal .= "<div class='desc" . $searchClass . "'>" . $desc . "</div>
";
				}
				
                
				$retVal .= "<div class='url" . $searchClass . "'>" . $url . "</div>
";				
			}
		}
		}
		$retVal .= "</div>";
		
		if ($matchFound && $count > $numPerPage)
		{
			$navButtons = "<div align=right class='page" . $searchClass . "'>
";
			
			if ($page > 1)
			{
				$navButtons .= "<a href='?term=" . $term . "&page=" . ($page-1) . "'>&lt;&lt; Prev</a>";
			}
			else
			{
				$navButtons .= "&lt;&lt; Prev";
			}

			$navButtons .= "|";

			if ($count > $numPerPage * $page)
			{
				$navButtons .= "<a href='?term=" . $term . "&page=" . ($page+1) . "'>Next &gt;&gt;</a>";
			}
			else
			{
				$navButtons .= "Next &gt;&gt;";
			}
			
			$navButtons .= "</div>
";

			$retVal = str_replace("#TOP_OF_RESULTS#", $navButtons, $retVal);

			$retVal .= $navButtons;
		}
		else
		{
			$retVal = str_replace("#TOP_OF_RESULTS#", "", $retVal);
		}		
	}
    
	if (!$matchFound)
	{
		return "<div class='head" . $searchClass . "'>No matches for '" . $term . "'</div>
";
	}

	return $retVal;
}

function listallfiles($searchpath)
{
	$allfiles=array();

	$root = @opendir($searchpath);

if (!($root))
{
  $searchpath = $_SERVER['DOCUMENT_ROOT'] . dirname($_SERVER['PHP_SELF']) . '/' . $searchpath;
  $searchpath = realpath($searchpath) . '/';
  $root = @opendir($searchpath);
}

	while($file = readdir($root))
	{
		if($file != "." && $file != "..")
		{
			if (!is_dir($file))
			{
				$ext = getfileextention($file);
				if ($ext == "idx")
				{
					$allfiles[] = $searchpath . $file;
				}
			}
		}
	}
	closedir($root);

	return $allfiles;
}
function getfileextention($filename)
{
    $path_info = pathinfo($filename);
    return $path_info['extension'];
}

?>
