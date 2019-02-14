<?php
    class InsertAction extends Action {

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
                $name = $_REQUEST['fichier']; //textbox name "txt_name"                    
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
                            //move upload file temperory directory to your upload folder
                            if ($mime == 'image/jpg' || $mime == 'image/png') {
                                //Its a doc format do something
                                move_uploaded_file($temp, "multimedia/images/" . $image_file);
                            } else if ($mime == 'video/webm') {
                                move_uploaded_file($temp, "multimedia/videos/" . $image_file);
                            } else if ($mime == 'audio/mpeg') {
                                move_uploaded_file($temp, "multimedia/audio/" . $image_file);
                            }
                            if (isset($_POST['ajouter'])) {
                                
                                if (isset($_POST['description'])) {
                                    $description = htmlspecialchar($_POST['description']);
                                    $valFile = $request->getParam('fichier');
                                    $valDescription = $request->getParams('description');

                                    $date = new Date();
                                    $values = [$path, $type, $description, 'toto', $date];
   
                                    $model->addData(array($values));
                                    $response->addVar('fichier', $values);

                                    $model->addData(array($new_val));
                                    $values = $model->readData();
                                    $response->addVar('fichier', $values);

                                    echo "Requête réussie";
                                } else {
                                    echo "Veuillez remplir la description";
                                }
                            }
                            
                        } else {
                            //error message file size not large than 5MB
                            echo "Your File To large Please Upload 5MB Size";
                        }
                    } else { 
                        //error message file not exists your upload folder path
                        echo "File Already Exists...Check Upload Folder";
                    }
                } else {
                    echo "Please Select Image";
                }
                finfo_close($finfo);
            }
              
            
            // Display content of home page
            $this->render(dirname(dirname(__FILE__)) . '/views/upload.php'); // modifier la page à afficher
            $this->printOut();
        }
    }