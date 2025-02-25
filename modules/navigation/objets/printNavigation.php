<?php
 function wathIsMenu ($menu, $data) {
  if($data != 0) {
      foreach ($menu as $value) {
        if($value['idMenuDeroulant']==$data) {
          return $value['titreMenu'];
        }
      }
  } else {
    return 'Bandeau de navigation';
  }
}
Class PrintNavigation extends GetNavigation {

  private function rolesUsers() {
    $roles = new GetUser();
    $data = $roles->getRoles();
    $rolesUsers = array();
    foreach ($data as $value) {
        array_push($rolesUsers, ['name'=>$value['typeRole'], 'role'=>$value['accreditation']]);
    }
    return $rolesUsers;
  }
  public function bandeauHaut($variable){
    echo '<div class="menu-btn">
              <div class="btn-line"></div>
              <div class="btn-line"></div>
              <div class="btn-line"></div>
          </div>';
    echo '<nav class="nav menu"><ul class="navigationBandeau">';
      foreach ($variable as $value) {
        if(($value['zoneMenu'] == 0)&&($value['deroulant'] == 0)) {
          echo '<li><a href="index.php?idNav='.$value['targetRoute'].'">'.$value['nomNav'].'</a></li>';
        } else {
          echo '<div class="dropdown">';
          echo '<button class="buttonForm">'.$value['nomNav'].'</button>';
          $dataTraiter  = $this->AuthenticNav ($value);
          echo ' <div class="dropdown-child">';
          foreach ($dataTraiter as $valeur) {
              echo '<div><a href="index.php?idNav='.$valeur['targetRoute'].'">'.$valeur['nomNav'].'</a></div>';
          }
          echo '</div>';
          echo '</div>';
        }
      }
    echo '</ul>
    </nav>';
    include 'javaScript/magicBurger.php';
  }
  public function selectZoneMenu($variable, $dataTarget) {
    echo '<label for="zoneMenu">Zone du menu</label>
          <select id="zoneMenu" name="zoneMenu">
          <option value="0">Bandeau de navigation</option>';
          foreach ($variable  as $value) {
            if($value['idMenuDeroulant'] == $dataTarget) {
              echo '<option value="'.$value['idMenuDeroulant'].'" selected>'.$value['titreMenu'].'</option>';
            } else {
              echo '<option value="'.$value['idMenuDeroulant'].'">'.$value['titreMenu'].'</option>';
            }
           
          }
    echo'</select>';
  }
  public function menuDeroulant($variable, $dataTarget) {
    echo '<label for="deroulant">Menu déroulant ?</label>
          <select id="deroulant" name="deroulant">
          <option value="0">Non</option>';
          foreach ($variable as $value) {
            if($value['idMenuDeroulant'] == $dataTarget) {
              echo '<option value="'.$value['idMenuDeroulant'].'" selected>'.$value['titreMenu'].'</option>';
            } else {
              echo '<option value="'.$value['idMenuDeroulant'].'">'.$value['titreMenu'].'</option>';
            }
            
          }
    echo'</select>';
  }
  public function listeMenuDeroulant($variable) {
    echo '<ul>';
      foreach ($variable as $value) {
        echo '<li>'.$value['titreMenu'].'</li>';
      }
    echo '</ul>';
  }
  public function listeRouteForm($variable, $securiter) {
    $roles = $this->rolesUsers();
      foreach ($roles as  $valueRoles) {
        echo '<ul class="listClass">';
          echo '<li class="bold">'.$valueRoles['name'].'</li>';
            foreach ($variable as  $value) {
              echo '<ul class="listClass">';
              if($value['securiter'] == $valueRoles['role']) {
                echo '<li>'.$value['chemin'].' |Action => encodeRoutage('.$value['idForm'].')</li>';
              }

        echo '</ul>';
      }
      echo '</ul>';
    }
  }
  public function affichageAllNav() {
    $roles = $this->rolesUsers();
    $variable  = $this->getAllNav();
    $menu = $this->getMenuDeroulant();
    $accreditation = '';
    echo '<div class="moduleNav nav">
            <div class="nomNav">Nom navigation</div>
            <div class="phat">Chemin</div>
            <div class="visible">Menu visible ?</div>
            <div class="zoneMenu">ZoneMenu</div>
            <div class="Ordre">Ordre</div>
            <div class="Niveau">Autorisation</div>
            <div class="deroulant">Menu déroulant</div>
            <div class="valide">Valide ?</div>
        </div>';
        foreach ($variable as $value) {
          foreach ($roles as  $valueRoles) {
            if($valueRoles['role'] == $value['niveau']) {
              $accreditation = $valueRoles['name'];
            }
          }
          $nav = NULL;
          if($value['deroulant'] != 0) {
            $nav = 'nav';
          }

          echo '<a class="lienTab" href="'.findTargetRoute(93).'&id='.$value['idNav'].'">
                  <div class="moduleNav '.$nav.'">
                        <div class="nomNav">'.$value['nomNav'].'</div>
                        <div class="phat">'.$value['cheminNav'].'</div>
                        <div class="visible">'.yes($value['menuVisible']).'</div>
                        <div class="zoneMenu">'.wathIsMenu($menu, $value['zoneMenu']).'</div>
                        <div class="Ordre">'.$value['ordre'].'</div>
                        <div class="Niveau">'.$accreditation.'</div>
                        <div class="deroulant">'.wathIsMenu($menu, $value['zoneMenu']).'</div>
                        <div class="valide">'.yes($value['valide']).'</div>
                    </div>
              </a>';
        }
  }
  public function updateNav($id, $idNav) {
    $roles = $this->rolesUsers();
    $yes = ['Non', 'Oui'];
    $data = $this->getNavParam($id)[0];
    $menu = $this->getMenuDeroulant();
    echo '<div class="adminNav">
            <div class="nomNav">Nom Nav</div>
            <div class="phat">Chemin</div>
            <div class="visible">Visible ?</div>
            <div class="zoneMenu">Zone menus</div>
            <div class="Ordre">Ordre apparition</div>
            <div class="Niveau">Niveau</div>
            <div class="deroulant">Menu déroulant</div>
            <div class="valide">Valide</div>
          </div>';
  echo '<div class="adminNav">
            <div class="nomNav">'.$data['nomNav'].'</div>
            <div class="phat">'.$data['cheminNav'].'</div>
            <div class="visible">'.yes($data['menuVisible']).'</div>
            <div class="zoneMenu">'.wathIsMenu($menu, $data['zoneMenu']).'</div>
            <div class="Ordre">'.$data['ordre'].'</div>
            <div class="Niveau">'.$roles[$data['niveau']]['name'].'</div>
            <div class="deroulant">'.wathIsMenu($menu, $data['zoneMenu']).'</div>
            <div class="valide">'.yes($data['valide']).'</div>
        </div>';

    echo '<h3>Modifier un lien de navigation</h3>
    <form class="formulaireClassique" action="'.encodeRoutage(20).'" method="post">
      <input type="hidden" name="id" value="'.$data['idNav'].'"/>
      <label for="nomNav">Nom du lien</label>
      <input id="nomNav" type="text" name="nomNav" value="'.$data['nomNav'].'" required>
      <label for="cheminNav">chemin du lien</label>
      <input id="cheminNav" type="text" name="cheminNav" value="'.$data['cheminNav'].'"required>
      <label for="valide">Lien valide ?</label>
      <select id="valide" name="valide">'; 
      for ($i=0; $i < count($yes) ; $i++) {  
        if($data['valide'] == $i) {
          echo '<option value="'.$i.'" selected>'.$yes[$i].'</option>'; 
        } else {
          echo '<option value="'.$i.'">'.$yes[$i].'</option>'; 
        }
        
      }
    echo'</select>
      <label for="menuVisible">Menu visible ? '.$yes[$data['menuVisible']].'</label>
        <select id="menuVisible" name="menuVisible">';
          for ($i=0; $i < count($yes) ; $i++) {  
            if($data['menuVisible'] == $i) {
              echo '<option value="'.$i.'" selected>'.$yes[$i].'</option>'; 
            } else {
              echo '<option value="'.$i.'">'.$yes[$i].'</option>'; 
            }
            
          }
  echo '</select>
      <label for="ordre">Ordre d\'apparition : '.$data['ordre'].'</label>
      <input id="ordre" type="number" name="ordre" min="0" max="20" value="'.$data['ordre'].'" required>
      <label for="niveau">Niveau d\'acréditation :</label>
        <select id="niveau" name="niveau">';
        foreach ($roles as $value) {
          if($data['niveau'] == $value['role']) {
            echo '<option value="'.$value['role'].'" selected>'.$value['name'].'</option>';
          } else {
            echo '<option value="'.$value['role'].'">'.$value['name'].'</option>';
          }
          
        }
    echo '</select>';
            $this->selectZoneMenu($this->getMenuDeroulant(), $data['zoneMenu']);
            $this->menuDeroulant($this->getMenuDeroulant(), $data['deroulant']);
        echo '<button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Modifier</button>
    </form>';
echo '<form class="formulaireClassique" action="'.encodeRoutage(21).'" method="post">
          <input type="hidden" name="id" value="'.$data['idNav'].'"/>
          <button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Delete</button>
      </form>';
  }
  public function modulesList() {
    $dataModule = $this->getModules();
    echo
    '<label for="idModule">Module</label>
      <select id="idModule" name="idModule">';
      foreach ($dataModule as $key => $value) {
        echo '<option value="'.$value['id'].'">'.$value['module'].'</option>';
      }
      echo'</select>';
  }
  public function displayModulesList($idNav) {
    echo '<ul class="listeProfil">';
    for ($i=0; $i <=1 ; $i++) {
      if($i == 0) {
        echo '<li><h3>Les modules non valides</h3></li>';
        $message = "valider";
      }
      if ($i == 1) {
        echo '<li><h3>Les modules valides</h3></li>';
        $message = "invalider";
      }
      foreach ($this->getModules($i) as $key => $value) {
        echo '<li><form class="formulaireClassique" action="'.encodeRoutage(23).'" method="post">
                  <input type="hidden" name="id" value="'.$value['id'].'"/>
                  <button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Nom module : '.$value['module'].' - '.$message.'</button>
              </form></li>';
      }
    }
    echo '</ul>';
  }
  public function addMenuDeroulant ($idNav) {
    $roles = $this->rolesUsers();
    $modules = $this->getModules(1);
    echo '<h3>Ajouter un nouveau menu déroulant</h3>
    <form class="formulaireClassique" action="'.encodeRoutage(6).'" method="post">
      <label for="titreMenu">Nouveau menu</label>
      <input id="titreMenu" type="text" name="titreMenu" required>
      <label for="niveau">Niveau d\'acréditation du nouveau menu</label>
      <select id="niveau"  name="niveau">';

      foreach ($roles as $value) {
        echo '<option value="'.$value['role'].'">'.$value['name'].'</option>';
      }
    echo '</select>
      <label for="idModule">Module du menu déroulant</label>
        <select id="idModule" name="idModule">';
          foreach ($modules as $value) {
            echo '<option value="'.$value['id'].'">'.$value['module'].'</option>';
          }
  echo'</select>
      <button class="buttonForm" type="submit" name="idNav" value="'.$idNav.'">Ajouter</button>
    </form>';
  }
}
