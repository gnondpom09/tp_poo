    <?php
    class UploadAction extends Action {

        /**
         * Copier cette méthode
         *
         * @param Request $request
         * @param Response $response
         * @return void
         */
        public function launch(Request $request, Response $response) {
            // Instancie Model pour appliquer ses methodes CRUD
            $model = new Model;

            if(isset($_FILES['fichier']))
    { 
                $finfo = finfo_open(FILEINFO_MIME_TYPE); //Type de fichier selectionné

                // Si c'est un fichier de type 'image' alors le mettre dans le dossier multimedia/images/
                if($finfo=='image'){
                    try
                {
                $name = $_REQUEST['fichier']; //textbox name "txt_name"
                
                $image_file = $_FILES["txt_file"]["name"];
                $type  = $_FILES["txt_file"]["type"]; //file name "txt_file" 
                $size  = $_FILES["txt_file"]["size"];
                $temp  = $_FILES["txt_file"]["tmp_name"];
                
                $path="multimedia/images/".$image_file; //set upload folder path
                
                if(empty($name)){
                $errorMsg="Please Enter Name";
                }
                else if(empty($image_file)){
                $errorMsg="Please Select Image";
                }
                else if($type=="image/jpg" || $type=='image/jpeg' || $type=='image/png' || $type=='image/gif') //check file extension
                { 
                if(!file_exists($path)) //check file not exist in your upload folder path
                {
                    if($size < 5000000) //check file size 5MB
                    {
                    move_uploaded_file($temp, "mulimedia/images/" .$image_file); //move upload file temperory directory to your upload folder
                    }
                    else
                    {
                    $errorMsg="Your File To large Please Upload 5MB Size"; //error message file size not large than 5MB
                    }
                }
                else
                { 
                    $errorMsg="File Already Exists...Check Upload Folder"; //error message file not exists your upload folder path
                }
                }
                
                }
                catch(PDOException $e)
                {
                echo $e->getMessage();
                }
                }
                elseif($finfo=='')
        
        $dossier = 'multimedia/images';
        $fichier = basename($_FILES['fichier']['name']);
        if(move_uploaded_file($_FILES['fichier']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
        {
            echo 'Upload effectué avec succès !';
        }
        else //Sinon (la fonction renvoie FALSE).
        {
            echo 'Echec de l\'upload !';
        }
    }



            
            
            // Display content of home page
            $this->render(dirname(dirname(__FILE__)) . '/views/upload.php'); // modifier la page à afficher
            $this->printOut();
        }
    }