 <?php    

class CContent {

    protected $db; 

    
    // The constructor takes a database object as input and stores it in $db
    
    function __construct($db) {
        $this->db=$db;
    }
    
    
        // Functions to restore the database tables original content.  *DROP* *CREATE* *INSERT*

    function RestoreNewsProject() {
        $sql = "DROP TABLE IF EXISTS NewsProject;";

        $this->db->ExecuteQuery($sql);

        $sql = "CREATE TABLE NewsProject(
        				id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
        				slug CHAR(80) UNIQUE,
        				url CHAR(80) UNIQUE,
        				image VARCHAR(100) DEFAULT NULL,
        				TYPE CHAR(80),
        				title VARCHAR(80),
        				cathegory VARCHAR(80),
        				DATA TEXT,
        				FILTER CHAR(80),
        				published DATETIME,
        				created DATETIME,
        				updated DATETIME,
        				deleted DATETIME) 
        				ENGINE INNODB CHARACTER SET utf8;";                                             

        $this->db->ExecuteQuery($sql);

        $sql =  "INSERT INTO NewsProject (slug, url, image, TYPE, title, cathegory, DATA, FILTER, published, created) VALUES
        				('blog-1', NULL, NULL, 'post', 'Välkommen!','Aktuellt', 'MovieCave har äntligen öppnat.\n\nEfter en lång väntar har vi nu öppnat upp vår hyrfilmsite. Här kan du hyra de senaste filmerna eller varför inte en klassiker. Du kommer också att kunna följa de senaste skvallren från filmvärlden.', 'link,nl2br','2013-12-02 15:22:10', '2013-12-02 15:22:10'),
        				('blog-2', 'http://www.imdb.com/title/tt1170358/?ref_=nv_sr_1', 'img/gallery/Hobbit2.jpg', 'post', 'The Hobbit2, Smaugs ödemark snart på bio', 'Bionytt', 'Den 12 december fortsätter äventyret. Dvärgarna, i följe med Bilbo Baggins och Gandalf Grå, fortsätter sitt uppdrag att återerövra Erebor, sitt hemland, från Smaug. Bilbo Baggins har en mystisk magisk ring i sin ägo...', 'nl2br', '2013-12-05 19:12:00', '2013-12-05 19:12:00'),
        				('blog-3', 'http://www.imdb.com/title/tt1454468/?ref_=fn_al_tt_1', 'img/gallery/Gravity.jpg', 'post', 'Gravity har kommit på BlueRay', 'Filmnyhet',  'Nu kan vi erbjuda denna kanonfilm till uthyrning. Se Sandra Bullock och George Clooney kämpa i rymden', 'nl2br', '2013-12-06 10:15:20','2013-12-06 10:15:20'),
        				('blog-4', NULL, NULL, 'post', 'Vinn ära och berömmelse', 'Aktuellt',  'Vår pryoelev har knåpat ihop ett banditspel ni kan använda för att vinna hemliga koder till kommande filmer. Ni kan naturligtvis använda spelet för att spela lite mot varandra bara på skoj också.', 'nl2br', '2013-12-06 14:47:52', '2013-12-06 14:47:52'),
        				('blog-5', 'http://www.imdb.com/title/tt1877832/?ref_=fn_al_tt_4', 'img/gallery/XMen.jpg', 'post', 'Ny X-Men film på gång', 'Bionytt',  'Under 2014 kommer X-Men: Days of Future Past att gå upp på bio. Wolverine sänds tillbaka i tiden för att förhindra att både människor och mutanter utrotas.', 'nl2br', '2013-12-09 12:12:27', '2013-12-09 12:12:27'),
        				('blog-6','http://www.imdb.com/title/tt2278871/?ref_=nv_sr_1', 'img/gallery/BlueIsWarm.jpg', 'post', 'Blå är den varmaste färgen inkommen', 'Filmnyhet',  'Nu finns detta underbara romantiska drama att hyra. Följ Adele och hur hon påverkas och utvecklas efter att ha mött blåhåriga Emma.', 'nl2br', '2013-12-11 15:31:33', '2013-12-11 15:31:33'),
        				('blog-7', NULL, NULL, 'post', 'Nu närmar sig julen', 'Aktuellt',  'Från den 13 december ändra fram till jul kommer vi att lämna 25% rabatt om du hyr 2 filmer eller fler.', 'nl2br', '2013-12-12 09:01:16', '2013-12-12 09:01:16'),
        				('blog-8', 'http://www.imdb.com/title/tt1872181/?ref_=fn_al_tt_9', 'img/gallery/Spiderman2.jpg', 'post', 'The Amazing Spider-Man 2', 'Bionytt',  'Den 18 april kommer den nya filmen om Spiderman på bio. I denna film dyker Electro upp, en kraftfull fiende till Spiderman. Dessutom dyker Harry Osborn upp igen och Spiderman får fortsatta problem med OsCorp...', 'nl2br','2013-12-13 14:47:22', '2013-12-13 14:47:22')
        				;"; 

        $this->db->ExecuteQuery($sql);
        return 'Databasens nyhetsinnehåll är nu återställd med sitt ursprungliga innehåll!';
    }
 
    
        function RestoreMovieProject() {
        	       		
        	$sql = "DROP VIEW IF EXISTS VMovieProject;";     	
        	$this->db->ExecuteQuery($sql);
        	
        	$sql = "DROP TABLE IF EXISTS Movie2GenreProject, GenreProject, MovieProject;";     	
        	$this->db->ExecuteQuery($sql);
        	
        	 $sql = "CREATE TABLE MovieProject(
        				id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
        				slug CHAR(80) UNIQUE,
        				title VARCHAR(100) NOT NULL,
        				plot TEXT,
        				image VARCHAR(100) DEFAULT NULL,
        				year INT NOT NULL DEFAULT 1900,
        				price INT NOT NULL,
        				imdb VARCHAR(100) DEFAULT NULL,
        				trailer VARCHAR(100) DEFAULT NULL,
        				created DATETIME) 
        				ENGINE INNODB CHARACTER SET utf8;";  		

        $this->db->ExecuteQuery($sql);
     				
$sql = "INSERT INTO MovieProject (slug, title, plot, image, year, price, imdb, trailer, created) VALUES
    (
    'Avatar',
    'Avatar', 
    'Mästerregissören James Cameron är tillbaka med ett actionpackat äventyr olikt allt vi tidigare sett. Avatar tar oss med till en spektakulär ny värld bortom fantasins gränser där en motvillig hjälte tvingas ta stridför vad han egentligen tror på. Den desillusionerade marinsoldaten JakeSully skickas till planeten Pandora för att med alla medel övertyga urbefolkningen att låta människan exploatera deras natur för att utvinna en ny energikälla. Allteftersom Jake lär känna planeten och folket blir han mer och mer osäker på sitt uppdrag och när kampen ställs på sin spets måste han välja sida.', 
    'img/gallery/Avatar.jpg',
    2009,
    50,
    'http://www.imdb.com/title/tt0499549/?ref_=fn_al_tt_1',
    'http://www.imdb.com/video/imdb/vi2804482585?ref_=tt_pv_vi_1',
    '2013-11-25 15:55:20'
    ),
    (
    'Titanic',
    'Titanic', 
    'Inget i hela världen kan konkurrera med Titanics episka skådespel och hisnande storslagenhet. Som vinnare av elva Oscar, inklusive Bästa Film, seglade denna enorma kärlekshistoria in i hjärtat på biobesökare över hela världen, för att slutligen visa sig bli den mest populära spelfilmen någonsin. Den internationella storstjärnan Leonardo DiCaprio och den Oscarnominerade Kate Winslet lyser upp filmduken som Jack och Rose, de unga älskande som är åtskilda av samhällsklasserna men ändå förutbestämda att finna varandra på det \"osänkbara\" R.M.S. Titanics jungfruresa. Men när det dödsdömda lyxkryssningsfartyget kolliderar med ett isberg i den kalla Nordatlanten, blir deras passionerade kärleksaffär en nervpirrande kamp för att överleva.', 
    'img/gallery/Titanic.jpg',
    1997,
    40,
    'http://www.imdb.com/title/tt0120338/?ref_=fn_al_tt_1',
    'http://www.imdb.com/video/imdb/vi3180306457?ref_=tt_pv_vi_1',
    '2013-11-24 12:51:10'
    ),
    (
    'DarkKnight',
    'The dark knight raises', 
    'Nu återvänder Christopher Nolan med den episka avslutande delen i Dark Knight-trilogin. Åtta år har gått sedan Batman försvann in i natten, det ögonblicket så gick han från hjälte till jagad flykting. När han tog på sig skulden för distriktsåklagare Harvey Dents död, så offrade Batman allt för det han och kommissarie Gordon hoppades skulle vara räddningen för Gotham. Lögnen fungerade till en början då all kriminell verksamhet krossades under tyngden av lagen Dent Act. Nu är allt på väg att förändras när två nya spelare dyker upp i Gothams undre värld... Christian Bale är tillbaka i rollen som Bruce Wayne/Batman. I övriga roller ser vi bl.a. Anne Hathaway, Joseph Gordon-Lewitt, Tom Hardy, Gary Oldman och Marion Cotillard.', 
    'img/gallery/TheDarkKnight.jpg',
    2012,
    40,
    'http://www.imdb.com/title/tt1345836/?ref_=nv_sr_1',
    'http://www.imdb.com/video/imdb/vi2823134745/',
    '2013-11-25 16:11:07'
    ),
    (
    'Hobbit', 
    'Hobbit: En oväntad resa', 
    'HOBBIT: EN OVÄNTAD RESA är historien om resan som Bilbo Bagger ger sig ut på för att återkräva dvärgarnas kungadöme Erebor som för länge sedan erövrades av draken Smaug. Efter att ha blivit uppsökt av trollkarlen Gandalf grå befinner sig Bilbo plötsligt i en grupp bestående av tretton dvärgar som leds av den legendariske krigaren Thorin Ekensköld. Vägen mot dvärgarnas rike går över vildmarken, genom områden där orcher och troll härjar fritt. Målet för resan är Ensliga berget, men först måste de ta sig genom dvärgarnas tunnlar. Det är här Bilbo träffar den varelse som kommer att påverka resten av hans liv – Gollum. Ensam med Gollum vid stranden till en underjordisk sjö upptäcker den intet ont anande Bilbo både ett mod och en falskhet inom sig, något han inte tidigare känt. Det är också nu som Gollums skatt, ringen som besitter en oväntad kraft och makt, hamnar i Bilbos ägo. En enkel guldring som bestämmer Midgårds öde på ett sätt som Bilbo inte ens kan föreställa sig i sin livligaste fantasi ...', 
    'img/gallery/Hobbit.jpg',
    2012,
    50,
    'http://www.imdb.com/title/tt0903624/?ref_=nv_sr_2',
    'http://www.imdb.com/video/imdb/vi4090276121?ref_=tt_pv_vi_1',
    '2013-11-30 13:21:13'
    ),
    (
    'JurassicPark', 
    'Jurassic Park', 
    'På en enslig ö har en miljardär i hemlighet skapat en nöjespark med en udda attraktion - levande dinosaurier som skapats med hjälp av förhistoriskt DNA. Innan han öppnar parken för allmänheten, bjuder han in två dinosaurexperter. Men deras vistelse på ön blir allt annat än fridfull när rovdjuren ger sig ut och börjar jaga.', 
    'img/gallery/JurassicPark.jpg',
    1993,
    30,
    'http://www.imdb.com/title/tt0107290/?ref_=fn_al_tt_2',
    'http://www.imdb.com/video/imdb/vi2525535257?ref_=tt_pv_vi_1',
    '2013-11-22 09:12:14'
    ),
    (
    'WarmBodies',
    'Warm bodies', 
    'Kärleken övervinner allt... till och med den oemotståndliga lusten att äta din älskades hjärnmassa! I en inte så avlägsen framtid är jorden befolkad av lika delar människoätande zombier och zombiebekämpande människor. Men när den unge zombien R plötsligt får impulsen att rädda den varmblodiga flickan Julie från ett zombieöverfall börjar en vänskap som kommer att vända upp och ner på nya världsordningen! Förutsatt att Julie kan hålla sig levande – och R kan hålla sig levande död tillräckligt länge! “Warm Bodies” är den mest originella kärlekshistoria du kommer att se att i år! Med en stjärnspäckad rollista och en humor som kan väcka även de dödaste döda till liv!', 
    'img/gallery/WarmBodies.jpg',
    2013,
    50,
    'http://www.imdb.com/title/tt1588173/?ref_=nv_sr_6',
    'http://www.imdb.com/video/imdb/vi1895409433?ref_=tt_pv_vi_2',
    '2013-11-30 10:19:27'
    ),
    (
    'Conjuring',
    'The Conjuring', 
    'The Conjuring är baserad på verkliga händelser och handlar om spökjägarna Lorraine och Ed Warren (Vera Farmiga och Patrick Wilson) som hjälper en familj vars hus terroriseras av en mystisk ond ande.', 
    'img/gallery/Conjuring.jpg',
    2013,
    50,
    'http://www.imdb.com/title/tt1457767/?ref_=nv_sr_1',
    'http://www.imdb.com/video/imdb/vi3372131865?ref_=tt_pv_vi_2',
    '2013-11-29 11:11:54'
    ),
    (
    'StuckInLove', 
    'Stuck in love', 
    'En författare, hans fru och deras tonårsbarn kommer till insikt att kärlek bara leder till problem.', 
    'img/gallery/StuckInLove.jpg',
    2012,
    50,
    'http://www.imdb.com/title/tt2205697/?ref_=nv_sr_6',
    'http://www.imdb.com/video/imdb/vi1853466137?ref_=tt_pv_vi_1',
    '2013-12-02 15:02:26'
    ),
     (
    'BlueColor', 
    'Blå är den varmaste färgen', 
    'Adèle saknar något i sitt liv. Håret är uppsatt i en slarvig knut med hårslingor för ögonen och tårar rullar ner för kinden när hon bestämmer sig för att lämna pojkvännen Tomas. Separationen blir ett uppvaknande och hon hoppar så småningom i sängen med den blåhåriga och butchiga Emma (Lea Seydoux) som hon blir handlöst förälskad i. Emma är artisten och Adèle blir hennes musa som får stå krokimodell genom relationen, samtidigt som hon kedjerökandes fortsätter att grubbla på sin sexuella läggning.', 
    'img/gallery/BlueIsWarm.jpg',
    2013,
    60,
    'http://www.imdb.com/title/tt2278871/?ref_=nv_sr_1',
    'http://www.imdb.com/video/imdb/vi4217350425?ref_=tt_pv_vi_1',
    '2013-12-04 09:08:34'
    ),
    (
    'Gravity', 
    'Gravity', 
    'Dr. Ryan Stone är medicintekniker och är ute på sitt första uppdrag i rymden tillsammans med den erfarna astronauten Matt Kowalsky som är ute på sin sista resa innan pensionen. Rymdfärjan förstörs, Stone och Kowalsky är helt ensamma – och endast ihopkopplade med varandra glider de ut i mörkret. Av tystnaden förstår de att all kommunikation med Jorden har brutits och samtidigt som rädslan övergår i panik så försvinner lite syre för varje litet andetag.', 
    'img/gallery/Gravity.jpg',
    2013,
    60,
    'http://www.imdb.com/title/tt1454468/?ref_=nv_sr_1',
    'http://www.imdb.com/video/imdb/vi3017320729?ref_=tt_pv_vi_2',
    '2013-12-05 18:41:09'
    )
;";        				       				  				
       $this->db->ExecuteQuery($sql);
       
       
     $sql = "CREATE TABLE GenreProject(
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    name CHAR(20) NOT NULL -- crime, svenskt, college, drama, etc
) ENGINE INNODB CHARACTER SET utf8;";  		

        $this->db->ExecuteQuery($sql);
        	
  $sql = "INSERT INTO GenreProject (name) VALUES 
    ('comedy'), ('fantasy'), ('drama'), 
    ('thriller'), ('scifi'), ('action'), 
    ('horror')
;";
 $this->db->ExecuteQuery($sql);
        	
        	
      $sql = "CREATE TABLE Movie2GenreProject(
    idMovie INT NOT NULL,
    idGenre INT NOT NULL,
    FOREIGN KEY (idMovie) REFERENCES MovieProject (id),
    FOREIGN KEY (idGenre) REFERENCES GenreProject (id),
    PRIMARY KEY (idMovie, idGenre)
    ) ENGINE INNODB;";  		

        $this->db->ExecuteQuery($sql);
        	
  $sql = "INSERT INTO Movie2GenreProject (idMovie, idGenre) VALUES      
  	(1, 2),
    (2, 3),
    (3, 4),    
    (4, 2),
    (5, 2),
    (6, 1),
    (7, 7), 
    (8, 3),
    (9, 3),
    (10, 5);";

 $this->db->ExecuteQuery($sql);
        	
        	
     $sql = "CREATE VIEW VMovieProject AS
     SELECT M.*,
    GROUP_CONCAT(G.name) AS genre
    FROM MovieProject AS M
    LEFT OUTER JOIN Movie2GenreProject AS M2G
    ON M.id = M2G.idMovie
    LEFT OUTER JOIN GenreProject AS G
    ON M2G.idGenre = G.id
    GROUP BY M.id
    ;";  		
        $this->db->ExecuteQuery($sql);

       
        return 'Databasens filminnehåll är nu återställd med sitt ursprungliga innehåll!';       
        
        }


    function GetAllContent(){   	
    	$sql = 'SELECT *, (published <= NOW()) AS available FROM Content;';
      $res = $this->db->ExecuteSelectQueryAndFetchAll($sql);
        
     // Loop through the resultset and put each row into a html list item
     $resultlist = null;
     foreach($res AS $key => $val) {
     	 $resultlist .= "<li>{$val->TYPE} (" . (!$val->available ? 'inte ' : null) . "publicerad): " . htmlentities($val->title, null, 'UTF-8') . " 
     	 (<a href='edit.php?id={$val->id}'>editera</a> <a href='" . $this->getUrlToContent($val) . "'>visa</a> <a href='delete.php?id={$val->id}'>radera</a>)</li>\n";
     }
       
     return $resultlist;	
    }
    
    function GetAllMovieContent(){   	
    	$sql = 'SELECT * FROM VMovieProject;';
      $res = $this->db->ExecuteSelectQueryAndFetchAll($sql);
        
     // Loop through the resultset and put each row into a html list item
     $resultlist = null;
     foreach($res AS $key => $val) {
     	 $resultlist .= "<li>{$val->title} (" . (!$val->created ? 'inte ' : null) . "publicerad): " . htmlentities($val->title, null, 'UTF-8') . " 
     	 (<a href='edit.php?id={$val->id}'>editera</a> <a href='film.php?slug={$val->slug}'>visa</a> <a href='delete.php?id={$val->id}'>radera</a>)</li>\n";
     }
       
     return $resultlist;	
    }
    
    
    
    
    function GetAllNewsPubSort(){   	
    	$sql = 'SELECT *, (published <= NOW()) AS available FROM NewsProject ORDER BY published DESC;';
      $res = $this->db->ExecuteSelectQueryAndFetchAll($sql);
        
     // Loop through the resultset and put each row into a html list item
     $resultlist = null;
     foreach($res AS $key => $val) {
     	 $resultlist .= "<li>{$val->TYPE} (" . (!$val->available ? 'inte ' : null) . "publicerad): " . htmlentities($val->title, null, 'UTF-8') . " 
     	 (<a href='edit.php?id={$val->id}'>editera</a> <a href='" . $this->getUrlToContent($val) . "'>visa</a> <a href='delete.php?id={$val->id}'>radera</a>)</li>\n";
     }
     return $resultlist;	
    }
    
 
    
    // Function getUrlToContent() create a link based on it's type (page or post) 
    function getUrlToContent($content) {
    	switch($content->TYPE) {
    	case 'page': return "page.php?url={$content->url}"; break;
    	case 'post': return "blog.php?slug={$content->slug}"; break;
    		default: return null; break;
    	}
    }
    

  
    
    // Function EditContent() fetches the parameters in the form and updates the content based on the ID.  *UPDATE*

    function EditContent() {
        // Get all parameters submitted by the user in the form 
        $id = isset($_POST['id']) ? strip_tags($_POST['id']) : (isset($_GET['id']) ? strip_tags($_GET['id']) : null);
        $title = isset($_POST['title']) ? $_POST['title'] : null;
        $slug = isset($_POST['slug']) ? $_POST['slug'] : null;
        $url = isset($_POST['url']) ? strip_tags($_POST['url']) : null;
        $data = isset($_POST['data']) ? $_POST['data'] : array();
        $type = isset($_POST['type']) ? strip_tags($_POST['type']) : array();
        $filter = isset($_POST['filter']) ? $_POST['filter'] : array();
        $published = isset($_POST['published']) ? strip_tags($_POST['published']) : array();
        $save = isset($_POST['save']) ? true : false;
        $acronym = isset($_SESSION['user']) ? $_SESSION['user']->acronym : null;

        // If the form is submitted an UPDATE query is created and the database is updated.
        if($save) {
            $sql = 'UPDATE Content SET
            title = ?,
            slug = ?,
            url = ?,
            TYPE = ?,
            DATA = ?,
            FILTER = ?,
            published = ?,
            updated = NOW() 
            WHERE id = ?';
        $params = array($title, $slug, $url, $type, $data, $filter, $published, $id);
        $this->db->ExecuteQuery($sql, $params);
        return 'Informationen är nu sparad.';
        }
    }
    
    // Function DeleteContent() deletes an entry, with the ID eneterd, from the database. *DELETE*

    function DeleteContent($id) {
        $sql = 'DELETE FROM Content WHERE id = ? LIMIT 1';
        $params = array($id);
        $this->db->ExecuteQuery($sql, $params);
        header('Location: view.php?');
    }
    
    
        function DeleteFromNewsProject($id) {
        $sql = 'DELETE FROM NewsProject WHERE id = ? LIMIT 1';
        $params = array($id);
        $this->db->ExecuteQuery($sql, $params);
        header('Location: view.php?');
    }
    
    function DeleteFromMovieProject($id) {
    	
    		$sql = 'DELETE FROM Movie2GenreProject WHERE idMovie = ? LIMIT 1'; 
        $params = array($id);
        $this->db->ExecuteQuery($sql, $params);
    	
        $sql = 'DELETE FROM MovieProject WHERE id = ? LIMIT 1';
        $params = array($id);
        $this->db->ExecuteQuery($sql, $params);
        header('Location: databas.php?');
    }
    
    // Function CreateContent() creates a new entry, with a Title only, in the database. The entry is then opened in the 
    // Edit form page for the user to fill in complementaryinformation. *INSERT INTO*

    function CreateContent($title) {
        $sql = 'INSERT INTO Content (title) VALUES (?)';
        $params = array($title);
        $this->db->ExecuteQuery($sql, $params);
        $id = $this->db->LastInsertId();
        header('Location: edit.php?id=' . $id);
    }
    
        function CreateFilmContent($title) {
        $sql = 'INSERT INTO MovieProject (title) VALUES (?)';
        $params = array($title);
        $this->db->ExecuteQuery($sql, $params);
        $id = $this->db->LastInsertId();
        header('Location: editfilm.php?id=' . $id);
    }
    
    function CreateNewsContent($title) {
        $sql = 'INSERT INTO NewsProject (title) VALUES (?)';
        $params = array($title);
        $this->db->ExecuteQuery($sql, $params);
        $id = $this->db->LastInsertId();
        header('Location: edit.php?id=' . $id);
    }
    
    
     // Function SelectFromTable() fetches an individual entry from the database with the ID entered. *SELECT*

    function SelectFromTable($id) {
        // Select from table 
        $sql = 'SELECT * FROM Content WHERE id = ?';
        $res = $this->db->ExecuteSelectQueryAndFetchAll($sql, array($id));

        if(isset($res[0])) {
            $c = $res[0];
            return $c;
        }
        else {
            die('Misslyckades: Det finns inget innehåll med angivet id' . $id);
        }
    }
    
    
        function SelectFromNewsProject($id) {
        // Select from table 
        $sql = 'SELECT * FROM NewsProject WHERE id = ?';
        $res = $this->db->ExecuteSelectQueryAndFetchAll($sql, array($id));

        if(isset($res[0])) {
            $c = $res[0];
            return $c;
        }
        else {
            die('Misslyckades: Det finns inget innehåll med angivet id' . $id);
        }
    }
    
    function SelectFromFilmProject($id) {
        // Select from table 
        $sql = 'SELECT * FROM MovieProject WHERE id = ?';
        $res = $this->db->ExecuteSelectQueryAndFetchAll($sql, array($id));

        if(isset($res[0])) {
            $c = $res[0];
            return $c;
        }
        else {
            die('Misslyckades: Det finns inget innehåll med angivet id' . $id);
        }
    }
    
    
    // Function SelectPage() fetches all webpages (url =page=) from the database. *SELECT*

    function SelectPage($url) {
        $sql = "SELECT * FROM Content WHERE TYPE = 'page' AND url = ? AND published <= NOW();";
        $res = $this->db->ExecuteSelectQueryAndFetchAll($sql, array($url));

        if(isset($res[0])) {
            $c = $res[0];
            return $c;
        }
        else {
            die('Misslyckades: Det finns inget sådant innehåll.');
        }
    }
    
    
     // Function SelectPost() fetches a specified blogpost ($slug) from the database. *SELECT*

    function SelectPost($slug) {
        $slugSql = $slug ? 'slug = ?' : '1'; 
        $sql = "SELECT * FROM Content WHERE TYPE = 'post' AND $slugSql AND published <= NOW() ORDER BY updated DESC;";
        $res = $this->db->ExecuteSelectQueryAndFetchAll($sql, array($slug));
        return $res;
    }
    
    function SelectPostPublished($slug) {
        $slugSql = $slug ? 'slug = ?' : '1'; 

        $sql = "SELECT * FROM NewsProject WHERE TYPE = 'post' AND $slugSql AND published <= NOW() ORDER BY published DESC;";
        $res = $this->db->ExecuteSelectQueryAndFetchAll($sql, array($slug));
        return $res;
    }
    
        function SelectFilmPublished($slug) {
        $slugSql = $slug ? 'slug = ?' : '1'; 
				$sql = "SELECT * FROM MovieProject WHERE $slugSql AND created <= NOW() ORDER BY created DESC;";
        $res = $this->db->ExecuteSelectQueryAndFetchAll($sql, array($slug));
        return $res;
    }

} 

