<?php 
$fields = ['titre', 'sousTitre', 'description', 'titreHTML'];
$table = 'dataSite';
$condition = [['champs'=>'idDataSite', 'operator'=>'=', 'param'=>1]];
$InfoSite = new PrintDataSite();
$dataSite = $InfoSite->getElementSite($fields, $table, $condition);
?>
<article class="textAreaNew buttonForm">
<h3>Conditions générales d’utilisation du site <?=$dataSite[0]['titre']?></h3>
<h4>Article 1: Objet</h4>
<p>Les présentes CGU ou Conditions Générales d’Utilisation encadrent juridiquement l’utilisation des services du site <?=$dataSite[0]['titre']?> (ci-après dénommé « le site »).
Constituant le contrat entre *****, l’Utilisateur, l’accès au site doit être précédé de l’acceptation de ces CGU. L’accès à cette plateforme signifie l’acceptation des présentes CGU.
</p>
<h4>Article 2:Mentions légales</h4>
<p>L’édition du site <?=$dataSite[0]['titre']?> est assurée par ******* .
L’hébergeur du site <?=$dataSite[0]['titre']?>.fr est la société O2switch, Chem. des Pardiaux, 63000 Clermont-Ferrand, France.</p>
<h4>Article 3: Accès au site</h4>
Le site <?=$dataSite[0]['titre']?> permet d’accéder gratuitement aux services suivants:
 <ul>
    <li>Liste de trucs</li>
 </ul>
<p>Le site est accessible gratuitement depuis n’importe où par tout utilisateur disposant d’un accès à Internet. Tous les frais nécessaires pour l’accès aux services (matériel informatique, connexion Internet…) sont à la charge de l’utilisateur.
L’accès aux services dédiés aux membres s’effectue à l’aide d’un identifiant et d’un mot de passe.</p>
<p>Pour des raisons de maintenance ou autres, l’accès au site peut être interrompu ou suspendu par l’éditeur sans préavis ni justification.</p>
<h4>Article 4: Collecte des données</h4>
<p>Pour la création du compte de l’Utilisateur, la collecte des informations au moment de l’inscription sur le site est nécessaire et obligatoire. Conformément à la loi n°78-17 du 6 janvier relative à l’informatique, aux fichiers et aux libertés, la collecte et le traitement d’informations personnelles s’effectuent dans le respect de la vie privée.
Suivant la loi Informatique et Libertés en date du 6 janvier 1978, articles 39 et 40, l’Utilisateur dispose du droit d’accéder, de rectifier, de supprimer et d’opposer ses données personnelles. L’exercice de ce droit s’effectue par:</p>
<ul>
    <li>Son espace membre dans son profil.</li>
    <li>Par simple demande à **** aux horraires d'ouverture</li>
    <p>Par mail <a href="mailto:christophe.calmes22@gmail.com">christophe.calmes22@gmail.com</a></p>
</ul>   
    
<h4>Article 5: Propriété intellectuelle</h4>
<p>Les marques, logos ainsi que les contenus du site <?=$dataSite[0]['titre']?>(illustrations graphiques, textes…) sont protégés par le Code de la propriété intellectuelle et par le droit d’auteur.
La reproduction et la copie des contenus par l’Utilisateur requièrent une autorisation préalable du site. Dans ce cas, toute utilisation à des usages commerciaux ou à des fins publicitaires est proscrite.
</p>
<h4>Article 6: Responsabilité</h4>
<p>
Bien que les informations publiées sur le site soient réputées fiables, le site se réserve la faculté d’une non-garantie de la fiabilité des sources.
Les informations diffusées sur le site <?=$dataSite[0]['titre']?> sont présentées à titre purement informatif et sont sans valeur contractuelle. 
En dépit des mises à jour régulières, la responsabilité du site ne peut être engagée en cas de modification des dispositions administratives et 
juridiques apparaissant après la publication. 
Il en est de même pour l’utilisation et l’interprétation des informations communiquées sur la plateforme.
Le site décline toute responsabilité concernant les éventuels virus pouvant infecter le matériel informatique de l’Utilisateur après l’utilisation 
ou l’accès à ce site.
Le site ne peut être tenu pour responsable en cas de force majeure ou du fait imprévisible et insurmontable d’un tiers.
La garantie totale de la sécurité et la confidentialité des données n’est pas assurée par le site. Cependant, le site s’engage à mettre en œuvre 
toutes les méthodes requises pour le faire au mieux.
</p>
<h4>Article 7: Liens hypertextes</h4>
<p>Le site peut être constitué de liens hypertextes. En cliquant sur ces derniers, l’Utilisateur sortira de la plateforme. Cette dernière n’a pas de 
contrôle et ne peut pas être tenue responsable du contenu des pages web relatives à ces liens.</p>
<h4>Article 8: Cookies</h4>
<p>Lors des visites sur le site, l’installation automatique d’un cookie sur le logiciel de navigation de l’Utilisateur peut survenir.
Les cookies correspondent à de petits fichiers déposés temporairement sur le disque dur de l’ordinateur de l’Utilisateur. Ces cookies sont 
nécessaires pour assurer l’accessibilité et la navigation sur le site. Ces fichiers ne comportent pas d’informations personnelles et ne 
peuvent pas être utilisés pour l’identification d’une personne.
L’information présente dans les cookies est utilisée pour améliorer les performances de navigation sur le site <?=$dataSite[0]['titre']?>.
En naviguant sur le site, l’Utilisateur accepte les cookies</p>
<h4>Article 9: Publication par l’Utilisateur</h4>
<p>Le site <?=$dataSite[0]['titre']?> permet aux membres de publier des commentaires.</p>
Dans ses publications, le membre est tenu de respecter les règles de la Netiquette ainsi que les règles de droit en vigueur. Ces commentaires 
ne seront toutefois qu'a destination des gestionnaires du site et uniquement dans le cadre des réservations des tables.</p>
<p>
Le membre garde l’intégralité de ses droits de propriété intellectuelle. Toutefois, toute publication sur le site implique la délégation du 
droit non exclusif et gratuit à la société éditrice de représenter, reproduire, modifier, adapter, distribuer et diffuser la publication 
n’importe où et sur n’importe quel support pour la durée de la propriété intellectuelle. Cela peut se faire directement ou par l’intermédiaire 
d’un tiers autorisé. Cela concerne notamment le droit d’utilisation de la publication sur le web et sur les réseaux de téléphonie mobile.
À chaque utilisation, l’éditeur s’engage à mentionner le nom du membre à proximité de la publication.</p>
<p>L’Utilisateur est tenu responsable de tout contenu qu’il met en ligne. L’Utilisateur s’engage à ne pas publier de contenus susceptibles de 
porter atteinte aux intérêts de tierces personnes. Toutes procédures engagées en justice par un tiers lésé à l’encontre du site devront être 
prises en charge par l’Utilisateur.</p>
<p>La suppression ou la modification par le site du contenu de l’Utilisateur peut s’effectuer à tout moment, pour n’importe quelle raison et 
sans préavis.</p>
<h4>Article 10: Gestion des Utilisateurs par les gestionnaires du site</h4>


<h4>Article 11: Durée du contrat</h4>
<p>Le présent contrat est valable pour une durée indéterminée. Le début de l’utilisation des services du site marque l’application du contrat à 
l’égard de l’Utilisateur.</p>
<h4>Article 12: Droit applicable et juridiction compétente</h4>
<p>Le présent contrat est soumis à la législation française. L’absence de résolution à l’amiable des cas de litige entre les parties implique 
le recours aux tribunaux français compétents pour régler le contentieux.</p>
</article>
