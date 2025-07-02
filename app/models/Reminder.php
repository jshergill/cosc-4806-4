<?php

class Reminder {

    public function __construct() {}


    public function get_all_reminders() {
        $db = db_connect();
        $statement = $db->prepare("SELECT * FROM Reminders;");
        $statement->execute();
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }
    public function create_reminder($subject) {
        $db = db_connect();
        $stmt = $db->prepare("INSERT INTO Reminders (user_id, subject, created_at) VALUES (27, :subject, NOW())");
        $stmt->bindValue(':subject', $subject);
        return $stmt->execute();
    }
}