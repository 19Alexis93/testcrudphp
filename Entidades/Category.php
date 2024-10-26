<?php
    require_once 'Database/Conexion.php';

    class Category {
        private $name;
        private $createdAt;
        private $updatedAt;

        function __construct($name, $createdAt, $updatedAt) {
            $this->name = $name;
            $this->createdAt = $createdAt;
            $this->updatedAt = $updatedAt;
        }

        function getName() {
            return $this->name;
        }
        function getCreatedAt() {
            return $this->createdAt;
        }
        function getUpdatedAt() {
            return $this->updatedAt;
        }

        function setName($name) {
            $this->name = $name;
        }
        function setCreatedAt($createdAt) {
            $this->createdAt = $createdAt;
        }
        function setUpdatedAt($updatedAt) {
            $this->updatedAt = $updatedAt;
        }
    }
?>