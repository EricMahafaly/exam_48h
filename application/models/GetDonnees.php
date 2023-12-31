<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GetDonnees extends CI_Model {
    public function __construct() {
        parent::__construct();

    }

    // get all user
    public function getUser() {
        $sql = "SELECT * FROM users";
        $query = $this->db->query($sql);

        return $query->result();
    }

    // get user by id
    public function getUserById($id) {
        $sql = "SELECT * FROM users WHERE id_user = %d";
        $query = $this->db->query(sprintf($sql, $id));

        return $query->result();
    }

    // get all code
    public function getAllCode() {
        $sql = "SELECT * FROM code";
        $query = $this->db->query($sql);

        return $query->result();
    }

    // argent code
    public function getCode($numCode) {
        $sql = "SELECT * FROM code WHERE code = '%s' AND utilisable = 1";
        $sql2 = "UPDATE code SET utilisable = 0 WHERE code = '%s'";
        $query = $this->db->query(sprintf($sql, $numCode));

        $this->db->query(sprintf($sql2, $numCode));

        return $query->result();
    }

    // get regime pour maigrir
    public function getRegime($poidPerdre) {
        $sql = "SELECT * FROM v_regime_perdre WHERE kilo_perdre_min <= %d and %d <= kilo_perdre_max";
        $query = $this->db->query(sprintf($sql, $poidPerdre, $poidPerdre));

        return $query->result();
    }

    // get regime pour grossir
    public function getRegimeGainsPoids($poidGains) {
        $sql = "SELECT * FROM v_regime_gains WHERE kilo_gains_min <= %d and %d <= kilo_gains_max";
        $query = $this->db->query(sprintf($sql, $poidGains, $poidGains));

        return $query->result();
    }

    // get all regime
    public function getAllRegime() {
        $sql = "SELECT * FROM v_regime_perdre";
        $query = $this->db->query($sql);

        return $query->result();
    }

    // get argent
    public function getArgentById($id_user) {
        $sql = "SELECT * FROM argent WHERE id_user = %d";
        $query = $this->db->query(sprintf($sql, $id_user));

        return $query->result();
    }
} 