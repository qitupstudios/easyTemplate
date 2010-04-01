<?
	function blogWidget($limit,$db_location, $db_user,$db_pass,$db_db){
		$data = selectAllLimit('blog_form',$limit,$db_location, $db_user,$db_pass,$db_db);
		foreach($data as $value){
			$id[] = $value['id'];
			$modified[] = $value['modified'];
			$author[] = $value['author'];
			$title[] = $value['title'];
			$blog_text[] = $value['data'];
			$tags[] = $value['tags'];
		}	
		$theData['id'] = $id;
		$theData['modified'] = $modified;
		$theData['author'] = $author;
		$theData['title'] = $title;
		$theData['blog_text'] = $blog_text;
		$theData['tags'] = $tags;
		
		return $theData;
	}
?>