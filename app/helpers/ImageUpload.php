<?php
	class ImageUpload{

		public $errors = [
			"size" => "",
			"type" => "",
			"exception" => ""
		];

		public function Upload($image){
			$file = $image;
			//print_r($file);

				  $fileName = $file["name"];
                  $fileTmp = $file["tmp_name"];
                  $fileSize = $file["size"];
                  $fileError = $file["error"];
                  $fileType = $file["type"];

                  
                  $fileExtension = explode(".", $fileName);
                  $fileActualExtension = strtolower($fileExtension[1]);

                  $allowed = array("jpg","jpeg","png", "pdf");

                  if(in_array($fileActualExtension, $allowed)){
                    if($fileError === 0){
                        if($fileSize < 500000){

                        	//All Ok! Now Write File

                            $fileNameNew = uniqid('', true).".".$fileActualExtension;
                            $fileDestintion = "/img/uploads/".$fileNameNew;
                            move_uploaded_file($fileTmp, $fileDestintion);
                            return true;

                        }else{
                            $this -> errors["size"] = "File too large";
                  			return false;
                        }

                    }else{
                        $this -> errors["exception"] = "Somthing went wrong. Please try again";
                  		return false;
                    }
                  }else{
                  	$this -> errors["type"] = "Invalid File Type";
                  	return false;
                  }
		}
	}


?>