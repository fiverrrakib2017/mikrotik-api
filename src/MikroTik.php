<?php

namespace MikrotikAPI;

class MikroTik {
    private $router_ip;
    private $router_user;
    private $router_pass;
    private $api_port;

    public function __construct($ip, $user, $pass, $port = 8728) {
        $this->router_ip = $ip;
        $this->router_user = $user;
        $this->router_pass = $pass;
        $this->api_port = $port;
    }

    private function apiRequest($command, $parameters = []) {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => "http://{$this->router_ip}:{$this->api_port}/rest/$command",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_USERPWD => "{$this->router_user}:{$this->router_pass}",
            CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => json_encode($parameters)
        ]);

        $response = curl_exec($curl);
        curl_close($curl);
        return json_decode($response, true);
    }

    public function addUser($username, $password, $profile) {
        return $this->apiRequest("ppp/secret/add", [
            'name' => $username,
            'password' => $password,
            'profile' => $profile
        ]);
    }

    public function getUserDetails($username) {
        $users = $this->apiRequest("ppp/secret/print");

        foreach ($users as $user) {
            if ($user['name'] === $username) {
                return $user;
            }
        }

        return null;
    }

    public function getOnlineUsers() {
        return $this->apiRequest("ppp/active/print");
    }

    public function getUserStatusByName($username) {
        $active_users = $this->getOnlineUsers();

        foreach ($active_users as $user) {
            if ($user['name'] === $username) {
                return [
                    "username" => $username,
                    "status" => "online",
                    "ip_address" => $user['address'] ?? "N/A",
                    "uptime" => $user['uptime'] ?? "N/A"
                ];
            }
        }

        return [
            "username" => $username,
            "status" => "offline"
        ];
    }
}
