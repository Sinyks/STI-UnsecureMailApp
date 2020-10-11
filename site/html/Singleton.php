<?php


class singleton
{

    /** @var  PDO Statement */
    private $objConnection;

    public function __construct()  {
        $this->dbConnect();
    }

    private function dbConnect(){

        $databaseName = "sqlite:/usr/share/nginx/databases/database.sqlite";

        try
        {
            $this->objConnection = new PDO($databaseName);
            $this->objConnection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $this->objConnection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        }
        catch(PDOException $e)
        {
            echo("Error: ".$e -> getMessage());
        }

    }

    public function __destruct() {
        $this->dbUnconnect();
    }

    /**
     * Destruct the connexion of the database
     */
    private function dbUnconnect(){

        $this->objConnection = null;
    }


    /**
     * Transform the request in a array (for SELECT)
     * @param $query
     * @return array
     */
    private function executeSqlRequest($query){
        $query = $this->objConnection->prepare($query);
        $query->execute();
        return $query->fetchAll();
    }

    private function getUserByValue($field,$value){
        $sql = "SELECT * FROM Coworker WHERE :field = :value";
        $query = $this->objConnection->prepare($sql);

        $query->bindValue(':value',$value);
        $query->bindValue(':field',$value);
        $query->execute();

        return $query->fetchAll();
    }

    /**
     * that were too easy
     * @param $string
     */
    private function homeMadeSQLSanitier($string){
        return str_replace(";","",$string);
    }

    ////////////////////////Unsecure App Function///////////////////////////////////////

    public function getUsers(){
        return $this->executeSqlRequest("SELECT * FROM Coworker");
    }

    public function getUserByUsername($username){

        $result = $this->getUserByValue("Username",$this->homeMadeSQLSanitier($username));

        return $result[0];
    }

    public function getUserById($id){

        $result = $this->getUserByValue("id",$this->homeMadeSQLSanitier($id));

        return $result[0];

    }

    public function getReceivedMessagesByReceiverId($id){
        $sql = "SELECT * FROM Message WHERE Message.Receiver = :id";

        $query = $this->objConnection->prepare($sql);
        $query->bindValue(':id',$this->homeMadeSQLSanitier($id));
        $query->execute();

        return $query->fetchAll();
    }

    public function getMessageById($id){
        $sql = "SELECT * FROM Message WHERE Message.id = :id";

        $query = $this->objConnection->prepare($sql);
        $query->bindValue(':id',$this->homeMadeSQLSanitier($id));
        $query->execute();

        return $query->fetch();
    }

    public function createUser($username,$password,$validity,$HasAdminPrivilege){
        $sql = "INSERT INTO Coworker (Username, Password,Validity, HasAdminPrivilege) 
                VALUES (:username, :password, :validity, :hasadminprivilege)";

        $query = $this->objConnection->prepare($sql);
        $query->bindValue(":username",$this->homeMadeSQLSanitier($username));
        $query->bindValue(":password",$this->homeMadeSQLSanitier($password));
        $query->bindValue(":validity",$this->homeMadeSQLSanitier($validity));
        $query->bindValue(":hasadminprivilege",$this->homeMadeSQLSanitier($HasAdminPrivilege));
        $query->execute();
    }

    public function createMessage($idSender,$idReceiver,$content,$subject){
        $sql = "INSERT INTO Message (Sender, Receiver,Content, Subject, ReceptionDate) 
                VALUES (:sender, :receiver, :content, :subject, :receptiondate)";

        $query = $this->objConnection->prepare($sql);
        $query->bindValue(":sender",$this->homeMadeSQLSanitier($idSender));
        $query->bindValue(":receiver",$this->homeMadeSQLSanitier($idReceiver));
        $query->bindValue(":content",$this->homeMadeSQLSanitier($content));
        $query->bindValue(":subject",$this->homeMadeSQLSanitier($subject));
        $query->bindValue(":receptiondate",time());

        $query->execute();
    }

    public function deleteMessageById($id){
        $sql = "DELETE FROM Message WHERE id = :id";
        $query = $this->objConnection->prepare($sql);
        $query->bindValue(":id",$this->homeMadeSQLSanitier($id));
        $query->execute();
    }

    public function deleteUserById($id){
        $sql = "DELETE FROM Coworker WHERE id = :id";
        $query = $this->objConnection->prepare($sql);
        $query->bindValue(":id",$this->homeMadeSQLSanitier($id));
        $query->execute();
    }

    public function UpdateUserById($id,$newPassword,$newValidity,$newHasAdminPrivilege){
        $sql = "UPDATE Coworker SET Password = :password, Validity = :validity, HasAdminPrivilege = :hasadminprivileg   
                WHERE id = :id";

        $query = $this->objConnection->prepare($sql);
        $query->bindValue(":password",$this->homeMadeSQLSanitier($newPassword));
        $query->bindValue(":validity",$this->homeMadeSQLSanitier($newValidity));
        $query->bindValue(":hasadminprivilege",$this->homeMadeSQLSanitier($newHasAdminPrivilege));
        $query->execute();
    }

    /////////////////////////Exemples//////////////////////////////////////////////////
    public function getAllAlbums()
    {
        $result = $this->executeSqlRequest("SELECT idAlbum, albTitle, artName, albReleaseDate, catName
    FROM t_album
    INNER JOIN t_belong ON idfkAlbum = idAlbum
    INNER JOIN t_track ON idTrack = t_belong.idfkTrack
    INNER JOIN t_interpret ON t_interpret.idfkTrack = idTrack
    INNER JOIN t_artist ON idfkArtist = idArtist
    INNER JOIN t_category ON t_category.idCategory = t_track.fkCategory;");
        return $result;
    }

}