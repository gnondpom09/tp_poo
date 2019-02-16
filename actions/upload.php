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

            if (isset($_FILES['fichier'])) { 

                // file informations                
                $image_file = $_FILES["fichier"]["name"];
                $type  = $_FILES["fichier"]["type"]; //file name "txt_file" 
                $size  = $_FILES["fichier"]["size"];
                $temp  = $_FILES["fichier"]["tmp_name"];

                // Type de fichier selectionné
                $finfo = finfo_open(FILEINFO_MIME_TYPE); 
                $mime = finfo_file($finfo, $temp);

                //set upload folder path
                $path = "multimedia/images/" . $image_file;

                if (!empty($image_file)) {
                    // check file not exist in your upload folder path
                    if (!file_exists($path)) {
                        //check file size 5MB
                        if ($size < 5000000) {
                            // Move upload file temperory directory to your upload folder
                            if ($mime == 'image/jpg' || $mime == 'image/jpeg' || $mime == 'image/png') {
                                //Its a doc format do something
                                move_uploaded_file($temp, "multimedia/images/" . $image_file);
                            } else if ($mime == 'video/webm') {
                                move_uploaded_file($temp, "multimedia/videos/" . $image_file);
                            } else if ($mime == 'audio/mpeg') {
                                move_uploaded_file($temp, "multimedia/audio/" . $image_file);
                            }
                            // Update database when click validate form
                            if (isset($_POST['ajouter'])) {
                                // Check if description is not empty
                                if (isset($_POST['description'])) {
                                    // push properties of file in array
                                    $description = htmlspecialchars($_POST['description']);
                                    $date = date('d/m/Y');
                                    $values = [$path, $type, $description, 'toto', $date];
   
                                    $model->addData(array($values));
                                    $response->addVar('fichier', $values);

                                    echo "Requête réussie";
                                } else {
                                    echo "Veuillez remplir la description";
                                }
                            }
                            
                        } else {
                            echo "Your File To large Please Upload 5MB Size";
                        }
                    } else { 
                        echo "File Already Exists...Check Upload Folder";
                    }
                } else {
                    echo "Please Select Image";
                }
                finfo_close($finfo);
            }
              
            
            // Display content of home page
            $this->render(dirname(dirname(__FILE__)) . '/views/upload.php');
            $this->printOut();
        }
    }