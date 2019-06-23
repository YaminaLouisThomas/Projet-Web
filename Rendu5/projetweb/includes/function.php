<?php
session_start();
$pdo = new PDO("mysql:host=localhost:3306;dbname=projetweb", "root", "");


if (isset($_GET["id"])) {
    $info_user = $pdo->query(
        'SELECT * FROM utilisateur WHERE id_utilisateur = "' . $_GET["id"] . '"'
    );
    $info_user = $info_user->fetchAll(PDO::FETCH_ASSOC);

    $info_competence = $pdo->query(
        'SELECT competence.id_competence ,nom_compet, niveau, id_utilisateur FROM avoir
            JOIN competence ON avoir.id_competence = competence.id_competence   
            WHERE id_utilisateur = "' . $_GET["id"] . '"
            '
    );
    $info_competence = $info_competence->fetchAll(PDO::FETCH_ASSOC);

    $info_creer = $pdo->query(
        'SELECT projet.id_projet, image_projet, nom_projet, type_projet FROM projet
            JOIN creer ON creer.id_projet = projet.id_projet 
            WHERE id_utilisateur = "' . $_GET["id"] . '"
            '
    );
    $info_creer = $info_creer->fetchAll(PDO::FETCH_ASSOC);
} elseif (isset($_SESSION["connected"])) {
    $info_user = $pdo->query(
        'SELECT * FROM utilisateur WHERE id_utilisateur = "' . $_SESSION["connected"] . '"'
    );
    $info_user = $info_user->fetchAll(PDO::FETCH_ASSOC);


    $info_id_competences = $pdo->query(
        'SELECT id_competence FROM competence'
    );
    $info_id_competences = $info_id_competences->fetchAll(PDO::FETCH_ASSOC);

    $info_competence = $pdo->query(
        'SELECT competence.id_competence ,nom_compet, niveau, id_utilisateur FROM avoir
            JOIN competence ON avoir.id_competence = competence.id_competence   
            WHERE id_utilisateur = "' . $_SESSION["connected"] . '"
            '
    );
    $info_competence = $info_competence->fetchAll(PDO::FETCH_ASSOC);


    $info_id_projet = $pdo->query(
        'SELECT id_projet FROM projet'
    );

    $info_id_projet = $info_id_projet->fetchAll(PDO::FETCH_ASSOC);


    $info_creer = $pdo->query(
        'SELECT projet.id_projet, image_projet, nom_projet, type_projet FROM projet
            JOIN creer ON creer.id_projet = projet.id_projet 
            WHERE id_utilisateur = "' . $_SESSION["connected"] . '"
            '
    );
    $info_creer = $info_creer->fetchAll(PDO::FETCH_ASSOC);

    if (isset($_POST["mod"])) {
        $_SESSION["modification"] = $_POST["valeur1"];
    } elseif (isset($_POST["vis"])) {
        $_SESSION["modification"] = $_POST["valeur2"];
    }
}



function checkmail()
{
    $pdo = new PDO("mysql:host=localhost:3306;dbname=projetweb", "root", "");
    $stmMail = $pdo->query("SELECT adresse_mail FROM utilisateur ");
    $mail = $stmMail->fetchAll(PDO::FETCH_ASSOC);
    foreach ($mail as $key => $value) {
        if ($value['adresse_mail'] === $_POST['Email']) {
            return 1;
        }
    }
}

$erreur_inscription = [];
if (isset($_POST["submit_inscription"])) {
    $annee_actuel = date("Y");
    if($_POST["date"] != ""){
        $annee = $_POST["date"][0] . $_POST["date"][1] . $_POST["date"][2] . $_POST["date"][3];
        $verif = $annee_actuel - $annee;
    }
    $lenTel = strlen($_POST["tel"]);
    $compte_existant = checkmail();
    if ($_POST['prenom'] == "") {
        $erreur_inscription[] = "il manque le prénom";
    } elseif ($_POST["nom"] == "") {
        $erreur_inscription[] = "il manque le nom";
    } elseif ($_POST["age"] == "Age") {
        $erreur_inscription[] = "il manque l'age";
    } elseif ($_POST["mdp"] == "") {
        $erreur_inscription[] = "il manque le mdp";
    } elseif ($_POST["Cmdp"] == "") {
        $erreur_inscription[] = "il manque le mdp";
    } elseif ($compte_existant == 1) {
        $erreur_inscription[] = "compte deja existant, veuillez changer l'adresse mail";
    } elseif ($_POST["mdp"] != $_POST["Cmdp"]) {
        $erreur_inscription[] = "Le mot de passe ne correspond pas!";
    } elseif ($_POST["date"] == "") {
        $erreur_inscription[] = "il manque la date de naissance";
    } elseif ($_POST["Email"] == "") {
        $erreur_inscription[] = "il manque l'adresse mail";
    } elseif ($_POST["tel"] == "" || $lenTel != 10) {
        $erreur_inscription[] = "le numero de telephone est inccorect";
    } elseif ($_POST["qualite"] == "") {
        $erreur_inscription[] = "il manque les qualités personnelles";
    } elseif ($_POST["description_u"] == "") {
        $erreur_inscription[] = "il manque la description";
    } elseif ($_POST["age"] != $verif) {
        $erreur_inscription[] = "ton age ne correspond pas avec ta date de naissance";
    } else {
        echo "vous etes bien inscrit";
        $statement = $pdo->prepare(
            "INSERT INTO utilisateur ( civilite, prenom,nom,description_u,age,mot_de_passe,date_de_naissance,adresse_mail,tel,info_addi,qualite_personnelle) 
            VALUES ( :civilite, :prenom,:nom,:description_u,:age,:mot_de_passe,:date_de_naissance,:adresse_mail,:tel,:info_addi,:qualite_personnelle )"
        );
        // DATE d'anniverssaire
        $statement->execute(array(
            ':civilite' => $_POST['sexe'],
            ':prenom' => $_POST['prenom'],
            ':nom' => $_POST['nom'],
            ':description_u' => $_POST['description_u'],
            ':age' => $_POST['age'],
            ':mot_de_passe' => $_POST['mdp'],
            ':date_de_naissance' => $_POST['date'],
            ':adresse_mail' => $_POST['Email'],
            ':tel' => $_POST['tel'],
            ':info_addi' => $_POST['info'],
            ':qualite_personnelle' => $_POST['qualite']
        ));
        header("location: connexion.php");
    }
}
$erreur_co = [];
if (isset($_POST["submitco"])) {
    if ($_POST["mail"] == "") {
        $erreur_co[] = "il manque l'adresse mail";
    } elseif ($_POST["mdpco"] == "") {
        $erreur_co[] = "il manque le mot de passe";
    } else {
        $statementco = $pdo->query(
            "SELECT id_utilisateur, mot_de_passe, adresse_mail,admin_num FROM utilisateur"
        );
        $user = $statementco->fetchAll(PDO::FETCH_ASSOC);
        foreach ($user as $key => $value) {
            if ($user[$key]["mot_de_passe"] == $_POST["mdpco"] && $user[$key]["adresse_mail"] == $_POST["mail"]) {
                $_SESSION["connected"] = $user[$key]["id_utilisateur"];
                $_SESSION["modification"] = 0;
                $_SESSION['admin'] = $user[$key]["admin_num"];
                header("location: cv_utilisateur.php");
            } else {
                $erreur_co[] = "compte inexistant";
            }
        }
    }
}
if (isset($_POST['confirmation_home'])) {
    if ($_FILES["img"] != "") {
        $extensions = [".png", ".jpg", ".jpeg"];
        $fichier = $_SESSION["connected"];
        $file = $_FILES["img"]["name"];
        $extension = strrchr($file, ".");
        if (!in_array($extension, $extensions)) {
            echo "l'extension n'est pass bonne ";
        } else if ($_FILES["img"]["size"] > 2 * pow(10, 6)) {
            echo "l'image est trop grande";
        } else {
            $fichierF = $fichier . $extension;
            if ($_FILES["img"] == "") {
                $fichierF = $info_user[0]['image_u'];
            }
            $dossier = 'image/' . $fichierF;
            move_uploaded_file($_FILES['img']['tmp_name'], $dossier);

            $statementimage = $pdo->prepare(
                ('UPDATE utilisateur SET image_u = :image_u WHERE id_utilisateur = "' . $_SESSION["connected"] . '"')
            );
            $statementimage->execute(array(
                ':image_u' => $fichierF
            ));

            if ($_POST["prenom"] == "") {
                $_POST["prenom"] = $info_user[0]['prenom'];
            }

            if ($_POST["nom"] == "") {
                $_POST["nom"] = $info_user[0]['nom'];
            }

            $statementinfoperso = $pdo->prepare(
                ('UPDATE utilisateur SET prenom = :prenom, nom = :nom WHERE id_utilisateur = "' . $_SESSION["connected"] . '"')
            );
            $statementinfoperso->execute(array(
                ':prenom' => $_POST["prenom"],
                ':nom' => $_POST["nom"]
            ));

            header("location: cv_utilisateur.php");
        }
        if ($_POST["prenom"] == "") {
            $_POST["prenom"] = $info_user[0]['prenom'];
        }

        if ($_POST["nom"] == "") {
            $_POST["nom"] = $info_user[0]['nom'];
        }

        $statementinfoperso = $pdo->prepare(
            ('UPDATE utilisateur SET prenom = :prenom, nom = :nom WHERE id_utilisateur = "' . $_SESSION["connected"] . '"')
        );
        $statementinfoperso->execute(array(
            ':prenom' => $_POST["prenom"],
            ':nom' => $_POST["nom"]
        ));


        header("location: cv_utilisateur.php");
    }
}

if (isset($_POST['confirmation_about'])) {
    if ($_POST["description_u"] == "") {
        $_POST["description_u"] = $info_user[0]['description_u'];
    }
    $len_competence = count($info_competence);
    if ($_POST["skill"] != "" && $_POST["level"] != "") {
        if ($len_competence > 8) {
            echo "tu as deja 10 competences, tu ne peux pas en mettre plus";
        } else {
            $statementSkill = $pdo->prepare(
                "INSERT INTO competence (nom_compet, niveau) 
                VALUES (:nom_compet, :niveau)"
            );
            $statementSkill->execute(array(
                ':nom_compet' => $_POST['skill'],
                ':niveau' => $_POST['level']
            ));

            $info_id_comptence = $pdo->query(
                'SELECT MAX(id_competence) id_competence FROM competence'
            );
            $info_id_comptence = $info_id_comptence->fetchAll(PDO::FETCH_ASSOC);

            $statementSkill_utilisateur = $pdo->prepare(
                "INSERT INTO avoir (id_competence, id_utilisateur) 
                VALUES (:id_competence, :id_utilisateur)"
            );
            $statementSkill_utilisateur->execute(array(
                ':id_competence' => $info_id_comptence[0]["id_competence"],
                ':id_utilisateur' => $_SESSION["connected"]
            ));
        }
    }


    $statementinfoabout = $pdo->prepare(
        ('UPDATE utilisateur SET description_u = :description_u WHERE id_utilisateur = "' . $_SESSION["connected"] . '"')
    );
    $statementinfoabout->execute(array(
        ':description_u' => $_POST["description_u"]
    ));
    header("location: cv_utilisateur");
}






if (isset($_POST['confirmation_p'])) {
    if ($_FILES["img_pro"] != "") {
        $extensions = [".png", ".jpg", ".jpeg"];
        $info_id_projet = $pdo->query(
            'SELECT MAX(id_projet) id_projet FROM projet'
        );
        $info_id_projet = $info_id_projet->fetchAll(PDO::FETCH_ASSOC);
        $fichier =  $info_id_projet[0]["id_projet"] + 1;
        $file = $_FILES["img_pro"]["name"];
        $extension = strrchr($file, ".");
        if (!in_array($extension, $extensions)) {
            echo "l'extension n'est pass bonne ";
        } else if ($_FILES["img_pro"]["size"] > 2 * pow(10, 6)) {
            echo "l'image est trop grande";
        } else {
            $fichierF = $fichier . $extension;
            // if ($_FILES["img_pro"] == "") {
            //     $fichierF = $info_user[0]['image_pro'];
            // }
            $dossier = 'image_projet/' . $fichierF;
            move_uploaded_file($_FILES['img_pro']['tmp_name'], $dossier);

            $statement = $pdo->prepare(
                "INSERT INTO projet ( nom_projet,type_projet,image_projet) 
                VALUES ( :nom_projet, :type_projet,:image_projet )"
            );
            $statement->execute(array(
                ':nom_projet' => $_POST['info_p'],
                ':type_projet' => $_POST['skills_p'],
                ':image_projet' => $fichierF
            ));

            $info_id_projet = $pdo->query(
                'SELECT MAX(id_projet) id_projet FROM projet'
            );
            $info_id_projet = $info_id_projet->fetchAll(PDO::FETCH_ASSOC);

            $statement_creer = $pdo->prepare(
                "INSERT INTO creer ( id_projet,id_utilisateur) 
                VALUES ( :id_projet,:id_utilisateur )"
            );
            $statement_creer->execute(array(
                ':id_projet' => $info_id_projet[0]["id_projet"],
                ':id_utilisateur' => $_SESSION["connected"]
            ));
        }
    }
    header("location: cv_utilisateur");
}
